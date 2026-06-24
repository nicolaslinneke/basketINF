<?php
    include("header.php");
    $anoCampeonato = date("Y");
?>

    <!-- Formulário para Cadastro de Campeonatos -->
    <div class="w3-center w3-padding-64" id="contact">
        <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Cadastrar Campeonato</span>
    </div>

    <form action="cadastrarCamp.php" method="POST" enctype="multipart/form-data">
        <input class="w3-input w3-section w3-border" type="file" placeholder="fotoCampeonato" required name="fotoCampeonato">

        <div class="w3-section">
            <label>Ano do Campeonato:</label>
            <input name="anoCamp" class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" placeholder="<?php echo $anoCampeonato; ?>">
        </div>

        <div class="w3-section">
            <label>Nome do Campeonato:</label>
            <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="nomeCamp">
        </div>

        <label>Selecione os times que participarão deste campeonato:</label><br>

 

            <div class="w3-section">
                <label>Data de Início do Torneio:</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="date" name="dtInicio">
            </div>

            <div class="w3-section">
                <label>Data de Fim do Torneio:</label>
                <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="date" name="dtFim">
            </div>

        </div>
        
        <button type="submit" class="w3-button w3-block w3-black">Cadastrar</button>
    </form>

<?php include("footer.php");?>