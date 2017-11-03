<?php
include('../sidebar/sidebar.php');
?>

<div class="col-sm-9 col-sm-offset-1">
		<br> 
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
		<form method="post" action="?usuarios">
		
			Login: <input type="text" name="loginUsuario" value="<?php echo $dados_usuario['loginUsuario']; ?>"><br><br>
			Senha: <input type="password" name="senhaUsuario" value="<?php echo $dados_usuario['senhaUsuario']; ?>"><br><br>
			Nome: <input type="text" name="nomeUsuario" value="<?php echo $dados_usuario['nomeUsuario']; ?>"><br><br>
			Perfil: <select name="perfilUsuario">
						<option value="">Escolha</option>
						<option value="A" 
						<?php if($dados_usuario['tipoPerfil'] == 'A') echo "selected"; ?>>Administrador</option>
						<option value="C"
						<?php if($dados_usuario['tipoPerfil'] == 'C') echo "selected"; ?>>Colaborador</option>
					</select><br><br>
			Ativo: <input type="checkbox" name="usuarioAtivo" 
					<?php if($dados_usuario['usuarioAtivo'] == 1) echo "checked"; ?>><br><br>
			<input type="hidden" name="idUsuario" 
				value="<?php echo $dados_usuario['idUsuario']; ?>">		
			<input type="submit" value="Atualizar" name="btnAtualizar">
		
		</form>
                </div>
 </div>
 
 
</body>

</html>
