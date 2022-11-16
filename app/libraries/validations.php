<?php 
declare(strict_types = 1);

namespace Libraries;

trait Validations {

	protected array $data  = [];
	protected array $error = [];
	

	protected function VALIDATE_STRING(string $value, string $name)
	{
      if ($value == '' || $value == NULL) {
        
        $this->error[$name] = $name." cannot be empty.";
        return $this->error[$name];

      } elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value)) {

        $this->error[$name] = $name." cannot contain special characters.";
        return $this->error[$name];

      } elseif (is_numeric($value)) {

        $this->error[$name] = $name." cannot contain digits.";
        return $this->error[$name];

      } else {

        array_push($this->data, $value);
    
      }
  }

    protected function VALIDATE_EMAIL(string $email)
    {
        if ($email == '' || $email == NULL) {

          $this->error['email'] = "Email cannot be empty.";
          return $this->error['email'];

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

          $this->error['email'] = "Invalid Email.";
          return $this->error['email'];

        } else {

          array_push($this->data, $email);
      
        }
    }

    protected function VALIDATE_CONTACT(int $contact)
    {
        if (!is_numeric($contact)) {

          $this->error['contact'] = "Invalid Contact.";
          return $this->error['contact'];

        } else {

          array_push($this->data, $contact);
      
        }
    }

    protected function VALIDATE_PASSWORD(string $password)
    {
        if ($password == '' || $password == NULL) {

             $this->error['password'] = "Password cannot be empty";
             return $this->error['password'];

        } elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {

             $this->error['password'] = "Provide at least one special character(s)";
             return $this->error['password'];

        } else {

            array_push($this->data, password_hash($password, PASSWORD_DEFAULT));
         
        }
    }
  }