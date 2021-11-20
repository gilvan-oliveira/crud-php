<?php
require_once "../../app/Model/FuncionarioDao.php";
use app\Model\FuncionarioDao;

$funcionarioDao = new FuncionarioDao();

$nome = strip_tags(filter_input(INPUT_POST,'nome'));

$funcionarios = $funcionarioDao->read($nome,'');

if($funcionarios->rowCount() > 0){
	foreach($funcionarios->fetchAll() as $funcionario){
		echo "<tr>";
			$id_funcionario = $funcionario['id_funcionario'];
			echo "<td>".$funcionario['nm_nome']."</td>";
			echo "<td>".$funcionario['nr_matricula']."</td>";
			echo "<td>".date('d/m/Y',strtotime($funcionario['dt_nascimento']))."</td>";
			echo "<td>".$funcionario['ds_email']."</td>";
			echo "<td><input type='button' class='btn btn-info' onclick=\"exibirModal('$id_funcionario');\" data-toggle='modal' data-target='#modalEditarCadastrar' value='Editar'></td>";
			echo "<td><input type='button' class='btn btn-danger' onclick=\"excluirFuncionario('$id_funcionario');\" value='Excluir'></td>";
		echo "</tr>";
	}
}else{
	echo "<tr><td colspan='6'><center>Não há resultados para essa consulta!</center></td></tr>";
}

?>