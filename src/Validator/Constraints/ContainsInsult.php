<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
* @Annotation
*/
class ContainsInsult extends Constraint
{
public $message ='the word "{{ string }}" is an insult be respectful please.' ;
}