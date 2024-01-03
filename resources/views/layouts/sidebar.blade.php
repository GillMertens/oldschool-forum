<div class="sidebar-wrapper">
    <section id="d-sidebar" class="w-64">
        <div class="sidebar-sections">
            <div class="custom-sidebar-sections">

            </div>
            <div class="categories">
                @foreach($categories as $category)
                    <div>{{ $category->name }}</div> <!-- Assuming the category has a 'name' field -->
                @endforeach
            </div>
            <div class="tags">tags</div>

        </div>
    </section>
</div>
