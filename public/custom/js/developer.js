$(document).ready(function(){


// Connection page
$('#sel_language').change(function(){

    $language = $(this).val();

    $.post( "/setLocale", {sel_language : $language, _token: $('#_token').val()}, function(data){
        if (data.status == 200) {
            location.reload();
        } else{
            console.log(data);
        }
    });

});


// Add new key page
$('#sel_data_type').change(function(){

    $type = $(this).val();

    $('#txt_hash_key, #txt_score').val('').removeAttr('required');
    $('#dv_hash_key, #dv_score').addClass('hidden');

    switch($type) {
        case 'hash':
        $('#dv_hash_key').removeClass('hidden');
        $('#txt_hash_key').val('').attr('required', 'required');
    break;
        case 'list':
        $('#dv_index').removeClass('hidden');
    break;
        case 'zset':
        $('#dv_score').removeClass('hidden');
        $('#txt_score').val('').attr('required', 'required');
    break;
    }

});

});