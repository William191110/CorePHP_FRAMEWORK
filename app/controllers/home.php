<?php 

namespace Controllers;

use Resources\Page;

class Home extends Page  {
      
   public function home () 
   {
      $this->view('pages/home');
   }
}