<?php require APPROOT . '/views/includes/adminheader.php';  ?>

<script>
function validateForm() {
  let password = document.forms["editPassword"]["password"].value;
  let verify_password = document.forms["editPassword"]["verify_password"].value;
  if (password != verify_password) {
      alert("Passwords don't match!");
    return false;
  }
}
</script>
<div style="width: 100%">
    <section class="login-dark">
      <form method="post" name="editPassword" method="post" onsubmit="return validateForm()">
      <h2 class="text-center" style="color: #ffffff;">Change Password</h2>
        <div class="mb-3">
          <!-- put admin's email here -->
          <input class="form-control" type="email" name="email" id="email" value="" readonly />
        </div>
        <div class="mb-3">
          <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
        </div>
        <div class="mb-3">
          <input class="form-control" type="password" name="verify_password" id="verify_password" placeholder="Confirm your password" />
        </div>
        <div class="mb-3">
          <button class="btn btn-primary d-block w-100" type="submit">
            Update
          </button>
        </div>
      </form>
    </section>
  </div>



<?php require APPROOT . '/views/includes/footer.php';  ?>