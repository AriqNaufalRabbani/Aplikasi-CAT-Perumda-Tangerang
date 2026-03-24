$(document).ready(function() {
    notifikasi();
});

let jmlShowNotif = 0;
function notifikasi(){
    var seconds = 300;
    $.ajax({
        async: true,
        url: BASE_URL + "notifikasi/getNotifByUser",
        type: "POST",
        dataType: 'json',
        success: function (e){
            var jmlNotif = $('#notifications_menu .jml-notif').eq(0).text();
            // console.log(e.data.length)
            if (e.data.length > 0) {
                jmlNotif = parseInt(jmlNotif) + e.data.length;
                

                $('.jml-notif').text(jmlNotif);

                e.data.forEach(function(v, i){
                    // pushNotifFirebase(v.Title, v.Pesan, v.Link, v.Module);
                    pushNotification(v.IdNotif, v.Title, v.Pesan, v.Link, i);
                    $('#notifications_menu .menu').prepend(`
                        <li class="unread-notif">
                            <a href="`+ v.Link.trim() +`">
                                <h4 style="margin-left: 0px;">
                                    <small><i class="fa fa-clock"></i> Just Now</small>
                                </h4>
                                <p style="margin-left: 0px;">
                                    `+ v.Title.trim() +`<br>
                                    `+ v.Pesan.trim() +`
                                </p>
                            </a>
                        </li>
                    `);
                });
            }
        }
        , error: function(e, i, j){
            // console.log(e);
        }
    });
    setTimeout(function(){
        notifikasi();
    }, (1000 * seconds));
}


function pushNotifFirebase(Title, Pesan, Link, Module){
    $.ajax({
        async: true,
        url: BASE_URL + "notifikasi/pushNotifFirebase",
        type: "POST",
        data:{
            Title   : Title,
            Pesan   : Pesan,
            Link    : Link,
            Module  : Module
        },
        success: function (e){

        }
    })
}

function updateNotifOnShow(IdNotif){
    $.ajax({
        async: true,
        url: BASE_URL + "notifikasi/updateNotifOnShow",
        type: "POST",
        data : {
            IdNotif: IdNotif
        }
    });
}

function pushNotification(IdNotif, title, text, i) {
    // console.log(IdNotif)
    new Noty({
        type: 'info',
        layout: 'topRight',
        theme: 'relax',
        timeout: 5000,
        // sources: 'cdn/sounds/windows_10_notify.mp3',
        closeWith: ['click', 'button'],
        callbacks: {
            onShow: function() {
                updateNotifOnShow(IdNotif);
            },
            onClick: function() {
                window.location.href = 'notifikasi';
            }
        },
        text: '<i class="fa fa-bell"></i> ' + title + '<br>' +text
    }).show();
    // var audio = new Audio('cdn/sounds/windows_10_notify.mp3');
    // audio.play();

    // if (!Notification) {
    // 	console.log('*Browser does not support Web Notification');
    // 	return;
    // }
    // if (Notification.permission !== "granted") {		
    // 	Notification.requestPermission();
    // } 
    // else {
    //     notif = new Notification('CRM Notifikasi', {
    //     	body: text,
    //     	icon: 'cdn/images/1favicon.ico',
    //     });
    //     notif.onclick = function () {
    //     	window.open('#'); 
    //     	notif.close();
    //     };
    //     setTimeout(function(){
    //     	notif.close();
    //     }, 3000);
        
    //     updateNotifOnShow(IdNotif);

        // $.ajax({
        // 	url : "notification.php",
        // 	type: "POST",
        // 	success: function(data, textStatus, jqXHR) {
        // 		var data = jQuery.parseJSON(data);

        // 		if (data.length > 0) {
        // 			for (var i = 0; i < data.length; i++) {
        // 				let url = data[i]['url'];
        // 				// let notifikasi = [];
        // 				let notifikasi = new Notification(data[i]['title'], {
        // 					icon: data[i]['icon'],
        // 					body: data[i]['msg'],
        // 				});
        // 				notifikasi.onclick = function () {
        // 					window.open(theurl); 
        // 					notifikasi.close();
        // 				};
        // 				setTimeout(function(){
        // 					notifikasi.close();
        // 				}, 5000);
        // 			};
        // 		}
        // 	},
        // 	error: function(jqXHR, textStatus, errorThrown)	{}
        // }); 
    // }
};