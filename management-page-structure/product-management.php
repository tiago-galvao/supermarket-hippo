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
                    Produtos
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="category-user-management.php">Categorias</a>
                    <a class="dropdown-item" href="user-management.php">Usuários</a>
                </div>
            </div>
        </div>
        <div class="body-project--addbutton">
            <button class='btn btn-danger' type='submit' data-toggle="modal" data-target="#produtoModal">Adicionar Novo
                Produto
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
                    <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\" style='display: flex; height: 51px; width: auto;'> $msg
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
            $instrucaoSQL = "SELECT idProduto, nomeProduto, descontoPromocao, precProduto, descProduto, idCategoria, idUsuario, ativoProduto, qtdMinEstoque, imagem FROM  Produto";
            $consulta = sqlsrv_query($conn, $instrucaoSQL);
            $numRegistros = sqlsrv_num_rows($consulta);

        } catch (Exception $e) {
            die($e);
        }

        while ($produtos = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_NUMERIC)) {

            if (strlen($produtos[1]) >= 25) {
                $produtos[1] = substr($produtos[1], 0, 25) . '...';
            }
            $produtos[1] = utf8_encode((empty($produtos[1])) ? "Sem dados" : $produtos[1]);
            $produtos[2] = utf8_encode((empty($produtos[2])) ? "Sem dados" : $produtos[2]);
            $produtos[4] = utf8_encode((empty($produtos[4])) ? "Sem dados" : $produtos[4]);
            $produtos[7] = ($produtos[7] == 1) ? "Sim" : "Não";
            $image64 = $produtos[9];
            $image64 = base64_encode($image64);
            $image64 = "<img height='200px' weight='200px 'src=\"data:image/jpeg;base64," . $image64 . "\">";
            ?>

            <div class="col-sm-6 col-md-3">
                <div class="card  mb-3">
                    <?php echo $image64; ?>
                    <div class="card-block">
                        <h5 class="card-title"><?= $produtos[1] ?></h5>
                        <p class="card-text"><strong>Id do Produto : &nbsp; &nbsp; </strong><?= $produtos[0]; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Preço : &nbsp;
                                &nbsp; </strong>$<?= round($produtos[3], 2); ?></li>
                        <li class="list-group-item"><strong>Desconto : &nbsp;
                                &nbsp; </strong>$<?= round($produtos[2], 2); ?></li>
                        <li class="list-group-item"><strong>Quantidade no Estoque : &nbsp;
                                &nbsp; </strong><?= $produtos[8]; ?></li>
                        <li class="list-group-item"><strong>Produto Ativo : &nbsp; &nbsp; </strong><?= $produtos[7]; ?>
                        </li>
                        <li class="list-group-item" style="overflow: auto; height: 230px"><strong>Descrição : &nbsp;
                                &nbsp; </strong><?= $produtos[4]; ?></li>
                    </ul>
                    <div class="card-footer" style="display: flex; justify-content: space-between;">
                        <input class='body-project--formbutton' type='image' src='../svg/pencil.svg'
                               formaction='../code/categoria/category-update.php'/>
                        <form method="post">
                            <input class='body-project--formbutton' type='image' src='../svg/garbage.svg'
                                   value="<?= $produtos[0]; ?>" name="id"  formaction='../code/produto/product-delete.php'/>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<div class="row">
    <div class="modal fade" id="produtoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Nome:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nomeProduto" placeholder='EX: Produto Exemplo'>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Desconto Promoção:</label>
                            <input type="number" class="form-control" id="recipient-name" name="descontoPromocao"placeholder='EX: 1.00'>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Preço:</label>
                            <input type="number" class="form-control" id="recipient-name" name="precProduto" placeholder='EX: 1.00'>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Descrição:</label>
                            <input type="text" class="form-control" id="recipient-name" name="descProduto" placeholder='EX: Descrição para o produto'>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label for="message-text" class="form-control-label">Categoria:</label>-->
<!--                            <select name="idCategoria">-->
<!--                                <option value="">Escolha</option>-->
<!--                                <option value="A">Administrador</option>-->
<!--                                <option value="C">Colaborador</option>-->
<!--                            </select>-->
<!--                        </div>-->

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Categoria:</label>
                            <input type="text" class="form-control" id="recipient-name" value="1" name="idCategoria">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Usuário:</label>
                            <input type="text" class="form-control" id="recipient-name" value="1" name="idUsuario">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Estoque:</label>
                            <input type="number" class="form-control" id="recipient-name" name="qtdMinEstoque" placeholder='EX: 4'>
                        </div>
                        <div class="input-group input-file" name="Fichier1">
                            <input type="file" class="form-control" name="imagem"/>
                            <span class="input-group-btn">
    		            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-danger" value="Adicionar novo produto"
                                   name="btnGravar" formaction='../code/produto/product-add.php'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('../main-page-structure/import-javascript.php') ?>
</body>
</html>