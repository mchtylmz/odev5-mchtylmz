<?php
$title = 'Ürünler';
require_once 'header.php';
$database = new database();
$kategoriler = $database->table('category')->select()->all();
?>
<hr>
<?php if (isset($_GET["msg"])): ?>
  <div class="alert alert-secondary"><?=$_GET["msg"]?></div>
  <hr>
<?php endif; ?>
<a href="kategori-ekle.php" class="btn btn-primary">Kategori Ekle</a>
<hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col">uniqid</th>
      <th scope="col">name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php if ($kategoriler): ?>
    <?php foreach ($kategoriler as $key => $kategori): ?>
			<tr>
	      <td scope="col"><?=$kategori->category_uniqid?></td>
	      <td scope="col"><?=$kategori->category_name?></td>
	      <td scope="col">
          <a href="kategori-duzenle.php?uniqid=<?=$kategori->category_uniqid?>" class="btn btn-sm btn-warning">Düzenle</a>
          <a href="kategori-sil.php?uniqid=<?=$kategori->category_uniqid?>" class="btn btn-sm btn-danger">Sil</a>
        </td>
	    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
<?php
require_once 'footer.php';
?>
