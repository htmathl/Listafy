<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../styles/dashboard.css">
        <link rel="stylesheet" href="../styles/global.css">
        <script src="../js/createTodo.js" defer></script>
    </head>

    <?php
        $id = $_GET["id"];
        $con = mysqli_connect("localhost","root","listafy123");
    ?>

    <body>

        <div id="popup">
            <div id="popup-content">
                <form action="../php/create-todo.php" method="POST">
                    <input type="text" name="titulo" id="titulo" placeholder="Título">
                    <textarea name="conteudo" id="conteudo" placeholder="Conteúdo"></textarea>
                    <button type="submit">Criar</button>
                </form>
            </div>
        </div>

        <nav>
            <div class="nav-logo">
                <img src="../assets/logo.png" alt="listafy logo">
            </div>

            <div class="new-ToDo">
                <button id="btnCreate">
                    <img src="../assets/plus.svg" alt="criar novo to-do">
                </button>
            </div>
        </nav>

        <main>
            <?php
            if (!$con) {
                echo('impossível conectar: '. mysqli_error());
            } else {
                mysqli_select_db($con, "listafy");
                $sql = mysqli_query($con, "SELECT * FROM todo WHERE id_usuario = '$id'");
                while ($row = mysqli_fetch_assoc($sql)) {
                    $conteudo_nota = $row['conteudo_nota'];
                    $titulo_nota = $row['titulo_nota'];
                    $data_criacao = $row['data_criacao'];
                
                    echo "<div class='to-do'>
                            <span class='to-do-title'>$titulo_nota</span>
                            <br/>
                            <span class='to-do-content'>$conteudo_nota</span>
                        </div>";
                }
            }
        ?>
        </main>
    </body>

</html>

<!-- Página TO DO -->