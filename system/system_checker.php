<?php 

if (phpversion() > 8) {

    if (isset($SYSTEM)) {

        if($SYSTEM['ENVIRONMENT'] == 'development'){
            ini_set('display_errors', TRUE);
            error_reporting(E_ALL);
    
        } elseif ($SYSTEM['ENVIRONMENT'] == 'production') {
            ini_set('display_errors', FALSE);
            error_reporting(E_ALL);
            ini_set('log_errors', TRUE);
            ini_set('error_log', 'system/error_logs.txt');
        } elseif ($SYSTEM['ENVIRONMENT'] == '') {

            error('We are at the middle of nowhere.');
        }

    } else {

        error('We are at the middle of nowhere.');
    }

} else {
	
    error('Your server is running an old version of PHP. <a href="https://www.apachefriends.org/download.html">Download:</a> Latest version of XAMMP supporting PHP 8.');

}


