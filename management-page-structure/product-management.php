<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hippo Supermarket</title>
    <?php include('../main-page-structure/links.php') ?>
</head>
<body>

<?php include ('../management-page-structure/top-bar.php'); ?>

<div class="container">
    <div class="body-project--product">
        <div class="body-project--sidebar">
            <dl>
                <dt>Usuário</dt>
                <dd class="body-project--gu"><a href="user-management.php">Gerenciamento de usuário</a></dd>

                <dt>Categorias</dt>
                <dd class="body-project--gc"><a href="category-user-management.php">Gerenciamento de categorias</a></dd>

                <dt>Produtos</dt>
                <dd class="body-project--gp"><a class="link-selected" href="product-management.php">Gerenciamento de produtos</a></dd>
                <br/>
                <br/>
                <br/>
                <br/>
                <button class='btn btn-danger' type='submit' data-toggle="modal" data-target="#produtoModal">Adicionar Novo
                    Produto
                </button>
            </dl>
        </div>

        <?php
        include('../db/bancodedados.php');

        try {
            $instrucaoSQL = "SELECT idProduto, nomeProduto, descontoPromocao, precProduto, descProduto, idCategoria, idUsuario, ativoProduto, qtdMinEstoque, imagem FROM  Produto";
            $consulta = sqlsrv_query($conn, $instrucaoSQL);
            $numRegistros = sqlsrv_num_rows($consulta);

        } catch (Exception $e) {
            die($e);
        }

        while ($produtos = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_NUMERIC)) {

            $produtos[1] = utf8_encode((empty($produtos[1])) ? "Sem dados" : $produtos[1]);
            $produtos[2] = utf8_encode((empty($produtos[2])) ? "Sem dados" : $produtos[2]);
            ?>
            <form class="row body-project--boxproduct" method='post'>
                <div class="body-project--form">
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Id</span>
                        <input class="propreties-itens--inputid" type='text' value='<?=$produtos[0];?>' name='id'/>
                    </div>
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Nome</span>
                        <input type='text' value='<?=$produtos[1];?>' name='nome'/>
                    </div>
                </div>
                <div class='body-project--formimage'>

                </div>
                <div class="body-project--form">
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Desconto Promoção</span>
                        <input class="propreties-itens--inputid" type='text' value='<?=$produtos[2];?>' name='id'/>
                    </div>
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Preço</span>
                        <input type='text' value='<?=$produtos[3];?>' name='nome'/>
                    </div>
                </div>
                <div class="body-project--form">
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Quantidade No Estoque</span>
                        <input type='text' value='<?=$produtos[8];?>' name='nome'/>
                    </div>
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Ativo/Desativo</span>
                        <input type='text' value='<?=$produtos[7];?>' name='nome'/>
                    </div>
                </div>
                <div class="body-project--form">
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Descrição</span>
                        <input type='text' value='<?=$produtos[4];?>' name='nome'/>
                    </div>
                </div>
                <div class="body-project--form">
                    <div class="body-project--formbuttons">
                        <input class='body-project--formbutton' type='image' src='/svg/pencil.svg' formaction='teste.php' />
                        <input class='body-project--formbutton' type='image' src='/svg/garbage.svg' formaction='teste.php' >
                    </div>
                </div>
            </form>
        <?php
            }
        ?>
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