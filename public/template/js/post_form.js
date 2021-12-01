$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#upload').change(function () {
    form = new FormData();
    form.append('thumb',$(this)[0].files[0]);
    // console.log($(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        url: '/upload',
        data: form,
        dataType: 'json',
        success: function(data){
            if (data.error == false) {
                $('#thumb_show').html('<a href="'+data.url+'"target="_blank"><img src="'+data.url+'"></a>');
                $('#thumb_url').val(''+data.url);
            }
        }
    });
})
