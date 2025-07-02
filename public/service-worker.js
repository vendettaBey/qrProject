const CACHE_NAME = 'qrmenu-cache-v1';
const urlsToCache = [
  '/',
  '/css/filament/filament/app.css',
  '/js/filament/filament/app.js',
  '/favicon.ico',
];

self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => cache.addAll(urlsToCache))
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => response || fetch(event.request))
  );
}); 