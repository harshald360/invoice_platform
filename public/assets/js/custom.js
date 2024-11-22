
$(document).ready(function () {

    $(".intOnly").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\d]+/g, '').substring(0, 10);
        }
    });
    $(".intWithSpaceOnly").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\d ]+/g, '');
        }
    });
    $(".intWithSpaceOnlySpecailChars").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\d -]+/g, '');
        }
    });
    $(".floatOnly").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\d.]+/g, '');
        }
    });
    $(".floatWithSpaceOnly").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\d. ]+/g, '');
        }
    });
    $(".stringOnly").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\a-zA-Z]+/g, '');
        }
    });
    $(".stringWithSpaceOnly").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\a-zA-Z ]+/g, '');
        }
    });
    $(".stringIntOnly").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\a-zA-Z0-9]+/g, '');
        }
    });
    $(".stringIntWithSpaceOnly").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\a-zA-Z0-9 ]+/g, '');
        }
    });

    $(".stringIntWithSpaceDashOnly").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\a-zA-Z0-9  -]+/g, '');
        }
    });

    $(".stringIntWithSpaceWithSpacialOnly").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\a-zA-Z0-9 .,-]+/g, '');
        }
    });
    $(".intWithDashb").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\d-]+/g, '');
        }
    });
    $(".websiteValid").keyup(function () {
        if (this.value.length > 0) {
            this.value = this.value.replace(/[^\a-zA-Z0-9 .,-]+/g, '');
        }
    });
});

// Extras custom validaiton 
 //For : input value must be in 1 to 100. Negative values not allowed and two dgitis after decimal point
 $(".ValidInputValue").keyup(function () {
    if (this.value.length > 0) {
        this.value = this.value.replace(/[^\d.]/g, '').replace(/^(-)/, '').substring(0, 10);
        let decimalIndex = this.value.indexOf('.');
        if (decimalIndex !== -1 && this.value.length - decimalIndex > 3) {
            this.value = this.value.substring(0, decimalIndex + 3); // Allow only 2 digits after decimal
        }
        let numValue = parseFloat(this.value);
        if (numValue < 1) {
            this.value = "1";
        } else if (numValue > 100) {
            this.value = "100";
        }
    }
});
// document.getElementById('phone-number').addEventListener('input', function (e) {
//     var input = e.target.value.replace(/\D/g, '');
//     var formatted = '';

//     if (input.length > 0) {
//         formatted += input.substring(0, 3);
//     }
//     if (input.length >= 4) {
//         formatted += '-' + input.substring(3, 6);
//     }
//     if (input.length >= 7) {
//         formatted += '-' + input.substring(6, 10);
//     }

//     e.target.value = formatted.substring(0, 12);
// });

// document.getElementById('phone-number').addEventListener('keypress', function (e) {
//     if (this.value.length >= 12 && e.key !== 'Backspace' && e.key !== 'Delete') {
//         e.preventDefault();
//     }
// });