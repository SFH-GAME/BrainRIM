const CACHE_NAME = 'pwa-cache-v1';
const urlsToCache = [
   '/',
   '/styles.css',
   '/script.js'
];

// Устанавливаем Service Worker и кэшируем ресурсы
self.addEventListener('install', event => {
   event.waitUntil(
      caches.open(CACHE_NAME).then(cache => {
         return cache.addAll(urlsToCache);
      })
   );
});

// Обслуживаем запросы из кэша
self.addEventListener('fetch', event => {
   event.respondWith(
      caches.match(event.request).then(response => {
         return response || fetch(event.request);
      })
   );
});

// Обновляем Service Worker
self.addEventListener('activate', event => {
   const cacheWhitelist = [CACHE_NAME];
   event.waitUntil(
      caches.keys().then(cacheNames => {
         return Promise.all(
            cacheNames.map(cacheName => {
               if (!cacheWhitelist.includes(cacheName)) {
                  return caches.delete(cacheName);
               }
            })
         );
      })
   );
});
