<div class="product-holder" id="product-{id}">
  
  <h3>{title}</h3>
  <img width="250" height="200" src="<?= site_url('public/images'); ?>/{image}" /><br /><br />
  <p>{body}</p>
  <b>Price on site: {price}$</b>&nbsp;&nbsp;
  <input class="add-to-cart" id="{id}" type="button" value="Add to cart"  />
  <input type="button" value="Checkout" onclick="window.location='<?= site_url(); ?>cart/checkout/'" /> 

</div>
