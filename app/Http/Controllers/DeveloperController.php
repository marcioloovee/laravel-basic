<?php

namespace App\Http\Controllers;

use App\ModelDeveloper;
use Illuminate\Http\Request;
use App\Developer;
use App\Http\Requests\RequestDeveloper;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        

        $list = Developer::query();

        if (!empty($request->get('nome'))) {
            $list->where('nome','LIKE',$request->nome.'%');
        }
        if (!empty($request->get('sexo'))) {
            $list->where('sexo','LIKE',$request->sexo);
        }
        if (!empty($request->get('hobby'))) {
            $list->where('hobby','LIKE','%'.$request->hobby.'%');
        }
        if (!empty($request->get('idade'))) {
            $list->where('idade','LIKE',$request->idade);
        }
        if (!empty($request->get('dataNascimento'))) {
            $list->where('dataNascimento','LIKE',$request->dataNascimento.'%');
        }

        $retorno = [
            'error' => false,
            'data'  => $list->paginate(10)
        ];
        return response($retorno,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RequestDeveloper $request)
    {
        $request->validated();

        //verifica se idade está correta
        if ($this->calcularIdade($request->dataNascimento) != $request->idade) {
            $retorno = [
                'error'     => true,
                'data'      => [
                    "dataNascimento" => ["A idade informada não é compatível com a data de nascimento!"]
                ]
            ];
            return response($retorno,202);
        }

        $object = new Developer();
        $object->fill($request->all());
        $object->save();
        $object->refresh();

        $retorno = [
            'error' => false,
            'data'  => $object
        ];
        return response($retorno,200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ModelDeveloper  $modelDeveloper
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = Developer::find($id);

        if (is_null($object)) {
            $retorno = [
                'error' => true,
                'data'  => "O developer '{$id}' não foi encontrado"
            ];
            return response($retorno,400);
        }


        $retorno = [
            'error' => false,
            'data'  => $object
        ];
        return response($retorno,200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelDeveloper  $modelDeveloper
     * @return \Illuminate\Http\Response
     */
    public function update(RequestDeveloper $request, $id)
    {
        $object = Developer::find($id);

        if (is_null($object)) {
            $retorno = [
                'error'     => true,
                'message'   => "O developer '{$id}' não foi encontrado"
            ];
            return response($retorno,400);
        }
        
        $request->validated();

        $object->fill($request->all());
        $object->update();
        $object->refresh();

        $retorno = [
            'error' => false,
            'data'  => $object
        ];
        return response($retorno,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelDeveloper  $modelDeveloper
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object = Developer::find($id);

        if (is_null($object)) {
            $retorno = [
                'error' => true,
                'data'  => "O developer '{$id}' não foi encontrado"
            ];
            return response($retorno,400);
        }
        
        $run = $object->delete();

        if ($run) {
            $object->nome = $object->nome. " (deleted)";
            $object->save();
            $retorno = [
                'error' => false,
                'data'  => "O developer '{$id}' foi removido"
            ];
            return response($retorno,200);
        }
    }

    public function restore($id)
    {
        $object = Developer::where("id",$id)->withTrashed()->get();

        if (!count($object)) {
            $retorno = [
                'error' => true,
                'data'  => "O developer '{$id}' não foi encontrado"
            ];
            return response($retorno,400);
        }
        
        Developer::where("id",$id)->restore();

        $retorno = [
            'error' => false
        ];
        return response($retorno,200);
    }

    public function calcularIdade($data_nasc)
    {
        $data_nasc = explode("-",$data_nasc);
        $data = date("Y-m-d");
        $data = explode("-",$data);
        $anos = $data[0] - $data_nasc[0];

        if ($data_nasc[1] > $data[1])
            return $anos-1;

        if ($data_nasc[1] == $data[1]) {
            if ($data_nasc[2] <= $data[2]) {
            return $anos;
            } else {
            return $anos - 1;
            }
        }

        if ($data_nasc[1] < $data[1])
            return $anos;

    }
}
