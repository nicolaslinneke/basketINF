<?php
    include("header.php");
    $diaJogo = date("Y");
?>

    <!-- Formulário para Cadastro de Campeonatos -->
    <div class="w3-center w3-padding-64" id="contact">
        <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Cadastro de Jogo</span>
    </div>

    <form class="w3-container" action="cadastrarJogo.php" method = "POST">

        <div class="w3-section">
            <label>Data do Jogo:</label>
            <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="date" name="DataJogo">
        </div>

        <div class="w3-section">
            <label>Hora do Jogo:</label>
            <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="time" name="HoraJogo">
        </div>
        <label>Selecione os times que participarão deste jogo:</label>

        <div class="w3-section">
            
            <div class="w3-row">
                <div class="w3-col m4 l3">
                    <label>Time A</label>
                    <select class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="idtimeA">
                        <option value="TIINT">Técnico em Informática para Internet</option>
                        
                    </select>
                </div>

                <div class="w3-col m4 l3">
                        <p align="center">x</p>
                </div>
                <div class="w3-col m4 l3">
                    <label>Time B</label>
                    <select class="w3-input w3-border w3-hover-border-black" style="width:100%;" name="idtimeB">
                    <option value="TIINT">Técnico em Informática para Internet</option>
                        
                    </select>
                </div>
            </div>
            <br>
            <!-- <label>Pontuação do Jogo:</label><br><br>
            
            <div class="w3-row">
                <div class="w3-col m4 l3">
                    <label>Time A</label>
                    <input class="w3-input w3-border w3-hover-border-black" type="text;" style="width:100%;" name="pontuacaotimeA">
                 
                </div>

                <div class="w3-col m4 l3">
                        <p align="center">x</p>
                </div>
                <div class="w3-col m4 l3">
                    <label>Time B</label>
                    <input class="w3-input w3-border w3-hover-border-black" type= "text;" style="width:100%;" name="pontuacaotimeB">
                    
                </div>
            </div> -->
        <br><br>
        <button type="submit" class="w3-button w3-block w3-black">Cadastrar</button>
    </form><br><br>

<?php include("footer.php");?>