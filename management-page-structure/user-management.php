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
                <dd class="body-project--gu"><a class="link-selected" href="user-management.php">Gerenciamento de usuários</a></dd>

                <dt>Categorias</dt>
                <dd class="body-project--gc"><a href="category-user-management.php">Gerenciamento de categorias</a></dd>

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
            $instrucaoSQL = "SELECT idUsuario,loginUsuario,senhaUsuario,nomeUsuario,tipoPerfil, usuarioAtivo FROM Usuario";
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
                    <span class="lead body-project--title">Login</span>
                    <input type='text' value='<?=$categorias[1];?>' name='login'/>
                </div>
                <div class='propreties-itens'>
                    <span class="lead body-project--title">Senha</span>
                    <input type='password' value='<?=$categorias[2];?>' name='senha'/>
                </div>
                <div class='propreties-itens '>
                    <span class="lead body-project--title">Nome</span>
                    <input type='text' value='<?=$categorias[3];?>' name='nome'/>
                </div>
                <div class='propreties-itens'>
                    <span class="lead body-project--title">Tipo</span>
                    <select name="tipo">
						<option value="A" 
						<?php if($categorias[4] == 'A') echo "selected"; ?>>Administrador</option>
						<option value="C"
						<?php if($categorias[4] == 'C') echo "selected"; ?>>Colaborador</option>
					</select>
                </div>
                <div class='propreties-itens'>
                    <span class="lead body-project--title">Ativo/Desativo</span>
                    <input type='checkbox' value='<?=$categorias[5];?>' name='ativo' <?php if($categorias[5] == 1) echo "checked";?>/>
                </div>
                <div class="body-project--formbuttons">
                    <input class='body-project--formbutton' type='image' src='/svg/pencil.svg' formaction='/code/user/user-update.php' />
                    <input class='body-project--formbutton' type='image' src='/svg/garbage.svg' formaction='/code/user/user-delete.php' >
                </div>
            </form>
        </div>
    <?php
    }
    ?>

</div>

        <div class="row">
            <div class='box-container-add'>
                <button class='btn btn-danger' type='submit' data-toggle="modal" data-target="#exampleModal">Adicionar Novo Usuario</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="message-text" class="form-control-label" >Senha:</label>
                            <input type="password" class="form-control" id="recipient-name" name="senhaUsuario">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="form-control-label" >Nome:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nomeUsuario">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="form-control-label" >Perfil:</label>
                                <select name="perfilUsuario">
                                    <option value="">Escolha</option>
                                    <option value="A">Administrador</option>
                                    <option value="C">Colaborador</option> 
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="form-control-label" >Ativo:</label>
                                <input type="checkbox" name="usuarioAtivo">
                          </div>
                      </div>
                            
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-danger" value="Adicionar nova categoria" name="btnGravar" formaction='/code/user/user-add.php'></input>

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
  modal.find('.modal-title').text('Novo Usuário ')
  modal.find('.modal-body input').val(recipient)
})
</script>
</body>
</html>