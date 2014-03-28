<?php
include('_.php');
LT::Head();
?>

<img id="bg" src="res/bg.png" />

<div id="top">
	<a class="logo" href="index.php"><span class="icon">&#xE001;</span></a>
	<a class="menu-item" href="contact.php"><?= SAY(['en'=>'Contact','fr'=>'Contacter']) ?></a>
	<a class="menu-item" href="clients.php"><?= SAY(['en'=>'Clients','fr'=>'Clients']) ?></a>
	<a class="menu-item" href="portfolio.php"><?= SAY(['en'=>'Portfolio','fr'=>'Portfolio']) ?></a>
	<div style="clear:both;"></div>
</div>



<div id="main">

	<div class="home-title">
	<div class="home-title-1">Lambros</div>
	<div class="home-title-2">Taklis</div>
	<div class="home-title-3"><?= SAY(['en'=>'Composer','fr'=>'Compositeur']) ?></div>
	</div>

	<div class="home-menu">
	<a class="home-menu-item" href="portfolio.php#cinema"><?= SAY(['en'=>'Cinema','fr'=>'Cinéma']) ?></a>
	<a class="home-menu-item" href="portfolio.php#advertising"><?= SAY(['en'=>'Advertising','fr'=>'Publicités']) ?></a>
	<a class="home-menu-item" href="portfolio.php#personal"><?= SAY(['en'=>'Personal','fr'=>'Personnel']) ?></a>
	</div>

</div>


<?php
LT::Foot();
