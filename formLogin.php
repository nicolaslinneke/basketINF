<?php include("header.php"); ?>
    <!-- Formulário para Login -->
    <div class="w3-container w3-padding-32" id="formLogin">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Acessar o Sistema:</h3>
    
        <div class="w3-container" id="formLogin">
            <form action="login.php" method="POST">
                <input class="w3-input w3-border" type="email" placeholder="Email" required name="emailUsuario">
                <input class="w3-input w3-section w3-border" type="password" placeholder="Senha" required name="senhaUsuario">
                <button class="w3-button w3-black w3-section" type="submit">
                    <i class="fa fa-paper-plane"></i> ENTRAR
                </button>
            </form>
        </div>

        <p><a href="formUsuario.php">Ainda não é cadastrado? Clique aqui!</a></p>
    </div>

  <?php include("footer.php"); ?>