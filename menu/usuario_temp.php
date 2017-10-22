<html>
	<body>
		<a href="/menu">Voltar</a> 
		<b>Usuario</b> 
		Categoria 
		Produto 
		<a href="/?logout=1">Sair</a>
		<br><br>
		<a href="?cadastrar=1">+ Usuário</a>
		<br>
		<?php
		if(isset($msg))
			echo "	<br><center><b><font color='green'>
					$msg</font></b></center><br>";
		if(isset($erro))
			echo "	<br><center><b><font color='red'>
					$erro</font></b></center><br>";
		?>
		<br>
		<table>
			<tr>
				<td>ID</td>
				<td>Login</td>
				<td>Nome</td>
				<td>Perfil</td>
				<td>Ativo</td>
				<td>Editar</td>
				<td>Excluir</td>
			</tr>
			<?php
			foreach($usuarios as $idUsuario => $dadosUsuario){
				
				echo "	<tr>
							<td>$idUsuario</td>
							<td>{$dadosUsuario['loginUsuario']}</td>
							<td>{$dadosUsuario['nomeUsuario']}</td>
							<td>{$dadosUsuario['tipoPerfil']}</td>
							<td>{$dadosUsuario['usuarioAtivo']}</td>
							<td><a href='?editar=$idUsuario'>e</a></td>
							<td>x</td>
						</tr>";
				
			}
			?>
		</table>
	</body>
</html>
		
		