(function() {
if('serviceWorker' in navigator) {   
        location.protocol === 'https:' && navigator.serviceWorker && navigator.serviceWorker.register('140.136.150.91/webproject/service-worker.js');  
        .then(function() { console.log('Service Worker Registered'); });  
}
})();