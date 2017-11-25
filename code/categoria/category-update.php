<?php
session_start();
include('../../db/bancodedados.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$desc = $_POST['desc'];

try {
        $instrucaoSQL = "UPDATE Categoria SET nomeCategoria = ?, descCategoria = ? WHERE idCategoria = ?";
        $nome = utf8_decode($nome);
        $desc = utf8_decode($desc);
        $params = array( $nome, $desc, $id );
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);
        $rows_affected = sqlsrv_rows_affected($consulta);

		if($rows_affected > 0){
				$_SESSION['msg'] = 'Categoria alterada com sucesso';	
				header('Location: /management-page-structure/category-user-management.php');
		}else{
				$_SESSION['erro'] = 'Erro ao alterar a categoria';
				header('Location: /management-page-structure/category-user-management.php');
		}

} catch (Exception $e) {
    $_SESSION['erro'] = 'Erro ao alterar a categoria';
	header('Location: /management-page-structure/category-user-management.php');
}
?>