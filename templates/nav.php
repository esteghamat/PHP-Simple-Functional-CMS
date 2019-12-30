<nav class="navbar navbar-expand-md bg-primary navbar-dark">

  <a class="navbar-brand" href="#"><?=APP_TITLE?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=home_url();?>">Home <span class="sr-only">(current)</span></a>
    </li>
      <li class="nav-item">
        <!--<a class="nav-link" href="<?=home_url('templates/modules/login.php')?>">Login</a>-->
          <?php if(is_user_logged_in()) : ?>
            <a class="nav-link" href="<?=home_url('logout')?>">Logout
          <?php else: ?>
            <a class="nav-link" href="<?=home_url('login')?>">Login
          <?php endif;?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=home_url('dashboard')?>">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=home_url('about_us')?>">About us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <?php if(is_user_logged_in()): ?>
            <!--<p class="navbar-text">-->
            &nbsp;&nbsp;Hello &nbsp;&nbsp;
            <?php $current_user = get_current_user_data(); ?>
            <strong><?php echo $current_user; ?></strong>&nbsp;&nbsp;
            </p>
      <?php endif; ?>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

