<?php include("header.php"); ?>

<?php

    //Bloco para declaração de variáveis para receber dados do form
    $id = $anoCamp = $cursosCamp = $nomeCamp = $dtInicio = $dtFim = "";
    $tudoCerto =true; //Variável responsável por verificar se os campos foram devidamente preenchidos

    //Verifica se o método de envio do formulário é POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        //Verifica se o campo "anoCamp" do form está vazio
        if(empty($_POST["anoCamp"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>ANO DO CAMPEONATO</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $anoCamp = testar_entrada($_POST["anoCamp"]);
        }

        //Verifica se o campo "nomeCamp" do form está vazio
        if(empty($_POST["nomeCamp"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>NOME DO CAMPEONATO</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $nomeCamp = testar_entrada($_POST["nomeCamp"]);
        }

         //Aqui inicia o bloco para validação da foto
         $diretorio    = "img/"; //Define o diretório para o qual as imagens serão movidas
         $fotoCampeonato  = $diretorio . basename($_FILES["fotoCampeonato"]["name"]); //Gera o endereço do arquivo (img/nomedoarquivo.extensao)
         $uploadOK     = true; //Variável para verificar sucesso no upload do arquivo
         $tipoDaImagem = strtolower(pathinfo($fotoCampeonato, PATHINFO_EXTENSION)); //Pegar a extensão (tipo)
 
         //Verificar o tamanho do arquivo (neste caso, 5MB)
         if($_FILES["fotoCampeonato"]["size"] > 5000000){ //Verifica o tamanho do arquivo em bytes
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
            if(!move_uploaded_file($_FILES["fotoCampeonato"]["tmp_name"], $fotoCampeonato)){
                echo "<div class='alert alert-danger text-center'>Atenção! Erro ao tentar mover <strong>a foto</strong> para o diretório $diretorio!</div>";
                $uploadOK = false;
            }
        }

    

        //Verifica se o campo "dtInicio" do form está vazio
        if(empty($_POST["dtInicio"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>DATA DE INICIO</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $dtInicio = testar_entrada($_POST["dtInicio"]);
            //Verifica se a data informada possui 10 caracteres
            if(strlen($dtInicio) == 10){
                //Divide a string dtNascUsuario em 3 substrings (dia, mes e ano)
                $dia = substr($dtInicio, 8, 2);
                $mes = substr($dtInicio, 5, 2);
                $ano = substr($dtInicio, 0, 4);

                //Utiliza a função checkdate para verificar a validade da data (USA)
                if(!checkdate($mes, $dia, $ano)){
                    echo "<div class='alert alert-warning text-center'>Atenção! <strong>DATA INVÁLIDA</strong>!</div>";
                    $tudoCerto = false;
                }
            }
            else{
                echo "<div class='alert alert-warning text-center'>Atenção! o campo<strong>DATA</strong> não possui 10 caracteres!</div>";
                $tudoCerto = false;
            }
        }
        //Verifica se o campo "dtFim" do form está vazio
        if(empty($_POST["dtFim"])){
            echo "<div class='alert alert-warning text-center'>Atenção! o campo <strong>DATA DE FIM</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $dtFim = testar_entrada($_POST["dtFim"]);
            //Verifica se a data informada possui 10 caracteres
            if(strlen($dtFim) == 10){
                //Divide a string dtNascUsuario em 3 substrings (dia, mes e ano)
                $dia = substr($dtFim, 8, 2);
                $mes = substr($dtFim, 5, 2);
                $ano = substr($dtFim, 0, 4);

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

        //Se os dados do formulário tiverem sidos preenchidos corretamente, exibe uma tabela com os dados informados
        if($tudoCerto && $uploadOK){

            //Cria uma QUERY responsável por realizar a inserção dos dados do Camp no BD
            $inserirCamp = "INSERT INTO campeonato (anoCamp, nomeCamp, dtInicio, dtFim, fotoCamp)
                                    VALUES ('$anoCamp',	'$nomeCamp', '$dtInicio', '$dtFim', '$fotoCampeonato')";
            
            //Toda vez que precisarmos executar operações no BD, precisamos incluir o arquivo de conexão
            include("conexaoBD.php");
            
            //Função para executar QUERYs no BD
            if(mysqli_query($link, $inserirCamp)){
                echo "<div class='alert alert-success text-center'><strong>Campeonato</strong> cadastrado(a) com sucesso!</div>";
                echo "<div class='container mt-3'>
                    <table class='table'>
                        <div class='container mt-3 text-center'>
                            <img src='$fotoCampeonato' title='Foto de $nomeCamp' width='150'>
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
            else{
                echo "<div class='alert alert-danger text-center'>Erro ao tentar cadastrar <strong>Campeonato</strong>!</div>" . mysqli_error($link) . $inserirCamp;
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