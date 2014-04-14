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
<?php foreach (LT::GetTabs() as $tab) { ?>
<a class="menu-item" href="<?= HTML(LT::Href('portfolio.php',array('tab'=>$tab))) ?>"><?= HTML(LT::SayTab($tab)) ?></a>
<?php } ?>
</div>



<?php
LT::Foot();
