<div class="sidebar-wrapper">
    <section id="d-sidebar" class="w-64">
        <div class="sidebar-sections">
            <div class="custom-sidebar-sections">

            </div>
            <x-sidebar-section title="Categorieën">
                @foreach($categories as $category)
                    <div style="display: flex; align-items: center;">
                        <div style="width: 16px; height: 16px; background-color: #{{ $category->color }}; margin-right: 8px;"></div>
                        <div>{{ $category->name }}</div>
                    </div>
                @endforeach
            </x-sidebar-section>
            <x-sidebar-section title="Tags">
                @foreach($tags as $tag)
                    <div style="display: flex; align-items: center;">
                        <div>{{ $tag->name }}</div>
                    </div>
                @endforeach
            </x-sidebar-section>
            <div class="tags">tags</div>

        </div>
    </section>
</div>
