

<?php
	include_once "cliente.class.php";
	class clienteDAO{
		public function __construct(){
			$this->conexao = 
			new PDO("mysql:host=localhost; dbname=bancoSD","root", "");
		}
		public function login(cliente $cliente){
			$sql = $this->conexao->prepare("
				SELECT * FROM cliente WHERE email = :email
			");
			$sql->bindValue(":email", $cliente->getEmail());
			$sql->execute();
			if($sql->rowCount()>0){
				while($retorno = $sql->fetch()){
					if($cliente->getSenha() == $retorno['senha']){
						return $retorno;//login e senha ok - logar
					}						
				}
				return 1;//senha incorreta
			}
			else{
				return 0;//email nao cadastrado
			}
		}
	}
?>