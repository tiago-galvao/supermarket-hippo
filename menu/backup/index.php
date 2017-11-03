<?php header("Content-type: text/html; charset=utf-8"); ?>

<?php
include('../db/bancodedados.php');
include('../auth/controle.php');

//Funcionalidade Listar
$q = odbc_exec($db, '	SELECT 	idUsuario, loginUsuario,
								nomeUsuario, tipoPerfil, 
								usuarioAtivo
						FROM 
								Usuario');

while($r = odbc_fetch_array($q)){
	
	$usuarios[$r['idUsuario']] = $r;
	
}

//Funcionalidade Gravar Cadastro
if(isset($_POST['btnGravar'])){
	unset($_GET['cadastrar']);
	if(	!empty($_POST['loginUsuario']) &&
		!empty($_POST['nomeUsuario']) &&
		!empty($_POST['senhaUsuario'])) {
		
		$_POST['usuarioAtivo'] = isset($_POST['usuarioAtivo']) ? true : false;

		$_POST['nomeUsuario'] = utf8_decode($_POST['nomeUsuario']);
		
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


//Funcionalidade Editar Cadastro
if(isset($_POST['btnAtualizar'])){
	unset($_GET['editar']);
	if(	!empty($_POST['loginUsuario']) &&
		!empty($_POST['nomeUsuario']) &&
		!empty($_POST['senhaUsuario'])){
		
		$_POST['usuarioAtivo'] = 
			isset($_POST['usuarioAtivo']) ? true : false;
		
		$stmt = odbc_prepare($db, "	UPDATE 
										Usuario
									SET 
										loginUsuario = ?,
										nomeUsuario = ?,
										senhaUsuario = ?,
										tipoPerfil = ?,
										usuarioAtivo = ?
									WHERE
										idUsuario = ?");
									
		if(odbc_execute($stmt, array(	$_POST['loginUsuario'],
										$_POST['nomeUsuario'],
										$_POST['senhaUsuario'],
										$_POST['perfilUsuario'],
										$_POST['usuarioAtivo'],
										$_POST['idUsuario']))){
			$msg = 'Usuário atualizado com sucesso!';			
		}else{
			$erro = 'Erro ao atualizar o usuário';
		}								
							
	}else{
		
		$erro = 'Os campos: Login, Nome e Senha 
					são obrigatórios';
		
	}
}


//Exclui Usuario 

if(isset($_GET['excluir'])){

	if(is_numeric($_GET['excluir'])){
		
		if(odbc_exec($db, "	DELETE FROM 
								Usuario 
							WHERE
								idUsuario = {$_GET['excluir']}")){
			$msg = 'Usuário removido com sucesso';						
		}else{
			$erro = 'Erro ao excluir o usuário';
		}
		
	}else{
		$erro = 'Código inválido';
	}
}


//Funcionalidades Categorias 

//Listando Categoria
$c = odbc_exec($db, 'SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria');

while($rc = odbc_fetch_array($c)){
	
	$rc['nomeCategoria'] = utf8_encode($rc['nomeCategoria']);

	$categorias[$rc['idCategoria']] = $rc;

	
}

//Cadastrar Nova Categoria
if(isset($_POST['btnAdd'])){
	if(	!empty($_POST['nomeCategoria']) &&
		!empty($_POST['descCategoria'])) {

		$_POST['nomeCategoria'] = utf8_decode($_POST['nomeCategoria']);
				
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

//Funcionalidade Editar Cadastro
if(isset($_POST['btnAtualizar'])){
		unset($_GET['editarCategoria']);
		if(	!empty($_POST['nomeCategoria']) ){
						
			$_POST['nomeCategoria'] = utf8_decode($_POST['nomeCategoria']);
			$_POST['descCategoria'] = utf8_decode($_POST['descCategoria']);
			$stmt = odbc_prepare($db, "	UPDATE 
											Categoria
										SET 
											nomeCategoria = ?,
											descCategoria = ?
										WHERE
											idCategoria = ?");
										
			if(odbc_execute($stmt, array(	$_POST['nomeCategoria'],
											$_POST['descCategoria'],
											$_POST['idCategoria']))){
				$msg = 'Categoria atualizada com sucesso!';			
			}else{
				$erro = 'Erro ao atualizar a categoria';
			}
} else{
		
			$erro = 'Erro ao atualizar a categoria';
		
		}
	}


//Excluir Categoria
if(isset($_GET['excluir'])){

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

//Exibir produtos chave estrangeira

$p = odbc_exec($db, 'SELECT p.idProduto, p.nomeProduto, p.descProduto, p.precProduto, p.descontoPromocao, p.idCategoria, p.ativoProduto, p.idUsuario, p.qtdMinEstoque, p.imagem FROM Produto as p, Categoria as c WHERE c.idCategoria = p.idCategoria');

while($rp = odbc_fetch_array($p)){

	$rp['nomeProduto'] = utf8_encode($rp['nomeProduto']);
	$rp['descProduto'] = utf8_encode($rp['descProduto']);
	$produtos[$rp['idProduto']] = $rp;

}

//

if(isset($_GET['cadastrar'])){//FORM Cadastrar

	include('usuarios/template_cadastrar.php');
	
} elseif(isset($_GET['editar'])){//FORM Editar

	if(is_numeric($_GET['editar'])){
		$q = odbc_exec($db, "	SELECT 	idUsuario, loginUsuario, senhaUsuario, nomeUsuario, tipoPerfil, usuarioAtivo
								FROM Usuario 
								WHERE idUsuario = {$_GET['editar']}");
		$dados_usuario = odbc_fetch_array($q);

	}else{
		$erro = 'Código inválido';
	}

	include('usuarios/template_editar.php');
	
} elseif (isset($_GET['editarCategoria'])) {

	if(is_numeric($_GET['editarCategoria'])){
		$c = odbc_exec($db, "	SELECT 	idCategoria, nomeCategoria, descCategoria
								FROM Categoria 
								WHERE idCategoria = {$_GET['editarCategoria']}");
		$dados_categoria = odbc_fetch_array($c);
	} else {
		$erro = 'Código inválido';
	}

	include('categorias/template_editarCategoria.php');

} elseif (isset($_GET['categorias'])) {

	include('categorias/template_categoria.php');

} elseif (isset($_GET['categoria'])) {

	include('categorias/template_produto.php');

} elseif (isset($_GET['usuarios'])){
	
	include('usuarios/template_usuario.php');

} else {//FORM Listar

	include('template.php');
	
}
?>
