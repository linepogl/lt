<?php
include('_.php');
LT::Head();


$prj = Project::Load($_GET['prj']);

$tab = LT::$tab;
switch (LT::$tab) {
    case 'cinema': break;
    case 'advertising': break;
    case 'personal': break;
    default: $tab = 'cinema'; break;
}

?>



<div class="project-head">

    <div class="title"><?= HTML($prj->title) ?></div>
    <div class="subtitle"><?= HTML($prj->subtitle) ?></div>

</div>
<div class="project-body"><div class="inner">
    <?php $prj->Render() ?>
</div></div>



<?php
LT::Foot();

