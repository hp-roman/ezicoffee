<?php
class Home extends Controller
{
    public function notfound()
    {
        echo 'Not found action';
    }
    public function getproduct()
    {
        $productModel = $this->model('product');
        var_dump($productModel->getProduct());
    }
}
