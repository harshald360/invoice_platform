<script type="text/javascript">
	$(document).ready(function() {
		$.validator.addMethod("floatNumber", function(value, element) {
            return this.optional(element) || /^-?\d+(\.\d+)?$/.test(value);
        }, "Please enter a valid float number.");
	    // Define validation rules
	    const validationRules = {
	        product_category: {
	            required: true
	        },
	        product_brand: {
	            required: true
	        },
	        product_name: {
	            required: false
	        },
	        product_starting_price: {
	            required: false,
	            floatNumber: true,
	        },
	        product_icons: {
	            required: true
	        },
	    };

	    // Define validation messages
	    const validationMessages = {
	        product_category: {
	            required: "Please select an category or enter category name"
	        },
	         product_brand: {
	            required: "Please select an brand or enter brand name"
	        },
	        product_name: {
	            required: "Please enter product name"
	        },
	        product_starting_price: {
	            required: "Please enter product starting price",
	            floatNumber: "Please enter a valid float number",
	        },
	        product_icon: {
	            required: "Please select product icon"
	        }
	    };

	    // Initialize validation for both forms
	    $("#fAddProducts").validate({
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
