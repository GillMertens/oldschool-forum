<div x-data="{ open: true }">
    <header @click="open = !open" class="cursor-pointer flex items-center">
        <svg :class="{'transform rotate-90': open}" class="w-4 h-4 text-gray-500 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="ml-2">{{ $title }}</span>
    </header>
    <div x-show="open" class="mb-3 mt-1">
        {{ $slot }}
    </div>
</div>
