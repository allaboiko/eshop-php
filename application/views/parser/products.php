{products}

<div class="product-holder" id="product-{id}">
  
  <h3>{title}</h3>
  <img width="150" height="100" src="<?= site_url('public/images'); ?>/{image}" /><br /><br />
  <p>{body}</p>
    <a href="<?= site_url(); ?>products/{machine_name}/{prg_machine}/">More details...</a><br /><br />
  <b>Price on site: {price}$</b>&nbsp;&nbsp;
  <input class="add-to-cart" id="{id}" type="button" value="Add to cart"  />
</div><br /><br />

{/products}
