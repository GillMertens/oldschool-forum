<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-4">Create FAQ</h2>
                <form action="{{ route('faq.store') }}" method="POST" class="w-full max-w-lg">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
                                Category
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="category" type="text" name="category" required>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="question">
                                Question
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="question" type="text" name="question" required>
                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3">
                            <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                Create FAQ
                            </button>
                        </div>
                        <div class="md:w-2/3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-4">FAQs</h2>
                @foreach($faqs as $faq)
                    <div class="mb-4 flex flex-col gap-4">

                        <div class="border border-gray-300 p-2 border rounded-t-lg">
                            <h3 class="text-lg font-semibold">{{ $faq->question }}</h3>
                            <p>{{ $faq->category }}</p>
                        </div>
                        @foreach ($faq->faqAnswers as $answer)
                            <div class="border-b border-gray-300 px-2">
                                <p>{{ $answer->answer }}</p>
                            </div>
                        @endforeach
                        <form action="{{ route('faqAnswer.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="faq_id" value="{{ $faq->id }}">
                            <textarea name="answer" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4" placeholder="Write an answer..."></textarea>
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-400">Submit Answer</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
