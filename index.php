<?php
$title = 'Ürünler';
require_once 'header.php';
$database = new database();
$urunler = $database->table('products')->select()->all();
?>
<hr>
<?php if (isset($_GET["msg"])): ?>
  <div class="alert alert-secondary"><?=$_GET["msg"]?></div>
  <hr>
<?php endif; ?>
<a href="urun-ekle.php" class="btn btn-primary">Ürün Ekle</a>
<hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col">uniqid</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">description</th>
      <th scope="col">content</th>
      <th scope="col">category</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php if ($urunler): ?>
    <?php foreach ($urunler as $key => $urun): ?>
			<tr>
	      <td scope="col"><?=$urun->uniqid?></td>
	      <td scope="col"><?=$urun->name?></td>
	      <td scope="col"><?=$urun->price?></td>
	      <td scope="col"><?=$urun->description?></td>
	      <td scope="col"><?=$urun->content?></td>
	      <td scope="col"><?=kategori_adi($urun->category_uniqid)?></td>
	      <td scope="col">
					<a href="urun-duzenle.php?uniqid=<?=$urun->uniqid?>" class="btn btn-sm btn-warning">Düzenle</a>
          <a onclick="urun_sil('<?=$urun->uniqid?>')" href="javascript:void(0)" class="btn btn-sm btn-danger">Sil</a>
				</td>
	    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>
<?php
require_once 'footer.php';
?>
<script type="text/javascript">
  function urun_sil(uniqid) {
    if (confirm('Ürün silinecek, onaylıyor musunuz?')) {
      window.location.href = 'urun-sil.php?uniqid=' + uniqid;
    }
  }
</script>
