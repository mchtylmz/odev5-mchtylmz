<?php
require_once 'functions.php';
$database = new database();
$export = [];
$products = $database->table('products')->select()->all();
if ($products) {
  foreach ($products as $key => $urun) {
    $export[] = [
      'uniqid' => $urun->uniqid,
      'name' => $urun->uniqid,
      'price' => $urun->price,
      'description' => $urun->description,
      'content' => $urun->content,
      'category' => [
        'uniqid' => $urun->category_uniqid,
        'name' => kategori_adi($urun->category_uniqid)
      ]
    ];
  }
}

header("Content-Type: application/json");
header("Content-Disposition: attachment; filename=products.json");
echo json_encode($export);