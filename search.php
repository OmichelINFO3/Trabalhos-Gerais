<?php
session_start();
$pesquisa = $_GET['pesquisa'];

$MYSQL_CONNECT = mysqli_connect("localhost","root","","bancoSD");

$SEARCH_QUERY = mysqli_query($MYSQL_CONNECT,"SELECT * FROM produto inner join imagem on produto.id_imagem_id = imagem.id_imagem WHERE produto.nome_produto  LIKE '".$pesquisa."%'");
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
        <div id="user-group">
            <img src="user-picture.png" width="40" height="40">
            <p id="user-text"><?php echo @$_SESSION['nomecli'];?></p>
        </div>
        <a class="menu-text" id="home-button">Home</a>
         <p class="menu-text">Categorias</p>
         <p class="menu-text">Sobre</p>
		 <p class="menu-text" id="b-conta">Conta</p>
        <form id="search-form" method="GET" action="search.php">
            <button id="search-button"><img src="Interactive-search.png"></button>
            <input type="text" id="search" name="pesquisa">
        </form>
    </div>
    <div id="div-geral-home">
        <div id="aside-div">
            <aside id="aside-tab">
                <img src="aside-text.png" id="AI">
                <p class="aside-text">Bem-vindos à "Boutique Elegance", o seu destino definitivo<br><br> para uma experiência de compras que redefine a moda <br><br>e o estilo. Localizada no coração da cidade, <br><br>a Boutique Elegance é mais do que uma simples loja <br><br>de roupas e acessórios; é uma porta de entrada <br><br>para um mundo onde a elegância e o bom gosto se encontram <br><br>para criar uma experiência de compra inesquecível.</p><br>
                <h2 class="aside-text" style="color:rgba(0, 107, 0, 0.74);">Aproveite!</h2>
                <button id="aside-button">Fechar</button>
            </aside>
        </div>
        <div id="div-content">
            <div id="div-content-inside" style="display:flex; gap: 20px;">
                <?php
                    while($row = mysqli_fetch_array($SEARCH_QUERY)) {
                        echo"<div id='search-result-div'>";
                        echo "<img id='foto-search'src='fotos/". $row['url']."'>";
                        echo "<p class='text-search-valor'>".$row['valor']."</p>";
                        echo "<p class='text-search-name'>".$row['nome_produto']."</p>";
                        echo"</div>";
                    }   
                ?>
            </div>
        </div>
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

    $("#aside-button").click(function(){
        $("#aside-tab").slideUp();
    });

    
    $("#home-button").click(function(){
        window.location.href = "logged.php";
    });

    $("#b-conta").click(function(){
        window.location.href = "account.php";
    });

});
</script>
</html>