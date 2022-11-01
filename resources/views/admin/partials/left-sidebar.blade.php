@php
    $current_route=request()->route()->getName();
@endphp

  
  
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin-assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
        <a href="{{route('dashboard')}}" class="nav-link
        {{$current_route=='dashboard'?'active':''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Dashboard
            </p>
        </a>
        </li>
          <li class="nav-item {{$current_route=='users.index'?'menu-open':''}}">
            <a href="#" class="nav-link
            {{$current_route=='user.index'?'active':''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link
                {{$current_route=='user.index'?'active':''}}">
                  <i class="far fas fa-user"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{$current_route=='project.index'?'menu-open':''}}">
            <a href="#" class="nav-link
            {{$current_route=='project.index'?'active':''}}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('projects')}}" class="nav-link
                {{$current_route=='projects'?'active':''}}">
                  <i class="far fas fa-book"></i>
                  <p>Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('banks')}}" class="nav-link
                {{$current_route=='banks'?'active':''}}">
                  <i class="nav-icon fas fa-columns"></i>
                  <p>Bank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('departments')}}" class="nav-link
                {{$current_route=='departments'?'active':''}}">
                  <i class="nav-icon fas fa-columns"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('positions')}}" class="nav-link
                {{$current_route=='positions'?'active':''}}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Position</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('employees')}}" class="nav-link
                {{$current_route=='employees'?'active':''}}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('licenses')}}" class="nav-link
                {{$current_route=='licenses'?'active':''}}">
                  <i class="nav-icon fa fa-car"></i>
                  <p>Driver Licenses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('insurances')}}" class="nav-link
                {{$current_route=='insurances'?'active':''}}">
                  <i class="nav-icon fa fa-medkit"></i>
                  <p>Insurance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('families')}}" class="nav-link
                {{$current_route=='families'?'active':''}}">
                  <i class="nav-icon fa fa-address-book"></i>
                  <p>Family Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('educats')}}" class="nav-link
                {{$current_route=='educats'?'active':''}}">
                  <i class="nav-icon fa fa-podcast"></i>
                  <p>Education Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('courses')}}" class="nav-link
                {{$current_route=='courses'?'active':''}}">
                  <i class="nav-icon fa fa-microchip"></i>
                  <p>Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('jobexperiences')}}" class="nav-link
                {{$current_route=='jobexperiences'?'active':''}}">
                  <i class="nav-icon fa fa-address-book"></i>
                  <p>Job Experiences</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('operableunits')}}" class="nav-link
                {{$current_route=='operableunits'?'active':''}}">
                  <i class="nav-icon fa fa-car"></i>
                  <p>Operable Units</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('emrgcalls')}}" class="nav-link
                {{$current_route=='emrgcalls'?'active':''}}">
                  <i class="nav-icon fa fa-ambulance"></i>
                  <p>Emergency Call</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('additionaldatas')}}" class="nav-link
                {{$current_route=='additionaldatas'?'active':''}}">
                  <i class="nav-icon fa fa-list"></i>
                  <p>Additional Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('employeebanks')}}" class="nav-link
                {{$current_route=='employeebanks'?'active':''}}">
                  <i class="nav-icon fa fa-university"></i>
                  <p>Employee Banks</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('administrations')}}" class="nav-link
                {{$current_route=='administrations'?'active':''}}">
                  <i class="nav-icon fa fa-address-card"></i>
                  <p>Administrations</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="{{route('projects')}}" class="nav-link
            {{$current_route=='projects'?'active':''}}">
            <i class="nav-icon fas fa-book"></i>
                <p>
                Master Data
                </p>
            </a>
            </li> --}}
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>