<html>
<head> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>
	<body>
		<a href="/menu">Voltar</a> 
		<b>Usuario</b> 
		Categoria 
		Produto 
		<a href="/?logout=1">Sair</a>
		<br><br>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Cadastrar nova categoria</button>

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
		        <input type="submit" class="btn btn-primary" value="Adicionar nova categoria" name="btnAdd"></input>

		      </div>
		      </form>
		    </div>
		  </div>
		</div>

		<div class="modal fade" id="EditarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		            <input type="text" class="form-control" id="recipient-name" name="nomeCategoria" value="<?php echo $dados_categoria['nomeCategoria']; ?>">
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="form-control-label" >Descrição:</label>
		            <textarea class="form-control" id="message-text" name="descCategoria" value="<?php echo $dados_categoria['descCategoria']; ?>"></textarea>
		          </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <input type="submit" class="btn btn-primary" value="Atualizar" name="btnEditar"></input>

		      </div>
		      </form>
		    </div>
		  </div>
		</div>

		<table>
			<tr>
				<td>ID</td>
				<td>Nome</td>
				<td>Descrição</td>
				<td>Editar</td>
				<td>Excluir</td>
			</tr>
			<?php
			foreach($categorias as $idCategoria => $dadosCategoria){
				
				echo "	<tr>
							<td>$idCategoria</td>
							<td>{$dadosCategoria['nomeCategoria']}</td>
							<td>{$dadosCategoria['descCategoria']}</td>
							<td><form method='POST'><input type='submit' class='btn btn-primary' data-toggle='modal' data-target='#EditarCategoria' data-whatever='@mdo' name='EditarCat' value='Editar'></input></form></td>
							<td><a href='?excluir=$idCategoria'>x</a></td>
						</tr>";
				
			}
			?>

		<?php
				if(isset($msg)) {
					echo "	<br><center><b><font color='green'>
							$msg</font></b></center><br>";
				}
				if(isset($erro)) {
					echo "	<br><center><b><font color='red'>
							$erro</font></b></center><br>";
				}
		?>
		</table>



<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>

<script>
$('#EditarCategoria').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</body>
</html>
		
		