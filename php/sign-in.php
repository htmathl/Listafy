<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listafy - Sign In</title>
    </head>

    <body>
        <?php
            session_start(); // Iniciar sessão no início do script

            // Conectar ao banco de dados
            $con = mysqli_connect("localhost", "root", "listafy123", "listafy");

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = mysqli_real_escape_string($con, $_POST['txtemail']);
                $senha = $_POST['txtpassword'];
            
                // Buscar usuário no banco de dados
                $sql = "SELECT id_usuario, senha FROM usuarios WHERE email = '$email'";
                $result = mysqli_query($con, $sql);
                $user = mysqli_fetch_assoc($result);

                echo $user['id_usuario'];
            
                if ($user && password_verify($senha, $user['senha'])) {
                    // Senha correta, iniciar sessão
                    $_SESSION['id_usuario'] = $user['id_usuario'];
                    header("Location: ../pages/dashboard.php?id=" . $user['id_usuario']); // Redirecionar para o dashboard
                    exit;
                } else {
                    echo "Nome de usuário ou senha incorretos.";
                }
            }
            // $email = $_POST["txtemail"];
            // $senha = $_POST["txtpassword"];
            // $con = mysqli_connect("localhost","root","listafy123");

            // if (!$con) {
            //     echo('impossível conectar: '. mysqli_error());
            // } else {
            //     mysqli_select_db($con, "listafy");
            //     $sql = mysqli_query($con, "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
            //     $id = mysqli_query($con, "SELECT id_usuario FROM usuarios WHERE email = '$email' AND senha = '$senha'");

            //     if(mysqli_num_rows($sql) == 0) {
            //         echo "Usuário ou senha inválidos!";
            //     } else {
            //         $row = mysqli_fetch_assoc($sql);
            //         $id = $row['id_usuario'];
            //         header("Location: ../pages/dashboard.php?id=" . $id);
            //         mysqli_close($con);
            //     }
            // }
        ?>
    </body>
</html>