<?php
    include("models.php");

    $archer1 = new Archer ("Archer1","Feminin");
    $mage1 = new Mage ("Mage1","Masculin");

    while ($mage1->vie > 0 && $archer1->vie > 0){
        $archer1->attack($archer1->name, $mage1->name);
        $mage1->protection();
        $mage1->attack($mage1->name, $archer1->name);
        $archer1->protection();
    } 
    if ($mage1->vie == 0){
        echo("<p>$mage1->name est mort, violament assassiné par une flêche enflammée</p>");
    } else echo("<p>$archer1->name est mort par un violent eclair tombé du ciel</p>");

    echo('<p>Ce combat est interminable, la prochaine fois, ce sera en one shot !</p>');
?>