<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/includes/css/bootstrap.css" >
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

  <link rel="stylesheet" href="/includes/css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>



  <title></title>
</head>
<?php
$class = '';
if (isset($bodyClass)) {
  $class = $bodyClass;
}
?>

<body class="<?= $class ?>">

  <?php
  $uri = service('uri');
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if (session()->get('isLoggedIn')) : ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
              <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'compinfo' ? 'active' : null) ?>">
              <a class="nav-link" href="/compinfo">Company Info</a>
            </li>
            <li class="nav-item dropdown <?= ($uri->getSegment(1) == 'dispatchers' ? 'active' : null) ?>">
              <a class="nav-link dropdown-toggle" href="/dispatchers" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dispatchers</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/dispatchboard">Dispatch Board</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Brokers</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">HOS Cycle</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Schedule</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Load Calc</a>
              </div>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'empinfo' ? 'active' : null) ?>">
              <a class="nav-link" href="/empinfo">Employee Info</a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'equipment' ? 'active' : null) ?>">
              <a class="nav-link" href="/equipment">Equipment</a>
            </li>
            <li class="nav-item dropdown <?= ($uri->getSegment(1) == 'documents' ? 'active' : null) ?>">
              <a class="nav-link dropdown-toggle" href="/documents" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Documents</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Insurance Policy</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">License</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Permits</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Company Policies</a>
              </div>
            </li>
            <li class="nav-item dropdown <?= ($uri->getSegment(1) == 'reports' ? 'active' : null) ?>">
              <a class="nav-link dropdown-toggle" href="/reports" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Quarter and Year</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Goal Seek</a>
              </div>
            </li>
            <li class="nav-item dropdown <?= ($uri->getSegment(1) == 'links' ? 'active' : null) ?>">
              <a class="nav-link dropdown-toggle" href="/links" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Links</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Related Links</a>
              </div>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'test' ? 'active' : null) ?>">
              <a class="nav-link" href="/test">Test</a>
            </li>
              <li class="nav-item dropdown <?= ($uri->getSegment(1) == 'admin' ? 'active' : null) ?>">
                <a class="nav-link dropdown-toggle" href="/admin" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/users">Users</a>
                  <a class="dropdown-item" href="/register">Register</a>
                  <a class="dropdown-item" href="/roles">Roles</a>
                </div>
              </li>
          </ul>
          <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
          </ul>
        <?php else : ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
              <a class="nav-link" href="/">Login</a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'forgotpassword' ? 'active' : null) ?>">
              <a class="nav-link" href="/forgotpassword">Forgot Password</a>
            </li>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <?= $this->renderSection('content') ?>

</body>

</html>