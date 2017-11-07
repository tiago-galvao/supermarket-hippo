<?php

include('../../db/bancodedados.php');

if ($conn) {
    $instrucaoSQL = "SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria";
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $consulta = sqlsrv_query($conn, $instrucaoSQL, $options);
    $numRegistros = sqlsrv_num_rows($consulta);

    if ($numRegistros != 0) {
        $categorias = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_ASSOC);
        header('Location: http://servidor-php-nla.azurewebsites.net');
    } else {
        header('Location: http://servidor-php-nla.azurewebsites.net');
    }
}else{
    $msg = "Erro inesperado";
    header('Location: http://servidor-php-nla.azurewebsites.net');
}

?>