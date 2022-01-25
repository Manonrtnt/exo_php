<!--Cours du 19/01/2022-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP</title>
    </head>
    <body>
        <h1>Test module PHP</h1>

        <!------------------ script PHP ------------------>
        <?php
        echo 'Hello World';

        // Variable et type
        $nomVariable = "valeur";
        echo gettype($nomVariable);

        // Exercice 1
        $variable1 = 5;
        echo $variable1;
        echo gettype($variable1);

        $variable2 = 'Manon';
        echo $variable2;
        echo gettype($variable2);

        $variable3 = false;
        echo $variable3;
        echo gettype($variable3);

        // Opérateur 
        // Exercice 1
        $a=12;
        $b=10;
        $total=$a+$b;
        echo "</br> Le résultat est : ".$total."";
        // Exercice 2
        $d=5;
        $e=3;
        $f= $d+$e;
        echo "</br>".$d."".$e."".$f."";
        $d=2;
        echo "</br>".$d."";
        $f= $e-$d;
        echo "</br>".$f."";
        echo "</br>".$d."".$e."".$f."";
        //Exercice 3
        $a=15;
        $b=23;
        echo "</br>".$a."/".$b."";
        $temp=$a;
        $a=$b;
        $b=$temp;
        echo "</br>".$a."/".$b."";
        //Exercice 4
        $prixHT = 10;
        $nbArticle = 3;
        $tauxTVA = 1.2;
        $totalTTC = ($prixHT*$tauxTVA)*$nbArticle;
        echo "</br>Le résultat est : ".$totalTTC."";

        // Concatenation 
        $var = "est concaténée";
        $concat1 = "</br>ma chaine $var";
        $concat2 = '</br>ma chaine ' .$var. '';
        $concat3 = "</br>ma chaine ".$var."";
        $concat4 = "</br>ma chaine ".$var;
        //echo "".$concat1."".$concat2."".$concat3."".$concat4."";
        echo $concat1.$concat2.$concat3.$concat4;
        //Exercice 1
        $a = "bonjour";
        echo '</br>$a = '.$a;
        // Exercice 2
        $a = "bon";
        $b= "jour";
        $c=10;
        echo "</br>".$a."".$b." ".($c+1)."";
        // Exercice 3
        $a = "Bonjour";
        echo "<p>".$a." l'adrar</p>";

        // Fonction
        $final; 
        function nomFonction($a,$b){
            $result= $a+$b;
            return $result;
        }
        $final = nomFonction(10,5);
        echo $final;
        //Exercice 1
        function substraction($a,$b){
            $result=$a-$b;
            return $result;
        }
        // Exercice 2
        function roud($float){
            return round($float);
        }
        echo roud(1.8);
        // Exercice 3
        function sum($a,$b,$c){
            return $a+$b+$c;
        }
        echo sum(15,29,6);
        // Exercice 4
        function moyenne($a,$b,$c){
            return ($a+$b+$c)/3;
        }
        echo moyenne(10,12,11);

        // Condition 
        $a="7";
        $b=7;

        if ($a==$b){
            echo "<p>Ils sont égaux</p>";
        } else if ($a === $b){
            echo "<p>Ils sont identiques</p>";
        }
        // Transtypage echo ("7zezbazrZrbzebee?VNrin=" == 7);
        // Exercice 1
        function test($a){
            if ($a>0){
                return "<p>Il est positif</p>";
            } else if ($a<0) {
                return "<p>Il est négatif</p>";
            } else {
                return "flûte, c'est un 0 il n'a pas de signe !";
            }
        }
        echo test(0);
        echo test(-4);
        // Exercice 2
        function bigger($a,$b,$c){
            return max($a,$b,$c);
        }
        echo bigger(10,44,32);
        // Exercice 3
        function smaller($a,$b,$c){
            return min($a,$b,$c);
        }
        echo smaller(15,10,3);

        // Les boucles
        // for ($i; $i<10; $i++){
        //     // mon code ici
        // }

        // $i = 0;
        // while($i<10){
        //     // mon code ici
        //     $i++;
        // }

        // foreach($tableau as $valeur){
        //     // mon code ici
        // }

        // Les tableaux 
        // Tableau vide
        $ta1 = array();

        // Tableau indexé numériquement objet sauf que clé = index
        $tab2 = array(1,8,12,4,22,54);

        // Tableau associatif = objet avec clé = association
        $tabidentite = array(
            'nom' => 'Retournat',
            'prenom' => 'Manon',
            'age' => 24,
            'est stagiaire' => true
        );

        // Ajouter dans tableau
        $legume[] = 'salade'; // Ajouter fin
        $legume[1]= 'patate'; // Ajouter à un index particulier, écrase si il y a quelque chose dedans
        $identite['age']= 18;
        $identite['taille'] = 164; // ajouter assoc + valeur. 

        $prenom = array('Mathieu','Rodolphe','Jonathan','Yann');

        foreach ($prenom as $key => $value){
            echo '</br>';
            print_r($value);
        }

        var_dump($prenom);

        // Exercice 1 
        $tab2 = array(1,8,12,4,22,54,15,76,82,35,29, 82, 82);
        function maxValeur($tab){
            $numMax = 0;
            $countNb = 1;
            for ($i=0; $i<sizeof($tab); $i++){
                if ($tab[$i]>$numMax){
                    $numMax = $tab[$i];
                    if ($tab[$i]==$numMax){
                        $countNb++;
                    }
                } else {
                    $numMax = $tab[$i];
                }
            }
            print_r($countNb);
            return $numMax;
        }
        echo "</br>La valeur max du tableau est : ".maxValeur($tab2);
        // Correction Exercice 1 - tableau
        $tab = array(14, 65, 456, 789, -12, -402, 963, 147, 54, 78, -36, 94, 65, -402, 963, 25, 82, 963);
        function plusGrande($tab) {
            $toTest = 0;
            $toCount = 1;
            for ($i = 0; $i < sizeof($tab); $i++) {
                if ($toTest>= $tab[$i]) {
                    $toTest = $toTest;
                    if ($toTest == $tab[$i]){
                        $toCount++;
                    }
                } else {
                    $toTest = $tab[$i];
                }
            }
            print_r($toCount);
            return $toTest;
        }
        echo plusGrande($tab);
        // Exercice 2
        $tabMoyenne = array(10,11,12);
        function moyenneBis($tab){
            $divi = count($tab);
            $total = array_sum($tab);
            return $moyenne = $total/$divi;
        }
        echo "</br>La moyenne est de : " .moyenneBis($tabMoyenne);
        //Correction moyenne 
        function moyenneCorrect($tab){
            $toReturn = 0;
            $counter = 0;
            for ($i=0;$i<sizeof($tab); $i++){
                $toReturn += $tab[$i];
                $counter++;
            }
            return $toReturn = $toReturn/$counter;
        }
        echo "</br>La moyenne est de : " .moyenneCorrect($tabMoyenne);
        // Exercice 3
        function minValeur($tab){
            return min($tab);
        }
        echo "</br>".minValeur($tab2);

        //
        ?>

    </body>
</html>