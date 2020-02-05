<?php
    setcookie("email", "",time()-100);
    setcookie("pass", "",time()-100);
    unset($_SESSION["ulogin"]);

?>
<script type="text/javascript">
	setTimeout(function(){window.location.href='/home'},500);
</script>