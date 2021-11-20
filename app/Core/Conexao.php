<?php 
namespace app\Core;

class Conexao{
	private static $instace;

	public static function getConn(){
		if(!isset(self::$instace)){
			self::$instace = new \PDO('mysql:host=localhost;dbname=empresa','root','');
		}
		return self::$instace;
	}
}