<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($faqs as $faq)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $faq->category }}
                        </h3>
                        <p class="mt-2 max-w-4xl text-sm text-gray-500">
                            {{ $faq->question }}
                        </p>
                        @foreach($faq->faqAnswers as $answer)
                            <p class="mt-1 text-sm text-gray-500">
                                {{ $answer->answer }}
                            </p>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
