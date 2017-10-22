
<?php
include('../db/bancodedados.php');
include('../auth/controle.php');

//Funcionalidade Gravar Cadastro
if(isset($_POST['btnGravar'])){
	unset($_GET['cadastrar']);
	if(	!empty($_POST['loginUsuario']) &&
		!empty($_POST['nomeUsuario']) &&
		!empty($_POST['senhaUsuario'])) {
		
		$_POST['usuarioAtivo'] = isset($_POST['usuarioAtivo']) ? true : false;
		
		$stmt = odbc_prepare($db, "	INSERT INTO Usuario (loginUsuario, nomeUsuario, senhaUsuario, tipoPerfil, usuarioAtivo) VALUES (?,?,?,?,?)");

		if(odbc_execute($stmt, array($_POST['loginUsuario'], $_POST['nomeUsuario'], $_POST['senhaUsuario'], $_POST['perfilUsuario'], $_POST['usuarioAtivo'],))){
			$msg = 'Usuário gravado com sucesso!';	

		} else {
			$erro = 'Erro ao gravar o usuário';
		}								
							
	} else {
		
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


//Funcionalidades Categorias 

//Cadastrar Nova Categoria
if(isset($_POST['btnAdd'])){
	if(	!empty($_POST['nomeCategoria']) &&
		!empty($_POST['descCategoria'])) {
				
		$stmt = odbc_prepare($db, "	INSERT INTO Categoria (nomeCategoria, descCategoria) VALUES (?,?)");

		if(odbc_execute($stmt, array($_POST['nomeCategoria'], $_POST['descCategoria']))){
			$msg = 'Categoria gravada com sucesso!';	

		} else {
			$erro = 'Erro ao gravar ao gravar Categoria';
		}								
							
	} else {
		
		$erro = 'Os campos: Nome e Descrição são obrigatórios';
		
	}
}
// FIM Cadastrar

//Listando Categoria
$c = odbc_exec($db, 'SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria');

while($rc = odbc_fetch_array($c)){
	
	$categorias[$rc['idCategoria']] = $rc;
	
}

//FIM Listar

//Editar Categorias
//FIM Editar

//Excluir Categoria
if(isset($_GET['excluir'])){
	header('Location: ?categorias=2');

	if(is_numeric($_GET['excluir'])){
		
		if(odbc_exec($db, "	DELETE FROM 
								Categoria 
							WHERE
								idCategoria = {$_GET['excluir']}")){
			$msg = 'Usuário removido com sucesso';						
		}else{
			$erro = 'Erro ao excluir o usuário';
		}
		
	}else{
		$erro = 'Código inválido';
	}
}
//FIM Excluir


//FIM Funcionalidades Categorias
if(isset($_GET['cadastrar'])){//FORM Cadastrar

	include('template_cadastrar.php');
	
} elseif(isset($_GET['editar'])){//FORM Editar

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
	
} elseif(isset($_POST['EditarCat'])){//FORM Editar

	if(is_numeric($_POST['EditarCat'])){
		$c = odbc_exec($db, "SELECT nomeCategoria, descCategoria FROM Categoria ");
		$dados_categoria = odbc_fetch_array($c);
	} else{
		$erro = 'Código inválido';
	}

} elseif (isset($_GET['categorias'])) {

	include('template_categoria.php');

} else {//FORM Listar

	include('template.php');
	
}
?>
