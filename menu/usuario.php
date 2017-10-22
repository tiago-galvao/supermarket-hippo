
<?php
include('../db/bancodedados.php');
include('../auth/controle.php');

//Funcionalidade Gravar Cadastro
if(isset($_POST['btnGravar'])){
	unset($_GET['cadastrar']);
	if(	!empty($_POST['loginUsuario']) &&
		!empty($_POST['nomeUsuario']) &&
		!empty($_POST['senhaUsuario'])){
		
		$_POST['usuarioAtivo'] = 
			isset($_POST['usuarioAtivo']) ? true : false;
		
		$stmt = odbc_prepare($db, "	INSERT INTO Usuario
									(loginUsuario,
									nomeUsuario,
									senhaUsuario,
									tipoPerfil,
									usuarioAtivo)
									VALUES
									(?,?,?,?,?)");
		if(odbc_execute($stmt, array(	$_POST['loginUsuario'],
										$_POST['nomeUsuario'],
										$_POST['senhaUsuario'],
										$_POST['perfilUsuario'],
										$_POST['usuarioAtivo'],))){
			$msg = 'Usuário gravado com sucesso!';			
		}else{
			$erro = 'Erro ao gravar o usuário';
		}								
							
	}else{
		
		$erro = 'Os campos: Login, Nome e Senha 
					são obrigatórios';
		
	}
}
//FIM Funcionalidade Gravar Cadastro

//Funcionalidade Listar
$q = odbc_exec($db, '	SELECT 	idUsuario, loginUsuario,
								nomeUsuario, tipoPerfil, 
								usuarioAtivo
						FROM 
								Usuario');

while($r = odbc_fetch_array($q)){
	
	$usuarios[$r['idUsuario']] = $r;
	
}
//FIM Funcionalidade Listar

if(isset($_GET['cadastrar'])){//FORM Cadastrar

	include('template_cadastrar.php');
	
}elseif(isset($_GET['editar'])){//FORM Editar

	if(is_numeric($_GET['editar'])){
		$q = odbc_exec($db, "	SELECT 	idUsuario, loginUsuario,
										nomeUsuario, tipoPerfil, 
										usuarioAtivo
								FROM Usuario 
								WHERE idUsuario = {$_GET['editar']}");
		$dados_usuario = odbc_fetch_array($q);
	}else{
		$erro = 'Código inválido';
	}

	include('template_editar.php');
	
}else{//FORM Listar

	include('template.php');
	
}
?>
