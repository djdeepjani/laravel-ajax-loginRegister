<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<p id="login-error"></p>
	<form action="{{route('login.attemptlogin')}}" method="post" id="login">
		@csrf
		<label>Email</label>
		<input type="email" name="email" id="email">
		<br>
		<label>Password</label>
		<input type="password" name="password" id="password">
		<button type="submit" id="submit-btn">Submit</button>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#login").validate({
				rules:{
					email:{
						required:true
					},
					password:{
						required:true
					}
				},
				onkeyup: false,
		       	onfocusout: false,
		       	onsubmit: true,
			       highlight: function (element, errorClass, validClass) 
			       {
			         $(element).parents('.form-control').removeClass('has-success').addClass('has-error');
			       },
			       unhighlight: function (element, errorClass, validClass) 
			       {
			         $(element).parents('.form-control').removeClass('has-error').addClass('has-success');
			       },
			       errorPlacement: function (error, element) 
			       {
			           if(element.hasClass('select2') && element.next('.select2-container').length) 
			           {
			             error.insertAfter(element.next('.select2-container'));
			           } 
			           else if (element.parent('.input-group').length) 
			           {
			               error.insertAfter(element.parent());
			           }
			           else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) 
			           {
			               error.insertAfter(element.parent().parent());
			           }
			           else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') 
			           {
			               error.appendTo(element.parent().parent());
			           }
			         else 
			         {
			               error.insertAfter(element);
			           }
			       },
			       submitHandler: function(form) { 
			            $.ajax({
			             type: "POST",
			             url: $(form).attr("action"),
			             data: $(form).serialize(),
			             dataType:"json",
			             // dataType: "html",
			             success: function(data) {
			               if(data == 'success')
			               {
			               	window.location.replace('http://localhost:8000/dashboard');
			               }
			               else 
			               {
			                 // window.location.reload();
			                $("#login-error").html(data.error);
			               }
			             }
			           });
			        }
			});
		});
	</script>
</body>
</html>