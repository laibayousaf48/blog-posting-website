<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Laiba's Haven</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    </head>
<body>
    
    <main class="my-5 d-flex align-items-center" style="height: 60vh">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center align-items-center">
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

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif


                    <h3 class="py-8 text-center">Set Your Password</h3>
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST" action="{{route('resetPassword',['query'=> $query])}}">
                        @csrf
                      
                        <div class="form-floating">
                            <input class="form-control" id="password" type="password" name="password" placeholder="Enter your password here..." data-sb-validations="required"></input>
                            <label for="password">Password</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A password is required.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Enter your password here..." data-sb-validations="required"></input>
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="invalid-feedback" data-sb-feedback="password_confirmation:required">A password is required.</div>
                        </div>
                        <br />
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                        <div class=" d-flex justify-content-end"><button class="btn btn-primary text-uppercase mr-left w-full" id="submitButton" type="submit">Set Password</button></div>
                    </form>
                </div>
            </div>
        </div>
        </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>