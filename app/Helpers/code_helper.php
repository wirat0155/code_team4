<?php
// Function: used to convert a string to revese in order
if (!function_exists("reverse_string")) {
    function tel_format(string $string)
    {
        return substr($string, 0, 3) . '-' . substr($string, 3, 3) . '-' . substr($string, 6);
    }
}