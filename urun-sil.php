<?php
require_once 'functions.php';
$database = new database();
$product = $database->table('products')->select(['uniqid' => $_GET['uniqid'] ?? 0])->single();
if (!$product) {
  yonlendir('index.php?msg=Ürün Bulunamadı!.');
}

$delete = $database->table('products')->delete(['uniqid' => $product->uniqid]);

yonlendir('index.php?msg=Ürün silindi!.');
