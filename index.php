<?php

if(isset($_GET['logout'])){
    session_start();
    session_destroy();
}

$login = isset($_POST['login']) ? $_POST['login'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;


if(!empty($login) && !empty($senha)){
    include('db/bancodedados.php');

    try {
        $instrucaoSQL = "SELECT idUsuario, nomeUsuario FROM Usuario WHERE loginUsuario = ? AND senhaUsuario = ?";
        $params = array($login, $senha);
        $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        $consulta = sqlsrv_query($conn, $instrucaoSQL, $params, $options);
        $numRegistros = sqlsrv_num_rows($consulta);

    } catch (Exception $e) {
        session_start();
        $_SESSION['erro'] = 'Erro inesperado';
    }

    if($numRegistros < 1){
        session_start();
        $_SESSION['erro'] = 'Usuário ou senha incorretos';
    }else{
        session_start();

        while ($usuario = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_NUMERIC)) {
            $_SESSION['idUsuario'] = $usuario[0];
            $_SESSION['nomeUsuario'] = $usuario[1];
        }


        header('Location: /management-page-structure/category-user-management.php');

    }
}

include('template.php');




?>