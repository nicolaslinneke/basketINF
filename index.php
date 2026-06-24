<?php include("header.php"); ?>

<?php include("menuLateral.php"); ?>



            <!-- Header -->
             <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-dashboard"></i>MENU</b></h5>
            </header>

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-quarter">
                <a href="listarCamp.php" 
                    onclick="this.classList.add('active'); setTimeout(() => this.classList.remove('active'), 300);" 
                    style="display: block; text-decoration: none; color: inherit;">   
                    <div class="w3-container w3-red w3-padding-16">
                        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
                            <div class="w3-right">
                                <h3>+</h3>
                            </div>
                        <div class="w3-clear"></div>
                        <h4>CAMPEONATO</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-blue w3-padding-16">
                        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3>+</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>EQUIPES</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-orange w3-text-white w3-padding-16">
                        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3>+</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>JOGOS</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <a href="calendario.php" 
                    onclick="this.classList.add('active'); setTimeout(() => this.classList.remove('active'), 300);" 
                    style="display: block; text-decoration: none; color: inherit;">
                        <div class="w3-container w3-teal w3-padding-16">
                            <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
                            <div class="w3-right">
                                <h3>+</h3>
                            </div>
                            <div class="w3-clear"></div>
                            <h4>CALENDÁRIO</h4>
                        </div>
                    </a>
                </div>
                <style>
                    .active {
                        transform: scale(1.05); 
                        transition: transform 0.2s ease; 
                    }
                </style>
            <br><br><br>



                <div class="w3-twothird">
    <br><br>
    <?php
      include("conexaoBD.php");    


    $buscarCampeonato = "SELECT * FROM campeonato";            

    $efetuarConsulta = mysqli_query($link, $buscarCampeonato);

    while($registro = mysqli_fetch_assoc($efetuarConsulta)){
      $quantidadeLogin = mysqli_num_rows($efetuarConsulta);

      $nomeCamp = $registro["nomeCamp"];
      $anoCamp = $registro["anoCamp"];
      $fotoCamp = $registro["fotoCamp"];
      $dtInicio = $registro["dtInicio"];
      $dtFim = $registro["dtFim"];

      echo "<div class='container mt-3'>
      <table class='table'>
          <div class='container mt-3 text-center'>
              <img src='$fotoCamp' title='Foto de $nomeCamp' width='150'>
          </div>
          <tr>
              <th>ANO DO CAMPEONATO:</th>
              <td>$anoCamp</td>
          </tr>
          <tr>
              <th>NOME DO CAMPEONATO:</th>
              <td>$nomeCamp</td>
          </tr>
          <tr>
              <th>DATA DE INICIO:</th>
              <td>$dtInicio</td>
          </tr>
          <tr>
              <th>DATA DE FIM:</th>
              <td>$dtFim</td>
          </tr>
      </table>
  </div>";

    }
  ?>

    <!-- End page content -->
    </div>

    <!-- W3.CSS Container -->
    <div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right"> <a href="#" title="W3.CSS" target="_blank" class="w3-hover-opacity"></a></p></div>

    <script>
    // Script to open and close sidebar
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }
    
    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }

    // Modal Image Gallery
    function onClick(element) {
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
      var captionText = document.getElementById("caption");
      captionText.innerHTML = element.alt;
    }
    </script>
      <!--<div class="w3-container w3-card w3-white w3-margin-bottom">
       <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Eventos</h2>
       <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h5 class="w3-opacity"><b>CAMPEONATO</b></h5>
          <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla
             tempora soluta ea et odio, unde doloremque repellendus iure, iste.
          </p>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>
          <hr>
        </div><br>
      </div>


<?php include("footer.php"); ?>