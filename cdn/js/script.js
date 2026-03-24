let xhrSubmit;
let deferredPrompt;
async function confirmModal(obj = {}){
    if (!obj.icon) obj.icon   = 'question';
    if (!obj.title) obj.title = 'Data Sudah Benar?';
    if (!obj.html) obj.html   = '';

    return new Promise(function(resolve){
        Swal.fire({
            icon: obj.icon,
            title: obj.title,
            html: obj.html, 
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: `Ya`,
            cancelButtonText: `Batal`,
        })
        .then((act) => {
            if (act.isConfirmed) {
                resolve(true);
            }
        });
    });
}
async function alertModal(icon = '', title = '', html = ''){
    return new Promise(function(resolve){
        Swal.fire({
            icon: icon,
            title: title,
            html: html, 
            showCloseButton: true
        });
    });
}
async function submitForm(self, url, txt = ''){
    return new Promise(function(resolve, reject){
        if (xhrSubmit) return alert('Sedang memproses...');

        let formData         = new FormData(self);
        let progress_status  = $('#progress_modal #progress_status');
        let progress_bar     = $('#progress_modal #progress_bar');
        let progress_message = $('#progress_modal #progress_message');
        let progress_close   = $('#progress_modal #progress_close');

        xhrSubmit = $.ajax({
            url         : url,
            type        : 'POST',
            data        : formData,
            contentType : false,
            processData : false,
            cache       : false,
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        var percentVal  = (e.loaded / e.total);
                        percentVal      = parseInt(percentVal * 100);

                        if (percentVal <= 99) {
                            progress_bar
                                .width(percentVal + '%')
                                .text(percentVal + '%');
                        }
                        else {
                            progress_bar.width(99 + '%')
                                .text(99 + '%');
                        }
                    }
                }, false);
                return xhr;
            },
            beforeSend: function (result) {
                progress_status.text('Menyimpan...');
                progress_message
                    .text('')
                    .hide();
                progress_bar
                    .removeClass('progress-bar-success')
                    .removeClass('progress-bar-danger')
                    .addClass('progress-bar-striped')
                    .addClass('active')
                    .text('0%')
                    .width('0%');
                $('#progress_modal').fadeIn('fast');
                progress_close.hide();
            },
            success: function(data, textStatus, xhr) {
                // If status 200 or complete, change progressbar text to 'complete'
                if (xhr.status === 200) {
                    if (data == '') {
                        progress_status.text('Berhasil Disimpan');
                        progress_bar
                            .addClass('progress-bar-success')
                            .text('100%');
                        resolve(data);
                    } else {
                        try {
                            data = JSON.parse(data);
                            
                            if (data.result == 'success') {
                                progress_status.text('Berhasil Disimpan');
                                progress_bar
                                    .addClass('progress-bar-success')
                                    .text('100%');
                                resolve(data);
                            } else if (data.result == 'failed') {
                                progress_close.show();
                                progress_message.text(data.msg);
                                progress_bar
                                    .addClass('progress-bar-danger')
                                    .text('Gagal');
                            }
                        } catch(e) {
                            progress_close.show();
                            progress_status.text('Terjadi kesalahan');
                            progress_message
                                .text(data)
                                .show();
                            progress_bar
                                .addClass('progress-bar-danger')
                                .text('error');
                        }
                    }
                } else {
                    progress_status.text('Gagal');
                    progress_bar
                        .addClass('progress-bar-danger')
                        .text('failed');
                    progress_close.show();
                    console.log(xhr);
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                progress_status.text('Gagal');
                progress_bar
                    .addClass('progress-bar-danger')
                    .text('error');
                progress_close.show();
                console.log(errorThrown);
            },
            complete: function(e) {
                progress_bar
                    .removeClass('active')
                    .removeClass('progress-bar-striped')
                    .width('100%');
                xhrSubmit = null;
            }
        });
    });
}

$(document).on('click', '#progress_modal #progress_close', function(){
    $('#progress_modal').fadeOut('fast');
});

let swalOffline = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  allowOutsideClick: false,
  allowEscapeKey: false,
  allowEnterKey: false,
});

