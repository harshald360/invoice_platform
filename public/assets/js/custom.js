
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
document.getElementById('phone-number').addEventListener('input', function (e) {
    var input = e.target.value.replace(/\D/g, '');
    var formatted = '';

    if (input.length > 0) {
        formatted += input.substring(0, 3);
    }
    if (input.length >= 4) {
        formatted += '-' + input.substring(3, 6);
    }
    if (input.length >= 7) {
        formatted += '-' + input.substring(6, 10); 
    }

    e.target.value = formatted.substring(0, 12);
});

document.getElementById('phone-number').addEventListener('keypress', function (e) {
    if (this.value.length >= 12 && e.key !== 'Backspace' && e.key !== 'Delete') {
        e.preventDefault();
    }
});