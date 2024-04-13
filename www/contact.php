<?php
include('_.php');

LT::Head('img/contact_bg.jpg');
?>

<div class="project-head">
    <div class="title">BIO</div>
</div>

<div class="project-body">
    <div class="inner">
        <img src="img/contact.jpg" style="float:left;margin-right:20px;"/>

        <?php if (LT::$lang == 'en') { ?>
            The music of Lambros TAKLIS has been globally broadcasted and showcased through many diverse avenues. A composer of soundtracks for film, TV, theatre, and dance, he also enjoys branching off into the contemporary arts, such as video and sound installations.
            <br/><br/>
            The basis of his work is grounded with an inspiration in alternating perspectives and imagery, combined with an eclectic collection of influences – namely classical, world, jazz, byzantine, pop, rock, electronic, and of course, silence.
            <br/><br/>
            Born in Athens, Greece, his passion for music began at the age of six, where he commenced studies in classical piano, harmony, counterpoint, fugue, orchestration and composition under the tutelage of Michalis Adamis. He holds a Film Scoring Diploma (École Normale de Musique de Paris) and has also studied Film music orchestration with Scott Smalley (Film music institute, Los Angeles, California). Along with classical music studies, Lambros has also studied jazz piano under Bruno Angelini, Philippe Le Baraillec and Lilian Dericq, Byzantine music under Vasilios Avramidis and various traditional instruments from Greece, Turkey, Indonesia, China, and Japan.
            <br/><br/>
            He lives in Paris and works as a freelance composer.
        <?php } ?>
        <?php if (LT::$lang == 'fr') { ?>
            La musique de Lambros TAKLIS a été diffusée et présentée à travers le monde. Compositeur de musique pour le cinéma, le théâtre, la danse et aussi les arts contemporains comme des installations sonores. Aux sources de son œuvre se perçoivent divers points de vue ou images combinés à un kaléidoscope d'influences comme la musique classique, la musique du monde, la musique byzantine, le jazz, le pop, le rock et bien entendu le silence.
            <br/><br/>
            Lambros TAKLIS est un compositeur né en Grèce. Sa passion pour la musique a commencé à l’âge de 6 ans. Il a étudié le piano classique, l’harmonie, le contrepoint, la fugue, l’orchestration et la composition avec Michalis Adamis. Il est titulaire d'un Diplôme de Composition de Musique de Film (Ecole Normale de Musique de Paris ) et a également étudié l'orchestration pour la musique de film avec Scott Smalley (Film music institute, Los Angeles, California). En plus de ses études de musique classique, Lambros a également étudié le piano jazz avec Bruno Angelini, Philippe Le Baraillec and Lilian Dericq, la musique Byzantine avec Vassilios Avramidis et divers instruments traditionnels de Grèce, Turquie, Indonésie, Chine et Japon.
            <br/><br/>
            Il vit à Paris et travaille en tant que freelance compositeur.
        <?php } ?>

        <div style="clear:both;"></div>
    </div>
</div>

<div class="menu bottom" style="color:#ffffff;">
    &rsaquo; &rsaquo; &rsaquo; <a class="menu-item" href="mailto:info@taklis.com">info@taklis.com</a> &lsaquo; &lsaquo; &lsaquo;
</div>

<?php
LT::Foot();
