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
      <form method="post" name="editEmail"  >
      <h2 class="text-center" style="color: #ffffff;">Change Email</h2>
        <div class="mb-3">
          <!-- put current email here -->
          <input class="form-control" type="email" name="current_email" id="email" value="<?= $data['admin']->email ?>" readonly />
        </div>
        <div class="mb-3">
          <input class="form-control" type="email" name="email" id="email" placeholder="New email" value="<?php if(!empty($data['new_email'])) :?> <?=$data['new_email'] ?> <?php endif;?>" required/>
        </div>
        <div class="mb-3">
          <input class="form-control" type="email" name="verify_email" id="verify_email" placeholder="Confirm your new email" value="<?php if(!empty($data['new_email'])) :?> <?=$data['verify_email'] ?> <?php endif;?>" required/>
        </div>
        <div class="mb-3">
          <button class="btn btn-primary d-block w-100" type="submit" name="submit">
            Update
          </button>
        </div>
        <?php if (!empty($data['message'])) : // check if theres an error message. If so, display it ?>
          <div class="alert alert-default alert-dismissible fade show mt-3" role="alert" style="background-color:rgb(192,51,51)">
            <strong><?=$data['message']?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
      </form>
    </section>
  </div>
<?php require APPROOT . '/views/includes/footer.php';  ?>