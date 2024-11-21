<script type="text/javascript">
	$(document).ready(function() {
	    // Define validation rules
	    const validationRules = {
	        user_role: {
	            required: true
	        },
	        user_name: {
	            required: true,
	            minlength: 3
	        },
	        user_email: {
	            required: true,
	            email: true
	        },
	        user_mobile: {
	            // required: true,
	            digits: true,
	            /*minlength: 10,
	            maxlength: 10*/
	        },
	        user_password: {
	            required: true,
	            minlength: 6
	        },
	        user_confirm_password: {
	            required: true,
	            equalTo: "input[name=user_password]"
	        }
	    };

	    // Define validation messages
	    const validationMessages = {
	        user_role: {
	            required: "Please select user roles"
	        },
	        user_name: {
	            required: "Please enter your name",
	            minlength: "Your name must consist of at least 3 characters"
	        },
	        user_email: {
	            required: "Please enter your email",
	            email: "Please enter a valid email address"
	        },
	        user_mobile: {
	            // required: "Please enter your mobile number",
	            digits: "Please enter only digits",
	            // minlength: "Your mobile number must be exactly 10 digits",
	            // maxlength: "Your mobile number must be exactly 10 digits"
	        },
	        user_password: {
	            required: "Please provide a password",
	            minlength: "Your password must be at least 6 characters long"
	        },
	        user_confirm_password: {
	            required: "Please confirm your password",
	            equalTo: "Passwords do not match"
	        }
	    };

	    // Initialize validation for both forms
	    $("#fUpdateUserProfile").validate({
	        rules: validationRules,
	        messages: validationMessages,
	        errorElement: 'span',
		    errorPlacement: function (error, element) {
		      	error.addClass('invalid-feedback');
		      	element.closest('.form-group').append(error);
		    },
		    highlight: function (element, errorClass, validClass) {
		      	$(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      	$(element).removeClass('is-invalid');
		    }
	    });

	    $("#fUpdateUserPassword").validate({
	        rules: validationRules,
	        messages: validationMessages,
	        errorElement: 'span',
		    errorPlacement: function (error, element) {
		      	error.addClass('invalid-feedback');
		      	element.closest('.form-group').append(error);
		    },
		    highlight: function (element, errorClass, validClass) {
		      	$(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      	$(element).removeClass('is-invalid');
		    }
	    });
	});
</script>
