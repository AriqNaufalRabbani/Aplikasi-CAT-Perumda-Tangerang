const DESTINATION 		 = ['image','font','style','script'];
const ver				 = 1;
const OFFLINE_VERSION    = 1;
const OFFLINE_URL        = 'offline.html';
const STATIC_CACHE_NAME	 = 'supernovacrm-cache-v' + ver;
const urlToCache      	 = [
  '/',
  '/index.php',
  '/offline.html',
  '/cdn/css/style.css',
  '/cdn/css/style2.css',
  '/cdn/dist/css/AdminLTE.css',
  '/cdn/dist/css/AdminLTE.min.css',
  '/cdn/plugins/noty/noty.css',
  '/cdn/plugins/noty/themes/relax.css',
  '/cdn/plugins/noty/themes/metroui.css',
  '/cdn/images/1favicon.ico',
  '/cdn/images/1favicon.png',
  '/cdn/images/converted.jpg',
  '/cdn/images/critical4.png',
  '/cdn/images/favicon.ico',
  '/cdn/images/Logo_CRM/PNG/crm-ld-bg-white.png',
  '/cdn/images/Logo_CRM/PNG/crm-ld-blue-bg.png',
  '/cdn/images/Logo_CRM/PNG/crm-sq-bg-white.png',
  '/cdn/images/Logo_CRM/PNG/crm-sq-blue-bg.png',
  '/cdn/images/page-not-found.png',
  '/cdn/images/placeholder.png',
  '/cdn/images/select.png',
  '/cdn/images/selected.png',
  '/cdn/images/Spinner.gif',
];

// /* Limit cache list size/amount */
// const limitCacheSize = (cacheName, limitSize) => {
// 	caches.open(cacheName).then(cache => {
// 		cache.keys().then(keys => {
// 			if (keys.length > limitSize) {
// 				cache.delete(keys[0]).then(limitCacheSize(cacheName, limitSize));
// 			}
// 		})
// 	})
// }

// /* Limit cache list size/amount */
const limitCacheVersion = (reqUrl) => {
	caches.open(STATIC_CACHE_NAME).then(cache => {
		cache.keys().then(keys => {
			if (reqUrl.indexOf('?') >= -1) {
				var newUrl = reqUrl.split('?')[0];

				keys.forEach((v, k) => {
					var oldUrl = v.url.split('?')[0];

					if (oldUrl == newUrl) {
						if (reqUrl != v.url) {
							cache.delete(keys[k]);
						}
					}
				});
			}
		})
	})
}

/* Start the service worker and cache all of the app's content */
// self.addEventListener('install', evt => {
// 	/* self.skipWaiting(); */
//     evt.waitUntil(
//     	caches.open(STATIC_CACHE_NAME).then(cache => {
// 	        return cache.addAll(urlToCache);
//     	})
//     );
// });

// self.addEventListener("install", (event) => {
//     console.log("Service Worker : Installed!")

//     event.waitUntil(
        
//         (async() => {
//             try {
//                 cache_obj = await caches.open(STATIC_CACHE_NAME)
//                 cache_obj.addAll(urlToCache)
//             }
//             catch{
//                 console.log("error occured while caching...")
//             }
//         })()
//     )
// })

self.addEventListener("install", (event) => {
    console.log("Service Worker : Installed!")

    event.waitUntil((async() => {
        try {
            cache_obj = await caches.open(STATIC_CACHE_NAME)
            cache_obj.addAll(urlToCache)

            await cache_obj.add(new Request(OFFLINE_URL, {cache: 'reload'}));
        }
        catch{
            console.log("error occured while caching...")
        }
    })())
})



// /* Activating cache */
self.addEventListener('activate', evt => {
	evt.waitUntil(
		caches.keys().then(keys => {
			return Promise.all(keys
				.filter(key => key !== STATIC_CACHE_NAME)
				.map(key => caches.delete(key))
			);
		})
	);

    // Tell the active service worker to take control of the page immediately.
    self.clients.claim();
});

// /* Fetching caches */
// self.addEventListener('fetch', evt => {
//     if (evt.request.url.toLowerCase().indexOf('/approval') > -1) {
//         evt.respondWith(
//             fetch(evt.request)
//                 .catch(() => {
//                     return caches.match(evt.request).then(cacheRes => {
//                         /* if url cache exist, show cache */
//                         if (cacheRes) {
//                             return cacheRes;
//                         }
//                         /* else show offline page */
//                         else {
//                             return caches.match('/maintenance/index.html');
//                         }
//                     });
//                 })
//         );
//     } else {
//         if (evt.request.url.indexOf('https://crm.supernova-id.com/crm/') > -1) {
//             if (DESTINATION.includes(evt.request.destination)) {
//                 cacheFirst(evt);
//             }
//             else {
//                 netFirst(evt);
//             }
//         }
//     }
// });

