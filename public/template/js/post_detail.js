$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// get post_id
function get_post_id(){
    return $('#post_id').val();
}
// load comment
function load_comment(){
    id = get_post_id();
    console.log("ppost_id",id);

    $.ajax({
        url: '/postdetail/loadcomment',
        method: 'post',
        data: {id:id},
        success: function(data) {
            $('#show-comment').html(data);
        }
    });
}
$(document).ready(function(){
    load_comment();
})

//reset values comment
function reset_values_comment() {
    $('#comment_field').val("");
    $('#sign').val("");
}

//update comment count
function update_comment_count() {
    id = get_post_id();
    $.ajax({
        url : '/postdetail/getcommentcount',
        method : 'post',
        data: {id:id},
        success: function(data) {
            $('#cmt').html(data);
        }
    })
}

// react heart and load view number
function react_heart(i){
    // i == 0 decrease 1 heart || i == 1 increase 1 heart
    id = get_post_id();
    $.ajax({
        url: '/postdetail/reactheart',
        method: 'POST',
        data: {id: id, condition: i},
        success: function(data) {
            $('#heart').html(data['heart']);
            $('#view').html(data['view']);
            update_comment_count();//ms them vao
        }
    })
}
$('#heart_icon').on('click', function(e){

    if (this.style.color === "red"){
        react_heart(0);
        this.style.color = "black";
    }else{
        react_heart(1);
        this.style.color = 'red';
    }

})
// form submit comment
$('form').submit(function(){
    $.ajax({
        url: '/postdetail/comment',
        method: 'post',
        data: $('form').serialize(),
        datatype: 'json',
        success: function(result) {
            // console.log(result.error);
            if (result.error === true) {
                load_comment();
                reset_values_comment();
                update_comment_count();
            }
            else{
                $('body').append("<div class='error-box' id='errorBox'><div class='error-lightbox'> <h2>Bình luận không thành công!</h2> <ul><li>Vui lòng nhập nội dung</li></ul></div></div>");
                // console.log('10');
                reset_values_comment();

                // console.log('20');
            }

        }
    });
})

//check user have read post
function check_cookie_value(id){
    $.ajax({
        type: 'get',
        url : '/getcookievalue',
        success: function(response){
            color = response[id];
            $('#heart_icon').css('color',color);
        }
    });
}
// check cookie value
$(document).ready(function(){
    id = get_post_id();
    check_cookie_value(id);
})
// {{-- click to disable alert --}}
$('body').on('click','#errorBox',function(e){
    if (e.target.matches('#errorBox'))
        e.target.parentNode.removeChild(e.target);
})

$('#exit').on('click', function(e){
    history.back();
})
