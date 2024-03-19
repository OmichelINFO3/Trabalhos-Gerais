<?php 
include_once "cliente.class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Boutique Elegance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="logo.png"><br>
        <button id="b-menu"><img id="IB" src="Interactive-box.png"></button><br>
    </header>
    <div id="menu">
        <button id="button-login">Cadastro</button>
        <p class="menu-text" id="home-button">Home</p>
        <p class="menu-text">Categorias</p>
        <p class="menu-text">Sobre</p>
		 <p class="menu-text">Conta</p>
        <form id="search-form" method="GET" action="search.php">
            <button id="search-button"><img src="Interactive-search.png"></button>
            <input type="text" id="search" name="pesquisa">
        </form>
    </div>
    <div id="div-geral">
            <div id="aside-div">
                <aside id="aside-tab">
                <img src="aside-text.png" id="AI">
                <p class="aside-text">Bem-vindos à "Boutique Elegance", o seu destino definitivo<br><br> para uma experiência de compras que redefine a moda <br><br>e o estilo. Localizada no coração da cidade, <br><br>a Boutique Elegance é mais do que uma simples loja <br><br>de roupas e acessórios; é uma porta de entrada <br><br>para um mundo onde a elegância e o bom gosto se encontram <br><br>para criar uma experiência de compra inesquecível.</p><br>
                <h2 class="aside-text" style="color:rgba(0, 107, 0, 0.74);">Aproveite!</h2>
                <button id="aside-button">Fechar</button>
        </aside>
            </div>
            <form id="login-form" method="POST" action="login.php">
            <div class="input-group">
                <label for="email-input" class="login-text">Email:</label>
                <input type="text" id="email-input" name="email" class="login-input">
            </div>
            <div class="input-group">
                <label for="senha-input" class="login-text">Senha:</label>
                <input type="password" id="senha-input" name="senha" class="login-input">
            </div>
            <div class="input-group">
                <label for="nome-input" class="login-text">Nome:</label>
                <input type="text" id="nome-input" name="nome" class="login-input"><br><br>
            </div>
            <input type="submit" id="login-submit-button" value="Cadastrar" name='input'>
            <a href="already-logged.php" class="menu-text" style="font-family: Arial, Helvetica, sans-serif; color: green;">Ja Possuo Cadastro</a>
            <?php
            if(isset($_POST['input'])){

                session_start();

                @$email = $_POST['email'];
                @$senha = $_POST['senha'];
                @$nome = $_POST['nome'];
                @$MYSQL_CONNECT = new mysqli("localhost", "root", "", "bancoSD");
                $tp = ["And", "or", "If","else"];

                foreach ($tp as $palavra) {
                if (stripos($email, $palavra) !== false) {
                echo "<p style='font-family: Arial, Helvetica, sans-serif; color: Red;'>Atenção! A sua senha ou email não pode possuir termos como $palavra.</p>";
            } else if (stripos($senha, $palavra) !== false) {
                echo "<p style='font-family: Arial, Helvetica, sans-serif; color: Red;'>Atenção! A sua senha ou email não pode possuir termos como $palavra.</p>";
            }
                }
                if(preg_match('/[^a-zA-Z0-9]/', $senha)){
                    echo "<p style='font-family: Arial, Helvetica, sans-serif; color: Red;'>Atenção! A sua senha não pode possuir caracteres especiais.</p>";
                }else{
                    mysqli_query($MYSQL_CONNECT,"INSERT INTO Cliente(email,senha,nome_cliente) VALUES('$email','$senha','$nome')");
                    $ultima_id = mysqli_insert_id($MYSQL_CONNECT);
                    $SELECT_ALL = mysqli_query($MYSQL_CONNECT,"SELECT * FROM cliente WHERE id_cliente = $ultima_id");
                    $ROWS = mysqli_fetch_assoc($SELECT_ALL);
                    $_SESSION["nomecli"] = $ROWS["nome_cliente"];
                    $_SESSION["emailcli"] = $ROWS["email"];
                    $_SESSION["idcli"] = $ROWS["id_cliente"];
                    header("Location: logged.php");
                }     
            }
            ?>
        </form>
</div>
</body>
<script>
    $( document ).ready(function() {
        document.body.style.zoom = "80%";
    $("#b-menu").click(function(){
        $("#menu").slideToggle();
    });

    $("#b-menu").hover(function(){
        $("#IB").attr("src","interactive-box-alt.png");
    }, function(){
        $("#IB").attr("src","interactive-box.png");
    });
    
    $("#button-login").click(function(){
        window.location.href = "login.php";
    });

    $("#aside-button").click(function(){
        $("#aside-tab").slideUp();
    });

    $("#home-button").click(function(){
        window.location.href = "index.html";
    });
});
</script>
</html>
