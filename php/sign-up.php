<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listafy - Sign Up</title>
    </head>
        
    <body>
        <?php
            $nome = $_POST["txtusername"];
            $email = $_POST["txtemail"];
            $senha = $_POST["txtpassword"];
            $con = mysqli_connect("localhost","root","listafy123");

            if (!$con) {
                echo('impossível conectar: '. mysqli_error());
            } else {
                mysqli_select_db($con, "listafy");
                $sql = "INSERT INTO usuarios (email, senha, nome)
                        VALUES ('$email', '$senha', '$nome')";
            }

            if (mysqli_query($con, $sql)) {
                include '../pages/sign-in.html';
            } else {
                echo('Erro no cadastro: ' . mysqli_error());
            }
            mysqli_close($con);                 
        ?>
    </body>
</html>