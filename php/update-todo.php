<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listafy</title>
    </head>
    <body>
        <?php
            $titulo = $_POST["txttitle"];
            $conteudo = $_POST["txtcontent"];
            $idNota = $_POST["idNota"];
            $idUsuario = $_GET["id"];
            $con = mysqli_connect("localhost", "root", "listafy123");

            if (!$con) {
                echo('Impossível conectar: ' . mysqli_error($con));
            } else {
                mysqli_select_db($con, "listafy");
                $sql = "UPDATE todo SET conteudo_nota = '$conteudo', titulo_nota = '$titulo', data_atualizacao = NOW() 
                        WHERE id_nota = '$idNota' AND id_usuario = '$idUsuario'";

                if (mysqli_query($con, $sql)) {
                    header("Location: ../pages/dashboard.php?id=" . $idUsuario);
                } else {
                    echo('Erro na atualização da nota: ' . mysqli_error($con));
                }
            }
            mysqli_close($con);
        ?>
    </body>
</html>