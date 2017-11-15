<?php

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
        $params = array($login, $nome, $senha, $perfil, $ativo, $id);
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params);
        $rows_affected = sqlsrv_rows_affected($consulta);
		if($rows_affected > 0){
				$msg = 'Usuário alterado com sucesso';
				echo "<script> window.location.href = '/management-page-structure/user-management.php' </script>";	
			}else{
				echo "<script> console.log('NAO EXECUTOU ');</script>";
				$erro = 'Erro ao alterar o usuário';
                die( print_r( sqlsrv_errors(), true));
			}
	}

} catch (Exception $e) {
    echo "<script> console.log('ERRO'); </script>";
    die($e);
}
?>