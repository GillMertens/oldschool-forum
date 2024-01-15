<form action="{{ route('topics.store') }}" method="POST" class="flex flex-col gap-4 w-1/2 mx-auto">
    @csrf
    <x-text-input name="title" placeholder="Title" class="text-base leading-4"/>
    <fieldset class="flex">
        <div class="relative w-1/2">
            <label for="category-id" id="category-button" class="text-base leading-4 py-2 px-2.5  border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block">Select a category</label>
            <input type="hidden" name="category_id" id="category-id">
            <div id="category-dropdown" class="absolute left-0 max-h-48 overflow-y-scroll w-96 mt-2 bg-white border rounded shadow hidden">
                @foreach($categories as $category)
                    <div class="p-2 hover:bg-gray-200 cursor-pointer" data-category-id="{{ $category->id }}">
                        <div class="text-down-1 text-gray-500">
                            <div class="flex items-center">
                                <div class="category-color w-[10px] h-[10px]" style="background-color: #{{ $category->color }}; margin-right: 8px;"></div>
                                <div class="category-name">{{ $category->name }} x{{ $category->topics->count() }}</div>
                            </div>
                        </div>
                        <div class="text-sm text-gray-500">{{ $category->description }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </fieldset>
    <textarea name="body" id="body" cols="30" rows="10"></textarea>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Topic</button>
</form>
