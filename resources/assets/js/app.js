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
    $(document).on('click','#all_day',function(){
        console.log('test');
       if(!$(this).is(':checked')){
           $('#normal_event').show();
       }else{
           $('#normal_event').hide();
       }
    });
});