  <?php require APPROOT . '/views/includes/header.php';  ?>
  <div style="width: 100%">
    <?php 
      // check if theres an error message. If so, display it
      if (isset($data['message'])) {
        echo '<div class="alert alert-danger">'.$data['message'].'</div>';
      }
    ?>
    <section class="login-dark">
      <form method="post">
        <h2 class="visually-hidden">Login Form</h2>
        <div class="illustration">
          <i class="icon ion-ios-locked-outline"></i>
        </div>
        <div class="mb-3">
          <input class="form-control" type="email" name="email" placeholder="Email" />
        </div>
        <div class="mb-3">
          <input class="form-control" type="password" name="password" placeholder="Password" />
        </div>
        <div class="mb-3">
          <button class="btn btn-primary d-block w-100" type="submit" name="submit">
            Log In
          </button>
        </div>
        <a class="forgot" href="<?php echo URLROOT; ?>/Admin/-------">Forgot your email or password?</a>
      </form>
    </section>
  </div>
  
<?php require APPROOT . '/views/includes/footer.php';  ?>