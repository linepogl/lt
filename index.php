<?php
include('_.php');
LT::Head();
?>


<div class="home-title">
<div class="home-title-1">Lambros</div>
<div class="home-title-2">Taklis</div>
<div class="home-title-3"><?= SAY(array('en'=>'Composer','fr'=>'Compositeur')) ?></div>
</div>

<div class="menu">
<a class="menu-item" href="<?= HTML(LT::Href('portfolio.php',array('tab'=>'cinema')))      ?>"><?= SAY(array('en'=>'Cinema','fr'=>'Cinéma')) ?></a>
<a class="menu-item" href="<?= HTML(LT::Href('portfolio.php',array('tab'=>'advertising'))) ?>"><?= SAY(array('en'=>'Advertising','fr'=>'Publicités')) ?></a>
<a class="menu-item" href="<?= HTML(LT::Href('portfolio.php',array('tab'=>'personal')))    ?>"><?= SAY(array('en'=>'Personal','fr'=>'Personnel')) ?></a>
</div>



<?php
LT::Foot();
