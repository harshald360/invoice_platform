<script type="text/javascript">
	$(document).ready(function() {
		$.validator.addMethod("floatNumber", function(value, element) {
            return this.optional(element) || /^-?\d+(\.\d+)?$/.test(value);
        }, "Please enter a valid float number.");
	    // Define validation rules
	    const validationRules = {
	        max_accetpted_month: {
	            required: true
	        },
	        min_acceepted_msrp: {
	            required: true,
	            floatNumber: true,
	        },
	        expiry_reminder: {
	            required: true,	        
	        }
	    };

	    // Define validation messages
	    const validationMessages = {
	        max_accetpted_month: {
	            required: "Please enter the days where we can accept."
	        },
	        min_acceepted_msrp: {
	            required: "Please enter Minimum MSRP",
	            floatNumber: "Please enter a valid MSRP",
	        },
	        expiry_reminder: {
	            required: "Enter the number of days until warranty expiration"
	        },
	    };

	    // Initialize validation for both forms
	    $("#fAddConfiguration").validate({
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
