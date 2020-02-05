<?php
	print_head('user/myconsole.css','user/mmyconsole.css','панель управления');
	    $server="localhost";
        $user="u0847564_default";
        $pass="*******";
        $db="u0847564_textusers";

        $mysqli = new mysqli($server, $user, $pass, $db);
        $mysqli->set_charset("utf8");
        $id=$_SESSION['ulogin'];
        $mysqli->real_query("SELECT * FROM `notes` WHERE `userid` = '$id'");

?>

<div id="left">
	<a href="/edit?type=new">создать новую заметку</a>
	<a href="/logout">выйти из учетной записи</a>
</div>
<div id="right">
<?php
    $res = $mysqli->use_result();
	while ($row = $res->fetch_assoc())
		echo "
		<div>
			<div class='text'>
					".$row['text']."
			</div>
		<a class='but' href='/edit?p=".$row['id']."&type=edit'>
			изменить
		</a>
		</div>"
?>
</div>

<style type="text/css">
</style>
<script type="text/javascript">
// if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
// 	console.log("MOBILE");
//   } else {
//     console.log("PC");
// }

	$("body").css("height",function(){return window.innerHeight+"px"});
	$("body").css("font-size",function(){return window.innerHeight/30+"px"});

	$(document).ready(function(){
    $("#code").hide();
    $("#right").css("height",function(){return window.innerHeight+"px"});
});
</script>
<?php
    print_bottom('user/myconsole.js','user/myconsole.js');
?> 