<?php

 /*
 * @method currency_number_Separator($str, $sz,$str_format = false)       return currency in string and array format
 * 
 * @author     Roozbeh Baabakaan
 * @version    SVN: $Id: gregorian_jalali 1 2012-12-21 11:37:00
 */

    function currency_number_Separator($str, $sz,$str_format = false)
{
    // splits a string "starting" at the end, so any left over (small chunk) is at the beginning of the array.   
    if ( !$sz ) { return false; }
    if ( $sz > 0 ) { return str_split($str,$sz); }    // normal split
   
    $l = strlen($str);
    $sz = min(-$sz,$l);
    $mod = $l % $sz;
   
    if ( !$mod ) { return str_split($str,$sz); }    // even/max-length split

    
    $result_arr = array_merge(array(substr($str,0,$mod)), str_split(substr($str,$mod),$sz));
	$price_str = '';
	
    foreach ($result_arr as $value)
           $price_str = $price_str.$value.',';
       $price_str =  substr($price_str,0,  strlen($price_str)-1) ;
	
	if($str_format) 
	{
		return $price_str ;
	}   
	else 
	{	   
		return $result_arr ;
	}  
	   
}








?>