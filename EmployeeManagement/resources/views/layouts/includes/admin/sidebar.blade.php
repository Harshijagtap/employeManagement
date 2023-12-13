<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-company" aria-expanded="false" aria-controls="ui-company">
          <i class="mdi mdi-domain menu-icon"></i>
          <span class="menu-title">Companies</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-company">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/companies/create') }}">Add Companies</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/companies') }}">View Companies</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-employee" aria-expanded="false" aria-controls="ui-employee">
          <i class="mdi mdi-domain menu-icon"></i>
          <span class="menu-title">Employees</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-employee">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/employees/create') }}">Add Employees</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/employees') }}">View Employees</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li>
    
    </ul>
  </nav>