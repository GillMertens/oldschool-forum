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
    console.log(loading);
    var endOfContent = document.querySelector('#end-of-content');

    function loadMoreTopics(url, categoryId) {
        loading.style.display = 'flex'; // Show the loading spinner

        let body = {};
        if (categoryId) {
            body.category_id = categoryId;
        }

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(body),
            method: 'POST'
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
            let categoryId = sentinel.dataset.hasOwnProperty('category') ? sentinel.dataset.category : null;
            console.log(sentinel.dataset.url, categoryId);
            loadMoreTopics(sentinel.dataset.url, categoryId);
        }
    }, { threshold: 0.1 });

    observer.observe(sentinel);
});


document.querySelectorAll('.open-drawer-button').forEach(function(button) {
    button.addEventListener('click', function() {
        let type = this.dataset.type;

        if (type === 'reply') {
            let commentId = this.dataset.commentId;
            document.getElementById('comment_id').value = commentId;
        } else if (type === 'comment') {
            document.getElementById('comment_id').value = '';
        }

        document.getElementById('drawer').classList.toggle('translate-y-full');
    });
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

        let dummyElement = document.createElement('div');
        dummyElement.style.position = 'relative';
        dummyElement.style.top = '-7em';
        replyElement.insertBefore(dummyElement, replyElement.firstChild);

        dummyElement.scrollIntoView({ behavior: 'smooth' });

        // Add the highlight class to the reply element
        replyElement.classList.add('bg-gray-200', 'opacity-100');

        setTimeout(function() {
            // Remove the highlight class after a few seconds
            replyElement.classList.remove('bg-gray-200', 'opacity-100');
            replyElement.removeChild(dummyElement);
        }, 2000);
    });
});

let emojiPopup = document.getElementById('emoji-popup');

document.querySelectorAll('.like-button').forEach(function(button) {
    button.addEventListener('mouseover', function() {
        console.log(this.dataset.id, 'mouseover');
        let emojiPopup = document.getElementById('emoji-popup-' + this.dataset.id);
        emojiPopup.classList.remove('hidden');
    });

    button.addEventListener('mouseout', function() {
        let emojiPopup = document.getElementById('emoji-popup-' + this.dataset.id);
        setTimeout(function() {
            if (!emojiPopup.matches(':hover')) {
                emojiPopup.classList.add('hidden');
            }
        }, 500);
    });
});

document.querySelectorAll('.emoji-popup').forEach(function(popup) {
    popup.addEventListener('mouseout', function() {
        setTimeout(function() {
            if (!popup.matches(':hover')) {
                popup.classList.add('hidden');
            }
        }, 500);
    });
});

document.getElementById('category-button').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('category-dropdown').classList.toggle('hidden');
});

document.querySelectorAll('#category-dropdown div').forEach(function(categoryDiv) {
    categoryDiv.addEventListener('click', function() {
        let categoryId = this.dataset.categoryId;
        let categoryName = this.querySelector('.category-name').innerText;
        let categoryColor = this.querySelector('.category-color').style.backgroundColor;

        // Remove the topic count from the category name
        categoryName = categoryName.replace(/ x\d+/, '');

        console.log(categoryColor);
        // Update the inner HTML of the label
        document.getElementById('category-button').innerHTML = `
            <div class="flex items-center">
                <div style="width: 10px; height: 10px; background-color: ${categoryColor}; margin-right: 8px;"></div>
                <div>${categoryName}</div>
            </div>
        `;

        document.getElementById('category-id').value = categoryId;
        document.getElementById('category-dropdown').classList.add('hidden');
    });
});
