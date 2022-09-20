<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/Imagenes/empleado.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"></p>
          <p class="app-sidebar__user-designation"></p> 
        </div>
      </div>
      <ul class="app-menu">
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fas fa-globe" aria-hidden="true"></i>
                <span class="app-menu__label">Menú</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
              <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>Dashboard"><i class="icon fa fa-circle-o"></i>Dashboard</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>empleados"><i class="icon fa fa-circle-o"></i>Empleados</a></li>
              </ul>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>logout">
                <i class="app-menu__icon fa fa-sign-in" aria-hidden="true"></i>
                <span class="app-menu__label">Logout</span>
            </a>
        </li>
      </ul>
    </aside>