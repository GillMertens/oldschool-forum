<form action="{{ route('comments.store') }}" method="POST" class="flex flex-col gap-4 w-1/2 mx-auto">
    @csrf
    <textarea name="body" id="body" cols="30" rows="10" placeholder="Typ hier"></textarea>
    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
    <input type="hidden" id="comment_id" name="comment_id">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2">Antwoorden</button>
</form>
