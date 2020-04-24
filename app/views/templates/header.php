<!DOCTYPE html>
<html>
<head>
	<title> <?= $data["judul"] ?> </title>
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?= BASEURL; ?>/fontawesome/css/all.css">
</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      
     <div class="container ml-1" >
      
		  <a class="navbar-brand" href="<?= BASEURL ?>">BooksList</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		       <a class="nav-item nav-link active" href="<?= BASEURL ?>">Home <span class="sr-only">(current)</span></a>
		       <a class="nav-item nav-link active" href="<?= BASEURL ?>Book">Books <span class="sr-only">(current)</span></a>
		       <a class="nav-item nav-link active" href="<?= BASEURL ?>About">About <span class="sr-only">(current)</span></a>
		    </div>
		  </div>

	  </div>

  </nav>

