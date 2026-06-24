<?php include("header.php"); ?>

<?php

    //Bloco para declaração de variáveis para receber dados do form
    $fotoUsuario = $nomeUsuario = $matriculaUsuario = $cursoUsuario = $dtNascUsuario = $emailUsuario = $senhaUsuario = $confirmarSenhaUsuario = "";
    $tudoCerto =true; //Variável responsável por verificar se os campos foram devidamente preenchidos

    //Verifica se o método de envio do formulário é POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        //Verifica se o campo "nomeUsuario" do form está vazio
        if(empty($_POST["nomeUsuario"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>NOME</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $nomeUsuario = testar_entrada($_POST["nomeUsuario"]);
        }

        //Verifica se o campo "matriculaUsuario" do form está vazio
        if(empty($_POST["matriculaUsuario"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>MATRÍCULA</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $matriculaUsuario = testar_entrada($_POST["matriculaUsuario"]);
        }

        //Verifica se o campo "cursoUsuario" do form está vazio
        if(empty($_POST["cursoUsuario"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>CURSO</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $cursoUsuario = testar_entrada($_POST["cursoUsuario"]);
        }

        //Verifica se o campo "dtNascUsuario" do form está vazio
        if(empty($_POST["dtNascUsuario"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>DATA DE NASCIMENTO</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $dtNascUsuario = testar_entrada($_POST["dtNascUsuario"]);
            //Verifica se a data informada possui 10 caracteres
            if(strlen($dtNascUsuario) == 10){
                //Divide a string dtNascUsuario em 3 substrings (dia, mes e ano)
                $dia = substr($dtNascUsuario, 8, 2);
                $mes = substr($dtNascUsuario, 5, 2);
                $ano = substr($dtNascUsuario, 0, 4);

                //Utiliza a função checkdate para verificar a validade da data (USA)
                if(!checkdate($mes, $dia, $ano)){
                    echo "<div class='alert alert-warning text-center'>Atenção! <strong>DATA INVÁLIDA</strong>!</div>";
                    $tudoCerto = false;
                }
            }
            else{
                echo "<div class='alert alert-warning text-center'>Atenção! A <strong>DATA</strong> não possui 10 caracteres!</div>";
                $tudoCerto = false;
            }
        }

        //Verifica se o campo "emailUsuario" do form está vazio
        if(empty($_POST["emailUsuario"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>EMAIL</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $emailUsuario = testar_entrada($_POST["emailUsuario"]);
        }

        
        //Verifica se o campo "senhaUsuario" do form está vazio
        if(empty($_POST["senhaUsuario"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>SENHA</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $senhaUsuario = md5(testar_entrada($_POST["senhaUsuario"]));
        }

        //Verifica se o campo "confirmarSenhaUsuario" do form está vazio
        if(empty($_POST["confirmarSenhaUsuario"])){
            echo "<div class='alert alert-warning text-center'>Atenção! O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $confirmarSenhaUsuario = md5(testar_entrada($_POST["confirmarSenhaUsuario"]));
            if($senhaUsuario != $confirmarSenhaUsuario){
                echo "<div class='alert alert-warning text-center'>Atenção! As senhas informadas <strong>SÃO DIFERENTES</strong>!</div>";
                $tudoCerto = false;
            }
        }

        //Aqui inicia o bloco para validação da foto
        $diretorio    = "img/"; //Define o diretório para o qual as imagens serão movidas
        $fotoUsuario  = $diretorio . basename($_FILES["fotoUsuario"]["name"]); //Gera o endereço do arquivo (img/nomedoarquivo.extensao)
        $uploadOK     = true; //Variável para verificar sucesso no upload do arquivo
        $tipoDaImagem = strtolower(pathinfo($fotoUsuario, PATHINFO_EXTENSION)); //Pegar a extensão (tipo)

        //Verificar o tamanho do arquivo (neste caso, 5MB)
        if($_FILES["fotoUsuario"]["size"] > 5000000){ //Verifica o tamanho do arquivo em bytes
            echo "<div class='alert alert-warning text-center'>Atenção! O <strong>TAMANHO MÁXIMO</strong> permitido para foto é 5MB!</div>";
            $uploadOK = false;
        }

        //Verifica o tipo do arquivo
        if ($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png"){
            echo "<div class='alert alert-warning text-center'>Atenção! A imagem precisa estar nos formatos <strong>JPG, JPEG ou PNG</strong>!</div>";
            $uploadOK = false;
        }

        if(!$uploadOK){
            echo "<div class='alert alert-danger'>Atenção! Erro ao tentar fazer o <strong>UPLOAD DA FOTO</strong>!</div>";
            $uploadOK = false;
        }
        else{
            //A função seguinte é reponsável por mover o arquivo para o diretório (img/)
            if(!move_uploaded_file($_FILES["fotoUsuario"]["tmp_name"], $fotoUsuario)){
                echo "<div class='alert alert-danger text-center'>Atenção! Erro ao tentar mover <strong>a foto</strong> para o diretório $diretorio!</div>";
                $uploadOK = false;
            }
        }

        //Se os dados do formulário tiverem sidos preenchidos corretamente, exibe uma tabela com os dados informados
        if($tudoCerto && $uploadOK){

            //Cria uma QUERY responsável por realizar a inserção dos dados do Usuário no BD
            $inserirUsuario = "INSERT INTO Usuario (fotoUsuario, nomeUsuario, matriculaUsuario, cursoUsuario, dtNascUsuario, emailUsuario, senhaUsuario)
                                    VALUES ('$fotoUsuario', '$nomeUsuario',	'$matriculaUsuario', '$cursoUsuario', '$dtNascUsuario', '$emailUsuario','$senhaUsuario')";
            
            //Toda vez que precisarmos executar operações no BD, precisamos incluir o arquivo de conexão
            include("conexaoBD.php");
            
            //Função para executar QUERYs no BD
            if(mysqli_query($link, $inserirUsuario)){
                echo "<div class='alert alert-success text-center'><strong>Usuário</strong> cadastrado(a) com sucesso!</div>";
                echo "<div class='container mt-3'>
                    <div class='container mt-3 text-center'>
                        <img src='$fotoUsuario' title='Foto de $nomeUsuario' width='150'>
                    </div>
                    <table class='table'>
                        <tr>
                            <th>NOME:</th>
                            <td>$nomeUsuario</td>
                        </tr>
                        <tr>
                            <th>MATRÍCULA:</th>
                            <td>$matriculaUsuario</td>
                        </tr>
                        <tr>
                            <th>CURSO:</th>
                            <td>$cursoUsuario</td>
                        </tr>
                        <tr>
                            <th>DATA DE NASCIMENTO:</th>
                            <td>$dtNascUsuario</td>
                        </tr>
                        <tr>
                            <th>EMAIL:</th>
                            <td>$emailUsuario</td>
                        </tr>
                    </table>
                </div>";
            }
            else{
                echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>Usuário</strong>!</div>" . mysqli_error($link) . $inserirUsuario;
            }
        }
    }

    function testar_entrada($dado){
        $dado = trim($dado);//REMOVE caracteres desnecessários (TABS, espaços, etc)
        $dado = stripslashes($dado); //REMOVE barras invertidas
        $dado = htmlspecialchars($dado); //Converte caracteres especiais em entidades HTML
        return($dado); //Retorna a variável após processamento
    }

?>

<?php include("footer.php"); ?>