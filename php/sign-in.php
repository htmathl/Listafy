<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listafy - Sign In</title>
    </head>

    <body>
        <?php
            $email = $_POST["txtemail"];
            $senha = $_POST["txtpassword"];
            $con = mysqli_connect("localhost","root","listafy123");

            if (!$con) {
                echo('impossível conectar: '. mysqli_error());
            } else {
                mysqli_select_db($con, "listafy");
                $sql = mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
                $id = mysqli_query($con, "SELECT id_usuario FROM usuarios WHERE email = '$email' AND senha = '$senha'");

                if(mysqli_num_rows($sql) == 0) {
                    echo "Usuário ou senha inválidos!";
                } else {
                    $row = mysqli_fetch_assoc($sql);
                    $id = $row['id_usuario'];
                    header("Location: ../pages/dashboard.php?id=" . $id);
                    mysqli_close($con);
                }
            }

        ?>
    </body>
</html>