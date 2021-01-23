<?php
require_once('persona.php');
require_once('impiegato.php');
require_once('impiegato_ore.php');
require_once('impiegato_giorni.php');
require_once('impiegato_commissione.php');


try{
$impiegato_1 =  new ImpiegatoSuCommissione("Michele", "Terzo", "TRZMHL98R15D086Q", "AEIOU10", "NOME_PROGETTO", 1000);
echo "IMPIEGATO SU COMMISSIONE <br>";
$impiegato_1->to_string();

echo " <hr>";

$impiegato_2 =  new ImpiegatoSalariato("Matteo", "Ponchietti", "TRZMHL98R15D086Q", "ABCDE11", 24, 50);
echo "IMPIEGATO SALARIATO <br>";
$impiegato_2->to_string();

echo " <hr>";

$impiegato_3 =  new ImpiegatoAOre("Flavio", "Muscente", "TRZMHL98R15D086Q", "QWERTY12", 48, 15);
echo "IMPIEGATO AD ORE <br>";
$impiegato_3->to_string();
} catch (Exception $e){
    echo 'Errore --> ' . $e->getMessage();
}