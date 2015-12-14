@extends('admin.templates.clean')

@section('content')

    <form class="form-horizontal x_panel" role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h1>Login</h1>

        @include('admin.partials.errors')

        <div>
          <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" autofocus required="required">
        </div>
        <div>
            <input type="password" name="password" class="form-control" placeholder="Password" placeholder="Senha" required="required"/>
        </div>
        <div>
            <button type="submit"class="btn btn-default submit">Login</button>
            {{-- <a class="reset_pass" href="#">Lost your password?</a> --}}
        </div>
        <div class="clearfix"></div>
        <div class="separator">

            <br />
            <div>
                <h1>3yz</h1>
                <p>©{{ date('Y') }} Todos os direitos reservados.</p>
            </div>
        </div>
    </form>
@endsection