function updateOnlineStatus(event) {
    var status = navigator.onLine ? "Online" : "Offline";

    if (status == 'Online') {
        $('#online_status').html('<i class="fa fa-circle text-green"></i> Online');
        $("a").removeClass("disabled");
        $("body").css({"overscroll-behavior-y":""});

        Swal.close();
    } else if (status == 'Offline') {
        $('#online_status').html('<i class="fa fa-circle text-red"></i> Offline');
        $("a").addClass("disabled");
        $("body").css({"overscroll-behavior-y":" contain"});

        swalOffline.fire({
          html: '<div class="text-red text-center"><i class="fa fa-wifi-slash"></i>&emsp;No Internet</div>'
        });


    }
}

// function check_conn(){
//     var seconds = 60;
//     $.ajax({
//         async: true,
//         url: "check_conn.php",
//         dataType: 'text',
//         cache: false,
//         success: function (e, i, j){
//             $('#online_status').html('<i class="fa fa-circle text-green"></i> Online');
//         }
//         , error: function(e, textStatus, errorThrown){
//             console.log(textStatus);
//             if (errorThrown == '') {
//                 $('#online_status').html('<i class="fa fa-circle text-red"></i> Offline');
//             }
//         }
//     });
//     setTimeout(function(){
//         check_conn();
//     }, (1000 * seconds));
// }

function viewerJS(source) {
    new Viewer(document.querySelector(source), {
            toolbar: true,
            navbar: false
        }
    );
}

$(document).on('click', 'img.viewer', function(){
    var image = new Image();
    image.src = $(this).attr('src');

    var viewer = new Viewer(image, {
        title: false,
        navbar: false,
        toolbar: {
            zoomIn: true,
            zoomOut: true,
            oneToOne: true,
            reset: true,
            prev: false,
            play: false,
            next: false,
            rotateLeft: true,
            rotateRight: true,
            flipHorizontal: true,
            flipVertical: true,
        },
        hidden: function () {
            viewer.destroy();
        }
    }).show();
});

window.addEventListener('load', function(){
    $("._select2").select2();

    $('#search_menubar').select2({
        placeholder: "Search...",
        maximumSelectionLength: 1
    });

    $('#search_menubar').on('change', function(){
        var link = $(this).val();
        window.location.href = link;
    });

    // check_conn();

    /* session-timeout */
    // $.sessionTimeout({
    //     keepAliveUrl: BASE_URL + 'dashboard',
    //     logoutUrl: BASE_URL + 'logout',
    //     redirUrl: BASE_URL,
    //     warnAfter: (1000 * 60) * 20, // 20 Minutes
    //     redirAfter: (1000 * 60) * 30, // 30 Minutes
    //     countdownBar: true
    // });

    // viewerJS('#images');
});

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

window.addEventListener('online',  updateOnlineStatus);
window.addEventListener('offline', updateOnlineStatus);

// let installPWA = document.getElementById("install-pwa");
// let rejectPWA = document.getElementById("reject-pwa");
// // console.log(installPWA)


// if (installPWA) {
// 	/* If user click install pwa, set pwaAlert cookies as true */
// 	installPWA.addEventListener('click', (e) => {
//         console.log('tes')
// 		// Hide pwa alert
// 		$('.pwa-alert').css('display', 'none');
// 		// Show the prompt
// 		deferredPrompt.prompt();
// 		// Wait for the user to respond to the prompt
// 		deferredPrompt.userChoice.then((choiceResult) => {
// 			// Set user respond to cookie
// 			if (choiceResult.outcome === 'accepted') {
// 				setCookie('pwaAlert', true, 3600);
//                 setcookie('APP_TYPE', $_GET['standalone'], time() + (86400 * 30) * 60, "/", '', true, true);
// 			} 
// 			else {
// 				setCookie('pwaAlert', false, 30);
// 			}
// 		});
// 	});
// }

// if (rejectPWA) {
// 	/* If user click not install pwa, set pwaAlert cookies as false */
// 	rejectPWA.addEventListener('click', (e) => {
// 		// Hide pwa alert
// 		$('.pwa-alert').css('display', 'none');
// 		// Set user respond to cookie
// 		setCookie('pwaAlert', false, 30);
// 	});
// }

// /* If user does'n respond install alert, show install pwa alert */		
// const pwaRespond = getCookie('pwaAlert');
// if (pwaRespond == '') {
// 	pwaAlert();
// }

