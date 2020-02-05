$("body").css("height",function(){return window.innerHeight+"px"});
$(document).ready(function(){
    $("#code").hide();
});



function login(){
    if(($('#mail').val()!="")||($('#pass').val()!="")){
        let dada='form_f=2&pass='+$('#pass').val()+"&email="+$('#mail').val();
        $.ajax({
            url:'/reglog',
            type: 'POST',
            data: dada,
            cache: false,
            success:function(result){
                if (result=="ok"){// пользователь зарегистрировался
                    window.location.href='/home';
                }

                if(!result)
                    console.log("null");
                else{
                    console.log(result);
                    setTimeout(function(){window.location.href='/home'},1000);
                }
            }
        })
    }
    else{
        $(".window>input").css("border","1px solid red");
    }
}
function register(){
    if(($('#mail').val()!="")||($('#pass').val()!="")||(($('#code').val()!=""))){
        let dada;
        if($('#pass').val()=="")
            dada='form_f=1&pass='+$('#pass').val()+"&email="+$('#mail').val();
        else
            dada='form_f=1&pass='+$('#pass').val()+"&email="+$('#mail').val()+"&code="+$('#code').val();

        $.ajax({
            url:'/reglog',
            type: 'POST',
            data: dada,
            cache: false,
            success:function(result){
                if (result=="code"){// пользователю высветился код
                    $("#code").show();
                    $("#mlogin").hide();
                }
                if (result=="ok"){// пользователь зарегистрировался
                    setTimeout(function(){window.location.href='/home'},1000);
                }
            }
        })
    }
        else{
        $(".window>input").css("border","1px solid red");
    }

}