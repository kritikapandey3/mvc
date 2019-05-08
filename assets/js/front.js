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
    $('#start_date, #end_date').datetimepicker({
        icons: {
            time: 'fas fa-clock'
        },
        format: "YYYY-MM-DD HH:mm:ss"
    });

    $('.delete').click(function (e) {
        e.preventDefault();
        url = $(this).attr('href');

        if(confirm('Confirm delete')){
            location.href = url;
        }

    });

    $('.cancel').click(function (e) {
        e.preventDefault();
        url = $(this).attr('href');

        if(confirm('Confirm cancel')){
            location.href = url;
        }

    });
});