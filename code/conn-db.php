<?php

    $db_host = "servidor-nla-senac-db.database.windows.net";
    $db_name = "DB-NLA-Senac";
    $db_user = "rootMaster";
    $db_pass = "NLA123@V1";
    $dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";

    if (!$db = odbc_connect($dsn, $db_user, $db_pass)) {
        echo 'Erro ao conctar ao banco de dados';
    }
?>