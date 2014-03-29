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
    <a class="menu-item<?= $tab==='cinema'     ?' active':'' ?>" href="<?= LT::Href('portfolio.php',array('tab'=>'cinema'))      ?>"><?= SAY(array('en'=>'Cinema','fr'=>'Cinéma')) ?></a>
    <a class="menu-item<?= $tab==='advertising'?' active':'' ?>" href="<?= LT::Href('portfolio.php',array('tab'=>'advertising')) ?>"><?= SAY(array('en'=>'Advertising','fr'=>'Publicités')) ?></a>
    <a class="menu-item<?= $tab==='personal'   ?' active':'' ?>" href="<?= LT::Href('portfolio.php',array('tab'=>'personal'))    ?>"><?= SAY(array('en'=>'Personal','fr'=>'Personnel')) ?></a>
    </div>

	<div class="portfolio">

<?php
$list = array();
foreach (scandir('prj') as $f) {
    if ($f == '.' || $f == '..') continue;
    if (!is_dir("prj/$f")) continue;
    if (strtoupper(substr($f,0,1)) !== strtoupper(substr($tab,0,1))) continue;
    $prj = Project::Load($f);
    $list[] = $prj;
}




/** @var $prj Project */
foreach ($list as $prj) {
		?>
        <a class="portfolio-item" href="<?= LT::Href('project.php',array('prj'=>$prj->code)) ?>">
				<div class="type"><span class="icon"><?=$prj->icon?></span><span class="text"><?= $prj->type ?></span></div>
				<div class="bg">
				<div class="title"><?= $prj->title ?></div>
				<div class="subtitle"><?= $prj->subtitle ?></div>
				</div>
        </a>
		<?php
	}
?>

	<div style="clear:both;"></div>
	</div>


<?php
LT::Foot();

