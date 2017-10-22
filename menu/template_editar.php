<html>
	<body>
		<a href="/menu">Voltar</a> 
		<b>Usuario</b> 
		Categoria 
		Produto 
		<a href="/?logout=1">Sair</a>
		<br><br>
		
		<form method="post">
		
			Login: <input type="text" 
					name="loginUsuario"
					value="<?php echo $dados_usuario['loginUsuario']; ?>"><br><br>
			Senha: <input type="password" name="senhaUsuario"><br><br>
			Nome: <input type="text" 
					name="nomeUsuario"
					value="<?php echo $dados_usuario['nomeUsuario']; ?>"><br><br>
			Perfil: <select name="perfilUsuario">
						<option value="">Escolha</option>
						<option value="A" 
						<?php if($dados_usuario['tipoPerfil'] == 'A') echo "selected"; ?>>Administrador</option>
						<option value="C"
						<?php if($dados_usuario['tipoPerfil'] == 'C') echo "selected"; ?>>Colaborador</option>
					</select><br><br>
			Ativo: <input type="checkbox" name="usuarioAtivo" 
					<?php if($dados_usuario['usuarioAtivo'] == 1) echo "checked"; ?>><br><br>
			<input type="submit" value="Atualizar" name="btnAtualizar">
		
		</form>
		
	</body>
</html>