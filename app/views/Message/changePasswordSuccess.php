<?php 
  if (isLoggedIn())
    require APPROOT . '/views/includes/adminheader.php';  
  else 
    require APPROOT . '/views/includes/header.php';
?>
<style>
  body {
    text-align: center;
  }
  :root {
    --borderWidth: 7px;
    --height: 24px;
    --width: 12px;
    --borderColor: #78b13f;
  }
  .check {
    text-align: center;
    display: inline-block;
    transform: rotate(45deg);
    height: var(--height);
    width: var(--width);
    border-bottom: var(--borderWidth) solid var(--borderColor);
    border-right: var(--borderWidth) solid var(--borderColor);
  }
</style>

<div style="width: 100%">
    <section class="login-dark">
    <form method="GET" 
      action="
        <?php 
        if (!isset($data['isLoggedIn']))
          echo 'http://localhost/Sysdev-project/Admin/Login'; 
        else 
          echo 'http://localhost/Sysdev-project/Admin/'; ?>"
      >
      <h2 class="text-center" style="color: #ffffff;">Password Changed Successfully</h2>
        <div class="check"></div>
        <div class="mb-3">
          <?php if (!isset($data['isLoggedIn'])) : ?>
            <button class="btn btn-primary d-block w-100" type="submit">
              Login
            </button>
          <?php else : ?>
            <button class="btn btn-primary d-block w-100" type="submit">
              Return to Home page
            </button>
          <?php endif ?>
        </div>
    </section>
  </div>
<?php require APPROOT . '/views/includes/footer.php';  ?>