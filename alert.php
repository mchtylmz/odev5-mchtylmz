<?php if (isset($_SESSION["alert"])): ?>
  <div class="alert alert-secondary">
    <?=var_dump($_SESSION["alert"])?>
  </div>
<?php endif; ?>
<?php unset($_SESSION["alert"]); ?>
