<?php
namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
* @Annotation
*/
class ContainsInsult extends Constraint
{
public $message ='contains_insult_msg' ;
}