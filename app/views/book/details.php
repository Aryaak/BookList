<div class="container mt-2 ml-4" >

   <div class="card" style="width: 400px;">
   	  <img height="500px"  src="<?= BASEURL ?>/img/<?= $data["books"]["image"] ?>">
	  <div class="card-body">
	    <h5 class="card-title"><?= $data["books"]["title"] ?></h5>
	    <p class="card-text"></p>
	    <ul class="" >
	    	<li>AUTHOR : <?= $data["books"]["author"] ?></li>
	    	<li>PUBLISHER : <?= $data["books"]["publisher"] ?></li>
	    	<li>PRICE : <?= "Rp ".number_format($data["books"]["price"],0,",",".") ?></li>
	    </ul>
	    <a href="<?= BASEURL ?>Book" class="card-link">Back</a>
	  </div>
   </div>

</div>