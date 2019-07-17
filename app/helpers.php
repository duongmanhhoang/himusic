<?php

if (!function_exists('getImageName')) {
    function getImageName($name)
    {
        return substr($name, strpos($name, '-') + 1, strlen($name) - (strpos($name, '-') + 1) - (strlen($name) - strpos($name, '.')));
    }
}

if (!function_exists('getTime')) {
    function getTime($time)
    {
        return substr($time, strpos($time, ' ') + 1);
    }
}

if (!function_exists('getDateEvent')) {
    function getDateEvent(string $date)
    {
        return substr($date, 0, strpos($date, ' '));
    }
}

if (!function_exists('createdAt')) {
    function createdAt($object)
    {
        $created_at = $object->created_at->diffForHumans(null , true) . " trước";
        $created_at = str_replace([' seconds', ' second' , 'giâys'], ' giây', $created_at);
        $created_at = str_replace([' minutes', ' minute' , 'phúts'], ' phút', $created_at);
        $created_at = str_replace([' week', ' week' , 'tuầns'], ' tuần', $created_at);
        $created_at = str_replace([' hours', ' hour' , 'giờs'], ' giờ', $created_at);
        $created_at = str_replace([' day', ' days' , 'ngàys'], ' ngày', $created_at);
        $created_at = str_replace([' months', ' month' , 'thángs'], ' tháng', $created_at);
        if(preg_match('(years|year)', $created_at)){
            $created_at = $object->created_at->toFormattedDateString();
        }
        return $created_at;
    }
}
