<html>
	<body>
		<a href="/menu">Voltar</a> 
		<b>Usuario</b> 
		Categoria 
		Produto 
		<a href="/?logout=1">Sair</a>
		<br><br>
		
		<form method="post">
		
			Login: <input type="text" name="loginUsuario"><br><br>
			Senha: <input type="password" name="senhaUsuario"><br><br>
			Nome: <input type="text" name="nomeUsuario"><br><br>
			Perfil: <select name="perfilUsuario">
						<option value="">Escolha</option>
						<option value="A">Administrador</option>
						<option value="C">Colaborador</option>
					</select><br><br>
			Ativo: <input type="checkbox" name="usuarioAtivo"><br><br>
			<input type="submit" value="Gravar" name="btnGravar">
		
		</form>
		
	</body>
</html>