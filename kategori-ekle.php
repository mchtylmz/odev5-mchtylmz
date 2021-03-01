<?php
$title = 'Kategori Ekle';
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['kategori_adi'])) {
    $database = new database();
    $category = $database->table('category')->insert([
      'category_uniqid' => uniqid(),
      'category_name' => $_POST['kategori_adi']
    ]);
    yonlendir('kategori.php?msg=Kategori eklendi!.');
  } else {
    yonlendir('kategori-ekle.php?msg=Kategori Adı Bulunamadı!.');
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
    <input type="text" class="form-control" name="kategori_adi" required>
  </div>
  <button type="submit" class="btn btn-primary">Ekle</button>
</form>
<?php
require_once 'footer.php';
?>
