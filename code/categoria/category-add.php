<?php
session_start();
include('../../db/bancodedados.php');

$nome = $_POST['nomeCategoria'];
$desc = $_POST['descCategoria'];
$btn = $_POST['btnAdd'];

//Cadastrar Nova Categoria
try { 
	if(isset($btn)){
		if(!empty($nome) &&	!empty($desc)) {
			
			$instrucaoSQL = "INSERT INTO Categoria (nomeCategoria, descCategoria) VALUES (?,?)";
            $nome = utf8_decode($nome);
            $desc = utf8_decode($desc);
			$params = array($nome, $desc);
            $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);
       	    $rows_affected = sqlsrv_rows_affected($consulta);

            if($rows_affected > 0){
                $_SESSION['msg'] = 'Categoria adicionada com sucesso';
                header('Location: /management-page-structure/category-user-management.php');
            }else{
                $_SESSION['erro'] = 'Erro ao adicionar a categoria';
                header('Location: /management-page-structure/category-user-management.php');
            }
    							
	   }
    }
} catch (Exception $e) {
    $_SESSION['erro'] = 'Erro ao criar uma categoria';
    header('Location: /management-page-structure/category-user-management.php');
}


?>

