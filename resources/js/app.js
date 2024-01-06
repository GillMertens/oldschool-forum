import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    var container = document.querySelector('#topics-container');
    var sentinel = document.querySelector('#sentinel');

    function loadMoreTopics(url) {
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                container.innerHTML += data.topics;
                if (data.next_page) {
                    sentinel.dataset.url = data.next_page;
                }
            });
    }

    var observer = new IntersectionObserver(function(entries) {
        if (entries[0].isIntersecting) {
            observer.disconnect();
            loadMoreTopics(sentinel.dataset.url);
        }
    }, { threshold: 1.0 });

    observer.observe(sentinel);
});
