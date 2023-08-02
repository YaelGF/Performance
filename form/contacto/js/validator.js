$(document).ready(function()
{
 	//begin validator defaul
    $("#form1").validate({
						rules: {
						nombre: {required: true},
						correo:{required: true},
						telefono:{required: true,number: true},
						empresa:{required: true},
						mensaje:{required: true},
						captcha:{required: true}
					},
						messages: {
						nombre: "Nombre Completo requerido",
						correo: "Correo requerido o invalido",							
						telefono:"Número de Teléfono requerido",
						empresa:"Nombre de la Empresa requerida",
						mensaje:"Comentario requerido",			
						captcha:"Ingresa el código de seguridad",										
					},
						debug: true,
	   submitHandler: function(form)
	   {
		   form.submit();
       }
	});

	function removeRules()
	{	
	  $("#tele").rules("remove", "required");
	}
	
	function addRule()
	{
		$("#tele").rules("add","required");
	}
});