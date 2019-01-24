<?php
namespace App;

use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;
use App\Lead;

class Validator
{
    protected $errors;

    public function validate($request,array $rules){
        foreach($rules as $field => $rule){
            try{
              $rule->setName(ucfirst($field))->assert($request->getParam($field));
            }catch (NestedValidationException $e){
              $this->errors[$field] = $e->getMessages();
            }

        }

        $_SESSION["errors"] = $this->errors;

        return $this;
    }

    public function uniqueEmail($email){
      $consult = Lead::where("email",$email)->first();
      if($consult){
        $_SESSION["repeat-email"] = $consult->email;
        return true;
      }
      return false;

    }

    public function failed(){
        return !empty($this->errors);
    }


}
