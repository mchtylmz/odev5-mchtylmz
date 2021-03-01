<?php
$title = 'Ürün Ekle';
require_once 'header.php';
$database = new database();
$urun = $database->table('products')->select(['uniqid' => $_GET['uniqid'] ?? 0])->single();
if (!$urun) {
  yonlendir('index.php?msg=Ürün Bulunamadı!.');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['name']) && isset($_POST['category_uniqid'])) {
    $urun_update = $database->table('products')->update([
      'name' => $_POST['name'],
      'price' => $_POST['price'] ?? 0,
      'description' => $_POST['description'] ?? '',
      'content' => $_POST['content'] ?? '',
      'category_uniqid' => $_POST['category_uniqid']
    ], [
      'uniqid' => $urun->uniqid
    ]);
    yonlendir('index.php?msg=Ürün güncellendi!.');
  } else {
    yonlendir('urun-duzenle.php?uniqid='.($_GET['uniqid'] ?? 0).'&msg=Ürün bilgisi bulunamadı!.');
  }
}

$kategoriler = $database->table('category')->select()->all();
?>
<hr>
<?php if (isset($_GET["msg"])): ?>
  <div class="alert alert-secondary"><?=$_GET["msg"]?></div>
  <hr>
<?php endif; ?>
<form action="" method="post">
  <div class="form-group">
    <label>Ürün Adı</label>
    <input type="text" class="form-control" name="name" value="<?=$urun->name?>" required>
  </div>

  <div class="form-group">
    <label>Ürün Fiyatı</label>
    <input type="number" class="form-control" name="price" value="<?=$urun->price?>" required>
  </div>

  <div class="form-group">
    <label>Kategori</label>
    <select class="form-control" name="category_uniqid" required>
      <option>Kategori Seçiniz</option>
      <?php foreach ($kategoriler as $key => $kategori): ?>
        <option value="<?=$kategori->category_uniqid?>" <?=$urun->category_uniqid == $kategori->category_uniqid ? 'selected':''?>><?=$kategori->category_name?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label>Kısa Açıklama</label>
    <textarea rows="2" class="form-control" name="description"><?=$urun->description?></textarea>
  </div>

  <div class="form-group">
    <label>Açıklama</label>
    <textarea rows="10" class="form-control" name="content"><?=$urun->content?></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Güncelle</button>
</form>
<?php
require_once 'footer.php';
?>