self.addEventListener('fetch', (event) => {
    // We only want to call event.respondWith() if this is a navigation request
    // for an HTML page.
    if (event.request.mode === 'navigate') {
      event.respondWith((async () => {
        try {
          // First, try to use the navigation preload response if it's supported.
          const preloadResponse = await event.preloadResponse;
          if (preloadResponse) {
            return preloadResponse;
          }
  
          const networkResponse = await fetch(event.request);
          return networkResponse;
        } catch (error) {
          // catch is only triggered if an exception is thrown, which is likely
          // due to a network error.
          // If fetch() returns a valid HTTP response with a response code in
          // the 4xx or 5xx range, the catch() will NOT be called.
          console.log('Fetch failed; returning offline page instead.', error);
  
          const cache = await caches.open(STATIC_CACHE_NAME);
          const cachedResponse = await cache.match(OFFLINE_URL);
          return cachedResponse;
        }
      })());
    }
});

function cacheFirst(evt){
    evt.respondWith(
        /* If url request match / exist, return cache data */
        caches.match(evt.request).then(function(response) {
            if (response) {
                return response;
            }

            return fetch(evt.request).then(
                function(response) {
                    if (!response || response.status !== 200 || response.type !== 'basic') {
                        return response;
                    }

                    var responseToCache = response.clone();

                    caches.open(STATIC_CACHE_NAME).then(function(cache) {
                        /* Limit cache versioning */
                        limitCacheVersion(evt.request.url);
                        /* Save / clone to cache */
                        cache.put(evt.request, responseToCache);
                    });

                    return response;
                }
            );
        })
    )
}

function netFirst(evt){
    evt.respondWith(
        fetch(evt.request).then(fetchRes => {
            /* if url request is beranda, about etc. save page to cache for offline */
            if (
                   evt.request.url.indexOf('/beranda') >= 0 
                || evt.request.url.indexOf('/about') >= 0 
                || evt.request.url.indexOf('/panduan-belanja') >= 0 
                || evt.request.url.indexOf('/syarat-dan-ketentuan') >= 0 
                || evt.request.url.indexOf('/kebijakan-privasi') >= 0 
                || evt.request.url.indexOf('/blog') >= 0
            ){
                return caches.open(STATIC_CACHE_NAME).then(cache => {
                    /* Limit cache versioning */
                    limitCacheVersion(evt.request.url);
                    /* Save / clone to cache */
                    cache.put(evt.request.url, fetchRes.clone());
                    return fetchRes;
                })
            }
            /* else, always show online data */
            else {
                return fetchRes;
            }
        }).catch(() => {
            /* If user is online, call cache */
            return caches.match(evt.request).then(cacheRes => {
                /* if url cache exist, show cache */
                if (cacheRes) {
                    return cacheRes;
                }
                /* else, show offline page */
                else {
                    return caches.match('offline.html');
                }
            });
        })
    )
}



// self.addEventListener("install", e => {
//     e.waitUntil(
//         caches.open(STATIC_CACHE_NAME).then(cache => {
//             return cache.addAll(urlToCache);
//         })
//     );
// });

self.addEventListener('fetch', e => {
    e.respondWith(
        fetch(e.request).then(fetchRes => { // If online, fetch url request
            return fetchRes;
        }).catch(() => {
            return caches.match(e.request).then(cacheRes => {
                /*If url cache exist, call cache page. If url cache not exist, offline page*/
                return (cacheRes) ? cacheRes : caches.match('offline.html');
            });
        })
    );
});

self.addEventListener('activate', e => {
    e.waitUntil(
        caches.keys().then(keys => {
            return Promise.all(
                keys.filter(key => key !== STATIC_CACHE_NAME)
                    .map(key => caches.delete(key))
            );
        })
    );
});

/*Notification click event listener*/
self.addEventListener('notificationclick', e => {
    /*Close the notification popout*/
    e.notification.close();

    /*Get all the Window clients*/
    e.waitUntil(
        clients.matchAll({type: 'window'}).then( windowClients => {
            const url = e.notification.data.url;
            console.log(url)
            console.log(windowClients)

            /*Check if there is already a window/tab open with the target URL*/
            if (windowClients) {
                var client = windowClients[0];

                return client.navigate(url).then(client => 
                    client.focus()
                );
            } else {
                /*If not, then open the target URL in a new window/tab.*/
                // if (clients.openWindow) return clients.openWindow(url);
                return clients.openWindow(url);
            }

            /*Check if there is already a window/tab open with the target URL*/
            // for (var i = 0; i < windowClients.length; i++) {
                // var client = windowClients[0];
                // If so, just focus it.
                // if (client.url === url && 'focus' in client) return client.focus();
                // if (client.url === url) return client.navigate(url).then(client => client.focus())

                // return client.navigate(url).then(() => {
                    // client.focus()
                // });
            // }

            /*If not, then open the target URL in a new window/tab.*/
            // if (clients.openWindow) return clients.openWindow(url);
        })
    );
});
