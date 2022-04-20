<?php require APPROOT . '/views/includes/adminheader.php';  ?>

<script>
function validateForm() {
  let password = document.forms["editEmail"]["email"].value;
  let verify_password = document.forms["editEmail"]["verify_email"].value;
  if (password != verify_password) {
      alert("Emails don't match!");
    return false;
  }
}
</script>


<div style="width: 100%">
    <section class="login-dark">
      <form method="post" name="editEmail" method="post" >
        <div class="illustration">
          <i class="icon ion-ios-locked-outline"></i>
        </div>
        <div class="mb-3">
          <input class="form-control" type="email" name="current_email" id="email" value="" readonly />
        </div>
        <div class="mb-3">
          <input class="form-control" type="email" name="email" id="email" placeholder="Password" />
        </div>
        <div class="mb-3">
          <input class="form-control" type="email" name="verify_email" id="verify_email" placeholder="Confirm your new email" />
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