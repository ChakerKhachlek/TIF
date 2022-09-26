<div class="widget">
    <h5>Explore</h5>
    <ul>
        <li><a href="{{ route('explore') }}">Explore</a></li>
        @if(!empty($first_category))
        <li><a href="{{ route('categories.show',['id'=>$first_category->id,'name'=>$first_category->name]) }}">Categories</a></li>
        @endif

        @if(!empty($first_style))
        <li><a href="{{ route('styles.show',['id'=>$first_style->id,'name'=>$first_style->name]) }}">Style</a></li>
        @endif


    </ul>
</div>
