<?php
include('../sidebar/sidebar.php');
?>

<div class="col-sm-9 col-sm-offset-1">
		
		<br>
		
		<table class="table table-striped">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
			<?php
			foreach($categorias as $idCategoria => $dadosCategoria){
				
				echo "	<tr>
							<td>$idCategoria</td>
							<td>{$dadosCategoria['nomeCategoria']}</td>
							<td>{$dadosCategoria['descCategoria']}</td>
							<td><a href='?editarCategoria=$idCategoria'><img src='../img/pencil.png'/></a></td>
							<td><a href='?excluir=$idCategoria'><img src='../img/delete.png'/></a></td>
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

               </div>
 </div>
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
