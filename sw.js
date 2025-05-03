const CACHE_NAME = 'pwa-cache-v10';
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
      fetch(event.request) // Пытаемся загрузить файл с сервера
         .then(response => {
            return caches.open(CACHE_NAME).then(cache => {
               cache.put(event.request, response.clone()); // Кладем свежий файл в кэш
               return response;
            });
         })
         .catch(() => caches.match(event.request)) // Если не удалось загрузить — берём из кэша
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
