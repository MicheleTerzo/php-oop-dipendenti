<?php

class Persona
{
    public $nome;
    public $cognome;
    public $codice_fiscale;

    public function __construct($nome, $cognome, $codice_fiscale)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->codice_fiscale = $codice_fiscale;
    }

    public function to_string()
    {
        echo "nome - " . $this->nome . "<br>" .
            "cognome - " . $this->cognome . "<br>" .
            "Codice Fiscale - " . $this->codice_fiscale . "<br>";
    }
}

class Impiegato extends Persona
{
    public $codice_impiegato;
    // public $compenso;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato)
    {
        parent::__construct($nome, $cognome, $codice_fiscale);
        $this->codice_impiegato = $codice_impiegato;
        // $this->compenso = $compenso;
    }

    public function to_string()
    {
        echo "Nome - " . $this->nome . "<br>" .
            "Cognome - " . $this->cognome . "<br>" .
            "Codice Fiscale - " . $this->codice_fiscale . "<br>" .
            "Codice Impiegato - " . $this->codice_impiegato . "<br>" .
            "Compenso - " . $this->compenso . "<br>";
    }
}

class ImpiegatoSalariato extends Impiegato
{
    public $giorni_lavorativi;
    public $compenso_giornaliero;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $giorni_lavorativi, $compenso_giornaliero)
    {   
        parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $giorni_lavorativi, $compenso_giornaliero);
        $this->giorni_lavorativi = $giorni_lavorativi;
        $this->compenso_giornaliero = $compenso_giornaliero;
    }

    public function calcolo_compenso()
    {
        return $this->giorni_lavorativi * $this->compenso_giornaliero;
    }

    public function to_string()
    {
        echo "Nome - " . $this->nome . "<br>" .
        "Cognome - " . $this->cognome . "<br>" .
        "Codice Fiscale - " . $this->codice_fiscale . "<br>" .
        "Codice Impiegato - " . $this->codice_impiegato . "<br>" .
        "Giorni Lavorativi - " . $this->giorni_lavorativi . "<br>" . 
        "Compenso Giornaliero - " . $this->compenso_giornaliero . "€" . "<br>" .
        "Compenso - " . $this->calcolo_compenso() . "€" . "<br>";
    }
}

class ImpiegatoAOre extends Impiegato
{
    public $ore_lavorate;
    public $compenso_orario;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $ore_lavorate, $compenso_orario)
    {
        parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $ore_lavorate, $compenso_orario);
        $this->ore_lavorate = $ore_lavorate;
        $this->compenso_orario = $compenso_orario;
    }

    public function calcolo_compenso()
    {
        return $this->ore_lavorate * $this->compenso_orario;
    }

    public function to_string()
    {
        echo "Nome - " . $this->nome . "<br>" .
            "Cognome - " . $this->cognome . "<br>" .
            "Codice Fiscale - " . $this->codice_fiscale . "<br>" .
            "Codice Impiegato - " . $this->codice_impiegato . "<br>" .
            "Ore Lavorate - " . $this->ore_lavorate . "<br>" .
            "Compenso Orario - " . $this->compenso_orario . "€" . "<br>" .
            "Compenso - " . $this->calcolo_compenso() . "€" . "<br>";
    }
}

class ImpiegatoSuCommissione extends Impiegato 
{
    use Progetto;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $nome_progetto, $commissione){
        parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato);
        $this->commissione = $commissione;
        $this->nome_progetto = $nome_progetto;
        $this->commissione = $commissione;
    }

    public function calcolo_compenso(){
        return $this->commissione;
    }

    public function to_string()
    {
        echo "Nome - " . $this->nome . "<br>" .
            "Cognome - " . $this->cognome . "<br>" .
            "Codice Fiscale - " . $this->codice_fiscale . "<br>" .
            "Codice Impiegato - " . $this->codice_impiegato . "<br>" .
            "Nome Progetto - " . $this->nome_progetto . "<br>" .
            "Commissione - " . $this->calcolo_compenso() . "€" . "<br>";
    }
}

trait Progetto
{
   public $nome_progetto;
   public $commissione; 
}

$impiegato_1 =  new ImpiegatoSuCommissione("Michele", "Terzo", "TRZMHL98R15D086Q", "AEIOU10", "NOME_PROGETTO", 1000);
echo "IMPIEGATO SU COMMISSIONE <br>";
echo $impiegato_1->to_string();

echo " <hr>";

$impiegato_2 =  new ImpiegatoSalariato("Matteo", "Ponchietti", "TRZMHL98R15D086Q", "ABCDE11", 24, 50);
echo "IMPIEGATO SALARIATO <br>";
echo $impiegato_2->to_string();

echo " <hr>";

$impiegato_3 =  new ImpiegatoAOre("Flavio", "Muscente", "TRZMHL98R15D086Q", "QWERTY12", 48, 15);
echo "IMPIEGATO AD ORE <br>";
echo $impiegato_3->to_string();
