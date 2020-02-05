<?php
    if($_SESSION['ulogin']){

    }
    else
    	exit();

	$server="localhost";
    $user="u0847564_default";
    $pass="********";
    $db="u0847564_textusers";

    $mysqli = new mysqli($server, $user, $pass, $db);
    $mysqli->set_charset("utf8");
    $id=$_SESSION['ulogin'];
    $text=$_POST['text'];

    if($_POST['type']=='new'){
    	$mysqli->query("INSERT INTO `u0847564_textusers`.`notes` (`id`, `userid`, `text`) VALUES (NULL, '$id', '$text')");
    }
    if($_POST['type']=='edit'){
    	$text_id=$_POST['id'];
    	$mysqli->real_query("SELECT * FROM `notes` WHERE `id` = '$text_id' AND `userid` = '$id'");
    	$res = $mysqli->use_result();
        $row = $res->fetch_assoc();
        print_r($row);
        if($row['id']){
    	    $mysqli = new mysqli($server, $user, $pass, $db);
    		$mysqli->set_charset("utf8");
        	$mysqli->real_query("UPDATE `u0847564_textusers`.`notes` SET `text` = '$text' WHERE `notes`.`id` = '$text_id'");
        }

    }
    echo $mysqli->error;




?>