@extends('admin.templates.layout')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Usuários</h3>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-edit"></i> Editar registro</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <section>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PATCH', 'class' => 'form-horizontal form-label-left', 'data-parsley-validate' => '']) !!}
                        <div class="item form-group">
                            {!! Form::label('name', 'Nome:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12']) !!}
                            </div>
                        </div>
                        <div class="item form-group">
                            {!! Form::label('email', 'E-mail:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'class' => 'form-control col-md-7 col-xs-12']) !!}
                            </div>
                        </div>
                        <div class="item form-group">
                            {!! Form::label('password', 'Senha:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::password('password', ['class' => 'form-control', 'class' => 'form-control col-md-7 col-xs-12']) !!}
                            </div>
                        </div>
                        <div class="item form-group">
                            {!! Form::label('confirm_password', 'Confirme a senha:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::password('confirm_password', ['class' => 'form-control',  'class' => 'form-control col-md-7 col-xs-12']) !!}
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Cancelar</a>
                                {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>

                    {!! Form::close() !!}
                </section>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script type="text/javascript">
  window.Parsley.setLocale('pt-br');
</script>
@stop
@stop