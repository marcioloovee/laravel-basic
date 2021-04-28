
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Teste de conhecimento - Gazin Tech</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3>Lista de desenvolvedores</h3>
                </div>
                <hr>
                <div class="col-12 alert alert-info">
                    <form id="formFiltrar" onsubmit="return false;">
                        <label>Nome: <input class="form-control" type="text" name="nome"></label>
                        <label>Sexo: 
                            <select class="form-control" name="sexo">
                                <option value="">-- todos --</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </label>
                        <label>Hobby: <input class="form-control" type="text" name="hobby"></label>
                        <label>Idade: <input class="form-control" type="number" min="0" max="100" name="idade"></label>
                        <label>Data de nascimento: <input class="form-control" type="date" name="dataNascimento"></label>
                        <label><button class="btn btn-success" type="button" id="btnFiltrar"><i class="fa fa-filter"></i> Filtrar</button></label>
                        <label><button class="btn btn-info" type="button" data-toggle="modal" href='#modal-cadastrar'><i class="fa fa-plus"></i> Cadastrar</button></label>
                    </form>
                </div>
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sexo</th>
                                <th>Hobby</th>
                                <th>Idade</th>
                                <th>Data de nascimento</th>
                                <th>Cadastrado em</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="lista_desenvolvedores">
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>

<div class="modal fade" id="modal-cadastrar" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Cadastrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
			</div>
			<form id="formCadastrar">
				<div class="modal-body card">
					<div class="alert alert-danger error" style="display: none;"></div>
					<div class="alert alert-success success" style="display: none;"></div>
					<div class="form-group">
						<label class="col-form-label">Nome</label>
						<input type="text" class="form-control" name="nome">
					</div>
					<div class="form-group">
						<label class="col-form-label">Sexo</label>
						<select class="form-control" name="sexo" required>
                            <option value="">-- escolha --</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
					</div>
					<div class="form-group">
						<label class="col-form-label">Hobby</label>
						<input type="text" class="form-control" name="hobby">
					</div>
					<div class="form-group">
						<label class="col-form-label">Idade</label>
						<input type="number" class="form-control" name="idade" min="0" max="100">
					</div>
					<div class="form-group">
						<label class="col-form-label">Data de nascimento</label>
						<input type="date" class="form-control" name="dataNascimento">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
					<button type="submit" class="btn btn-primary" id="btnCadastrar">Cadastrar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-editar" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
			</div>
			<form id="formEditar" data-id="0">
				<div class="modal-body card">
					<div class="alert alert-danger error" style="display: none;"></div>
					<div class="alert alert-success success" style="display: none;"></div>
					<div class="form-group">
						<label class="col-form-label">Nome</label>
						<input type="text" class="form-control" name="nome">
					</div>
					<div class="form-group">
						<label class="col-form-label">Sexo</label>
						<select class="form-control" name="sexo" required>
                            <option value="">-- escolha --</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
					</div>
					<div class="form-group">
						<label class="col-form-label">Hobby</label>
						<input type="text" class="form-control" name="hobby">
					</div>
					<div class="form-group">
						<label class="col-form-label">Idade</label>
						<input type="number" class="form-control" name="idade" min="0" max="100">
					</div>
					<div class="form-group">
						<label class="col-form-label">Data de nascimento</label>
						<input type="date" class="form-control" name="dataNascimento">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
					<button type="submit" class="btn btn-primary" id="btnEditar">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
    $(window).on('load', function() {

        function ajax(endpoint,method,params) {

            var PATH_API = "http://127.0.0.1:8000/api"+endpoint;
            
            var result = "";
            $.ajax({
                url: PATH_API,
                method: method,
                async: false,
                data: params,
                success: function(response) {
                    result = response;
                },
                error: function (result, textStatus) {
                    result = result.responseJSON;
                    
                    if (result.status == 400) {
                        alert(data.data.message);
                    } else if (result.status == 404) {
                        alert("Página não encontrada!");
                    }
                }
            });

            return result;
        }

        function listDeveloper(params) {
            if (params) {
                params = $("#formFiltrar").serialize();
                endpoint = "/developer?"+params;
            } else {
                endpoint = "/developer";
            }

            data = ajax(endpoint,"GET",{});
            $("#lista_desenvolvedores").html("").fadeOut();
            $(data.data.data).each(function(i,item) {
                $("#lista_desenvolvedores").fadeIn().append(
                    "<tr>" +
                        "<td>"+item.nome+"</td>" +
                        "<td>"+item.sexo+"</td>" +
                        "<td>"+item.hobby+"</td>" +
                        "<td>"+item.idade+"</td>" +
                        "<td>"+item.dataNascimento+"</td>" +
                        "<td>"+item.created_at+"</td>" +
                        "<td><button class='btn btn-info btn-xs modalEditar' data-toggle='modal' href='#modal-editar' data-id='"+item.id+"'><i class='fa fa-edit'></i> Editar</button> <button class='btn btn-danger btn-xs btnRemover' data-id='"+item.id+"'><i class='fa fa-trash'></i> Remover</button></td>" +
                    "</tr>"
                );
            });
        }

        //carrega desenvolvedores
        listDeveloper(false);


        //filtrar resultados
        $(document).on('click', '#btnFiltrar', function() {
            listDeveloper(true);
            return false;
        });

        //cadastrar
        $(document).on('click', '#btnCadastrar', function() {
            result = ajax("/developer","POST",$("#formCadastrar").serialize());

            if (result.error === true) {
                if (result.data.message) {
                    $(".error").show().html(result.data.message);
                } else {
                    $(".error").fadeOut();
                    $(".error").fadeIn().html("");
                    $.each(result.data, function(i, item) {
                    $(".error").append(item);
                    });
                }
                
                $(".success").hide();

                } else if (result.error === false) {
                $(".error").hide();
                $(".success").show().html("Cadastro realizado!");
                listDeveloper(true);

                setTimeout(function() {
                    $(".success").hide();
                    $(".error").hide();
                    $("#formCadastrar")[0].reset();
                    $('.modal').modal('hide');
                }, 2000);
                }
                
            
            return false;
        });

        //editar
        $(document).on('click', '#btnEditar', function() {
            id = $("#formEditar").data("id");
            result = ajax("/developer/"+id,"PUT",$("#formEditar").serialize());

            if (result.error === true) {
                if (result.data.message) {
                    $(".error").show().html(result.data.message);
                } else {
                    $(".error").fadeOut();
                    $(".error").fadeIn().html("");
                    $.each(result.data, function(i, item) {
                    $(".error").append(item);
                    });
                }
                
                $(".success").hide();

                } else if (result.error === false) {
                $(".error").hide();
                $(".success").show().html("Alteração realizada!");
                listDeveloper(true);

                setTimeout(function() {
                    $(".success").hide();
                    $(".error").hide();
                    $("#formCadastrar")[0].reset();
                    $('.modal').modal('hide');
                }, 2000);
                }
                
            
            return false;
        });

        //abrir detalhes
        $(document).on('click', '.modalEditar', function() {
            id = $(this).data("id");

            resp = ajax("/developer/"+id,"GET",{});

            $.each(resp.data, function(i, item) {
                if (i == "id") {
                    $("#formEditar").data("id",item);
                }
                $("#modal-editar [name='"+i+"']").val(item);
            });
        });

    });
</script>
