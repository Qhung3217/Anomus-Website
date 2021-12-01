$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#menu_toggle').on('click', function(e){
    $('#menu_content').toggleClass('toggle');
    $('#box-content').toggleClass('decrease-margin');
    console.log("1");
})
$('#menu_toggle2').on('click', function(e){
    console.log("1");
    $('#menu_content2').toggleClass('toggle');
    $('#menu_toggle2').toggleClass('toggle_menu_icon');
})
function get_post_id(){
    return $('#post_id').val();
}
function checked_heart(){
    ids= document.querySelectorAll('#heart_icon[data-id]');
    console.log($('*[data-id]').data());
}
$('body').ready(function(){
    checked_heart();
})

$('#search_button').on('click', function(e){
    console.log(222);
    $('#search').toggleClass('toggle');
})
