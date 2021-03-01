<?php
ob_start();
session_start();
require_once 'database.php';
function kategori_adi($uniqid)
{
	$database = new database();
	$kategori = $database->table('category')->select(['category_uniqid' => $uniqid])->single();
	return $kategori->category_name ?? '';
}

function yonlendir($url)
{
	header("Location: $url");
	exit;
}

