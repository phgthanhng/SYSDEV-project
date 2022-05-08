  <?php require APPROOT . '/views/includes/header.php';  ?>
  <div style="width: 100%">
  
    <section class="login-dark">
      <form method="post">
        <h2 class="visually-hidden">Login Form</h2>
        <div class="illustration">
          <i class="icon ion-ios-locked-outline"></i>
        </div>
        <div class="mb-3">
          <input class="form-control" type="email" name="email" placeholder="Email" required=""/>
        </div>
        <div class="mb-3">
          <input class="form-control" type="password" name="password" placeholder="Password" required=""/>
        </div>
        <div class="mb-3">
          <button class="btn btn-primary d-block w-100" type="submit" name="submit">
            Log In
          </button>
        </div>
        <a class="forgot" href="<?= URLROOT ?>/Admin/forgotPassword">Forgot your password?</a>

       <?php 
            if (isset($data['message'])) {  // check if theres an error message. If so, display it
                if (isset($data['color'])) { 
                    echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="height:auto;">
                    <strong>'.$data['message'].'</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                else {
                   $totalAttemptCount = 3;
                   echo '<div class="alert alert-default alert-dismissible fade show mt-3" role="alert" style="background-color:rgb(192,51,51);height:auto;">
                    <strong>'.$data['message'].'</strong>
                    <br> ';
                    if(isset($_SESSION['attempts'])){
                      echo '<br><strong>Remaining # of attempts('.$_SESSION['attempts'].'/3): '. $totalAttemptCount - $_SESSION['attempts'].'</strong>';
                    }
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
        ?>
        
        
      </form>
    </section>
  </div>
  
<?php require APPROOT . '/views/includes/footer.php';  ?>