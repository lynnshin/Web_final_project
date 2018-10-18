// Copyright 2016 Google Inc.
// 
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
// 
//      http://www.apache.org/licenses/LICENSE-2.0
// 
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

var dataCacheName = 'tank';
var filesToCache = [
  '/',
  '/index.html',
  '/tank.html',
  '/TemplateData/inline.css',
  '/images/overlay.png',
  '/images/bg.jpg',
  '/scripts/app.js',  
  '/Build/webtank.asm.code.unityweb',
  '/Build/webtank.asm.framework.unityweb',  
  '/Build/webtank.asm.memory.unityweb',  
  '/Build/webtank.data.unityweb',  
  '/Build/webtank.json',  
  '/Build/UnityLoader.js',    
  '/TemplateData/bg.jpg',  
  '/TemplateData/fullscreen.png', 
  '/TemplateData/overlay.png', 
  '/TemplateData/progressEmpty.Dark.png', 
  '/TemplateData/progressEmpty.Light.png', 
  '/TemplateData/progressFull.Dark.png', 
  '/TemplateData/progressFull.Light.png', 
  '/TemplateData/progressLogo.Dark.png', 
  '/TemplateData/progressLogo.Light.png', 
  '/TemplateData/style.css',
  '/TemplateData/UnityProgress.js',
  '/TemplateData/webgl-logo.png'
];

self.addEventListener('install', function(e) {
  console.log('[ServiceWorker] Install');
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      console.log('[ServiceWorker] Caching app shell');
      return cache.addAll(filesToCache);
    })
  );
});

// activate
self.addEventListener('activate', event => {
    console.log('now ready to handle fetches!');
    event.waitUntil(
    caches.keys().then(function(cacheNames) {
      var promiseArr = cacheNames.map(function(item) {
        if (item !== cacheName) {
          // Delete that cached file
          return caches.delete(item);
        }
      })
      return Promise.all(promiseArr);
    })
  ); // end e.waitUntil
});

// fetch
self.addEventListener('fetch', function(e) {  
  console.log('[ServiceWorker] Fetch', e.request.url);  
  e.respondWith(  
    caches.match(e.request).then(function(response) {  
      return response || fetch(e.request);  
    })  
  );  
});

/*self.addEventListener('install', function(e) {
  console.log('[ServiceWorker] Install');
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      console.log('[ServiceWorker] Caching app shell');
      return cache.addAll(filesToCache);
    })
  );
});

self.addEventListener('activate', function(e) {
  console.log('[ServiceWorker] Activate');
  e.waitUntil(
    caches.keys().then(function(keyList) {
      return Promise.all(keyList.map(function(key) {
        if (key !== cacheName && key !== dataCacheName) {
          console.log('[ServiceWorker] Removing old cache', key);
          return caches.delete(key);
        }
      }));
    })
  );

  return self.clients.claim();
});

self.addEventListener('fetch', function(e) {
  console.log('[Service Worker] Fetch', e.request.url);
  var dataUrl = 'https://query.yahooapis.com/v1/public/yql';
  if (e.request.url.indexOf(dataUrl) > -1) {

    e.respondWith(
      caches.open(dataCacheName).then(function(cache) {
        return fetch(e.request).then(function(response){
          cache.put(e.request.url, response.clone());
          return response;
        });
      })
    );
  } else {

    e.respondWith(
      caches.match(e.request).then(function(response) {
        return response || fetch(e.request);
      })
    );
  }
});*/
