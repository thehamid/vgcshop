<?php

$request_uri=$_SERVER['REQUEST_URI'];
if(strpos($request_uri,'vgc')=== false){
    return;
}

$uri_parts=explode('/',strtok($request_uri,'?'));
$uri_code=end($uri_parts);

function select_template(){

        status_header(200);
       // return $custom_template;
        include PLUGIN_USER.'/view.php';

}
add_filter('template_include','select_template',99);






