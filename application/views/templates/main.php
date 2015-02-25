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
      <h2>My site logo and slogen</h2>
    </div>
    
    <div class="main-nav">
      
      <ul>
        <li><a href="<?= site_url(); ?>">Home</a></li>
        <li><a href="<?= site_url('about'); ?>/">About</a></li>
        <li><a href="<?= site_url('products'); ?>/">Products</a></li>
        
        <?php if(!$this->userValid): ?>
          <li><a href="<?= site_url('user/login'); ?>/">Sign In</a></li>
          <li><a href="<?= site_url('user/register'); ?>/">Sign Up</a></li>
        <?php else: ?>
          <li>Hello <?= $this->session->userdata('name'); ?>!</li>
          <li><a href="<?= site_url('logout'); ?>/">Logout</a></li>
        <?php endif; ?>
        
        <li class="shopping-cart">
          <a href="<?= site_url('cart/checkout'); ?>/">
            <img width="40" height="30" src="<?= site_url('public/images/default.jpg'); ?>" />
            <span class="cart-total"><?= $total_cart; ?></span>
          </a>
        </li>
      
      </ul>
      
    </div>
     
    <?php if(!empty($content)): ?>
    <div class="main-content"><?= $content; ?></div>
    <?php endif; ?>
    
    
    <br /><br /><br />
    <footer>
      My company &copy; <?= date("Y"); ?>
    </footer>
    
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    
    <script> var CI_ROOT = '<?=site_url(); ?>' </script>
    
    <script src="<?=site_url('public/js/cart.js'); ?>" type="text/javascript"></script>
    
  </body>
</html>
