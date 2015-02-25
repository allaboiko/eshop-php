<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    
    <?php if(!empty($title)): ?>
    <title><?= $title; ?></title>
    <?php else: ?>
    <title>Eshop</title>
    <?php endif; ?>
    
    <link rel="stylesheet" type="text/css" href="<?= site_url('public/css/style.css'); ?>" />
    
  </head>

  <body>
    
    <div class="header">
      <h2>CMSystem Dashboard</h2>
    </div>
    
    <div class="main-nav">
      
      <ul>
        
        <?php if($this->admin == true): ?>
          <li><a href="<?= site_url('cms/dashboard'); ?>/">Main</a></li>
          <li><a href="<?= site_url('cms/dashboard/orders'); ?>/">Orders</a></li>
          <li><a href="<?= site_url(); ?>">Back to site!</a></li>
          <li>Hello <?= $this->session->userdata('name'); ?>!</li>
          <li><a href="<?= site_url('logout'); ?>/">Logout</a></li>
        <?php endif; ?>
        
      </ul>
      
    </div>
    
    <?php if(!empty($flash_session)): ?>
    <div class="flash-session"><?= $flash_session; ?></div>
    <?php endif; ?>
     
    <?php if(!empty($content)): ?>
    <div class="main-content"><?= $content; ?></div>
    <?php endif; ?>
    
    
    <br /><br /><br />
    <footer>
      My company &copy; <?= date("Y"); ?>
    </footer>
    
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    
    <script> var CI_ROOT = '<?=site_url(); ?>' </script>
        
  </body>
</html>
