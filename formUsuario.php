<?php include("header.php"); ?>
    <!-- Formulário para Cadastro de Usuários -->
    <div class="w3-container w3-padding-32" id="formLogin">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Cadastro de Usuário:</h3>
    
        <div class="w3-container" id="formLogin">
            <form action="cadastrarUsuario.php" method="POST" enctype="multipart/form-data">
                <input class="w3-input w3-section w3-border" type="file" placeholder="fotoUsuario" required name="fotoUsuario">
                <input class="w3-input w3-section w3-border" type="text" placeholder="Nome" required name="nomeUsuario">
                <input class="w3-input w3-section w3-border" type="text" placeholder="Matrícula" required name="matriculaUsuario" maxlength="11">

                <select class="w3-select" name="cursoUsuario">
                    <option value="" disabled selected>Selecione o seu Curso</option>
                    <option value="TIINT">Técnico em Informática para Internet</option>
                    <option value="TPJD">Técnico em Programação de Jogos Digitais</option>
                    <option value="TMEC">Técnico em Mecânica</option>
                    <option value="TAUT">Técnico em Automação Industrial</option>
                </select>

                <input class="w3-input w3-section w3-border" type="date" placeholder="Data de Nascimento" required name="dtNascUsuario">
                <input class="w3-input w3-section w3-border" type="email" placeholder="Email" required name="emailUsuario">
                <input class="w3-input w3-section w3-border" type="password" placeholder="Senha" required name="senhaUsuario">
                <input class="w3-input w3-section w3-border" type="password" placeholder="Confirme a Senha" required name="confirmarSenhaUsuario">


                <button class="w3-button w3-black w3-section" type="submit">
                    <i class="fa fa-paper-plane"></i> CADASTRAR
                </button>
                <p style="position: relative;">
                    <a href="formUsuario.php" style="position: absolute; right: 0;">Cadastrar Administrador</a>
                </p>
            </form>
        </div>
    </div>

  <?php include("footer.php"); ?>