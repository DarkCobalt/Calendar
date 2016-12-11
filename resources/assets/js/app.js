$(document).ready(function(){
    $('[data-toggle=modal]').click(function () {
        cliked_element = $(this);
        $.ajax({
            method: "GET",
            url: $(this).attr('data-target'),
            data: $(this).attr('data')
        }).done(function (data) {
            $('#allmodals').html(data);
            $('#allmodals > div').modal('show');
        });
    });

});