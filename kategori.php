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
          <a class="btn btn-sm btn-warning" href="kategori-duzenle.php?uniqid=<?=$kategori->category_uniqid?>">Düzenle</a>
          <a onclick="kategori_sil('<?=$kategori->category_uniqid?>')" href="javascript:coid(0)" class="btn btn-sm btn-danger">Sil</a>
        </td>
	    </tr>
    <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="3" style="text-align:center">Kategori Bulunamadı!..</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>
<?php
require_once 'footer.php';
?>
<script type="text/javascript">
  function kategori_sil(uniqid) {
    if (confirm('Kateogri silinecek, onaylıyor musunuz?')) {
      window.location.href = 'kategori-sil.php?uniqid=' + uniqid;
    }
  }
</script>
