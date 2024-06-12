<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../styles/global.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../styles/dashboard.css?v=<?php echo time(); ?>">
        <script src="../js/createTodo.js?v=<?php echo time(); ?>" defer></script>
        <script src="../js/updateTodo.js?v=<?php echo time(); ?>" defer></script>
        <script src="https://unpkg.com/typeit@@8.7.1/dist/index.umd.js" defer></script>
    </head>

    <?php
        session_start();
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
                            <input type="text" class="input" name="txttitle" id="titulo" placeholder="Título" required autocomplete="off">
                            <textarea name="txtcontent" style="height: 120px;" class="input" id="conteudo" placeholder="Conteúdo" required autocomplete="off"></textarea>
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

            <div>
            <?php 
                try { 
                    echo "<span class='nav-title'>Olá, <span> echo $_SESSION['nome']</span></span>"; 
                } catch (e){ 
                    header("Location: ../pages/sign-in.html"); 
                } 
            ?>
            </div>

            <div class="new-ToDo">
                <button id="btnCreate">
                    <img src="../assets/plus.svg" alt="criar novo to-do">
                </button>
            </div>
        </nav>

        <main>
            <?php
                // Conectar ao banco de dados
                if (!$con || !isset($_SESSION['id_usuario'])) {
                    if(!isset($_SESSION['id_usuario'])) {
                        echo "Você não está logado! </br>";
                        echo "<a href='./sign-in.html'>Clique aqui para fazer login</a>";
                    } else {
                        echo('impossível conectar: '. mysqli_error($con));
                    }
                } else {
                    mysqli_select_db($con, "listafy");
                    // Ordenar as notas por data_criacao
                    
                    $sql = mysqli_query($con, "SELECT * FROM todo WHERE id_usuario = '$id' ORDER BY data_criacao DESC");
                    $data_atual_grupo = null; // Variável para acompanhar a data atual do grupo

                    while ($row = mysqli_fetch_assoc($sql)) {
                        $conteudo_nota = $row['conteudo_nota'];
                        $titulo_nota = $row['titulo_nota'];
                        $data_criacao = $row['data_criacao'];
                        $id_nota = $row['id_nota'];

                        //atualiar nota
                        echo "
                            <section id='updateTodo'>
                                <div class='form-box' id='updateTodoContent'>
                                   <form class='form' method='post' action='../php/update-todo.php'>
                                       <span class='title'>Update Todo</span>
                                       <span class='subtitle'>Atualize sua tarefa</span>
                                       <div class='form-container'>
                                           <input type='text' class='input' name='txttitle' id='updateTitle' placeholder='Título' required>
                                           <textarea class='input' name='txtcontent' id='updateContent' placeholder='Descrição' required></textarea>
                                           <input type='hidden' name='id_nota' id='notaId'>
                                           <input type='hidden' name='idUsuario' value='$id'>
                                       </div>
                                       <div class='button-container'>
                                             <button type='button' id='button-cancel-upd'>cancelar</button>
                                             <button type='submit'>Atualizar</button>
                                        </div>
                                   </form>
                                </div>
                            </section>
                        ";

                        // Verificar se a data da nota é diferente da data atual do grupo
                        if ($data_criacao != $data_atual_grupo) {
                            // Se for uma nova data, exibir a data e atualizar a data_atual_grupo
                            echo "<div class='data-grupo'></br>$data_criacao</div></br>";
                            $data_atual_grupo = $data_criacao;
                        }

                        // Exibir a nota
                        echo "
                            <div class='to-do' data-id='$id_nota'>
                                <div class='to-do-header'>
                                    <div class='header-button'>
                                        <button id='btnU' class='btnUs' onclick='updateForm(\"$titulo_nota\", \"$conteudo_nota\", \"$id_nota\")'>
                                            <img src='../assets/edit.svg' alt='editar'>
                                        </button>
                                    </div>

                                    <div class='header-button'>
                                        <a href='../php/delete-todo.php?id=$id_nota&idUsuario=$id'>
                                            <img src='../assets/close.svg' alt='excluir'>
                                        </a>
                                    </div>
                                </div>
                                <span class='to-do-title'>$titulo_nota</span>
                                <br/>
                                <span class='to-do-content'>$conteudo_nota</span>
                            </div>
                    ";

                    if(!$conteudo_nota) {
                        echo "
                            <div class='titleSemConteudo'>
                                <span class='to-do-content'>Sem conteúdo</span>
                            </div>                        
                        ";
                    }
                }
            }
            ?>
        </main>
    </body>



</html>

<!-- Página TO DO -->