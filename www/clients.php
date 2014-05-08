<?php
include('_.php');
LT::Head();
?>

<div class="clients">
<?php
$a = array();
foreach (scandir('cli') as $f) {
    if ($f == '.' || $f == '..') continue;
    $a[] = $f;
}
shuffle($a);
foreach ($a as $f) {
    echo '<img class="client" src="cli/'.$f.'" />';
}
?>
</div>


<?php
LT::Foot();

