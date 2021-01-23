<?php

require_once('impiegato.php');


class ImpiegatoSuCommissione extends Impiegato
{
    use Progetto;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $nome_progetto, $commissione)
    {
        parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato);
        if (!is_string($nome_progetto)) {

            throw new Exception('Il nome progetto non è corretto');
        } elseif (!is_numeric($commissione)) {

            throw new Exception("L'importo della commissione non è un numero");
        }
        $this->commissione = $commissione;
        $this->nome_progetto = $nome_progetto;
        $this->commissione = $commissione;
    }

    public function calcolo_compenso()
    {
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
