@extends('layout.app')

@include('partials.header', [
    'bgImage' => 'assets/img/blog.jpg',
    'title' => 'Search Blogs',
    'subtitle' => 'Search Blogs From Your Favourite Writers',
])

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div>Hayy this is runtime search</div>
                <form action="{{ route('search') }}" method="GET" class="search-bar">
                    <div class="input-group">
                        <input type="text" name="query" id="search-query" class="form-control"
                            placeholder="Search your favorite blogs..." aria-label="Search" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="search-results" class="mt-4"></div>

    <script>
        document.getElementById('search-query').addEventListener('keyup', function() {
            let query = this.value;

            if (query.length > 2) { // start searching when input length is greater than 2
                fetch(`/search-blogs?query=${query}`)
                    .then(response => response.json())
                    .then(blogs => {
                        let resultDiv = document.getElementById('search-results');
                        resultDiv.innerHTML = ''; // clear previous results

                        if (blogs.length > 0) {
                            blogs.forEach(blog => {
                                let blogElement = `
                            <div class="post-preview">
                                <a href="/singleView/${blog.id}">
                                    <h2 class="post-title">${blog.title}</h2>
                                </a>
                                <p class="post-meta">
                                    Posted By ${blog.name}<br/>
                                    on ${new Date(blog.created_at).toLocaleDateString()}
                                </p>
                            </div>
                            <hr class="my-4" />
                        `;
                                resultDiv.innerHTML += blogElement;
                            });
                        } else {
                            resultDiv.innerHTML = `<h6>No results found for "${query}".</h6>`;
                        }
                    });
            } else {
                document.getElementById('search-results').innerHTML = '';
            }
        });
    </script>
@endsection

{{-- 
@extends('layout.app')

@include('partials.header', [
    'bgImage' => 'assets/img/blog.jpg',
    'title' => 'Search Blogs',
    'subtitle' => 'Search Blogs From Your Favourite Writers',
])

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <form class="search-bar" onsubmit="return false;">
                    <div class="input-group">
                        <input type="text" name="query" id="search-query" class="form-control"
                            placeholder="Search your favorite blogs..." aria-label="Search" autocomplete="off">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="search-results" class="mt-4"></div>

    <script>
        document.getElementById('search-query').addEventListener('keyup', function() {
            let query = this.value;

            if (query.length > 2) { // Start searching when input length is greater than 2
                fetch(`/blogs/search-blog?${query}`)
                    .then(response => response.json())
                    .then(blogs => {
                        console.log('Response from server:', blogs); // Log the response

                        let resultDiv = document.getElementById('search-results');
                        resultDiv.innerHTML = ''; // Clear previous results

                        if (blogs.length > 0) {
                            blogs.forEach(blog => {
                                let blogElement = `
                                    <div class="post-preview">
                                        <a href="/singleView/${blog.id}">
                                            <h2 class="post-title">${blog.title}</h2>
                                        </a>
                                        <p class="post-meta">
                                            Posted By ${blog.name}<br/>
                                            on ${new Date(blog.created_at).toLocaleDateString()}
                                        </p>
                                    </div>
                                    <hr class="my-4" />
                                `;
                                resultDiv.innerHTML += blogElement;
                            });
                        } else {
                            resultDiv.innerHTML = `<h6>No results found for "${query}".</h6>`;
                        }
                    })
                    .catch(error => console.log('Error:', error)); // Log errors if any
            } else {
                document.getElementById('search-results').innerHTML = '';
            }
        });
    </script>
@endsection --}}
