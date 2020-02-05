<?php
    unset($_SESSION["code"]);
        unset($_SESSION["email"]);
    unset($_SESSION["pass"]);

    print_head('guest/helloguest.css','guest/mhelloguest.css','вход');
?> 
<div id="about">
    textnote.ru.com-сайт для надёжного хранения данных
</div>
<div class="window">
    <div id="login">вход</div>
    <input type="email" name="" id="mail" placeholder="email" oninput="onim()">
    <input type="password" id="pass" placeholder="password" oninput="onim()">
    <input type="text" id="code" placeholder="введите код из сообщения (папка спама)" value="">
    <div class="loginbut" id="mlogin" onclick="login()" oninput="">войти</div>
    <div class="loginbut" onclick="register()" id="regis">регистрация</div>
</div>
<style>

</style>
<script type="text/javascript">
    function onim(){
        $(".window>input").css("border","1px solid black");
        console.log("qwe");
    }
    $("#code").css("border","10px solid black");
</script>
<?php
    print_bottom('guest/helloguest.js','guest/mhelloguest.js');
?> 