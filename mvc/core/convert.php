<?php
class Convert
{
    public function newObject($name)
    {
        $className = strval($this->upperFirstLetter($name));
        return new $className;
    }

    public function upperFirstLetter($str)
    {
        $str[0] = strtoupper($str[0]);
        return $str;
    }
}
