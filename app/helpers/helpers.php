<?php 
declare(strict_types = 1);

const APP = 'app/';
const VIEWS = 'app/views/';

//Class instantiation

// include a file
function include_file(string $filename)
{
     if (file_exists(VIEWS.$filename.'.php')) {
        return require VIEWS.$filename.'.php';

     } elseif (file_exists(APP.$filename.'.php')) {
        return require APP.$filename.'.php';

     } elseif(file_exists('assets/'.$filename)) {
        echo 'assets/'.$filename;

     } else {

     error('Failed to locate file location');
        
     }
}

function error(string $msg)
{
        exit(require VIEWS.'errors/error.php');
}

#-----------SECURITY
function encode(string $value)
{
   return strtr(base64_encode($value), '+/=', '-_,');
}

function decode(string $value)
{
   return base64_decode(strtr($value, '-_,', '+/='));;
}

function URL(string $page) {
    
   if ($page === '/') {

       return 'http://'.$_SERVER['HTTP_HOST'].'/'.ROOTDIR.strtr(base64_encode($page), '+/=', '-_,');

   } elseif(str_contains($page, '#')) {

       return 'http://'.$_SERVER['HTTP_HOST'].'/'.ROOTDIR.'/'.strtr(base64_encode($page), '+/=', '-_,');
       
   } else {
     
       return 'http://'.$_SERVER['HTTP_HOST'].'/'.ROOTDIR.'/'.'index.php?page='.strtr(base64_encode($page), '+/=', '-_,');    
   }
}