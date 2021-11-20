<?php
require_once '../../app/Classe/Funcionario.php';
use app\Classe\Funcionario;
require_once '../../app/Model/FuncionarioDao.php';
use app\Model\FuncionarioDao;

$funcionario = new Funcionario();
$funcionarioDao = new FuncionarioDao();

$funcionario->setId(strip_tags(filter_input(INPUT_POST,'codigo')));
$funcionario->setNome(strip_tags(filter_input(INPUT_POST,'nome')));
$funcionario->setMatricula(strip_tags(filter_input(INPUT_POST,'matricula')));
$funcionario->setNascimento(strip_tags(filter_input(INPUT_POST,'dtnascimento')));
$funcionario->setEmail(strip_tags(filter_input(INPUT_POST,'email')));

$clase = "";
$mensagem = "";

if($funcionario->getId() == 0){
  if($funcionarioDao->create($funcionario)){
      $clase = "alert-success";
      $mensagem = "Operação realizada com sucesso!";
  }else{
      $clase = "alert-danger";
      $mensagem = "Não foi possível realizar a ação!";  
  }
}else{
  if($funcionarioDao->update($funcionario)){
      $clase = "alert-success";
      $mensagem = "Operação realizada com sucesso!";
  }else{
      $clase = "alert-danger";
      $mensagem = "Não foi possível realizar a ação!";  
  }
}

  echo "
  <div class='alert $clase  alert-dismissible fade show' role='alert'>
    $mensagem
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
";