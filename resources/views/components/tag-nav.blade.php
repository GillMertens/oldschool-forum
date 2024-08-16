@foreach($tags as $tag)
    <div class="flex items-center">
        <div>{{ $tag->name }}</div>
    </div>
@endforeach
