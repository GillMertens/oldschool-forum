<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 mb-8 w-full bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                    Special Thanks
                </h2>
                <p>
                    A special thanks to the <a href="https://computerclub.forum/" class="text-blue-500 underline">Computer Club Forum</a> for the layout inspiration.
                </p>
            </div>

            <div class="my-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                    How to Start
                </h2>
                <ol class="list-decimal list-inside">
                    <li>Clone the repository: <code>git clone https://github.com/username/repository.git</code></li>
                    <li>Navigate to the project directory: <code>cd repository</code></li>
                    <li>Install Composer dependencies: <code>composer install</code></li>
                    <li>Install NPM dependencies: <code>npm install</code></li>
                    <li>Copy the example environment file: <code>cp .env.example .env</code></li>
                    <li>Generate an application key: <code>php artisan key:generate</code></li>
                    <li>Set up your <code>.env</code> file according to your environment.</li>
                    <li>Run the migrations: <code>php artisan migrate</code></li>
                    <li>(Optional) Seed the database: <code>php artisan db:seed</code></li>
                    <li>Make a symbolic link for the storage <code>php artisan storage:link</code></li>
                </ol>
            </div>

            <h2 class="text-up-2">Resources:</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-bold text-xl mb-4">Laravel Documentation</h3>
                    <p>The official Laravel documentation is a comprehensive guide to the framework.</p>
                    <a href="https://laravel.com/docs" class="text-blue-500 hover:underline">https://laravel.com/docs</a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-bold text-xl mb-4">Laracasts</h3>
                    <p>Laracasts provides video tutorials on Laravel and related technologies.</p>
                    <a href="https://laracasts.com" class="text-blue-500 hover:underline">https://laracasts.com</a>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-bold text-xl mb-4">Stack Overflow</h3>
                    <p>Stack Overflow is a community of developers answering questions on a wide range of topics, including Laravel.</p>
                    <a href="https://stackoverflow.com/questions/tagged/laravel" class="text-blue-500 hover:underline">https://stackoverflow.com/questions/tagged/laravel</a>
                </div>
            </div>

            <div class="mt-8 mb-8 w-full bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                    Github link
                </h2>
                <p>
                    <a href="https://github.com/GillMertens/oldschool-forum" class="text-blue-500 underline">My github link</a>
                </p>
            </div>

            https://github.com/GillMertens/oldschool-forum
        </div>
    </div>
</x-app-layout>
