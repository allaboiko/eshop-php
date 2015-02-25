<h3>- Content Managment -</h3>
<p><input type="button" value="Add new Product +" onclick="window.location='<?= site_url('cms/dashboard/add'); ?>';" /></p>
{products}

  <h4>{categorie}</h3>
  
  {product}
  
    <p>
      {title}      
      &nbsp;&nbsp;<a href="<?= site_url('cms/dashboard/edit'); ?>/{id}">Edit</a>
      &nbsp;&nbsp;<a href="<?= site_url('cms/dashboard/delete'); ?>/{id}">Delete</a>
    </p>

  {/product}

{/products}
