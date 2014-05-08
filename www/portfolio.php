<?php
include('_.php');
LT::Head();


$current_tab = LT::GetTab();

?>


<div class="menu">
<?php foreach (LT::GetTabs() as $tab) { ?>
<a class="menu-item<?= $tab===$current_tab?' active':'' ?>" href="<?= HTML(LT::Href('portfolio.php',array('tab'=>$tab))) ?>"><?= HTML(LT::SayTab($tab)) ?></a>
<?php } ?>
</div>

<div class="portfolio">
<?php

/** @var $prj Project */
foreach (LT::GetProjects($current_tab) as $prj) {
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

