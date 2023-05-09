<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">{{ config('app.name')  }}</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a>
    </nav>

    @if(Auth::guard('site')->check())
        <label class="m-2">{{ Auth::guard('site')->user()->name }}</label>
        <form method="post" action="{{ route('site.account.auth.login.destroy') }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-primary mr-1">Logout</button>
        </form>
    @else
        <a class="btn btn-outline-primary mr-1" href="{{ route('site.account.auth.login.create') }}">Sign up</a>
        <a class="btn btn-outline-success mr-1" href="{{ route('site.account.auth.register-user.create') }}">Register</a>
    @endif
</div>
