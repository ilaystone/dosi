<?php

namespace DOSI\LIB;

trait inputFilter
{
    public function filterFloat($input)
    {
        return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    public function filterString($input)
    {
        return htmlentities(strip_tags($input), ENT_QUOTES, 'UTF-8');
    }

    public function redirect($path, $msg)
    {
        echo "<h1>". $msg . "successfully</h1>";
        header("refresh:2; url:/" . $path);
    }
}