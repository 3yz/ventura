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
                <h2><i class="fa fa-search"></i> Visualizar registro</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <section>
                    <dl>
                      <dt>Nome:</dt>
                      <dd>{{ $user->name }}</dd>
                      <dt>E-mail:</dt>
                      <dd>{{ $user->email }}</dd>
                      <dt>Data de Criação:</dt>
                      <dd>{{ $user->created_at->format('d/m/Y H:s') }}</dd>
                      <dt>Data de Alteração:</dt>
                      <dd>{{ $user->updated_at->format('d/m/Y H:s') }}</dd>
                    </dl>
                    <div class="ln_solid"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">voltar</a>
                    </div>
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