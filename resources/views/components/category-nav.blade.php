@foreach($categories as $category)
    <a href="{{ route('categories.show', ['name' => $category->name]) }}" class="flex items-center cursor-pointer hover:bg-gray-100 text-black visited:text-black" style="display: flex; align-items: center;">
        <div class="w-[12px] h-[12px] bg-[#{{ $category->color }}] mr-2" style="background-color: #{{ $category->color }}"></div>
        <div>{{ $category->name }}</div>
    </a>
@endforeach
