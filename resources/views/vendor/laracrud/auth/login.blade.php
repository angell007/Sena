@extends('laracrud::layouts.guest')

@section('title', 'Login')
<div class="h-100 bg-33691e">
@section('child-content')
<div class="loginBox">
    <h2 class="text-center mb-3">
               <i class="fal {{ config('laracrud.icon') }} text-success"></i> {{ config('app.name') }}
           </h2>
           <form method="POST" action="{{ route('login') }}" data-ajax-form>
                @csrf
                <p>Email</p>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                <p>Password</p>
                    <input type="password" name="password"  class="form-control" placeholder="Password">
                    <button type="submit" class="btn btn-block btn-round btn-success">Login</button>
                    {{-- <input type="submit" name="" value="Sign In"> --}}
            {{-- <a href="#">Forget Password</a> --}}
        </form>
    </div>
</div>
@endsection
