
<?= form_open("cms/dashboard/delete/$id"); ?>

  <label for="verify">Are you are you sure you want to delete this content?</label>
  <br /><br />
  <?= form_submit('delete', 'Delete'); ?>
  <input type="button" value="Cancel" onclick="window.location='<?= site_url('cms/dashboard/'); ?>';" />

<?= form_close(); ?>