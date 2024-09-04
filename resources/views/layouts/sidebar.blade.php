<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
          <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
          width="67.000000pt" height="68.000000pt" viewBox="0 0 67.000000 68.000000"
          preserveAspectRatio="xMidYMid meet">

          <g transform="translate(0.000000,68.000000) scale(0.100000,-0.100000)"
          fill="#000000" stroke="none">
          <path d="M90 345 l0 -255 255 0 255 0 0 121 0 120 -32 -3 -33 -3 -1 -84 c0
          -57 -4 -86 -12 -89 -9 -3 -12 21 -12 87 l0 91 -30 0 -29 0 -3 -87 c-2 -58 -7
          -88 -15 -91 -10 -3 -13 19 -13 87 l0 91 -30 0 -29 0 -3 -87 c-2 -58 -7 -88
          -15 -91 -10 -3 -13 46 -13 222 l0 226 -75 0 -75 0 0 -120 0 -120 30 0 29 0 3
          85 c2 48 7 85 13 85 15 0 13 -372 -2 -377 -9 -3 -13 20 -15 84 l-3 88 -40 5
          -40 5 -3 133 -3 132 -29 0 -30 0 0 -255z m88 -141 c-2 -27 -7 -49 -13 -49 -11
          0 -19 79 -10 103 11 30 26 -5 23 -54z"/>
          <path d="M360 480 l0 -120 120 0 121 0 -3 118 -3 117 -30 0 c-33 0 -32 3 -34
          -123 l-1 -53 -52 3 -53 3 -3 52 -3 52 43 3 c40 3 43 5 46 36 l3 32 -75 0 -76
          0 0 -120z"/>
          <path d="M450 480 c0 -27 3 -30 30 -30 27 0 30 3 30 30 0 27 -3 30 -30 30 -27
          0 -30 -3 -30 -30z"/>
          </g>
          </svg>
        </span>
        <span class="app-brand-text demo menu-text fw-bold">SalmanITB</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
        
      </li>

      @role('superadmin')
      <!-- Layouts -->
      <li class="menu-item nav-group {{ request()->routeIs('superadmin.employee.*') || request()->routeIs('attendance.*')? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
          <div data-i18n="Employee">Employee</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item {{ request()->routeIs('superadmin.employee.index') ? 'active' : '' }}">
            <a href="{{ route('superadmin.employee.index') }}" class="menu-link ">
              <div data-i18n="Employees">Employees</div>
            </a>
          </li>
          <li class="menu-item {{ request()->routeIs('superadmin.employee.create') ? 'active' : '' }}">
            <a href="{{ route('superadmin.employee.create') }}" class="menu-link ">
              <div data-i18n="CreateEmployees">Create Employees</div>
            </a>
          </li>
          
          
        </ul>
      </li>
      @endrole

      
      <li class="menu-item {{ request()->routeIs('attendance.index') ? 'active' : '' }}">
        <a href="{{ route('attendance.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-clock"></i>
          <div data-i18n="Attendance">Attendance</div>
        </a>
      </li>
      
      <li class="menu-item {{ request()->routeIs('attendance.summary') ? 'active' : '' }}">
        <a href="{{ route('attendance.summary') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Summary">Summary</div>
          
        </a>
        
      </li>
      
    </ul>
  </aside>