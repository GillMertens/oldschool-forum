<div class="sidebar-wrapper">
    <section id="d-sidebar" class="">
        <div class="sidebar-sections">
            <div class="custom-sidebar-sections">

            </div>
            @Auth
                @if(auth()->user()->hasRole('admin'))
                    <div class="flex flex-col">
                        <a href="{{route('faq.index')}}">FAQ</a>
                        <a href="{{route('about')}}">About</a>
                    </div>
                @endif
            @endAuth
            @auth()
                @if(!auth()->user()->hasRole('admin'))
                    <x-sidebar-section title="Categorieën">
                        @include('components.category-nav')
                    </x-sidebar-section>
                    <x-sidebar-section title="Tags">
                        @include('components.tag-nav')
                    </x-sidebar-section>
                    <div class="flex flex-col">
                        <a href="{{route('faq.index')}}">FAQ</a>
                        <a href="{{route('about')}}">About</a>
                    </div>
                @endif
            @endauth
            @if(!auth()->user())
                <x-sidebar-section title="Categorieën">
                    @include('components.category-nav')
                </x-sidebar-section>
                <x-sidebar-section title="Tags">
                    @include('components.tag-nav')
                </x-sidebar-section>
                <div class="flex flex-col">
                    <a href="{{route('faq.index')}}">FAQ</a>
                    <a href="{{route('about')}}">About</a>
                </div>
            @endif
        </div>
    </section>
</div>
