  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{asset('adminLTE3/dist/img/AdminLTELogo.png')}}"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Loan Market</span>
  </a>

<section class="sidebar">
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminLTE3/dist/img/img-logo.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">BERANDA</li>
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-podcast"></i>
              <p>
                Data Cabang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('cabang') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Cabang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('cabang/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Cabang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Adviser
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('adviser') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Adviser</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('adviser/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Adviser</p>
                </a>
              </li>
            </ul>
          </li>
          <li><a href="{{ url('/logout') }}"><i class="fas fa-fw fa-home"></i> Logout</span></a></li>
        </ul>
      </nav>
    </section>