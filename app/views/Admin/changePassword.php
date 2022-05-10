<?php 
  if (isLoggedIn())
    require APPROOT . '/views/includes/adminheader.php';  
  else 
    require APPROOT . '/views/includes/header.php';
?>

<script>
function validateForm() {
  let password = document.getElementById('new_password').value;
  let verify_password = document.getElementById('verify_password').value;
  if (password != verify_password) {
      alert("Passwords don't match!");
      return false;
  }
}
</script>
<div style="width: 100%">
    <section class="login-dark">
      <form method="post" name="editPassword" onsubmit="return validateForm()">
      <h2 class="text-center" style="color: #ffffff;">Change Password</h2>
        <?php if (isset($data['admin'])) : ?>
          <div class="mb-3">
            <!-- put admin's email here -->
            <input class="form-control" type="email" name="email" id="email" value="<?= $data['admin']->email ?>" readonly />
          </div>
          <div class="mb-3">
            <input class="form-control" type="password" name="password" id="password" minlength="7" placeholder="Current Password" required />
          </div>
        <?php else : ?>
          <input type="text" name="token" value="<?= $data['token'] ?>" hidden>
        <?php endif ?>
        <div class="mb-3">
          <input class="form-control" type="password" name="new_password" minlength="7" id="new_password" placeholder="New Password" required />
        </div>
        <div class="mb-3">
          <input class="form-control" type="password" name="verify_password" minlength="7" id="verify_password" placeholder="Confirm your password" required />
        </div>
        <div class="mb-3">
          <button class="btn btn-primary d-block w-100" type="submit" name="submit">
            Update
          </button>
        </div>
        <?php if (isset($data['message'])) : ?>
          <div class="alert alert-default alert-dismissible fade show mt-3" role="alert" style="background-color:rgb(192,51,51);height:auto;" >
            <strong><?= $data['message'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif ?>
      </form>
    </section>
  </div>
<?php require APPROOT . '/views/includes/footer.php';  ?>