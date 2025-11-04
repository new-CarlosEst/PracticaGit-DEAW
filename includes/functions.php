<?php

/**
 * Este es un archivo de las funciones de web.
 */

/**
 * Función site_name.
 * Imprimirá el nombre de la web.
 * Se obtine el valor (nombre) de config 'name'.
 */
function site_name()
{
    $var = config('name');
    echo $var;
}
/**
 * Funcion site_url
 * Imprimirá la URL de la página web.
 * Obtiene el valor (url) de config 'site_url.
 */
function site_url()
{
    $var = config('site_url');
    echo $var;
}
/**
 * Funcion site_path
 * Imprimirá la ruta de la página web.
 * Obtiene el valor (ruta) de config 'path';
 */
function site_path()
{
    $var = config('path');
    echo $var;
}
/**
 * Función site_version
 * Imprimirá la versión de la página web.
 * Obtiene el valor (version) de config 'version'.
 */
function site_version()
{
    $var = config('version');
    echo $var;
}

/**
 * Genera el menú de navegación de la página web.
 * 
 * @param string $sep Separador entre los elementos del menú '|'.
 * 
 * Realiza un foreach sobre el array de navegación (nav_items).
 * 
 * Construye enlaces (url).
 * 
 * Construye el menú de navegación (nav_menu).
 * 
 * Finalmente imprimirá el menú (nav_menu) y elimina el separador (sep).
 */
function nav_menu($sep = ' | ')
{
    $nav_menu = '';
    $nav_items = config('nav_menu');

    foreach ($nav_items as $uri => $name) {
        $query_string = str_replace('page=', '', $_SERVER['QUERY_STRING'] ?? '');
        $class = $query_string == $uri ? ' active' : '';
        $url = config('site_url') . '/' . ($uri == '' ? '' : '?page=') . $uri;
        
        // Constuir menú de navegación, atentos al uso de  (.=)
        $nav_menu .= '<a href="' . $url . '" title="' . $name . '" class="item ' . $class . '">' . $name . '</a>' . $sep;
    }

    echo trim($nav_menu, $sep);
}

/**
 * Función page_title
 * Imprirá el título de la página web.
 * Basado en el parámetro 'page' de la URL, selecciona un título del array.
 */
function page_title()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'Home';
    $titulo = [                             
            'Home' => '>>Inicio',                 // Título parametrizable en función
            'about-us' => '>>Acerca de',          // del nombre de la página física
            'products' => '>>Productos',
            'contact' => '>>Contacto',
    ];  
    echo  $titulo[$page];
}

/**
 * Función page_content.
 * Imprime el contenido de la página web.
 * Carga el archivo .phtml correspondiente desde la ruta de contenido.
 */
function page_content()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $path =  config('content_path') . '/' . $page . '.phtml';   // Obtiene ruta para volcar
    if (! file_exists($path)) {
        $path =  config('content_path') . '/404.phtml';
    }
    echo file_get_contents($path);          // Volcar contenidos
}

/**
 * Funcion init
 * 
 * Inicializa la página web, cargando una template.
 * 
 * Requiere el archivo de la template desde config.
 */
function init()
{
    require config('template_path') . '/template.php';
}
