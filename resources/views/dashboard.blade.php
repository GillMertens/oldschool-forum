<x-app-layout>
    <table class="w-full">
        <thead class="border-b-[2px]">
        <tr class="text-primary-high">
            <th class="w-auto text-left px-1 py-2 pl-4 font-normal">Topic</th>
            <th class="w-8 text-left px-1 py-2 font-normal"></th>
            <th class="w-12 text-left px-1 py-2 font-normal">Antwoorden</th>
            <th class="w-[60px] text-left px-1 py-2 pr-4 font-normal">Activiteit</th>
        </tr>
        </thead>
        <tbody id="topics-container" class="px-3 text-primary-high">
            @include('topics.partials.index')
        </tbody>
    </table>
    <div id="sentinel" class="h-4" data-url="{{ route('dashboard') }}"></div>
    <div class="flex justify-center items-center">
        <div id="loading" class="w-5 h-5 border-t-4 border-blue-500 rounded-lg animate-spin py-8" style="display: none;"></div>
    </div>
    <div id="end-of-content" style="display: none;">
        <h3 class="text-up-1 font-semibold">Er zijn verder geen topics in Technieuws. <a class="text-blue">Klaar om een nieuw gesprek te beginnen?</a></h3>
    </div>
</x-app-layout>
