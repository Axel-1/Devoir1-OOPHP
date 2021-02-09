<?php


class Exercice
{
    private int $numero;
    private string $intitule;
    private string $enonce;
    private string $questions;

    public function __construct(int $newNumero, string $newIntitule, string $newEnonce, string $newQuestion)
    {
        $this->numero = $newNumero;
        $this->intitule = $newIntitule;
        $this->enonce = $newEnonce;
        $this->questions = $newQuestion;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }
}