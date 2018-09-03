@extends("layouts.master")

@section("title")
WELCOME!
@endsection

@section("content")
    @include('includes.message-block')
<div class="row">
    <div class="col-md-6">
        <h3>Sign Up</h3>
        <form action="{{ route('signup') }}" method="POST">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Your Email</label>
                <input class="form-control" type="text" name="email" id="email" value="{{ Request::old("email") }}">
            </div>
            <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old("first_name") }}">
                </div>
                <div class="form-group">
                        <label for="password">Your Password</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name"_token" value "{{ Session::token() }}">
        </form>
    </div>
    
    <div class="col-md-6">
        <h3>Sign In</h3>
            <form action="{{ route('signin') }}" method="POST">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old("email") }}">
                </div>
                    <div class="form-group">
                            <label for="password">Your Password</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name"_token" value "{{ Session::token() }}">
            </form>
        </div>


</div>
@endsection

