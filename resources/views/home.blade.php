@extends('layout.app')

@section('title', 'Home Page')
@include('partials.header', [
    'bgImage' => 'assets/img/home-bg.jpg', // Default background
    'title' => "Welcome to Laiba's Haven",
    'subtitle' => 'Glad to see you here! Share your thoughts freely',
])
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <!-- Main Content-->
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
                <!-- Post preview-->
                @foreach ($blogs as $blog)
                <div class="post-preview">
                    <a href="{{route('singleView', ['id'=> $blog->id])}}">
                        <h2 class="post-title">{{$blog->title}}</h2>
                    </a>
                    <p class="post-meta">
                        Posted By {{$blog->name}}<br/>
                        on {{$blog->created_at}}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                @endforeach
               
                <div class="d-flex justify-content-between space-between">
                    <div class="d-flex justify-content-start">
                        {{ $blogs->links('pagination::bootstrap-4') }} 
                    </div>
                       
                        <div class=" mb-4">
                            <a class="btn btn-primary text-uppercase" href="{{route('createblog')}}">Create Blog →</a>
                        </div>
                </div>
                {{-- d-flex justify-content-end these classes are removed from create blog buttons div --}}
            </div>
        </div>
        
    </div>
    
@endsection
