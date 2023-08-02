 $(document).ready(function(){
    $("#form1").validate({
						rules: {
						txtrespuesta1: {required: true},
						txtrespuesta2:{required: true},
						txtrespuesta3:{required: true},
						txtrespuesta4:{required: true}						
					},
						messages: {
						txtrespuesta1: "",
						txtrespuesta2: "",
					    txtrespuesta3: "",
					    txtrespuesta4: ""
					},
						debug: true,
	   submitHandler: function(form){
		   form.submit();
       }
});
});