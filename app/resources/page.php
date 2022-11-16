<?php 

namespace Resources;

use Model\DatabaseInteractionModel AS Model;
use Libraries\Validations;

class Page extends Model {

    #Returns Validations methods object
    use Validations;

     /**
	 * Displays HTML Document
	 *
	 * @param string $page filename
	 * @param array|object $data The data to pass to the document
	 * @return void
	 */    

    public function Route()
    {       
        $page = $_GET['page'] ?? strtr(base64_encode('home'), '+/=', '-_,');

        $file   = base64_decode(strtr($page, '-_,', '+/='));

        if (file_exists(APP.'Controllers/'.$file.'.php')) {
            
            $fullClassName = 'Controllers\\'.$file;
			$class = new $fullClassName();

            if (method_exists($class, $file)) {
                
                $class->$file();

            } else {

                error("Page not found: ".$file);
            }

        } else {

            error("Page not found: ".$file);
        }
    }


    /**
	 * Displays HTML Document
	 *
	 * @param string $page filename
	 * @param array|object $data The data to pass to the document
	 * @return void
	 */
	public function view(string $page, array|object $data = NULL, mixed $output = NULL)
	{
		if (!file_exists(VIEWS.$page.'.php')) {
			
			error("Page you are looking for might have been removed or it's temporarily unavailable.");

		} else {

			return require VIEWS.$page.'.php';
		} 
	}
}