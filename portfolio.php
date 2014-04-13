<?php
include('_.php');
LT::Head();


$tab = LT::$tab;
switch (LT::$tab) {
    case 'cinema': break;
    case 'advertising': break;
    case 'personal': break;
    default: $tab = 'cinema'; break;
}

?>


    <div class="menu">
    <a class="menu-item<?= $tab==='cinema'     ?' active':'' ?>" href="<?= HTML(LT::Href('portfolio.php',array('tab'=>'cinema')))      ?>"><?= SAY(array('en'=>'Cinema','fr'=>'Cinéma')) ?></a>
    <a class="menu-item<?= $tab==='advertising'?' active':'' ?>" href="<?= HTML(LT::Href('portfolio.php',array('tab'=>'advertising'))) ?>"><?= SAY(array('en'=>'Advertising','fr'=>'Publicités')) ?></a>
    <a class="menu-item<?= $tab==='personal'   ?' active':'' ?>" href="<?= HTML(LT::Href('portfolio.php',array('tab'=>'personal')))    ?>"><?= SAY(array('en'=>'Personal','fr'=>'Personnel')) ?></a>
    </div>

	<div class="portfolio">

<?php

/** @var $prj Project */
foreach (LT::GetProjects($tab) as $prj) {
	$thumb = $prj->GetThumbnailSrc();
	?>
  <a class="portfolio-item" href="<?= HTML(LT::Href('project.php',array('prj'=>$prj->code))) ?>">
	<div class="type"><span class="icon"><?=$prj->icon?></span><span class="text"><?= HTML($prj->type) ?></span></div>
	<div class="bg"<?= $thumb==''?'':' style="background:url('.$thumb.') 50% 50% no-repeat;"'?>>
	<div class="title"><?= HTML($prj->title) ?></div>
	<div class="subtitle"><?= HTML($prj->subtitle) ?></div>
	</div>
	</a>
	<?php
}
?>

	<div style="clear:both;"></div>
	</div>


<?php
LT::Foot();

