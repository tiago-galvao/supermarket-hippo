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

        try {
            $instrucaoSQL = "SELECT idProduto, nomeProduto, descontoPromocao, precProduto, descProduto, idCategoria, idUsuario, ativoProduto, qtdMinEstoque, imagem FROM  Produto";
            $consulta = sqlsrv_query($conn, $instrucaoSQL);
            $numRegistros = sqlsrv_num_rows($consulta);

        } catch (Exception $e) {
            die($e);
        }

        while ($produtos = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_NUMERIC)) {
            
            if (strlen($produtos[1]) >= 25) {
                $produtos[1] = substr($produtos[1], 0, 25). '...';
            }          
            $produtos[1] = utf8_encode((empty($produtos[1])) ? "Sem dados" : $produtos[1]);
            $produtos[2] = utf8_encode((empty($produtos[2])) ? "Sem dados" : $produtos[2]);
            $produtos[4] = utf8_encode((empty($produtos[4])) ? "Sem dados" : $produtos[4]);
            $produtos[7] =($produtos[7] == 1) ? "Sim" : "Não";
            $image64 = $produtos[9];
            $image64 = base64_encode($image64);
            $image64 = "<img height='200px' weight='200px 'src=\"data:image/jpeg;base64,".$image64."\">";
            ?>

            <div class="col-sm-6 col-md-4">
                <div class="card  mb-3">
                    <?php echo $image64; ?>
                    <div class="card-block">
                        <h5 class="card-title"><?= $produtos[1] ?></h5>
                        <p class="card-text"><strong>Id do Produto : </strong><?=  $produtos[0]; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Preço  </strong>$<?= round($produtos[3],2); ?></li>
                        <li class="list-group-item"><strong>Desconto  </strong>$<?= round($produtos[2],2); ?></li>
                        <li class="list-group-item"><strong>Quantidade no Estoque  </strong><?= $produtos[8]; ?></li>
                        <li class="list-group-item"><strong>Produto Ativo  </strong><?= $produtos[7]; ?></li>
                        <li class="list-group-item" style="overflow: auto; height: 230px"><strong>Descrição  </strong><?= $produtos[4]; ?></li>
                    </ul>
                    <div class="card-footer" style="display: flex; justify-content: space-between;">
                        <input class='body-project--formbutton' type='image' src='/svg/pencil.svg' formaction='/code/categoria/category-update.php'/>
                        <input class='body-project--formbutton' type='image' src='/svg/garbage.svg' formaction='/code/categoria/category-delete.php'/>
                    </div>
                </div>
            </div>

            <!--    <div class="row body-project--boxproduct">-->
            <!--        <div class="body-project--form">-->
            <!--            <div class='propreties-itens'>-->
            <!--                <span class="lead body-project--title">Id</span>-->
            <!--                --><?php //echo "<span>" . $produtos[0] . "</span>"; ?>
            <!--            </div>-->
            <!--            <div class='propreties-itens'>-->
            <!--                <span class="lead body-project--title">Nome</span>-->
            <!--                --><?php //echo "<span>" . $produtos[1] . "</span>"; ?>
            <!--            </div>-->
            <!--        </div>-->
            <!--        --><?php ////echo "<div class='img-responsive body-project--formimage'>".$img_imagem_base64."</div>"; ?>
            <!--        <div class="body-project--form">-->
            <!--            <div class='propreties-itens'>-->
            <!--                <span class="lead body-project--title">Desconto Promoção</span>-->
            <!--                --><?php //echo "<span>" . $produtos[2] . "</span>"; ?>
            <!--            </div>-->
            <!--            <div class='propreties-itens'>-->
            <!--                <span class="lead body-project--title">Preço</span>-->
            <!--                --><?php //echo "<span>" . $produtos[3] . "</span>"; ?>
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="body-project--form">-->
            <!--            <div class='propreties-itens'>-->
            <!--                <span class="lead body-project--title">Quantidade No Estoque</span>-->
            <!--                --><?php //echo "<span>" . $produtos[8] . "</span>"; ?>
            <!--            </div>-->
            <!--            <div class='propreties-itens'>-->
            <!--                <span class="lead body-project--title">Ativo/Desativo</span>-->
            <!--                --><?php //echo "<span>" . $produtos[7] . "</span>"; ?>
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="body-project--form">-->
            <!--            <div class='propreties-itens'>-->
            <!--                <span class="lead body-project--title">Descrição</span>-->
            <!--                --><?php //echo "<span>" . $produtos[4] . "</span>"; ?>
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="body-project--form">-->
            <!--            <div class="body-project--formbuttons">-->
            <!--                <input class='body-project--formbutton' type='image' src='/svg/pencil.svg' formaction='teste.php'/>-->
            <!--                <input class='body-project--formbutton' type='image' src='/svg/garbage.svg' formaction='teste.php'>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <?php
        }
        ?>
    </div>
</div>
<div class="row">
    <div class='box-container-add'>
        <div class="modal fade" id="produtoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Novo Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Login:</label>
                                <input type="text" class="form-control" id="recipient-name" name="loginUsuario">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Senha:</label>
                                <input type="password" class="form-control" id="recipient-name" name="senhaUsuario">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Nome:</label>
                                <input type="text" class="form-control" id="recipient-name" name="nomeUsuario">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Perfil:</label>
                                <select name="perfilUsuario">
                                    <option value="">Escolha</option>
                                    <option value="A">Administrador</option>
                                    <option value="C">Colaborador</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Ativo:</label>
                                <input type="checkbox" name="usuarioAtivo">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-danger" value="Adicionar nova categoria"
                               name="btnGravar" formaction='/code/user/user-add.php'></input>
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