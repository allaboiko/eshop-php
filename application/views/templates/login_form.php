
<div class="validation-errors">
  <?= validation_errors(); ?>
</div>

<?= form_open($action, $attributes); ?>

  <label for="email">Email: </label> <input type="text" name="email" size="20" value="<?= set_value('email'); ?>"/><br/>
  <label for="password">Password: </label> <input type="password" name="password" size="20"/><br/> 
  <?= form_hidden('token', $token); ?>
  <?= form_submit('submit', 'Sign in'); ?> <a href="<?= site_url('user/resetPassword'); ?>/">Forgot your password?</a>

<?= form_close(); ?>