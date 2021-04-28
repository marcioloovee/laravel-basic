<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DeveloperTest extends TestCase
{
    //use DatabaseTransactions; //simular teste na memória do banco sem salvar
    //use RefreshDatabase; //resetar os testes do banco
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testDeveloperCreate()
    {
        $data = [
            'nome'              => 'Marcio',
            'sexo'              => 'M',
            'hobby'             => 'Jogar um fifa',
            'idade'             => 29,
            'dataNascimento'    => "1991-08-26"
        ];
        $route = route("developer.store", [], false);
        $response = $this->post($route, $data);
        $response->assertJsonFragment(['error' => false]);
        $retorno = $response;
    }

    public function testDeveloperIndex()
    {
        $route = route("developer.index", [], false);
        $response = $this->get($route);
        $response->assertJsonFragment(['error' => false]);
        $retorno = $response;
    }

    public function testDeveloperShow()
    {
        $route = route("developer.show", ["developer" => 1], false);
        $response = $this->get($route);
        $response->assertJsonFragment(['error' => false]);
        $retorno = $response;
    }

    public function testDeveloperUpdate()
    {
        $data = [
            'nome'  => 'Marcio Alexandre'
        ];
        $route = route("developer.update", ["developer" => 1], false);
        $response = $this->put($route, $data);
        $response->assertJsonFragment(['nome' => 'Marcio Alexandre']);
        $retorno = $response;
    }

    public function testDeveloperDelete()
    {
        $route = route("developer.destroy", ["developer" => 1], false);
        $response = $this->delete($route);
        $response->assertJsonFragment(['error' => false]);
        $retorno = $response;
    }

    public function testDeveloperRestore()
    {
        $route = route("developer.restore", ["developer" => 1], false);
        $response = $this->post($route);
        $response->assertJsonFragment(['error' => false]);
        $retorno = $response;

    }
}
