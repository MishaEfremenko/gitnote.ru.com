 <?php 
 	print_head('user/neworedit.css','user/mneworedit.css','изменить');
 		$server="localhost";
        $user="u0847564_default";
        $pass="********";
        $db="u0847564_textusers";

        $mysqli = new mysqli($server, $user, $pass, $db);
        $mysqli->set_charset("utf8");
        $id=$_SESSION['ulogin'];
        $noteid=$_GET['p'];
        $mysqli->real_query("SELECT * FROM `notes` WHERE `id` = '$noteid' AND `userid` = '$id'");
        $res = $mysqli->use_result();
        $row = $res->fetch_assoc();

        if ($_GET['type']=='edit'){
        	if (!$row['id'])
        		exit('у вас нет доступа к этой странице');
        }
        elseif($_GET['type']=='new'){

        }
        else
        	  exit('у вас нет доступа к этой странице');
      ?>

 <div>
	<textarea rows="5" maxlength="255" value="none">
		asdasd
	</textarea>
	<div id="but" onclick="edittext('<?php echo $_GET['type']?>','<?php if($row['id']) echo$row['id'];else echo's'?>')">
		сохранить
	</div>
 </div>
 <style type="text/css">
 	
 </style>

  <script type="text/javascript">
 	$("body").css("height",function(){return window.innerHeight+"px"});
$("body").css("font-size",function(){return window.innerHeight/30+"px"});

function edittext(par,id){
let dada = (par=='new') ? 'text='+$('textarea').val()+"&type=new" : 'text='+$('textarea').val()+"&type=edit"+"&id="+id;
console.log(par);
console.log(dada);
$.ajax({
    url:'/new',
    type: 'POST',
    data: dada,
    cache: false,
    success:function(result){
        console.log(result);
        setTimeout(function(){window.location.href='/home'},500);
    }
})
}

	 </script>
 <?php
 echo '<script>$("textarea").val("'.$row['text'].'");</script>';
    print_bottom('neworedit.js','neworedit.js');
?> 