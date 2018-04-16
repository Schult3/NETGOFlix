<?php

// src/Validator/Constraints/ContainsNetgo.php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsNetgo extends Constraint
{
    public $message = 'Die Adresse "{{ string }}" muss @netgo.de enthalten';
}