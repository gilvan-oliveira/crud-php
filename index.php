<!doctype html>
<html lang="pt_br">
  <head>

<!-- Insere o cabeçalho --> 
<?php include("app/Views/head.php"); ?>      
  
<script>

      function listarFuncionario(){

        var nome = document.getElementById("id-search").value;

        //O método $.ajax(); é o responsável pela requisição
        $.ajax
            ({
                //Configurações
                type: 'POST',//Método que está sendo utilizado.
                dataType: 'html',//É o tipo de dado que a página vai retornar.
                url: 'app/Controller/ControllerListarFuncionario.php',//Indica a página que está sendo solicitada.
                //função que vai ser executada assim que a requisição for enviada
                beforeSend: function () {
                    $("#table-body").html("<tr><td colspan='6'><center><img src='assets/img/load.gif' height='40px' width='40px' id='load'></center></td></tr>");
                },
                data: {nome: nome},//Dados para consulta
                //função que será executada quando a solicitação for finalizada.
                success: function (msg)
                {
                   $("#table-body").html(msg);
                }
            });                      

    }

    function exibirModal(codigo){

        //O método $.ajax(); é o responsável pela requisição
        $.ajax
            ({
                //Configurações
                type: 'POST',//Método que está sendo utilizado.
                dataType: 'html',//É o tipo de dado que a página vai retornar.
                url: 'app/Controller/ControllerModalFuncionario.php',//Indica a página que está sendo solicitada.
                //função que vai ser executada assim que a requisição for enviada
                beforeSend: function () {
                    $("#modal-body").html("<center><img src='assets/img/load.gif' height='100px' width='100px'></center>");
                },
                data: {codigo: codigo},//Dados para consulta
                //função que será executada quando a solicitação for finalizada.
                success: function (msg)
                {
                   $("#modal-body").html(msg);
                }
            });                      

    }

       function cadastrarFuncionario(codigo){

        var nome = document.getElementById("id-nome").value;
        var matricula = document.getElementById("id-matricula").value;
        var dtnascimento = document.getElementById("id-dtnascimento").value;
        var email = document.getElementById("id-email").value;

        //O método $.ajax(); é o responsável pela requisição
        $.ajax
            ({
                //Configurações
                type: 'POST',//Método que está sendo utilizado.
                dataType: 'html',//É o tipo de dado que a página vai retornar.
                url: 'app/Controller/ControllerCadastroFuncionario.php',//Indica a página que está sendo solicitada.
                //função que vai ser executada assim que a requisição for enviada
                beforeSend: function () {
                    $("#menssagem").html("<center><img src='assets/img/load.gif' height='50px' width='50px'></center>");
                },
                data: {codigo: codigo,nome: nome, matricula: matricula, dtnascimento: dtnascimento, email: email},//Dados para consulta
                //função que será executada quando a solicitação for finalizada.
                success: function (msg)
                {
                   $("#menssagem").html(msg);
                   listarFuncionario();
                }
            });                      

    }  

        function excluirFuncionario(codigo){
        
        //O método $.ajax(); é o responsável pela requisição
        $.ajax
            ({
                //Configurações
                type: 'POST',//Método que está sendo utilizado.
                dataType: 'html',//É o tipo de dado que a página vai retornar.
                url: 'app/Controller/ControllerExcluirFuncionario.php',//Indica a página que está sendo solicitada.
                //função que vai ser executada assim que a requisição for enviada
                beforeSend: function () {
                    $("#mensagem2").html("<center><img src='assets/img/load.gif' height='50px' width='50px'></center>");
                },
                data: {codigo: codigo},//Dados para consulta
                //função que será executada quando a solicitação for finalizada.
                success: function (msg)
                {
                   $("#mensagem2").html(msg);
                   listarFuncionario();
                }
            });                      

    } 

</script>      

</head>
<body onload="listarFuncionario();">

<!-- Insere a navbar -->    
<?php include("app/Views/navbar.php"); ?>       
      
<main role="main" class="container-fluid">  
    
    
<!--Botão Abrir Modal-->  
  <div class="form-group row">
      <div class="col-sm-2">
          <button type='button' class='btn btn-info' onclick="exibirModal('0');" data-toggle='modal' data-target='#modalEditarCadastrar'>Cadastrar Funcionário</button>
    </div>
  </div>
   
 <!--Mensagem de retorno da função excluirFuncionario-->  
 <div id="mensagem2">
   
 </div>  

    
 <!--Tabela de Funcionários-->    
<table class="table table-bordered table-sm table-striped table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Matrícula</th>
      <th scope="col">Data Nascimento</th>    
      <th scope="col">Email</th>    
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>     
    </tr>
  </thead>
  <tbody id="table-body">
      
      <!--Aqui serão inseridos os dados de retorno da função listarFuncionario-->                     
      
  </tbody>
</table>    

<!-- Modal Cadastro/Edição-->
<div class="modal fade" id="modalEditarCadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Cadastrar/Editar Funcionário</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
          <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        <div id="menssagem">
            <!--Aqui serão inseridos os dados de retorno da função cadastrarFuncionario--> 
        </div>
        <div class='modal-body' id='modal-body'>
            <!--Aqui serão inseridos os dados de retorno da função exibirModal--> 
        </div>

    </div>
  </div>
</div> 
    
     
    
</main><!-- /.container --> 
              
<!-- Insere o rodabé -->         
<?php include("app/Views/footer.php"); ?>  
      
</body>      
</html>
