<?php
/* https://github.com/OscarGonzalez1987/manejo_archivos_php/blob/master/configuracion.php
 * --------------------------------------------------------------------------------------
 * OscarGonzalez1987/manejo_archivos_php is licensed under the
 * Creative Commons Zero v1.0 Universal
 *
 * AUTOR: Óscar GonzaleZ Aprendiz SENA ADSI
 * Instructor: Cesar Bolado
 *
 * Servicio Nacional de Aprendizaje
 * Regional Norte de Santander
 * Cucuta, Colombia, 27/01/2020
 *
 * MANEJO DE ARCHIVOS EN PHP
 * 
 * Este código de PHP lee el contenido de dos archivos que están constituidos de
 * de manera estable, como lo son el encabezado o el pie de una página, que  son
 * concatenados con variables que son sujetas a cambios y configuraciones  según
 * se requiera para cada proyecto de automatización de procesos.
 * 
 * $archivo_a  -----   llevan el contenido de archivos que no cambian.
 *                |     (en este caso:  archivo_a.php, archivo_b.php)
 * $archivo_b  __/ 
 * 
 * $variable -------   Contenido sujeto a cambios.
 *                     puede ser contenido modificado por la consulta 
 *                     de una base de datos. 
 * 
 * Fuentes:
 * -----------------------------------------------------------------------------
 * https://www.w3schools.com/php/php_file.asp
 * https://www.w3schools.com/php/php_file_open.asp
 * https://www.w3schools.com/php/php_file_create.asp
 * https://www.php.net/manual/es/function.fopen.php
 * https://www.php.net/manual/es/function.fread.php
 * https://www.php.net/manual/es/function.fwrite.php
 * https://www.php.net/manual/es/function.fflush.php
 * https://www.php.net/manual/es/function.fclose.php
 * -----------------------------------------------------------------------------
 */

function leer_archivo($nombre) {
    $archivo = fopen($nombre, "r") or die("Unable to open file!");
    $lectura = fread($archivo, filesize($nombre));
    fclose($archivo);
    return $lectura;
}

function escribir_archivo($nombre, $contenido) {
    $archivo = fopen($nombre, "w");
    fwrite($archivo, $contenido);
    fflush($archivo);
    fclose($archivo);
    return 0;
}

function unificacion($nombre, $consulta) {
    // lectura de los archivos a unir.
    $archivo_a = leer_archivo("archivo_a.php");
    $variable = $consulta;
    $archivo_b = leer_archivo("archivo_b.php");
    // unificación de los contenidos de los archivos en una variable.
    $suma_de_contenido = $archivo_a . "\n" . $variable . "\n" . $archivo_b;
    // creacion de archivo que integra todos los contenidos.
    escribir_archivo($nombre, $suma_de_contenido);
}

/*
 * usa el siguiente codigo para llamar esta funciones en otros archivos PHP
 */
/*
 
include "configuracion.php";

$nombre = "archivo.php";
$consulta = "remplaza el contenido de esta variable de texto como desees.";
unificacion($nombre, $consulta);

*/
?>
