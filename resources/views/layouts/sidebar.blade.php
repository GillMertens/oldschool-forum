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
                        @foreach($categories as $category)
                            <div class="flex items-center" style="display: flex; align-items: center;">
                                <div class="w-[12px] h-[12px] bg-[#{{ $category->color }}] mr-2" style="background-color: #{{ $category->color }}"></div>
                                <div>{{ $category->name }}</div>
                            </div>
                        @endforeach
                    </x-sidebar-section>
                    <x-sidebar-section title="Tags">
                        @foreach($tags as $tag)
                            <div class="flex items-center">
                                <div>{{ $tag->name }}</div>
                            </div>
                        @endforeach
                    </x-sidebar-section>
                    <div class="flex flex-col">
                        <a href="{{route('faq.index')}}">FAQ</a>
                        <a href="{{route('about')}}">About</a>
                    </div>
                @endif
            @endauth
            @if(!auth()->user())
                <x-sidebar-section title="Categorieën">
                    @foreach($categories as $category)
                        <div class="flex items-center" style="display: flex; align-items: center;">
                            <div class="w-[12px] h-[12px] bg-[#{{ $category->color }}] mr-2" style="background-color: #{{ $category->color }}"></div>
                            <div>{{ $category->name }}</div>
                        </div>
                    @endforeach
                </x-sidebar-section>
                <x-sidebar-section title="Tags">
                    @foreach($tags as $tag)
                        <div class="flex items-center">
                            <div>{{ $tag->name }}</div>
                        </div>
                    @endforeach
                </x-sidebar-section>
                <div class="flex flex-col">
                    <a href="{{route('faq.index')}}">FAQ</a>
                    <a href="{{route('about')}}">About</a>
                </div>
            @endif
        </div>
    </section>
</div>
