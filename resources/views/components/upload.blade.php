<div x-data="picturePreview()">
    <label for="upload" class="block text-sm font-medium text-gray-700">Profile picture</label>
    <div class="flex items-center gap-2 mt-1">
        <div class="rounded-md bg-gray-300">
            @if (auth()->user()->img)
                <img id="preview" src="{{ auth()->user()->img }}" alt="Profile picture" class="w-24 h-24 rounded-md object-cover">
                @else
                <img id="preview" src="" alt="" class="w-24 h-24 rounded-md object-cover">
            @endif
        </div>
        <div>
            <x-secondary-button class="relative">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                    </svg>
                </div>
                <span class="ms-2">Upload picture</span>
                <input @change="preview(event)" type="file" id="img" name="img" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
            </x-secondary-button>
        </div>
    </div>
    <script>
        function picturePreview(input) {
            return {
                preview: (event) => {
                    const file = event.target.files[0];
                    const reader = new FileReader();
                    reader.onload = function () {
                        document.querySelector('#preview').src = reader.result;
                    };
                    reader.readAsDataURL(file);
                },
                init() {
                    document.querySelector('#preview').addEventListener('change', this.preview);
                }
            };
        }
    </script>
</div>
