<?php include("header.php");?>
<!-- Formulário para Cadastro de Usuários -->
<div class="w3-container w3-padding-32" id="cadastrarTime">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Cadastro de Time:</h3>
    
        <div class="w3-container" id="cadastrarTime">
            <form action="cadastrarTime.php" method="POST" enctype="multipart/form-data">
                <input class="w3-input w3-section w3-border" type="file" placeholder="fotoTime" required name="fotoTime">
                <input class="w3-input w3-section w3-border" type="text" placeholder="Nome do Time" required name="nomeTime">


                <select class="w3-select" name="curso">
                    <option value="" disabled selected>Selecione o seu Curso</option>
                    <option value="TIINT">Técnico em Informática para Internet</option>
                    <option value="TPJD">Técnico em Programação de Jogos Digitais</option>
                    <option value="TMEC">Técnico em Mecânica</option>
                    <option value="TAUT">Técnico em Automação Industrial</option>
                </select>

                

                <button class="w3-button w3-black w3-section" type="submit">
                    <i class="fa fa-paper-plane"></i> CADASTRAR TIME
                </button>
            </form>
        </div>
    </div>

  <?php include("footer.php"); ?>