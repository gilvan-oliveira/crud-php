<?php
namespace app\Classe;

class Funcionario{
	private $id;
	private $nome;
	private $matricula;
	private $nascimento;
	private $email;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setMatricula($matricula){
		$this->matricula = $matricula;
	}

	public function getMatricula(){
		return $this->matricula;
	}

	public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}

	public function getNascimento(){
		return $this->nascimento;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}
}