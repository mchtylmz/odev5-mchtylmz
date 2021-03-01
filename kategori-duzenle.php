<?php
$title = 'Kategori Ekle';
require_once 'header.php';
$database = new database();
$category = $database->table('category')->select(['category_uniqid' => $_GET['uniqid'] ?? 0])->single();
if (!$category) {
  yonlendir('kategori.php?msg=Kategori Bulunamadı!.');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['kategori_adi'])) {
    $category_update = $database->table('category')->update([
      'category_name' => $_POST['kategori_adi']
    ], [
      'category_uniqid' => $category->category_uniqid
    ]);
    yonlendir('kategori.php?msg=Kategori güncellendi!.');
  } else {
    yonlendir('kategori-duzenle.php?uniqid='.($_GET['uniqid'] ?? 0).'&msg=Kategori Adı Bulunamadı!.');
  }
}
?>
<hr>
<?php if (isset($_GET["msg"])): ?>
  <div class="alert alert-secondary"><?=$_GET["msg"]?></div>
  <hr>
<?php endif; ?>
<form action="" method="post">
  <div class="form-group">
    <label>Kategori Adı</label>
    <input type="text" class="form-control" name="kategori_adi" value="<?=$category->category_name?>" required>
  </div>
  <button type="submit" class="btn btn-primary">Güncelle</button>
</form>
<?php
require_once 'footer.php';
?>
