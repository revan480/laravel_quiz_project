@extends ('layouts.app')

@section ('content')

<!-- create login form -->
<!-- Show all errors -->

<div class="container">
    <div class="card">
        <div class="card-content">
            <div class="content">
                <h1 class="title">Login</h1>
                <form method="POST" action="/login">
                    @csrf
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input" type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-link" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Show all errors -->
@if ($errors->any())
    <div class="notification is-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- if email or password is wrong show it -->
@if (session('error'))
    <div class="notification is-danger">
        {{ session('error') }}
    </div>
@endif

<!-- create a card with 2 h1's -->
<div class="container">
    <div class="card">
        <div class="card-content">
            <div class="content">
                <h1 class="title">EMAIL: admin@gmail.com</h1>
                <h1 class="title">PASSWORD: password</h1>
            </div>
        </div>
    </div>
</div>

                

@endsection