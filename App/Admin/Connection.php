<?php
	try{
        $db = new PDO('mysql:host=localhost;dbname=edokio1;charset=utf8','root','');
        // var_dump($db);
    }

    catch(Exception $e){
        echo $e->getMessage();
    }
?>