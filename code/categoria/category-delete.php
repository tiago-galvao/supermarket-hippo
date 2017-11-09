<?php

include('../../db/bancodedadosOdbc.php');

$id = $_POST['id'];
$nome = $_POST['nome'];

echo "<script>
    if(confirm('Deseja deletar a categoria  $nome ?')){
		var deletar = true;
    }
</script>";

$deletar = "<script>document.write(deletar);</script>";	

try {
	if ($deletar == 'true') {
		if(odbc_exec($db, "DELETE FROM Categoria WHERE idCategoria = {$id}")){
			echo "<script> console.log('EXECUTOU ');</script>";
				$msg = 'Usuário removido com sucesso';
				header('Location: /supermarket-hippo/');						
			}else{
				echo "<script> console.log('NAO EXECUTOU ');</script>";
				$erro = 'Erro ao excluir o usuário';

			}
			var_dump(odbc_error());
	}

} catch (Exception $e) {
    echo "<script> console.log('ERRO'); </script>";
    die($e);
}

?>