$(function () {
    $('.alert').delay(5000).slideUp(500);

    $('#confirm_password').change(function () {
        npass = $('#password').val();
        cpass = $(this).val();

        if(npass !== cpass){
            $(this)[0].setCustomValidity('Password does not match.');
        }

        else {
            $(this)[0].setCustomValidity('');
        }

    });

    $('.delete').click(function (e) {
        e.preventDefault();
        url = $(this).attr('href');

        if(confirm('Confirm delete')){
            location.href = url;
        }

    });
});