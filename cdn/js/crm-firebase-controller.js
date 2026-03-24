const firebaseConfig = {
    apiKey: "AIzaSyCebY32cM1fToc5foxhk8-rY3N990PaqO4",
    authDomain: "crm-project-376603.firebaseapp.com",
    // databaseURL: "https://crm-project-376603-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "crm-project-376603",
    storageBucket: "crm-project-376603.appspot.com",
    messagingSenderId: "881583087805",
    appId: "1:881583087805:web:89418f64689cd9eabad7d4",
    measurementId: "G-SG0DTJDQE1"
};
firebase.initializeApp(firebaseConfig);




/* If device or browser support FCM */
try {
    const messaging = firebase.messaging();

    if (Notification.permission === "granted") {
        messaging.requestPermission().then(function () {
            return messaging.getToken();
        }).then(function (token) {
            console.log( token )

            // $.cookie("token", token);
            setCookie("token", token, 3600);  
            localStorage.setItem('token', token);

            if ($('#tokenId')) $('#tokenId').html(token);

            $.ajax({
                type: "POST",
                url : `${BASE_URL}fcm/saveToken`,
                async: true,
                data: {
                    token : token
                },
                success: function (e){
                    // console.log(e);
                },
                error: function (msg) {
                    console.error(msg);
                }
            });
            sessionStorage.setItem("token", token);
        }).catch(function (reason) {
            console.error(reason);
            // console.log(reason)
        });
    } else {
        Notification.requestPermission().then(callback => {
            if (callback == 'granted') {
                $('.notification-alert').hide();
                window.location.reload();
            } else {
                $('.notification-alert').show();
            }
        });
    }

    messaging.onTokenRefresh(function () {
        messaging.getToken().then(function (newtoken) {
            $.ajax({
                type: "POST",
                url : `${BASE_URL}fcm/updateToken`,
                async: true,
                data: {
                    token : token
                },
                success: function (e){
                    // console.log(e);
                },
                error: function (msg) {
                    console.error(msg);
                }
            });
        }).catch(function (reason) {
            console.error(reason);
        })
    });

    messaging.onMessage(function (payload) {
        if (Notification.permission === "granted") {
            const body         = payload.notification.body;
            const icon         = payload.notification.icon;
            const title        = payload.notification.title;
            const tag          = payload.notification.tag;
            const click_action = payload.notification.click_action;

            // mainElementControl(payload);

            /* Show notification for windows */
            // try { 
            //     const notificationOption = {
            //         body: body,
            //         icon: icon
            //     };
            //     const notification = new Notification(title, notificationOption);
            //     notification.onclick = function (e) {
            //         e.preventDefault();
            //         window.open(click_action);
            //         notification.close();
            //     }
            // } catch(e){
                /* Show notification for Mobile and windows */
                try{ 
                    const notificationOption = {
                        body: body,
                        icon: icon,
                        tag: tag,
                        renotify: true,
                        data: { url: click_action }
                    };
                    navigator.serviceWorker.ready.then(function(registration) {
                        try {
                            registration.showNotification(title, notificationOption);
                        } catch(err){
                            console.error(err);
                        }
                    });
                } catch(err){
                    console.error(err)
                }
            // }
        }
    });
} catch(err){
    console.error(err);

    if ($('#tokenId')) {
        $('#tokenId').val(err);
        $('#testNotifButton').prop('disabled', true);
    }
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires 	= "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";secure;" + expires + ";path=/";
}
function getCookie(cname) {
	var name	= cname + "=";
	var ca		= document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}