// function pwaAlert() {
// 	window.addEventListener('beforeinstallprompt', (e) => {
// 		// Prevent Chrome 67 and earlier from automatically showing the prompt
// 		e.preventDefault();
// 		// Stash the event so it can be triggered later.
// 		deferredPrompt = e;
// 		// Update UI notify the user they can add to home screen
// 		$('.pwa-alert').css('display', 'block');
// 	});
// }

function invokeServiceWorkerUpdate(registration) {
    /* TODO implement your own UI notification element */
    // if (confirm("New version of the app is available. Refresh now?") ) {
        if (registration.waiting) {
            // let waiting Service Worker know it should became active
            registration.waiting.postMessage('skipWaiting');
        }
	// }
}

async function swRegistration() {
	if ('serviceWorker' in navigator) {
		try {
			const registration = await navigator.serviceWorker.register(BASE_URL + `sw.js`);

			/* if there is a SW active */
			if (registration) {
		        /*
		        	ensure the case when the updatefound event was missed is also handled
		           	by re-invoking the prompt when there's a waiting Service Worker 
		        */
		        if (registration.waiting) {
		            invokeServiceWorkerUpdate(registration);
		        }

                registration.addEventListener('updatefound', () => {
		            if (registration.installing) {
		                /* wait until the new Service worker is actually installed (ready to take over) */
		                registration.installing.addEventListener('statechange', () => {
                            
		                    if (registration.waiting) {
		                        /* if there's an existing controller (previous Service Worker), show the prompt */
		                        if (navigator.serviceWorker.controller) {
		                            invokeServiceWorkerUpdate(registration);
		                        } else {
		                            /* otherwise it's the first install, nothing to do */
		                            console.log('Service Worker initialized for the first time');
		                        }
		                    }
		                })
		            }
		        });

		        /* detect controller change and refresh the page */
		        navigator.serviceWorker.addEventListener('controllerchange', () => {
		            if (!refreshing) {
		                window.location.reload();
		                var refreshing = true;
		            }
		        });
			}
		} catch (e) {
			console.log('SW registration failed');
		}
	}else{
    console.log(navigator)
  }
}
 
window.addEventListener('load', () => {
	swRegistration();
  
    
});

let pwaPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
    /* Prevent Chrome 67 and earlier from automatically showing the prompt */
    e.preventDefault();

    /*Stash the event so it can be triggered later.*/
    pwaPrompt = e;

    /* Update UI notify the user they can add to home screen */
    if (!localStorage.getItem("pwaPrompt") || localStorage.getItem("pwaPrompt") == 'true') {
       $('.pwa-alert').show();
    } else {
        $('.pwa-alert').hide();
   }
});

$('#install-pwa').on('click', () => {
    $('.pwa-alert').hide();
    setCookie('APP_TYPE', 'pwa', 3600);

    pwaPrompt.prompt();

    pwaPrompt.userChoice.then((choiceResult) => {
        if (choiceResult.outcome === 'accepted') localStorage.setItem("pwaPrompt", true);
    });
});

$('#reject-pwa').on('click', () => {
    $('.pwa-alert').hide();
    localStorage.setItem("pwaPrompt", false);
});


