<?php

require_once('persona.php');

class Impiegato extends Persona
{
    public $codice_impiegato;
    // public $compenso;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato)
    {
        parent::__construct($nome, $cognome, $codice_fiscale);
        // $this->compenso = $compenso;
        if (!is_numeric($codice_impiegato)) {

            throw new Exception('il codice impiegato è errato');
        }
        $this->codice_impiegato = $codice_impiegato;
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

trait Progetto
{
    public $nome_progetto;
    public $commissione;
}