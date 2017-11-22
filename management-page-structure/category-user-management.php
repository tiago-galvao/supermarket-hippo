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
            <button class='btn btn-danger' type='submit' data-toggle="modal" data-target="#categoriaModal">Adicionar Nova
                Categoria
            </button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">

        <?php include('../db/bancodedados.php');
        try {
            $instrucaoSQL = "SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria";
            $consulta = sqlsrv_query($conn, $instrucaoSQL);
            $numRegistros = sqlsrv_num_rows($consulta);
        } catch (Exception $e) {
            die($e);
        }

        while ($categorias = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_NUMERIC)) {

            $categorias[1] = utf8_encode((empty($categorias[1])) ? "Sem dados" : $categorias[1]);
            $categorias[2] = utf8_encode((empty($categorias[2])) ? "Sem dados" : $categorias[2]);
            ?>			
			 <div class="col-sm-6 col-md-3">
                <div class="card  mb-3">
                    <div class="card-block">
                        <input class="card-title" name="nome" value="<?= $categorias[1] ?>"/>
                        <strong>Id da Categoria : </strong><input class="card-text" name="id" value="<?=  $categorias[0]; ?>"/>
                    </div>
                    <ul class="list-group list-group-flush">
                        <strong>Descrição  </strong><input class="list-group-item" style="overflow: auto; height: 230px" name="desc" value="<?= $categorias[2]; ?>" />
                    </ul>
                    <div class="card-footer" style="display: flex; justify-content: space-between;">
						<input class='body-project--formbutton' type='image' src='/svg/pencil.svg' formaction='/code/categoria/category-update.php'/>
                        <input class='body-project--formbutton' type='image' src='/svg/garbage.svg' formaction='/code/categoria/category-delete.php'>
                    </div>
                </div>
            </div>		
        <?php
        }
        ?>
		</div>
	</div>
    <div class="row">
        <div class='box-container-add'>

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
                                   formaction='/code/categoria/category-add.php'></input>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../main-page-structure/import-javascript.php') ?>
</body>
</html>