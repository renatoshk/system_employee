<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{asset('/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Home</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/{{Auth::user()->image->image ?? ''}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                {{-- vendos emrin e userit nga session --}}
                <h4 style="color: white;" class="d-block">{{Auth::user()->username}}</h4>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="/adm" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <p>
                            Attributes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    </ul> 
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('attrs.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role Attributes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Departaments
                        </a>
 
                      <div class="dropdown-menu btn btn-secondary" >
                        <?php $parent_deps  = App\Primary_dep::all();
                           foreach ($parent_deps as $value) {
                               
                            echo '<a style ="color:black;" class="dropdown-item btn btn-secondary" href="'.route('parentdeps.show', $value->id).'">'.$value->name.'</a>';
                           }
                        ?>
                      </div>

                  </div>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <p>
                            Configurations
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admins</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>