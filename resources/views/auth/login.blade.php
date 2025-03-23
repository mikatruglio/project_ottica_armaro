<x-layout>

<header class=mt-5>

<!-- title -->

<div class="container-fluid col-12 col-md-12 p-5 bg-title text-center text-dark">
    <div class="row justify-content-center">
        <h1 class="bg-text">
            LOGIN
        </h1>
    </div>
</div>

</header>

    @if ($errors->any())
    <div class="container mb-5  d-flex flex-column justify-content-center align-items-center">
        <div class="auth-container-md">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    <div class="container d-flex flex-column justify-content-center align-items-center mb-100px">
        <div class="auth-container-md">
            <form method="POST" action="{{route ('login')}}">
                @csrf
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control bg-color-transparent-cream custom-input"
                        id="InputEmail" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control bg-color-transparent-cream custom-input"
                        id="InputPassword">
                    <a class="mt-1 color-black color-transparent-black-hover"
                        href="{{ route('password.request') }}">forgot password?</a>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn button-login">Submit</button>


            </form>
        </div>
    </div>


 
</x-layout>
