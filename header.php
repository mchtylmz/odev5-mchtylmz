<?php
require_once 'functions.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title ?? 'Anasayfa'?></title>
		<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column h-100">
	<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  	  <div class="container">
  		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
  		    <span class="navbar-toggler-icon"></span>
  		  </button>

  		  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
  		    <ul class="navbar-nav mr-auto">
  		      <li class="nav-item">
  		        <a class="nav-link text-white" href="index.php">Ürünler</a>
  		      </li>
  		      <li class="nav-item">
  		        <a class="nav-link text-white" href="kategori.php">Kategoriler</a>
  		      </li>
  		      <li class="nav-item">
  		        <a class="nav-link text-white" href="iceaktar.php">İçe Aktar</a>
  		      </li>
  		      <li class="nav-item">
  		        <a class="nav-link text-white" href="disaaktar.php">Dışa Aktar</a>
  		      </li>
  		    </ul>

  		  </div>
  	  </div>
  	</nav>
  </header>

	<main role="main" style="margin-top: 60px;">
	  <div class="container">
