@extends('layout.app')

@include('partials.header', [
    'bgImage' => 'assets/img/blog.jpg',
    'title' => 'Search Blogs',
    'subtitle' => 'Search Blogs From Your Favourite Writers'
])

@section('content')

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('search') }}" method="GET" class="search-bar">
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search your favorite blogs..." aria-label="Search" value="{{ request('query') }}" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <!-- Display search results -->
            @if(isset($blogs) && count($blogs) > 0)
                <h5 class="mt-4">Search Results for: "{{ $query }}"</h5>
                @foreach ($blogs as $blog)
                    <div class="post-preview">
                        <a href="{{ route('singleView', ['id' => $blog->id]) }}">
                            <h2 class="post-title">{{ $blog->title }}</h2>
                        </a>
                        <p class="post-meta">
                            Posted By {{ $blog->name }}<br/>
                            on {{ $blog->created_at }}
                        </p>
                    </div>
                    <hr class="my-4" />
                @endforeach
                <div>{{ $blogs->appends(['query' => $query])->links('pagination::bootstrap-4') }}</div>
            @else
                @if(isset($query))
                    <h6>No results found for "{{ $query }}". Please try again.</h6>
                @endif
            @endif

        </div>
    </div>
</div>

@endsection
