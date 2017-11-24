<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hippo Supermarket</title>
    <?php include('../main-page-structure/links.php') ?>
</head>
<body>

<?php include('../management-page-structure/top-bar.php'); ?>

<div class="container" style="display: flex">
    <div class="row body-project--navbar">
        <div class="body-project--options">
            <span class="body-project--title">Gerenciamento</span>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Categorias
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="product-management.php">Produtos</a>
                    <a class="dropdown-item" href="user-management.php">Usuários</a>
                </div>
            </div>
        </div>
        <div class="body-project--addbutton">
            <button class='btn btn-danger' type='submit' data-toggle="modal" data-target="#categoriaModal">Adicionar
                Nova
                Categoria
            </button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">

        <?php include('../db/bancodedados.php');

        session_start();
        include('../db/bancodedados.php');
        $msg = $_SESSION['msg'];
        $erro = $_SESSION['erro'];

        if (isset($msg)) {
            echo "
                <div class='container' style='display: flex; justify-content: space-around;'>
                    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\" style='display: flex; height: 51px; width: auto;'>$msg
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                </div>
            ";
            unset($_SESSION['msg']);
            unset($msg);
        }
        if (isset($erro)) {
            echo "
               <div class='container' style='display: flex; justify-content: space-around;'>
                    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\" style='display: flex; height: 51px; width: auto;'> $erro
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                </div>
            ";
            unset($_SESSION['erro']);
            unset($erro);
        }

        try {
            $instrucaoSQL = "SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria";
            $consulta = sqlsrv_query($conn, $instrucaoSQL);
            $numRegistros = sqlsrv_num_rows($consulta);
        } catch (Exception $e) {
            die($e);
        }
		$i= 0;
        while ($categorias = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_NUMERIC)) {

            $categorias[1] = utf8_encode((empty($categorias[1])) ? "Sem dados" : $categorias[1]);
            $categorias[2] = utf8_encode((empty($categorias[2])) ? "Sem dados" : $categorias[2]);
			$i++;
            ?>
            <div class="col-sm-6 col-md-3">
                <div class="card  mb-3">
                    <div class="card-block">
                        <h5 class="card-title"><?= $categorias[1] ?></h5>
                        <p class="card-text"><strong>Id da Categoria : &nbsp; &nbsp;</strong><?= $categorias[0]; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="overflow: auto; height: 230px"><strong>Descrição : &nbsp;
                                &nbsp; </strong><?= $categorias[2]; ?></li>
                    </ul>
                    <div class="card-footer" style="display: flex; justify-content: space-between;">
                        <input class='body-project--formbutton' type='image' data-toggle="modal" data-target="#categoriaUpdateModal<?php echo $i;?>" data-id="<?= $dataUpdate = $categorias; ?>"  src='../svg/pencil.svg'/>
                        <form method="post">
                            <input class='body-project--formbutton' type='image' src='../svg/garbage.svg' value="<?= $categorias[0]; ?>" name="id" formaction='../code/categoria/category-delete.php'>
                        </form>
                    </div>
					
					                    <div class="row">
                        <div class="modal fade" id="categoriaUpdateModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label for="recipient-name" class="form-control-label">ID:</label>
												<input type="text" class="form-control" id="recipient-name" value="<?= $dataUpdate[0]; ?>" name="id">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="form-control-label">Nome:</label>
                                                <input type="text" class="form-control" id="recipient-name" value="<?= $dataUpdate[1]; ?>" name="nome">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Descrição:</label>
                                                <input type="text" class="form-control" id="recipient-name" value="<?= $dataUpdate[2]; ?>" name="desc">
                                            </div>	
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <input type="submit" class="btn btn-danger" value="Editar" name="btnGravar"   formaction='../code/categoria/category-update.php'>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<div class="row">
    <div class="modal fade" id="categoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nova Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Nome:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nomeCategoria">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Descrição:</label>
                            <textarea class="form-control" id="message-text" name="descCategoria"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-danger" value="Adicionar nova categoria" name="btnAdd"
                           formaction='../code/categoria/category-add.php'></input>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('../main-page-structure/import-javascript.php') ?>
</body>
</html>