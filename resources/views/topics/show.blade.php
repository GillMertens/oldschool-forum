<x-app-layout>
    <div class="border-b pb-4">
        <header>
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
                <div class="w-12 h-12 bg-gray-200 rounded-full">
                    @if ($topic->user->img)
                        <img id="preview" src="{{ asset($topic->user->img) }}" alt="Profile picture" class="w-12 h-12 rounded-full object-cover">
                    @endif
                </div>
                <div class="ml-2">
                    <div class="text font-bold">{{ $topic->user->username }}</div>
                    <div class="text-down-1 text-gray-500">{{ $topic->created_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <p class="">{{ $topic->body }}</p>
        </div>
        <div class="w-full flex justify-end">
            <div class="mt-4 ml-auto flex relative">
                @foreach($reactionEmojis as $emoji)
                    @php
                        $count = $topic->reactions->where('reaction_emoji_id', $emoji->id)->count();
                        $userReaction = $topic->reactions->where('reaction_emoji_id', $emoji->id)->where('user_id', auth()->id())->first();
                    @endphp
                    @if($count > 0)
                        <form action="{{ route('reactions.store') }}" method="POST" class="flex items-center mx-1 px-1 rounded hover:bg-gray-100 {{ $userReaction ? 'bg-blue-200' : '' }}">
                            @csrf
                            <input type="hidden" name="emoji_id" value="{{ $emoji->id }}">
                            <input type="hidden" name="reactable_type" value="App\Models\Topic">
                            <input type="hidden" name="reactable_id" value="{{ $topic->id }}">
                            <button type="submit">{!! '&#x' . substr($emoji->emoji_code, 2) . ';' !!}</button>
                            <span class="ml-1">{{ $count }}</span>
                        </form>
                    @endif
                @endforeach
                <button class="like-button mx-1 px-2" data-id="{{ $topic->id }}">Like</button>
                <div id="emoji-popup-{{ $topic->id }}" class="emoji-popup absolute left-1/2 transform -translate-x-1/2 -translate-y-full mt-2 bg-white border rounded shadow flex hidden">
                    @foreach($reactionEmojis as $emoji)
                        <form action="{{ route('reactions.store') }}" method="POST" class="p-2 hover:bg-gray-200 cursor-pointer">
                            @csrf
                            <input type="hidden" name="emoji_id" value="{{ $emoji->id }}">
                            <input type="hidden" id="reactable_type" name="reactable_type" value="App\Models\Topic">
                            <input type="hidden" name="reactable_id" value="{{ $topic->id }}">
                            <button type="submit">{!! '&#x' . substr($emoji->emoji_code, 2) . ';' !!}</button>
                        </form>
                    @endforeach
                </div>
                <button data-type="comment" class="open-drawer-button bg-gray-500 text-white px-3 py-1.5">Antwoorden</button>
            </div>
        </div>
    </div>
    @foreach($topic->comments as $comment)
        <div class="mt-4 pb-4 border-b transition" id="comment-{{ $comment->id }}">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gray-200 rounded-full">
                    @if ($comment->user->img)
                        <img id="preview" src="{{ asset($comment->user->img) }}" alt="Profile picture" class="w-12 h-12 rounded-full object-cover">
                    @endif
                </div>
                <div class="ml-2">
                    <div class="font-bold">{{ $comment->user->username }}</div>
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
                <div class="ml-auto flex relative">
                    @foreach($reactionEmojis as $emoji)
                        @php
                            $count = $comment->reactions->where('reaction_emoji_id', $emoji->id)->count();
                            $userReaction = $comment->reactions->where('reaction_emoji_id', $emoji->id)->where('user_id', auth()->id())->first();
                        @endphp
                        @if($count > 0)
                            <form action="{{ route('reactions.store') }}" method="POST" class="flex items-center mx-1 px-1 rounded hover:bg-gray-100 {{ $userReaction ? 'bg-blue-200' : '' }}">
                                @csrf
                                <input type="hidden" name="emoji_id" value="{{ $emoji->id }}">
                                <input type="hidden" id="reactable_type" name="reactable_type" value="App\Models\Comment">
                                <input type="hidden" name="reactable_id" value="{{ $comment->id }}">
                                <button type="submit">{!! '&#x' . substr($emoji->emoji_code, 2) . ';' !!}</button>
                                <span class="ml-1">{{ $count }}</span>
                            </form>
                        @endif
                    @endforeach
                    <button class="like-button mx-1 px-2" data-id="{{ $comment->id }}">Like</button>
                    <div id="emoji-popup-{{ $comment->id }}" class="emoji-popup absolute left-1/2 transform -translate-x-1/2 -translate-y-full mt-2 bg-white border rounded shadow flex hidden">
                        @foreach($reactionEmojis as $emoji)
                            <form action="{{ route('reactions.store') }}" method="POST" class="p-2 hover:bg-gray-200 cursor-pointer">
                                @csrf
                                <input type="hidden" name="emoji_id" value="{{ $emoji->id }}">
                                <input type="hidden" name="reactable_type" value="App\Models\Comment">
                                <input type="hidden" name="reactable_id" value="{{ $comment->id }}">
                                <button type="submit">{!! '&#x' . substr($emoji->emoji_code, 2) . ';' !!}</button>
                            </form>
                        @endforeach
                    </div>
                    <button data-type="reply" data-comment-id="{{ $comment->id }}" class="open-drawer-button bg-gray-500 text-white px-3 py-1.5">Antwoorden</button>
                </div>
            </div>
            @if($comment->replies->count() > 0)
                <div class="reply-dropdown hidden mt-2 ml-4 px-4 py-2 border" id="reply-dropdown-{{ $comment->id }}">
                    @foreach($comment->replies as $reply)
                        <div class="reply-preview px-4 py-2 border-b hover:bg-gray-100 transition cursor-pointer" data-reply-id="{{ $reply->id }}">
                            <div class="flex items-center">
                                <div class="w-[24px] h-[24px] bg-gray-500 rounded-full"></div>
                                <div class="ml-2">
                                    <div class="font-bold">{{ $reply->user->username }}</div>
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
    <div id="drawer" class="fixed z-50 bottom-0 left-0 w-full h-fit py-4 px-8 border-t-8 border-t-blue-600 bg-white transform translate-y-full transition-transform">
        @include('comments.partials.create')
    </div>
    <div class="mb-[100em]"></div>
</x-app-layout>
