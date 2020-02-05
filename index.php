<?php
    session_start();
    if ($_SERVER["REDIRECT_URL"]=='/')
        $page="home";
    else{
    $page=(substr($_SERVER["REDIRECT_URL"],1));
    if(!preg_match('/^[A-z0-9]{3,15}$/',$page)) 
        exit('error in url');
    }
    function isMobile() { 

    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
    // setcookie("email", "",time()-100);
    // setcookie("pass", "",time()-100);
    // unset($_SESSION["ulogin"]);

    if (($_COOKIE['email']!="")&&$_COOKIE['pass']!=""){
        if($_SESSION['ulogin']){
            if (file_exists("user/".$page.".php"))
                include "user/".$page.".php"; 
            else
                exit("error in URL");
        }
        elseif (checkid($_COOKIE['email'],$_COOKIE['pass'])!=null){
            if (file_exists("user/".$page.".php"))
                include "user/".$page.".php"; 
            else
                exit("error in URL");
        }
        else
            exit("error in URL");
    }
    elseif (file_exists("guest/".$page.".php"))
        include "guest/".$page.".php";
    else
        exit("error in URL");

    function checkid($email,$pass1)
    {
        $server="localhost";
        $user="u0847564_default";
        $pass="*******";
        $db="u0847564_textusers";

    
        $mysqli = new mysqli($server, $user, $pass, $db);
        $mysqli->real_query("SELECT id FROM `users` WHERE `email` LIKE '$email' AND `pass` LIKE '$pass1'");
		$res = $mysqli->use_result();
        $row = $res->fetch_assoc();
		if($row['id']){
            $_SESSION['ulogin']=$row['id'];
            return $row['id'];
        }
        else
            return null;
    }
    
    function print_head($css_file1,$css_file2,$header){
        if (isMobile()){
        echo'<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="'.$css_file2.'">
            <title>'.$header.'</title>
            <script src="/jqe.js"></script>
            <link rel="shortcut icon" href="icon.ico" type="image">
        </head>
        <body>';
    }
        else
        {
        echo'<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="'.$css_file1.'">
            <title>'.$header.'</title>
            <script src="/jqe.js"></script>
        </head>
        <body>';
    }
    }
    function print_bottom($jsfile1,$jsfile2){
        if (isMobile())
        {
            echo'</body>
            <script src="'.$jsfile2.'"></script>
            </html>';
        }
        else
        {
            echo'</body>
            <script src="'.$jsfile1.'"></script>
            </html>';
    }
    }
?>