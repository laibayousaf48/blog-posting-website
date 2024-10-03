@extends('layout.app')
@include('partials.header', [
    'bgImage' => 'assets/img/blog2.jpg',
    'title' => 'Create Your Blog',
    'subtitle' => 'Express your thoughts',
])
@section('content')
    <div class="container">
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>Want to publish your blog? Fill out the form below to publish your blog!</p>
                        <div class="my-5">
                            <form id="blogForm" action="{{ route('createBlog') }}" method="POST">
                                @csrf
                                <div class="form-floating">
                                    <input class="form-control" id="name" name="name" type="text"
                                        placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Name</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" name="email" type="email"
                                        placeholder="Enter your email..." data-sb-validations="required,email" />
                                    <label for="email">Email address</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                                    </div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="title" name="title" type="text"
                                        placeholder="Enter title..." data-sb-validations="required,title" />
                                    <label for="title">Title</label>
                                    <div class="invalid-feedback" data-sb-feedback="title:required">An title is required.
                                    </div>
                                    {{-- <div class="invalid-feedback" data-sb-feedback="title:title">Email is not valid.</div> --}}
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="blog" name="blog" placeholder="Enter your blog here..." style="height: 12rem"
                                        data-sb-validations="required"></textarea>
                                    <label for="blog">Blog</label>
                                    <div class="invalid-feedback" data-sb-feedback="message:required">A blog is required.
                                    </div>
                                </div>
                                <br />
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Form submission successful!</div>
                                    </div>
                                </div>
                                <div class="d-none" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3">Error sending message!</div>
                                </div>
                                <button class="btn btn-primary text-uppercase" id="submitButton"
                                    type="submit">Publish</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
