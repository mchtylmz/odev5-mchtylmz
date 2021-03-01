<?php
require_once 'functions.php';
$database = new database();
$category = $database->table('category')->select(['category_uniqid' => $_GET['uniqid'] ?? 0])->single();
if (!$category) {
  yonlendir('kategori.php?msg=Kategori Bulunamadı!.');
}

$delete = $database->table('category')->delete(['category_uniqid' => $category->category_uniqid]);

yonlendir('kategori.php?msg=Kategori silindi!.');
