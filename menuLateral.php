<?php
   error_reporting(0); //Desabilita mensagens de alerta
   session_start();
   $nomeUsuario = $_SESSION["nomeUsuario"];

    // Verifica se o modo já foi definido
    if (isset($_POST['toggleMode'])) {
        if ($_POST['toggleMode'] == 'dark') {
            $_SESSION['mode'] = 'dark-mode';
        } else {
            $_SESSION['mode'] = 'light-mode';
        }
    }

    // Define o modo baseado na sessão
    $mode = isset($_SESSION['mode']) ? $_SESSION['mode'] : 'light-mode';
?>

<!-- Menu Lateral -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
            <div class="w3-container w3-row">
                <div class="w3-col s4">
                    <img src="img/masculino.png" class="w3-circle w3-margin-right" style="width:46px">
                </div>
                <div class="w3-col s8 w3-bar">
                    <span>Bem vindo, <strong><?php echo $nomeUsuario; ?></strong></span><br>
                    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
                </div>
            </div>
            <hr>
            <div class="w3-container">
                <h5>Dashboard</h5>
            </div>
            <div class="w3-bar-block">
                <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>Close Menu</a>
                <a href="formCampeonato.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>Cadastrar Campeonato</a>
                <a href="listarCamp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Listar Campeonatos</a>
                <a href="formTime.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Cadastrar Time</a>
                <a href="listarTimes.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Listar Times</a>
                <a href="formJogo.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Cadastrar Jogo</a>
                <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Listar Jogos</a>
                

            </div>
        </nav>



        <!-- Efeito de overlay quando aberto em dispositivos com telas pequenas -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- Conteúdo da Página -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

       