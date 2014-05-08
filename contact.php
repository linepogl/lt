<?php
include('_.php');

LT::Head();
?>



    <div class="project-head">
        <div class="title">BIO</div>
    </div>
<div class="project-body">

    <div class="inner">
        <img src="img/contact.jpg" style="float:left;margin-right:20px;"/>

        <?php if (LT::$lang == 'en') { ?>
            Lambros Taklis is a composer born in Greece.
            <br/>
            <br/>His passion for music began at the age of 6. He studied classical piano, harmony, counterpoint, fugue, orchestration and composition. Along with his classical music studies, Lambros is also studied jazz piano, Byzantine music and various instruments from Middle East and Asia.
            <br/>
            <br/>He shares his life between Paris and Athens and works as a composer for films, TV, theater, dance and contemporary arts such as video and sound installations.
        <?php } ?>
        <?php if (LT::$lang == 'fr') { ?>
            Lambros Taklis est un compositeur d’origine grecque.
            <br/>
            <br/>Sa passion pour la musique a commencé à l’âge de 6 ans. Il a étudié le piano classique, l’harmonie, le contrepoint, la fugue, l’orchestration et la composition. En plus de ses études de musique classique, Lambros a également étudié le piano jazz, la musique Byzantine et divers instruments du Moyen Orient et d’Asie.
            <br/>
            <br/>Il partage sa vie entre Paris et Athènes et travaille en tant que compositeur pour des films, la télévision, le théâtre, la danse et les arts contemporains comme la vidéo et des installations sonores.
        <?php } ?>

        <div style="clear:both;"></div>
    </div>
</div>

    <div class="menu bottom">
        &rsaquo; &rsaquo; &rsaquo; <a class="menu-item" href="mailto:info@taklis.com">info@taklis.com</a> &lsaquo; &lsaquo; &lsaquo;
    </div>






<?php
LT::Foot();

