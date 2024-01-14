import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
    }

    var container = document.querySelector('#topics-container');
    var sentinel = document.querySelector('#sentinel');
    var loading = document.querySelector('#loading');
    var endOfContent = document.querySelector('#end-of-content');

    function loadMoreTopics(url) {
        loading.style.display = 'flex'; // Show the loading spinner

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
                } else {
                    observer.disconnect(); // Disconnect the observer when there are no more topics to load
                    endOfContent.style.display = 'block'; // Show the end of content disclaimer
                }
                loading.style.display = 'none'; // Hide the loading spinner
            });
    }

    var observer = new IntersectionObserver(function(entries) {
        if (entries[0].isIntersecting) {
            loadMoreTopics(sentinel.dataset.url);
        }
    }, { threshold: 0.1 });

    observer.observe(sentinel);
});

document.querySelectorAll('.reply-button').forEach(function(button) {
    button.addEventListener('click', function() {
        let commentId = this.dataset.commentId;
        let dropdown = document.getElementById('reply-dropdown-' + commentId);
        dropdown.classList.toggle('hidden');
    });
});

document.querySelectorAll('.reply-preview').forEach(function(preview) {
    preview.addEventListener('click', function() {
        let replyId = this.dataset.replyId;
        let replyElement = document.getElementById('comment-' + replyId);
        replyElement.scrollIntoView({ behavior: 'smooth' });
    });
});
