  <?php require APPROOT . '/views/includes/header.php';  ?>
  <div style="">
  
    <section class="login-dark">
      <form method="post">
        <h2 class="text-center" style="color:white;">Reset Password</h2>
        <div class="illustration">
          <i class="icon ion-ios-locked-outline"></i>
        </div>
        <div class="mb-3">
          <input class="form-control" type="email" name="email" placeholder="Email" required=""/>
        </div>
        <div class="mb-3">
          <button class="btn btn-primary d-block w-100" type="submit" name="submit">
            Send email
          </button>
        </div>
       
        <?php 
            if (isset($data['message'])) {  // check if theres an error message. If so, display it
                if (isset($data['color'])) { 
                    echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="height:auto;">
                    <strong>'.$data['message'].'</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                else {
                   echo '<div class="alert alert-default alert-dismissible fade show mt-3" role="alert" style="background-color:rgb(192,51,51);height:auto;">
                    <strong>'.$data['message'].'</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
        ?>
        
      </form>
    </section>
  </div>
  
<?php require APPROOT . '/views/includes/footer.php';  ?>