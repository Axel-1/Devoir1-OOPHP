<?php


class Devoir
{
    private static int $devoir_counter = 0;
    private int $numero;
    private string $intitule;
    private array $listeExercices = array();

    public function __construct()
    {
        self::$devoir_counter++;
        switch (count(func_get_args())) {
            case 2:
                return call_user_func_array(array($this, 'construct1'), func_get_args());
            case 3:
                return call_user_func_array(array($this, 'construct2'), func_get_args());
        }
        die("Nombre de paramètre invalide");
    }

    private function construct1(int $newNum, string $newIntitule)
    {
        $this->numero = $newNum;
        $this->intitule = $newIntitule;
    }

    public static function getDevoirCounter()
    {
        return self::$devoir_counter;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero)
    {
        $this->numero = $numero;
    }

    public function modifierExercices()
    {
        for ($i = 0; $i < count($this->listeExercices); $i++) {
            $reponse = readline("Supprimer l'exercice N° : " . $this->listeExercices[$i]->getNumero() . " (o/n) ? ");
            print($i);
            if ($reponse == "o") {
                $this->supprimerExercice($this->listeExercices[$i]->getNumero());
                $i--;
            }
        }
        $reponse = readline("Ajouter un exercice (o/n) ? ");
        while ($reponse == "o") {
            $Num = readline("Saisir le numéro : ");
            $Titre = readline("Saisir l'intitulé : ");
            $Enonce = readline("Saisir l'énoncé : ");
            $Questions = readline("Saisir les questions : ");
            $NouvelExercice = new Exercice($Num, $Titre, $Enonce, $Questions);
            $this->ajouterExercice($NouvelExercice);
            $reponse = readline("Ajouter un autre exercice (o/n) ? ");
        }
    }

    private function supprimerExercice(int $num)
    {
        $i = 0;
        while ($i < count($this->listeExercices) && $this->listeExercices[$i]->getNumero() != $num) {
            $i++;
        }
        if ($i < count($this->listeExercices)) {
            for ($j = $i; $j < count($this->listeExercices) - 1; $j++) {
                $this->listeExercices[$j] = $this->listeExercices[$j + 1];
            }
            unset($this->listeExercices[count($this->listeExercices) - 1]);
        } else {
            echo "Suppression Impossible. L'exercice à supprimer n'appartient pas à ce devoir.";
        }
    }

    private function ajouterExercice(Exercice $newExercice)
    {
        $this->listeExercices[] = $newExercice;
    }

    private function construct2(int $newNum, string $newIntitule, array $newExercices)
    {
        $this->numero = $newNum;
        $this->intitule = $newIntitule;
        $this->listeExercices = $newExercices;
    }
}