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
                <h2><i class="fa fa-list"></i> Listagem</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <section>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if(Session::has('info'))
                        <div class="alert alert-info">
                            {{ Session::get('info') }}
                        </div>
                    @endif
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Adicionar novo</a>
                  <table class="table table-striped responsive-utilities jambo_table" data-source="{{ route('admin.users.index') }}">
                        <thead>
                            <tr class="headings">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Perfil</th>
                                <th>Criado</th>
                                <th>Atualizado</th>
                                <th>
                                    <span class="nobr">Ação</span>
                                </th>
                            </tr>
                        </thead>

                    </table>
                </section>
            </div>
        </div>
    </div>
</div>
@stop