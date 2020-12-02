<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title><?=$title;?></title>
  
      <!-- Custom fonts for this template-->
      <link href="<?= base_url('assets/');?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="<?= base_url('assets/');?>css/style.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
      
      <link	href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template-->
      
  </head>
  <body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="navbar">
  <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?=base_url('assets/image/1.png')?>" alt="<?=$judul;?>" class="rounded float-left logo">
        <h5 class="judul"><?=$judul;?></h5>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto text-dark">
            <a class="nav-item nav-link" href="<?=base_url()?>">Hadist</a>
            <a class="nav-item nav-link" href="<?=base_url()?>">Alquran</a>
            <a class="nav-item nav-link" href="<?=base_url()?>">Cerita Islami</a>
        </div>
      </div>
  </div>
</nav>
<!-- ahir navbar -->
<!-- jumbo tron -->
<div class="jumbotron jumbotron-fluid bg-light">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
              <div class="typed">
                <h2 class="display-4">Pustaka Hadist</h2>
              </div>
                <p class="">Cari dan pelajari hadist hanya di <strong><?=$title?></strong> Tempat hadist Rosulullah SAW terlengkap dan terpercaya hanya di pustaka hadist</p>
                <a href="" class="btn btn-primary shadow"><span class="jum-btn">Cari Hadist</span></a>
                <a href="<?=base_url('auth/') ?>" class="btn btn-outline-light shadow ml-3"><span class="jum-btn">DAFTAR</span></a>
            </div>
            <div class="col-md-4">
              <img src="<?=base_url('assets/image/1.png')?>" alt="<?=$judul;?>" class=" jumbotronimg align-center"> 
            </div>
        </div>
      </div>
</div>
<!-- / jumbo tron -->



