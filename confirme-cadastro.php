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
            <form method="POST" id="login-form" action="confirme-cadastro.php" style="gap: 10px; width:auto; height: auto;">
            <div class="input-group">
                <input type="number" class="login-input" name="n1" style="width: 50px;">
                <input type="number" class="login-input" name="n2" style="width: 50px;">
                <input type="number" class="login-input" name="n3" style="width: 50px;">
            </div>
                <input type="submit" id="login-submit-button" value="Cadastrar" name='input'>
                <a href="already-logged.php" class="menu-text" style="font-family: Arial, Helvetica, sans-serif; color: green;">Ja Possuo Cadastro</a>
            <?php
            if(isset($_POST['input'])){

                session_start();

                $n1 = $_POST['n1'];
                $n2 = $_POST['n2'];
                $n3 = $_POST['n3'];

                if($n1==$_SESSION['numero_senha1'] and $n2 == $_SESSION['numero_senha2'] and $n3 == $_SESSION['numero_senha3']){
                    mysqli_query($MYSQL_CONNECT,"INSERT INTO Cliente(email,senha,nome_cliente) VALUES('$email','$senha','$nome')");
                    $_SESSION["nomecli"] =  $_SESSION["nome-pre-confirmacao"];
                    $_SESSION["emailcli"] = $_SESSION["email-pre-confirmacao"];
                    header("Location: logged.php");
                }else{
                    echo "<p style='font-family: helvetica; color:red;'>Os numeros inseridos não condizem com os numeros chave</p>";
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
