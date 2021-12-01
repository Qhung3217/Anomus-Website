$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function remove(id){
    // console.log(id);
    if (confirm('Xác nhận xóa')){
        $.ajax({
            type: 'DELETE',
            dataType: 'json',
            data: {id: id},
            url: '/manageposted/remove',
            success: function(response){
                if (response.error === false){
                    location.reload();
                    alert(response.message);
                }
                else{
                    alert("Xóa lỗi! Vui lòng thực hiện lại.");
                }
            }
        })

    }
}

