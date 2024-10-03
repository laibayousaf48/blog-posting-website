@extends('layout.app')

@section('title', 'About Page')
 <!-- Navigation -->
 @include('partials/header', [
    'bgImage' => 'assets/img/about-bg.jpg',
    'title' => 'Why We Exist',
    'subtitle' => 'Get to know About Us'
   ])
@section('content')
   
    <!-- Main Content -->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>At Laiba's Haven, we believe that everyone has a story to tell, a perspective to share, and ideas that deserve to be heard. Our platform is designed to empower individuals from all walks of life to publish their blogs, connect with a diverse community, and inspire others through the written word.</p>
                    <h3>Our Mission</h3>
                    <p>Our mission is to create a vibrant, inclusive space where creativity thrives and voices resonate. Whether you’re an experienced writer or just starting your blogging journey, we’re here to support you every step of the way. We aim to foster meaningful connections, spark conversations, and encourage personal growth through shared experiences.</p>
                    <h3>What we offer</h3>
                    <ul>
                        <li><strong>User-Friendly Publishing:</strong> Our intuitive interface makes it easy for anyone to create and publish blog posts. With just a few clicks, you can share your thoughts with the world!</li>
                        <li><strong>Community Engagement:</strong> Join a community of passionate writers and readers. Engage with others through comments, collaborations, and sharing ideas.</li>
                    </ul>
                    <h3>Join Us!</h3>
                    <p>Are you ready to share your voice? Dive into the world of blogging with us! Whether you want to write about personal experiences, hobbies, lifestyle, or any topic that ignites your passion, [Your Website Name] is the perfect place for you.</p>
                    <p>Thank you for being a part of our community. Together, we can inspire, connect, and create!</p>
                </div>
            </div>
        </div>
    </main>
@endsection
