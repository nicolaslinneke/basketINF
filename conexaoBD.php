<?php

    $servidorBD = "localhost";
    $usuarioBD = "root";
    $senhaBD = "";
    $baseDados = "basket_ifpr";

    //função mysqli_connect serve para estabelecer a conexão com a base de dados
    $link = mysqli_connect($servidorBD, $usuarioBD, $senhaBD, $baseDados);

    if(!$link){
        echo "<p>Erro ao tentar conectar à Base de Dados $baseDados.</p>" .mysqli_error($link);
    }

?>