<?php
session_start();
require('conexao.php');
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Usuarios</title>
  </head>
  <body>

    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <?php include('mensagem.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de usuários
                            <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar usuário</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Data Nascimento</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <!-- abertura do if --->
                                <?php
                                    $sql = "SELECT * FROM usuarios";
                                    $usuarios = mysqli_query($conexao, $sql);
                                    if(mysqli_num_rows($usuarios) > 0){
                                        foreach($usuarios as $usuario){ 
                                ?>
                                <tr>                                    
                                    <td><?=$usuario['id'] ?></td>
                                    <td><?=$usuario['nome'] ?></td>
                                    <td><?=$usuario['email'] ?></td>
                                    <td><?= date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></td>
                                    <td>
                                        <!--BOTOES -->
                                        <!--botao visualizar -->
                                        <a href="usuario-view.php?id=<?= $usuario['id'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                                        <!--botao editar -->
                                        <a href="usuario-edit.php?id=<?= $usuario['id'] ?>" class="btn btn-success btn-sm">Editar</a>
                                        <!--botao excluir -->
                                        <form action="" method="POST" class="d-inline">
                                            <button type="submit" name="delete_usuario" value="1" class="btn btn-danger btn-sm">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- fechamento do if -->
                                <?php
                                    }
                                    }else{
                                        echo "<h5>Nenhum usuário encontrado</h5>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>