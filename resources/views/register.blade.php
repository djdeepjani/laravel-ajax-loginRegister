<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
</head>
<body>
	<p id="register-error"></p>
	<form action="{{route('register.store')}}" method="post" id="register">
		@csrf
		<label>Name</label>
		<input type="text" name="name" id="name">
		<br>
		<label>Email</label>
		<input type="email" name="email_id" id="email">
		<br>
		<label>Password</label>
		<input type="password" name="password" id="password">
		<button type="submit" id="submit-btn">Submit</button>
	</form>

	<!-- Javascript Requirements -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

	<!-- Laravel Javascript Validation -->
	<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

	{!! JsValidator::formRequest('App\Http\Requests\RegisterRequest') !!}

	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#register").validate({
				rules:{
					name:{
						required:true
					},
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
						if(data.success)
						{
						window.location.replace('http://localhost:8000/login');
						}
						else 
						{
							// window.location.reload();
						$("#register-error").html(data.error);
						}
						}
					});
				}
			});
		});
	</script> --}}
</body>
</html>