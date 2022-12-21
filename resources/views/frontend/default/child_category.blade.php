<li><a href="#" class="sf-with-ul">{{$child_category->name}}</a></li>
@if($child_category->categories)
    <ul>
        @foreach($child_category->categories as $child_category)
            <li><a href="#"  class="sf-with-ul"> @include("frontend.default.child_category",['child_category'=>$child_category])</a></li>
        @endforeach
    </ul>
@endif
