@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="title text-muted display-4 text-center"> Register</h1>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nameInput">Full name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nameInput" placeholder="Enter name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <p class="form-text text-danger"> {{ $errors->first('name') }} </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="numberInput">Telephone Number</label>
                            <input type="number" name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="numberInput" placeholder="Enter telephone number" value="{{ old('telephone') }}">
                            @if ($errors->has('telephone'))
                                <p class="form-text text-danger"> {{ $errors->first('telephone') }} </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="dateInput">Date of birth</label>
                            <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" id="dateInput" placeholder="Enter date of birth" value="{{ old('date_of_birth') }}">
                            @if ($errors->has('date_of_birth'))
                                <p class="form-text text-danger"> {{ $errors->first('date_of_birth') }} </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="usernameInput">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="usernameInput" placeholder="Enter username" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                                <p class="form-text text-danger"> {{ $errors->first('username') }} </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="emailInput">Email address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" placeholder="Enter email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <p class="form-text text-danger"> {{ $errors->first('email') }} </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="passwordInput">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" aria-describedby="emailHelp" placeholder="Enter password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <p class="form-text text-danger"> {{ $errors->first('password') }} </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="verifyInput">Verify password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="verifyInput" aria-describedby="emailHelp" placeholder="Verify password" value="{{ old('password') }}">
                            @if ($errors->has('password_confirmation'))
                                <p class="form-text text-danger"> {{ $errors->first('password_confirmation') }} </p>
                            @endif
                        </div>
                        <div class="input-group-prepend col-md">
                            <button type="submit" class="btn btn-primary col-md-3">Register</button>
                            <div class="col-md-1"></div>
                            <a class="col-md-3 btn btn-outline-secondary" href="/">Return</a>
                        </div>         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
