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

<div class="container-fluid">
    <div class="body-project">
        <div class="body-project--sidebar">
            <dl>
                <dt>Usuários</dt>
                <dd class="body-project--gu"><a href="user-management.php">Gerenciamento de usuários</a></dd>

                <dt>Categorias</dt>
                <dd class="body-project--gc"><a class="link-selected" href="category-user-management.php">Gerenciamento de categorias</a></dd>

                <dt>Produtos</dt>
                <dd class="body-project--gp"><a href="product-management.php">Gerenciamento de produtos</a></dd>
            </dl>
        </div>

        <?php
        session_start();
        include('../db/bancodedados.php');
        $msg = $_SESSION['msg'];
        $erro = $_SESSION['erro'];
        
        if(isset($msg)){
            echo "	<br><center><b><font color='green'>
				    $msg</font></b></center><br>";
            session_destroy();
        }
        if(isset($erro)) {
            echo "	<br><center><b><font color='red'>
				    $erro</font></b></center><br>";
            session_destroy();
        }

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
            <div class="row body-project--boxinfo">
                <form class="body-project--form" method='post'>
                    <div class='propreties-itens '>
                        <span class="lead body-project--title">Id</span>
                        <input type='text' value='<?=$categorias[0];?>' name='id'/>
                    </div>
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Nome</span>
                        <input type='text' value='<?=$categorias[1];?>' name='nome'/>
                    </div>
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Descrição</span>
                        <input type='text' value='<?=$categorias[2];?>' name='desc'/>
                    </div>
                    <div class="body-project--formbuttons">
                        <input class='body-project--formbutton' type='image' src='/svg/pencil.svg' formaction='/code/categoria/category-update.php' />
                        <input class='body-project--formbutton' type='image' src='/svg/garbage.svg' formaction='/code/categoria/category-delete.php' >
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </div>

        <div class="row">
            <div class='box-container-add'>
                <button class='btn btn-danger' type='submit' data-toggle="modal" data-target="#exampleModal">Adicionar Nova Categoria</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="message-text" class="form-control-label" >Descrição:</label>
                            <textarea class="form-control" id="message-text" name="descCategoria"></textarea>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-danger" value="Adicionar nova categoria" name="btnAdd" formaction='/code/categoria/category-add.php'></input>

                      </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>  
        
<?php include('../main-page-structure/import-javascript.php') ?>  
    
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Nova Categoria')
  modal.find('.modal-body input').val(recipient)
})
</script>

</body>
</html>