<?php
class Controller
{
    protected $converter;
    public function __construct()
    {
        $this->converter = new Convert();
    }
    public function model($model)
    {
        require_once './mvc/models/' . $model . '.php';
        $className = strval($this->converter->upperFirstLetter($model));
        return new $className;
    }
}