// ! Removed following code if you do't wish to use jQuery. Remember that navbar search functionality will stop working on removal.
if (typeof $ !== 'undefined') {
    $(function () {
      // ! TODO: Required to load after DOM is ready, did this now with jQuery ready.
      window.Helpers.initSidebarToggle();
      // Toggle Universal Sidebar
  
      // Navbar Search with autosuggest (typeahead)
      // ? You can remove the following JS if you don't want to use search functionality.
      //----------------------------------------------------------------------------------
  
      var searchToggler = $('.search-toggler'),
        searchInputWrapper = $('.search-input-wrapper'),
        searchInput = $('.search-input'),
        contentBackdrop = $('.content-backdrop');
  
      // Open search input on click of search icon
      if (searchToggler.length) {
        searchToggler.on('click', function () {
          if (searchInputWrapper.length) {
            searchInputWrapper.toggleClass('d-none');
            searchInput.focus();
          }
        });
      }
      // Open search on 'CTRL+/'
      $(document).on('keydown', function (event) {
        let ctrlKey = event.ctrlKey,
          slashKey = event.which === 191;
  
        if (ctrlKey && slashKey) {
          if (searchInputWrapper.length) {
            searchInputWrapper.toggleClass('d-none');
            searchInput.focus();
          }
        }
      });
      // Todo: Add container-xxl to twitter-typeahead
      searchInput.on('focus', function () {
        if (searchInputWrapper.hasClass('container-xxl')) {
          searchInputWrapper.find('.twitter-typeahead').addClass('container-xxl');
        }
      });
  
      if (searchInput) {
        // Filter config
        var filterConfig = function (data) {
            return function findMatches(q, cb) {
                let matches;
                matches = [];
                data.filter(function (i) {
                  if (i.name.toLowerCase().startsWith(q.toLowerCase())) {
                    matches.push(i);
                  } else if (
                    !i.name.toLowerCase().startsWith(q.toLowerCase()) &&
                    i.name.toLowerCase().includes(q.toLowerCase())
                  ) {
                    matches.push(i);
                    matches.sort(function (a, b) {
                      return b.name < a.name ? 1 : -1;
                    });
                  } else {
                    return [];
                  }
                });
                cb(matches);
            };
        };
  
        // Search JSON
        // var searchJson = 'search-vertical.json'; // For vertical layout
        // if ($('#layout-menu').hasClass('menu-horizontal')) {
        //   var searchJson = 'search-horizontal.json'; // For vertical layout
        // }
        // Search API AJAX call
        var searchData = $.ajax({
            url: BASE_URL + 'menu/getSearch', //? Use your own search api instead
            dataType: 'json',
            async: false
        }).responseJSON;
  
        // console.log(searchData)
        // Init typeahead on searchInput
        searchInput.each(function () {
          var $this = $(this);
          searchInput
            .typeahead(
              {
                hint: false,
                classNames: {
                  menu: 'tt-menu navbar-search-suggestion',
                  cursor: 'active',
                  suggestion: 'suggestion d-flex justify-content-between px-3 py-2 w-100'
                }
              },
              // ? Add/Update blocks as per need
              // Pages
              {
                name: 'pages',
                display: 'name',
                limit: 5,
                source: filterConfig(searchData.pages),
                templates: {
                  header: '<h4 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Pages</h4>',
                  suggestion: function ({ url, icon, name }) {
                    return (
                      '<a class="SearchItem" href="' +
                      url +
                      '">' +
                      '<div class="">' +
                      '<i class="' +
                      icon +
                      ' mr-2"></i>' +
                      '<span class="align-middle">' +
                      name +
                      '</span>' +
                      '</div>' +
                      '</a>'
                    );
                  },
                  notFound:
                    '<div class="not-found px-3 py-2">' +
                    '<h6 class="suggestions-header text-primary mb-2">Pages</h6>' +
                    '<p class="py-2 mb-0"><i class="bx bx-error-circle bx-xs me-2"></i> No Results Found</p>' +
                    '</div>'
                }
              },
            )
            //On typeahead result render.
            .bind('typeahead:render', function () {
              // Show content backdrop,
              contentBackdrop.addClass('show').removeClass('fade');
            })
            // On typeahead select
            .bind('typeahead:select', function (ev, suggestion) {
              // Open selected page
              if (suggestion.url) {
                window.location = suggestion.url;
              }
            })
            // On typeahead close
            .bind('typeahead:close', function () {
              // Clear search
              searchInput.val('');
              $this.typeahead('val', '');
              // Hide search input wrapper
              searchInputWrapper.addClass('d-none');
              // Fade content backdrop
              contentBackdrop.addClass('fade').removeClass('show');
            });
  
          // On searchInput keyup, Fade content backdrop if search input is blank
          searchInput.on('keyup', function () {
            if (searchInput.val() == '') {
              contentBackdrop.addClass('fade').removeClass('show');
            }
          });
        });
  
        // Init PerfectScrollbar in search result
        var psSearch;
        $('.navbar-search-suggestion').each(function () {
          psSearch = new PerfectScrollbar($(this)[0], {
            wheelPropagation: false,
            suppressScrollX: true
          });
        });
  
        searchInput.on('keyup', function () {
          psSearch.update();
        });
      }
    });
  }



