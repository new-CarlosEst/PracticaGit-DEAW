<?php
//Run.php lo que es como un main que ejecutara todo

/**
 * Error reporting es una funcion para activar errores y le paso los errores a activar
 * 
 * @var int $level Constante que dice los errores, en este caso E_ALL tiene todos los errores de php
 */
error_reporting(E_ALL);
/**
 * Con init set cambio la configuracion de php
 * 
 * @var string Le paso que muestre todos los errores
 * @var int EL numero es si los muestra o no, 1- mostrar | 0-ocultar
 */
ini_set('display_errors', 1);

/**
 * Hago los require necesarios para que vayan todas las funciones tanto de config.php como de functions.php
 */
require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/functions.php';

/**
 * Llamo a la funcion init de functions.php
 */
init();