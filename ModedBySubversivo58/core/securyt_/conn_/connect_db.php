<?php
 /* Connect to an ODBC database using driver invocation */
    $dsn = 'mysql:dbname=chat;host=127.0.0.1;charset=utf8';
    $user = 'root';
    $password = '0000';

    try{
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC );
        $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );
        $pdo->setAttribute( PDO::ATTR_AUTOCOMMIT, true );
        $pdo->setAttribute( PDO::ATTR_TIMEOUT, 5 );
    }catch(PDOException $e){
        echo 'Connection failed:'.$e->getMessage();
    }

?>