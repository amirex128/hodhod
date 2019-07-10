<?php

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

function str_words($s, $limit=3) {
    return preg_replace('/((\w+\W*){'.($limit-1).'}(\w+))(.*)/', '${1}', $s);

}

function date_fa($time){
   return Jalalian::fromCarbon(Carbon::createFromTimeString($time));
}

function check($request,$default="",$fillable=true){
    if (!is_array($request)){
        if ($fillable==true){
            if (isset($request) && !empty($request)){
                return $request;
            }else{
                return $default;
            }
        }else{
            if (isset($request) ){
                return $request;
            }else{
                return $default;
            }
        }
    }else{
        if (count($request)>0){
            return $request;
        }else{
            return [];
        }
    }
}