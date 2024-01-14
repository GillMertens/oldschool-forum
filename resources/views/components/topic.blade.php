<tr class="border-b cursor-pointer hover-first" onclick="window.location.href = '{{ route('topics.show', $topic->slug) }}'">
    <td class="px-1 py-2 pl-4 border-l-4 border-transparent box-border">
        <span class="text-up-1 text-primary">{{ $topic->title }}</span>
        <div class="text-down-1 text-gray-500">
            <div class="flex items-center">
                <div style="width: 10px; height: 10px; background-color: #{{ $topic->category->color }}; margin-right: 8px;"></div>
                <div>{{ $topic->category->name }}</div>
            </div>
        </div>
    </td>
    <td class="px-1 py-2">
        <div class="flex justify-center items-center">
            <div class="w-[24px] h-[24px] bg-gray-500 rounded-full"></div>
        </div>
    </td>
    <td class="px-1 py-2 text-center">
        <span class="font-bold">{{ $topic->comments->count() }}</span>
    </td>
    <td class="px-1 py-2">
        <span>{{ $topic->updated_at->diffForHumans() }}</span>
    </td>
</tr>
