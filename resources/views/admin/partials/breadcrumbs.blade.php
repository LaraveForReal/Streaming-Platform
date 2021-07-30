<ol class="breadcrumb mb-4 mt-4">
    @php $segments = ''; @endphp
    @foreach( request()->segments() as $urlSegment )
        @php $segments .= '/'.$urlSegment; @endphp
        <li class="breadcrumb-item"><a href="{{$segments}}">{{ Str::of($urlSegment)->title() }}</a></li>
    @endforeach
</ol>
