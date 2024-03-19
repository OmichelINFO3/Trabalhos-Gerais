

<?php
	session_start();
	include_once "cliente.class.php";
include_once "cliente.DAO.class.php";
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	
	$objUsuarios = new cliente();
	$objUsuarios->setEmail($email);
	$objUsuarios->setSenha($senha);
	
	$objUsuariosDAO = new clienteDAO();
	$retorno = $objUsuariosDAO->login($objUsuarios);
	
	if($retorno==0){
		header("location:already-logged.php?email");
	}
	else if($retorno==1){
		header("location:already-logged.php?senha");
	}
	else{
        $con = mysqli_connect("localhost","root","","bancoSD");
        $query = mysqli_query($con,"select email from cliente where id_cliente =".$retorno['id_cliente']);
        $resultado = mysqli_fetch_assoc($query);
		$_SESSION["idcli"] = $retorno['id_cliente'];
        $_session['emailcli'] = $resultado['email'];
		$_SESSION["nomecli"] = $retorno['nome_cliente'];
		header("location:logged.php");
		
	}
?>