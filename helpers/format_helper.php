<?php 
/*
* Format The Date to make it friendly
*/
function formatDate($date){
    return date('F j, Y, g:i a', strtotime($date));
}

/**
 * return a part of the string to make shorter
 */
function shortenText($text,$chars=450){
    $text = $text . " ";
    $text = substr($text, 0, $chars);//chars represent the lenght to cut and by default is 450 characters
    $text = substr($text, 0, strrpos($text,' '));//"strrpos" Find the position of the first occurrence of a substring in a string here substring is a space this allow to avoid a world to be cut in the middle
    $text = $text . "...";
    return $text;
}