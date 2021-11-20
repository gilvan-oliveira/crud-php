<?php
require_once "../../app/Model/FuncionarioDao.php";
use app\Model\FuncionarioDao;

$id_funcionario = strip_tags(filter_input(INPUT_POST,'codigo'));

$funcionarioDao = new FuncionarioDao();

if($funcionarioDao->delete($id_funcionario)){
  echo "
  <div class='alert alert-success  alert-dismissible fade show' role='alert'>
    Funcionário excluído com sucesso!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
";
}else{
  echo "
  <div class='alert alert-danger  alert-dismissible fade show' role='alert'>
    Não foi possível excluir o funcionário!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
";	
}

?>