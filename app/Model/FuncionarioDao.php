<?php
namespace app\Model;
require_once "../../app/Core/Conexao.php";
use app\Core\Conexao;

class FuncionarioDao{
	public function create($funcionario){
		$sql = "insert into tbfuncionario (nm_nome,nr_matricula,dt_nascimento,ds_email) values(?,?,?,?)";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1,$funcionario->getNome());
		$stmt->bindValue(2,$funcionario->getMatricula());
		$stmt->bindValue(3,$funcionario->getNascimento());
		$stmt->bindValue(4,$funcionario->getEmail());
		$result = $stmt->execute();

		return $result;
	}

	public function read($nome,$id_funcionario){
		if(empty($nome) and empty($id_funcionario)){
			$sql = "select * from tbfuncionario";
		}elseif(!empty($id_funcionario)){
			$sql = "select * from tbfuncionario where id_funcionario = '$id_funcionario' ";
		}else{
			$sql = "select * from tbfuncionario where nm_nome like '%$nome%'";
		}

		$stmt = Conexao::getConn()->query($sql);

		return $stmt;		
	}

	public function delete($id_funcionario){
		$sql = "delete from tbfuncionario where id_funcionario = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1,$id_funcionario);
		$result = $stmt->execute();

		return $result;
	}

	public function update($funcionario){
		$sql = "update tbfuncionario set nm_nome = ? , nr_matricula = ? , dt_nascimento = ? , ds_email = ? where id_funcionario = ?";
		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1,$funcionario->getNome());
		$stmt->bindValue(2,$funcionario->getMatricula());
		$stmt->bindValue(3,$funcionario->getNascimento());
		$stmt->bindValue(4,$funcionario->getEmail());
		$stmt->bindValue(5,$funcionario->getId());
		$result = $stmt->execute();

		return $result;
	}
}