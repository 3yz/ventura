<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
          {{-- <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="form.html">General Form</a>
                  </li>
                  <li><a href="form_advanced.html">Advanced Components</a>
                  </li>
                  <li><a href="form_validation.html">Form Validation</a>
                  </li>
                  <li><a href="form_wizards.html">Form Wizard</a>
                  </li>
                  <li><a href="form_upload.html">Form Upload</a>
                  </li>
                  <li><a href="form_buttons.html">Form Buttons</a>
                  </li>
              </ul>
          </li>
          <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="general_elements.html">General Elements</a>
                  </li>
                  <li><a href="media_gallery.html">Media Gallery</a>
                  </li>
                  <li><a href="typography.html">Typography</a>
                  </li>
                  <li><a href="icons.html">Icons</a>
                  </li>
                  <li><a href="glyphicons.html">Glyphicons</a>
                  </li>
                  <li><a href="widgets.html">Widgets</a>
                  </li>
                  <li><a href="invoice.html">Invoice</a>
                  </li>
                  <li><a href="inbox.html">Inbox</a>
                  </li>
                  <li><a href="calender.html">Calender</a>
                  </li>
              </ul>
          </li>
          <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="tables.html">Tables</a>
                  </li>
                  <li><a href="tables_dynamic.html">Table Dynamic</a>
                  </li>
              </ul>
          </li>
          <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="chartjs.html">Chart JS</a>
                  </li>
                  <li><a href="chartjs2.html">Chart JS2</a>
                  </li>
                  <li><a href="morisjs.html">Moris JS</a>
                  </li>
                  <li><a href="echarts.html">ECharts </a>
                  </li>
                  <li><a href="other_charts.html">Other Charts </a>
                  </li>
              </ul>
          </li> --}}
      </ul>
    </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    {{-- <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a> --}}
    <a href="{{ route('admin.logout') }}" data-toggle="tooltip" data-placement="top" title="Sair">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>