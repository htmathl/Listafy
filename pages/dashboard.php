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
        <div id="popup-create-todo">
            <div id="popup-content">
                <div class="form-box">
                    <form class="form" method="post" action="../php/create-todo.php?id=<?php echo $id; ?>">
                        <span class="title">Adicionar to-do</span>
                        <span class="subtitle">preencha os campos</span>
                        <div class="form-container">
                            <input type="text" class="input" name="txttitle" id="titulo" placeholder="Título">
                            <textarea name="txtcontent" style="height: 120px;" class="input" id="conteudo" placeholder="Conteúdo"></textarea>
                        </div>
                        
                        <div class="button-container">
                            <button type="button" id="button-cancel">cancelar</button>
                            <button type="submit">criar</button>
                        </div>
                    </form>
                </div>
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
                                <div class='to-do-header'>
                                    <div class='header-button'>
                                        <img src='../assets/edit.svg' alt='editar'>
                                    </div>
                            
                                    <div class='header-button'>
                                        <img src='../assets/close.svg' alt='excluir'>
                                    </div>
                                </div>

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