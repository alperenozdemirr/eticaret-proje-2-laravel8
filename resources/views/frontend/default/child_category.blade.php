<li><a href="{{route('category.url',$child_category->id)}}" @if($child_category->categories->count()!=0) class="sf-with-ul" @endif >{{$child_category->name}}</a>
@if($child_category->categories->count()!=0)
        <ul>
        @foreach($child_category->categories as $child_category)
             @include("frontend.default.child_category",['child_category'=>$child_category])
         @endforeach</ul>
@endif</li>
