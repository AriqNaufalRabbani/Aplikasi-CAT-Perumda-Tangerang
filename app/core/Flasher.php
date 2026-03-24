<?php

class Flasher {
    public static function setMessage($pesan, $type) {
        $_SESSION['msg'] = array(
            'pesan' => $pesan,
            'type'  => $type
        );
    }

    public static function pushFlash($icon, $title, $messages = '') {
        $_SESSION['flash'] = array(
			// Icons: success, error, warning, info, question
            'icon'      => $icon,
            'title'     => $title,
			'html'		=> $messages
        );
    }

    public static function Flash() {
        if (isset($_SESSION['flash'])) {
            echo '
                <script>
                    window.addEventListener("load", function() {
                        Swal.mixin({
                            toast: true,
                            customClass: "custom-toast",
                            position: "top-end",
                            showCloseButton: true,
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener("mouseenter", Swal.stopTimer)
                                toast.addEventListener("mouseleave", Swal.resumeTimer)
                            }
                        }).fire({
                            icon: "'. $_SESSION['flash']['icon'] .'",
                            title: `'. $_SESSION['flash']['title'] .'`,
                            html: `'. $_SESSION['flash']['html'] .'`,
                        });
                        $(".custom-toast").closest(".swal2-container").css({"height": "auto"});
                    });
                </script>
            ';
            unset($_SESSION['flash']);
        } else {
            echo '';
        }
    }
}