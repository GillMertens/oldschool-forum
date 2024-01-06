<x-app-layout>
    <table class="w-full px-3">
        <thead class="border-b-[2px]">
            <tr class="text-primary-high">
                <th class="w-auto text-left px-1 py-2 pl-4 font-normal">Topic</th>
                <th class="w-8 text-left px-1 py-2 font-normal"></th>
                <th class="w-12 text-left px-1 py-2 font-normal">Antwoorden</th>
                <th class="w-[60px] text-left px-1 py-2 pr-4 font-normal">Activiteit</th>
            </tr>
        </thead>
        <tbody class="px-3 text-primary-high">
            @include('topics.index')
        </tbody>
    </table>
</x-app-layout>
