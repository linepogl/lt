<?php
include('_.php');


$prj = Project::Load($_GET['prj']);


LT::Head( $prj->GetBackgroundSrc() );
?>



<div class="project-head">
   <table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="100%" style="vertical-align:bottom;">
       <div class="title"><?= HTML($prj->title) ?></div>
       <div class="subtitle"><?= HTML($prj->subtitle) ?></div>
    </td><td style="vertical-align:bottom;text-align:right;">
    <?php

    $decal = $prj->GetDecalSrc();
    if ($decal != '') {
        echo '<img class="decal" src="'.HTML($decal).'" />';
    }


    echo '<span style="white-space:nowrap;">';

    $client = $prj->GetClientSrc();
    if ($client != '') {
        echo '<img class="client" src="'.HTML($client).'" />';
    }

    $production = $prj->GetProductionSrc();
    if ($production != '') {
        echo '<img class="production" src="'.HTML($production).'" />';
    }
    echo '</span>'

    ?>
       </td></tr></table>
</div>
<div class="project-body"><div class="inner">


		<?php

		echo '<div class="info">';
//		$s = trim($prj->type); if ($s) echo '<div class="info-type">'.HTML($s).'</div>';
//		$s = trim($prj->date); if ($s) echo '<div class="info-date">'.HTML($s).'</div>';
		$s = trim($prj->description); if ($s) echo '<div class="info-description">'.str_replace("\n",'<br/>',HTML($s)).'</div>';
		echo '</div>';



		$prj->Render()





		?>
</div></div>

<div class="menu bottom">

	<?php
	$next_prj = $prj->GetNextProject();
	if ($next_prj instanceof Project) {
		?>
		<div class="next-project" >
		<a href="<?= HTML(LT::Href('project.php',array('prj'=>$next_prj->code))) ?>"><?= HTML(SAY(array('en'=>'Next: ','fr'=>'Suivant : '))) ?><?= HTML($next_prj->type) ?> - <?= HTML($next_prj->title) ?>&nbsp;&nbsp;&rsaquo;&nbsp;&rsaquo;</a>
		</div>
		<?php
	}
	?>

	<a class="menu-item" href="<?= HTML(LT::Href('portfolio.php',array('tab'=>$prj->GetTab()))) ?>">&lsaquo;&nbsp;&nbsp;<?= HTML(LT::SayTab($prj->GetTab())) ?></a>
</div>



<?php
LT::Foot();

