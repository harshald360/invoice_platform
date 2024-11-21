<script type="text/javascript">
    $(document).ready(function() {
        // Define validation rules
        const validationRules = {
            company_name: {
                required: true
            },
            address: {
                required: true,
                maxlength: 100
            },
            company_gstin: {
                required: true,
                minlength: 15,
                maxlength: 15
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
            zipcode: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 6
            },

        };

        // Define validation messages
        const validationMessages = {
            company_name: {
                required: "Please enter company name"
            },
            address: {
                required: "Please enter address",
                maxlength: "Maximum 100 characters are allowed"
            },
            company_gstin: {
                required: "Please enter GSTIN",
                minlength: "GSTIN must be 15 characters",
                maxlength: "GSTIN must be 15 characters",
            },
            city: {
                required: "Please enter city"
            },
            state: {
                required: "Please enter state"
            },
            zipcode: {
                required: "Please enter zipcode",
                digits: "Please enter only digits",
                minlength: "Zipcode must be 6 digits",
                maxlength: "Zipcode must be 6 digits",
            },
        };

        // Initialize validation for both forms
        $("#fCompanyDetails").validate({
            rules: validationRules,
            messages: validationMessages,
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>