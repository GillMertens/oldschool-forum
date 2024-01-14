<x-app-layout>
    <header class="border-b pb-4">
        <h1 class="text-up-4 font-bold">{{ $topic->title }}</h1>
        <div class="text-down-1 text-gray-500">
            <div class="flex items-center">
                <div style="width: 10px; height: 10px; background-color: #{{ $topic->category->color }}; margin-right: 8px;"></div>
                <div>{{ $topic->category->name }}</div>
            </div>
        </div>
    </header>
    <div class="mt-4">
        <div class="flex items-center">
            <div class="w-[48px] h-[48px] bg-gray-500 rounded-full"></div>
            <div class="ml-2">
                <div class="text font-bold">{{ $topic->user->username }}</div>
                <div class="text-down-1 text-gray-500">{{ $topic->created_at->diffForHumans() }}</div>
            </div>
        </div>
    </div>
    <div class="mt-4 pb-4 border-b">
        <p class="">{{ $topic->body }}</p>
    </div>
    @foreach($topic->comments as $comment)
        <div class="mt-4 pb-4 border-b" id="comment-{{ $comment->id }}">
            <div class="flex items-center">
                <div class="w-[48px] h-[48px] bg-gray-500 rounded-full"></div>
                <div class="ml-2">
                    <div class="text-up-2 font-bold">{{ $comment->user->username }}</div>
                    <div class="text-down-1 text-gray-500">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
            </div>
            <div class="mt-4">
                <p class="">{{ $comment->body }}</p>
            </div>
            <div class="post-controls mt-4 flex">
                @if($comment->replies->count() !== 0)
                    <button class="reply-button" data-comment-id="{{ $comment->id }}">Replies</button>
                @endif
                <div>
                    <button class="like-button" data-comment-id="{{ $comment->id }}">Like</button>
                    <button class="comment-button" data-comment-id="{{ $comment->id }}">Antwoorden</button>
                </div>
            </div>
            @if($comment->replies->count() > 0)
                <div class="reply-dropdown hidden mt-2 ml-4 px-4 py-2 border" id="reply-dropdown-{{ $comment->id }}">
                    @foreach($comment->replies as $reply)
                        <div class="reply-preview" data-reply-id="{{ $reply->id }}">
                            <div class="flex items-center">
                                <div class="w-[24px] h-[24px] bg-gray-500 rounded-full"></div>
                                <div class="ml-2">
                                    <div class="text-up-1 font-bold">{{ $reply->user->username }}</div>
                                    <div class="text-down-1 text-gray-500">{{ $reply->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                            <p class="">{{ $reply->body }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endforeach
</x-app-layout>
