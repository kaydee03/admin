<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <?php
    $request = service('request');

    ?>
    <li class="nav-item">
      <a href="/dashboard" class="nav-link <?= $request->uri->getSegment(1) == 'dashboard' ? 'active' : null; ?>">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/compinfo" class="nav-link <?= $request->uri->getSegment(1) == 'compinfo' ? 'active' : null; ?>">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>Companies</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/empinfo" class="nav-link <?= $request->uri->getSegment(1) == 'empinfo' ? 'active' : null; ?>">
        <i class="nav-icon fas fa-users"></i>
        <p>Employees</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/equipment" class="nav-link <?= $request->uri->getSegment(1) == 'equipment' ? 'active' : null; ?>">
        <i class="nav-icon fas fa-car"></i>
        <p>Equipment</p>
      </a>
    </li>
    <li class="nav-item <?= ($request->uri->getSegment(1) == 'dispatchboard') ? 'menu-open' : '' ?>">
      <a href="#" class="nav-link <?= ($request->uri->getSegment(1) == 'dispatchboard') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-cubes"></i>
        <p>
          Dispatchers
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item <?= $request->uri->getSegment(1) == 'dispatchboard' ? 'active' : null; ?>">
          <a href="/dispatchboard" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Dispatch Board</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Brokers</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>HOS Cycle</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Schedule</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Load Calc</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/dispatchers" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Old dispatchers</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item <?= ($request->uri->getSegment(1) == 'fileupload') ? 'menu-open' : ''; ?>">

      <a href="#" class="nav-link <?= ($request->uri->getSegment(1) == 'fileupload') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-file"></i>
        <p>
          Documents
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <?php 
          $active = '';
          if($request->uri->getSegment(1) != ''){
            if($request->uri->getSegment(2) == 'list'){
              if($request->uri->getSegment(3) == '1'){
                $active = 1;
              }elseif($request->uri->getSegment(3) == '2'){
                $active = 2;
              }elseif($request->uri->getSegment(3) == '3'){
                $active = 3;
              }elseif($request->uri->getSegment(3) == '4'){
                $active = 4;
              }
            }
          }?>
          <a href="/fileupload/list/1" class="nav-link <?= $active == '1' ? 'active' : null; ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Insurance Policy</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/fileupload/list/2" class="nav-link <?= $active == '2' ? 'active' : null; ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>License</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/fileupload/list/3" class="nav-link <?= $active == '3' ? 'active' : null; ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Permits</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/fileupload/list/4" class="nav-link <?= $active == '4' ? 'active' : null; ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Company Policies</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="/#" class="nav-link <?= $request->uri->getSegment(1) == '#' ? 'active' : null; ?>">
        <i class="nav-icon fas fa-flag"></i>
        <p>
          Reports
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Quarted and Year</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Goal Seek</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="/#" class="nav-link <?= $request->uri->getSegment(1) == '#' ? 'active' : null; ?>">
        <i class="nav-icon fas fa-link"></i>
        <p>
          Links
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Related Links</p>
          </a>
        </li>
      </ul>
    </li>
    <?php if (in_group(2)) : ?>

      <?php
      $segmentArr = ['users', 'roles'];
      ?>
      <li class="nav-item <?= in_array($request->uri->getSegment(1), $segmentArr) ? 'menu-open' : null; ?>">
        <a href="#" class="nav-link <?= in_array($request->uri->getSegment(1), $segmentArr) ? 'active' : null; ?>">
          <i class="nav-icon fas fa-lock"></i>
          <p>
            Admin
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/users" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/users/add" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Register</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/roles" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Roles</p>
            </a>
          </li>
        </ul>
      </li>
    <?php endif; ?>
    <li class="nav-item">
      <a class="nav-link" href="/logout">
        <i class="nav-icon far fa-circle text-danger"></i>
        <p>Logout</p>
      </a>
    </li>

    <!-- <li class="nav-item">
            <a href="/projects" class="nav-link <?= $request->uri->getSegment(1) == 'projects' ? 'active' : null; ?>">
                <i class="nav-icon fas fa-cubes"></i>
                <p>Projects</p>
            </a>
        </li> -->
    <!-- <li class="nav-item">
            <a href="/tags" class="nav-link <?= $request->uri->getSegment(1) == 'tags' ? 'active' : null; ?>">
                <i class="nav-icon fas fa-tags"></i>
                <p>Tags</p>
            </a>
        </li> -->
  </ul>
</nav>