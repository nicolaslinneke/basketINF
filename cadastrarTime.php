<?php include("header.php"); ?>

<?php

    //Bloco para declaração de variáveis para receber dados do form
    $fotoTime = $nomeTime = $curso = "";
    $tudoCerto =true; //Variável responsável por verificar se os campos foram devidamente preenchidos

    //Verifica se o método de envio do formulário é POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        //Verifica se o campo "nomeTime" do form está vazio
        if(empty($_POST["nomeTime"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>NOME</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $nomeTime = testar_entrada($_POST["nomeTime"]);
        }
        //Tratamento de Erro
       /* if(mysqli_query($link, $inserirTime)){
            // sucesso
        } else {
            // erro
            echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>Usuário</strong>!</div>" . mysqli_error($link) . $inserirTime;
        }
        if(mysqli_query($link, $inserirTime)){
            // Sucesso ao inserir no banco de dados
            echo "<div class='alert alert-success text-center'><strong>Time</strong> cadastrado com sucesso!</div>";
            // Aqui você pode exibir informações adicionais se desejar
        } else {
            // Erro ao inserir no banco de dados
            echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar o <strong>Time</strong>!</div>" . mysqli_error($link);
        }
            */


        //Verifica se o campo "curso" do form está vazio
        if(empty($_POST["curso"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>CURSO</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $curso = testar_entrada($_POST["curso"]);
        }
    

        //Aqui inicia o bloco para validação da foto
        $diretorio    = "img/"; //Define o diretório para o qual as imagens serão movidas
        $fotoTime  = $diretorio . basename($_FILES["fotoTime"]["name"]); //Gera o endereço do arquivo (img/nomedoarquivo.extensao)
        $uploadOK     = true; //Variável para verificar sucesso no upload do arquivo
        $tipoDaImagem = strtolower(pathinfo($fotoTime, PATHINFO_EXTENSION)); //Pegar a extensão (tipo)

        //Verificar o tamanho do arquivo (neste caso, 5MB)
        if($_FILES["fotoTime"]["size"] > 5000000){ //Verifica o tamanho do arquivo em bytes
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
            if(!move_uploaded_file($_FILES["fotoTime"]["tmp_name"], $fotoTime)){
                echo "<div class='alert alert-danger text-center'>Atenção! Erro ao tentar mover <strong>a foto</strong> para o diretório $diretorio!</div>";
                $uploadOK = false;
            }
        }

        //Se os dados do formulário tiverem sidos preenchidos corretamente, exibe uma tabela com os dados informados
        if($tudoCerto && $uploadOK){

            //Cria uma QUERY responsável por realizar a inserção dos dados do Usuário no BD
            $inserirTime = "INSERT INTO cadastro_time (fotoTime, nomeTime, curso)
                         VALUES ('$fotoTime', '$nomeTime', '$curso')";

            //Toda vez que precisarmos executar operações no BD, precisamos incluir o arquivo de conexão
            include("conexaoBD.php");
            
            //Função para executar QUERYs no BD
            if(mysqli_query($link, $inserirTime)){
                echo "<div class='alert alert-success text-center'><strong>Time</strong> cadastrado(a) com sucesso!</div>";
                echo "<div class='container mt-3'>
                    <div class='container mt-3 text-center'>
                        <img src='$fotoTime' title='Foto de $nomeTime' width='150'>
                    </div>
                    <table class='table'>
                        <tr>
                            <th>NOME:</th>
                            <td>$nomeTime</td>
                        </tr>
                        <tr>
                            <th>CURSO:</th>
                            <td>$curso</td>
                        </tr>
                    </table>
                </div>";
            }
            else{
                echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>Time</strong>!</div>" . mysqli_error($link) . $inserirTime;
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