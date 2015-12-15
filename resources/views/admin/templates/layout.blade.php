<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('blog.title') }} Gerenciador</title>

    <link href="{!! asset('manager/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('manager/fonts/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('manager/css/animate.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('manager/css/icheck/flat/green.css') !!}" rel="stylesheet">
    <link href="{!! asset('manager/css/datatables/tools/css/dataTables.tableTools.css') !!}" rel="stylesheet">
    <link href="{!! asset('manager/css/sweetalert/sweetalert.css') !!}" rel="stylesheet">
    <link href="{!! asset('manager/css/custom.css') !!}" rel="stylesheet">

    @yield('styles')


    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('admin.dashboard.index') }}" class="site_title"><i class="logo"><img src="{!! asset('manager/images/logo.png') !!}"></i> <span>{{ config('blog.title') }}</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{!! asset('manager/images/user.png') !!}" alt="..." class="img-circle profile_img">

                        </div>
                        <div class="profile_info">
                            <span>Bem-vindo,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    @include('admin/partials/menu')
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{!! asset('manager/images/user.png') !!}" alt="...">{{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="javascript:;">  Profile</a></li>
                                    <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    @yield('content')
                </div>
            </div>
            <!-- /page content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>


    <script type="text/javascript" src="{!! asset('manager/js/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/bootstrap.min.js') !!}"></script>
    <!--script type="text/javascript" src="{!! asset('manager/js/chartjs/chart.min.js') !!}"></script-->
    <!--script type="text/javascript" src="{!! asset('manager/js/progressbar/bootstrap-progressbar.min.js') !!}"></script-->
    <script type="text/javascript" src="{!! asset('manager/js/nicescroll/jquery.nicescroll.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/icheck/icheck.min.js') !!}"></script>

    {{-- list --}}
    <script type="text/javascript" src="{!! asset('manager/js/datatables/js/jquery.dataTables.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/datatables/tools/js/dataTables.tableTools.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/sweetalert/sweetalert.min.js') !!}"></script>

    {{-- forms --}}
    <script type="text/javascript" src="{!! asset('manager/js/tags/jquery.tagsinput.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/switchery/switchery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/moment.min2.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/datepicker/daterangepicker.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/editor/bootstrap-wysiwyg.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/editor/external/jquery.hotkeys.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/editor/external/google-code-prettify/prettify.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/select/select2.full.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/parsley/parsley.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/parsley/i18n/pt-br.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('manager/js/textarea/autosize.min.js') !!}"></script>
    <script>
        autosize($('.resizable_textarea'));
    </script>
    <script type="text/javascript" src="{!! asset('manager/js/custom.js') !!}"></script>
    <!--script type="text/javascript" src="{!! asset('admin/js/moris/raphael-min.js') !!}"></script-->
    <!--script type="text/javascript" src="{!! asset('admin/js/moris/morris.js') !!}"></script-->
    <!--script type="text/javascript" src="{!! asset('admin/js/moris/example.js') !!}"></script-->
    @section('scripts')
    <script>
        var dataTable
        $(document).ready(function () {

            var dataTable = $('.table').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": $('.table').data('source'),
                "oLanguage": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": '<i class="fa fa-angle-right" aria-hidden="true"></i>',
                        "sPrevious": '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                        "sFirst": '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
                        "sLast": '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                },
                "aoColumnDefs": [
                    {
                        'bSortable': false,
                        'aTargets': [($('table thead tr th').length -1)]
                    } //disables sorting for column one
                ],
                'iDisplayLength': 10,
                "sPaginationType": "full_numbers",
                "dom": '<"clear">lfrtip',
            });

            $('.table').on( 'draw.dt', function () {
                console.log('draw');
                bindDelete();
            });
            function bindDelete() {
                $('a.btn-delete').on('click', function(e) {
                    e.preventDefault();
                    var route = $(this).attr('href')
                    var token = $(this).data('token')
                    swal({
                        title: "Você tem certeza?",
                        text: "Uma vez removido você não poderá recuperar esse arquivo!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Remover",
                        cancelButtonText: "Cancelar",
                        closeOnConfirm: false
                    }, function(){
                        $.ajax({
                            type: "DELETE",
                            url: route,
                            data: {
                              _token: token
                            },
                            headers: { 'X-CSRF-TOKEN' : token }
                        }).done(function(data) {
                            swal("Registro removido com sucesso", "", "success");
                            $('.table').DataTable().draw()
                        }).error(function(data) {
                            swal("Oops", "Não foi possível remover o registro", "error");
                        });
                    });
                });
            }
        });

    </script>
    @show

</body>

</html>