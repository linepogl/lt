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

	<div class="home-menu">
	<a class="home-menu-item" href="portfolio.php#cinema"><?= SAY(['en'=>'Cinema','fr'=>'Cinéma']) ?></a>
	<a class="home-menu-item" href="portfolio.php#advertising"><?= SAY(['en'=>'Advertising','fr'=>'Publicités']) ?></a>
	<a class="home-menu-item" href="portfolio.php#personal"><?= SAY(['en'=>'Personal','fr'=>'Personnel']) ?></a>
	</div>

	<div class="portfolio">

<?php
$list = [Project::Load('C001'),Project::Load('C002'),Project::Load('C002'),Project::Load('C002'),Project::Load('C002'),Project::Load('C002'),Project::Load('C002')];
/** @var $prj Project */
foreach ($list as $prj) {
		?>
			<div class="portfolio-item">
				<div class="type"><span class="icon"><?=$prj->icon?></span><span class="text"><?= $prj->type ?></span></div>
				<div class="bg">
				<div class="title"><?= $prj->title ?></div>
				<div class="subtitle"><?= $prj->subtitle ?></div>
				</div>
			</div>
		<?php
	}
?>

	<div style="clear:both;"></div>
	</div>
</div>


<?php
LT::Foot();

