$(function () {
    var TypeNotif = '<div>'+
    '<label class="">Type Alert Daily</label><br>'+
    '<label><input type="radio" name="Type-Notif-Daily" class="Type-Notif-Daily" value="Noty"> Noty</label><br>'+
    '<label><input type="radio" name="Type-Notif-Daily" class="Type-Notif-Daily" value="Flash"> Flash</label><br>'+
    '<label><input type="radio" name="Type-Notif-Daily" class="Type-Notif-Daily" value="Off"> Turn Off</label><br>'+
    '</div>';

    $("#control-sidebar-settings-tab").append(TypeNotif);
    $("#control-sidebar-settings-tab").append('<hr>');

    CheckonNoty();
})

function CheckonNoty(){
    var onNoty = localStorage.getItem('onNoty');

    if(onNoty == '' || onNoty == null){
        localStorage.setItem('onNoty', 'Flash');
        $(`.Type-Notif-Daily[value='Flash']`).attr("checked", true);
    }else{
        $(`.Type-Notif-Daily[value=${onNoty}]`).attr("checked", true);
    }
}

$(document).on('click', '.Type-Notif-Daily', function(){
    var value = $(this).val();
    localStorage.setItem('onNoty', value);

    $(`.Type-Notif-Daily[value=${value}]`).attr("checked", true);
})