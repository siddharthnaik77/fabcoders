var loginForm = $("#loginForm");
	
var validator = loginForm.validate({
	
	rules:{
		username :{ required : true },
		password :{ required : true },
	},
	messages:{
		username :{ required : "The Username/Email field is required" },
		password : { required : "The Password field is required" }
	}
	
});



var signupForm = $("#signupForm");
	
var validator = signupForm.validate({
	
	rules:{
		username :{ required : true },
		email :{ required : true,email : true, },
		fullname : { required : true },
		password : { required : true, minlength:6,
  				maxlength:10 }, 
	},
	messages:{
		username :{ required : "The Username/Email field is required" },
		email : { required : "The Email field is required",
					email : "The Email field should be valid"
	 			},
		fullname : { required : "The fullname field is required"},
		password : { required : "The Password field is required",
					 minlength : "The Password should be atlest 6 characters length",
					maxlength: "The Password should be 10 characters length only"				 
		 			}
	}
	
});

