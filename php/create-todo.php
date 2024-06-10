<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listafy - create ToDo</title>
    </head>
        
    <body>
        <?php
            session_start();
            $titulo = $_POST["txttitle"];
            $conteudo = $_POST["txtcontent"];
            $id = $_SESSION["id_usuario"];
            $con = mysqli_connect("localhost","root","listafy123");

            if (!$con) {
                echo('impossível conectar: '. mysqli_error($con));
            } else {
                mysqli_select_db($con, "listafy");
                $sql = "INSERT INTO todo (conteudo_nota, titulo_nota, id_usuario, data_criacao)
                        VALUES ('$conteudo', '$titulo', '$id', NOW())";
            }

            if (mysqli_query($con, $sql)) {
                header("Location: ../pages/dashboard.php?id=" . $id);
            } else {
                echo('Erro no cadastro da nota: ' . mysqli_error($con));
            }
            
            mysqli_close($con);                 
        ?>
    </body>
</html>