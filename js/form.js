
$( document ).ready(function(){
    
    $('form').submit(function(event){

        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            dataType: 'json',
            data: new FormData(this),
            contentType: false,
            cache: false, 
            processData: false,
            success(data) {
                if(data.status == 1)
                {
                    document.location.href = '/hello.php';
                }
                else if(data.status == 2)
                {
                    data.message = 'Регистрация прошла успешно';
                    document.location.href = '/index.php';
                    $('.msg').removeClass('none').text(data.message);
                }
                else
                {
                    $('.msg').removeClass('none').text(data.message);
                }
            },
        });

    });


});
