<?php

include "Devoir.php";
include "Exercice.php";

$devoir1 = new Devoir(1, "Devoir1");

$tabExercices[] = new Exercice(1, "Ex1", "Ex1", "Question1");
$tabExercices[] = new Exercice(2, "Ex2", "Ex2", "Question2");
$tabExercices[] = new Exercice(3, "Ex3", "Ex3", "Question3");
$tabExercices[] = new Exercice(4, "Ex4", "Ex4", "Question4");

$devoir2 = new Devoir(2, "Devoir2", $tabExercices);

$devoir2->modifierExercices();

print_r($devoir2);