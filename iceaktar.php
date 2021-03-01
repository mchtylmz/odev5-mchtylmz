<?php
$title = 'Ürünler';
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $msg = '';
  if ( isset($_FILES["file"]) && $_FILES["file"]["tmp_name"] ) {
    $yuklendi = move_uploaded_file($_FILES["file"]["tmp_name"], 'products.json');
    if ($yuklendi) {
      $contents = file_get_contents(__DIR__ . '/products.json');
      $results = json_decode($contents, true);
      if ($results) {
        $database = new database();
        foreach ($results as $key => $result) {
          // ürünler
          $is_exists = $database->table('products')->select(['uniqid' => $result['uniqid']])->single();
          $products = $database->table('products');
          $data = [
            'uniqid' => $result['uniqid'],
            'name' => $result['name'],
            'price' => $result['price'],
            'description' => $result['description'],
            'content' => $result['content'],
            'category_uniqid' => $result['category']['uniqid'],
          ];
          if ($is_exists) {
            $products->update($data, [
              'uniqid' => $result['uniqid']
            ]);
          } else {
            $products->insert($data);
          }
          // kategoriler
          $is_exists = $database->table('category')->select(['category_uniqid' => $result['category']['uniqid']])->single();
          $category = $database->table('category');
          $data = [
            'uniqid' => $result['category']['uniqid'],
            'name' => $result['category']['name']
          ];
          if ($is_exists) {
            $category->update($data, [
              'uniqid' => $result['uniqid']
            ]);
          } else {
            $category->insert($data);
          }
        }
      }
      $msg = 'Dosya yüklendi ve içe aktarıldı!';
      yonlendir('index.php?msg='. $msg);
    } else {
       $msg = 'Dosya yüklenemedi!';
    }
  } else {
    $msg = 'Dosya Bulunamadı!';
  }
  yonlendir('iceaktar.php?msg='. $msg);

}

?>
<hr>
<?php if (isset($_GET["msg"])): ?>
  <div class="alert alert-secondary"><?=$_GET["msg"]?></div>
  <hr>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Dosya Seç</label>
    <input type="file" class="form-control" name="file" accept=".json" >
  </div>
  <button type="submit" class="btn btn-primary">İçe Aktar</button>
</form>

<hr>
<?php
require_once 'footer.php';
?>
