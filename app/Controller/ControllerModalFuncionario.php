<?php
require_once "../../app/Model/FuncionarioDao.php";
use app\Model\FuncionarioDao;

$id_funcionario = $_POST['codigo'];

if($id_funcionario == 0){
	$nm_nome = "";
	$nr_matricula = "";
	$dt_nascimento = "";
	$ds_email = "";
}else{
	$funcionarioDao = new FuncionarioDao();
	$funcionarios = $funcionarioDao->read('',$id_funcionario)->fetch();
	$nm_nome = $funcionarios['nm_nome'];
	$nr_matricula = $funcionarios['nr_matricula'];
	$dt_nascimento = $funcionarios['dt_nascimento'];
	$ds_email = $funcionarios['ds_email'];
}

echo "
<form method='post'>
 <input type='hidden' name='id_funcionario' value='$id_funcionario' id='id-funcionario'> 

<div class='form-group'>
	<label for='exampleFormControlInput1'>Nome:</label>
	<input type='text' value='$nm_nome' name='nm_nome' class='form-control' id='id-nome' >
</div>

<div class='form-group'>
	<label for='exampleFormControlInput2'>Matrícula:</label>
	<input type='number' value='$nr_matricula' name='nr_matricula' required class='form-control' id='id-matricula'>
</div>
    
<div class='form-group'>
    <label for='exampleFormControlInput3'>Data Nascimento:</label>
    <input type='date' value='$dt_nascimento' name='dt_nascimento' class='form-control' id='id-dtnascimento'>
  </div>    
  
<div class='form-group'>
    <label for='exampleFormControlInput5'>E-mail:</label>
    <input type='email' name='ds_email' value='$ds_email' class='form-control' id='id-email'>
</div>     
  
<div class='modal-footer'>
	<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
	<input type='button' class='btn btn-primary' onclick=\"cadastrarFuncionario('$id_funcionario');\" name='alterar' value='Salvar'>
</div>    
  
</form>
";

?>