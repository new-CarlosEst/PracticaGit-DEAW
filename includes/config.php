<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
define("PATH","http://localhost/deaw");

/**
 * Funcion que crea un configuracion del sitio web
 * Una vez hecha la configuracion esta comprueba con un operador ternario si esta la key pasada exite en esa configuracion
 * Si esta devuelve la configuracion con esa key y si no devuelve null
 * 
 * @param string $key La clave de la configuración que se desea obtener. 
 *                    Si se deja vacía, la función devolverá null.
 * 
 * @return mixed Devuelvo la configuracion con esa key, si la encuentra devuelve la conf con key si no devuelve null
 */
function config($key = '')
{
    //Configuracion del sitio web
    $config = [
        'path' => PATH,
        'name' => 'Sitio Web realizado con PHP',
        'site_url' => PATH .'/run.php',
        'nav_menu' => [
            '' => 'Inicio',
            'about-us' => 'Acerca de',
            'products' => 'Productos',
            'contact' => 'Contacto',
        ],
        'template_path' => $_SERVER["DOCUMENT_ROOT"].'/deaw/template',
        'content_path' => $_SERVER["DOCUMENT_ROOT"] .'/deaw/content',
        'version' => 'v3.1',
    ];
    //Veo si la key esta en esa configuracion
    $var = isset($config[$key]) ? $config[$key] : null;
    //Devuelvo la configuracion
    return $var;
}
