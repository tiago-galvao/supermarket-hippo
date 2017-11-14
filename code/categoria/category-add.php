<?php
include('../../db/bancodedados.php');

$nome = $_POST['nomeCategoria'];
$desc = $_POST['descCategoria'];
$btn = $_POST['btnAdd'];

//Cadastrar Nova Categoria
try { 
	if(isset($btn)){
		if(!empty($nome) &&	!empty($desc)) {
			
			$instrucaoSQL = "INSERT INTO Categoria (nomeCategoria, descCategoria) VALUES (?,?)";
			$params = array($nome, $desc);
			$nome = utf8_decode($nome);
            $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);
       	    $rows_affected = sqlsrv_rows_affected($consulta);

            if($rows_affected > 0){
                $msg = 'Categoria deletada com sucesso';
                header('Location: /management-page-structure/category-user-management.php');
            }else{
                $erro = 'Erro ao deletar o usuário';
                die( print_r( sqlsrv_errors(), true));
            }
    							
	   }
    }
} catch (Exception $e) {
    echo "<script> console.log('ERRO'); </script>";
    die($e);
}


?>

