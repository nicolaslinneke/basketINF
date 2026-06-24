<!DOCTYPE html>
<html>
    <head>
        <title>Basket IF</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        </style>

        <!-- CDN da última versão compilada e minimizada do CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Adicionar esta versão de compilado css do w3schools -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- CDNs para importar JQUERY e Máscaras -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <script>
            $(document).ready(function(){
                $("#cpfDocente").mask("000.000.000-00");
                $("#telefoneDocente").mask("(00) 00000-0000");
            });
        </script>
        
    </head>
    <body class="w3-light-grey">

        <!-- Container do TOPO -->
        
        <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
             <img class="header-img" width='35' src="img/ifpr_logo.png">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>Menu</button>
            <span class="w3-bar-item w3-right">
                <a href="formLogin.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Entrar</a>
            </span>
            <span class="w3-bar-item w3-right">
                <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i> Inicio</a>
            </span>
        </div>
        <br><br><br><br>
        <div class="w3-bar-block">
                <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>Close Menu</a>
               
                
               
            </div>
        <br><br><br>