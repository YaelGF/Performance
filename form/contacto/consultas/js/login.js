$(document).ready(function(){
	$("#errorMsg").hide();
	$("#btnLogin").click(function(){
		var usu = $("#txtuser").val();
		var pass = $("#txtpassword").val();
		$.post("login.php",{ usu : usu, pass : pass},function(respuesta){
			if (respuesta == true) {
        		$.mobile.changePage($(document.location.href="main.php"), 'fade');
        	}
        	else{
        		$.mobile.changePage('#pageError', 'pop', true, true);
        		/*$("#errorMsg").fadeIn(300);
        		$("#errorMsg").css("display", "block");*/
        	}
		});
    });
	$("#btnSalir").click(function(){
		$.mobile.changePage($(document.location.href="logout.php"), 'fade');
    });
});