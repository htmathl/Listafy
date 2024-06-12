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

            if (!$con || !$nome || !$email || !$senha) {
                echo('impossível conectar: '. mysqli_error($con));
            } else {
                // Criando um hash da senha
                $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
                mysqli_select_db($con, "listafy");
                $sql = "INSERT INTO usuarios (email, senha, nome)
                        VALUES ('$email', '$hashedSenha', '$nome')";
            }

            if (mysqli_query($con, $sql)) {
                header("Location: ../pages/sign-in.html");
            } else {
                echo('Erro no cadastro: ' . mysqli_error($con));
            }
            mysqli_close($con);              
        ?>
    </body>
</html>