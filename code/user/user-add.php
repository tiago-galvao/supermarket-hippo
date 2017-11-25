<?php
session_start();
include('../../db/bancodedados.php');

$login = $_POST['loginUsuario'];
$nome = $_POST['nomeUsuario'];
$senha = $_POST['senhaUsuario'];
$ativo = $_POST['usuarioAtivo'];
$perfil = $_POST['perfilUsuario'];

//Cadastrar Nova Categoria
try { 
	if($login){
		if(	!empty($login) &&
			!empty($nome) &&
			!empty($senha)) {
            
			$instrucaoSQL = "INSERT INTO Usuario (loginUsuario, nomeUsuario, senhaUsuario, tipoPerfil, usuarioAtivo) VALUES (?,?,?,?,?)";
            $nome = utf8_decode($nome);
            $senha = utf8_decode($senha);
			$params = array($login, $nome, $senha, $perfil, $ativo);
            $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);
       	    $rows_affected = sqlsrv_rows_affected($consulta);			
			$ativo = isset($ativo) ? true : false;
        
            if($rows_affected > 0){
                $_SESSION['msg'] = 'Usuário adicionado com sucesso';
                header('Location: /management-page-structure/user-management.php');
            }else{
                $_SESSION['erro'] = 'Erro ao deletar o usuário';
                die( print_r( sqlsrv_errors(), true));
            }	
								
		} else {
			
			$erro = 'Os campos: Login, Nome e Senha 
						são obrigatórios';
			
		}
	}
} catch (Exception $e) {
    echo "<script> console.log('ERRO'); </script>";
    die($e);
}


?>

