<?php
session_start();
include('../../db/bancodedados.php');

$id = $_POST['id'];
$login = $_POST['login'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$perfil = $_POST['tipo'];
$ativo = $_POST['ativo'];

echo "<script>
    if(confirm('Deseja alterar a categoria  $nome ?')){
		var alterar = true;
    }
</script>";

$alterar = "<script>document.write(alterar);</script>";

try {
	if ($alterar == true) {
        $instrucaoSQL = "UPDATE Usuario SET loginUsuario = ?, nomeUsuario = ?, senhaUsuario = ?, tipoPerfil = ?, usuarioAtivo = ? WHERE idUsuario = ?";
        $nome = utf8_decode($nome);
        $senha = utf8_decode($senha);
        $params = array($login, $nome, $senha, $perfil, $ativo, $id);
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);
        $rows_affected = sqlsrv_rows_affected($consulta);
		if($rows_affected > 0){
				$_SESSION['msg'] = 'Usuário alterado com sucesso';
				header('Location: /management-page-structure/user-management.php');	
			}else{
				$_SESSION['erro'] = 'Erro ao alterar o usuário';
				header('Location: /management-page-structure/user-management.php');
                die( print_r( sqlsrv_errors(), true));
			}
	}

} catch (Exception $e) {
    die($e);
	header('Location: /management-page-structure/user-management.php');
}
?>