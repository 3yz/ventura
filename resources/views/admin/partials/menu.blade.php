<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> Usuários</a></li>
            <!--newItens-->
        </ul>
    </div>

</div>
<div class="sidebar-footer hidden-small">
    <a href="{{ route('admin.logout') }}" data-toggle="tooltip" data-placement="top" title="Sair">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>