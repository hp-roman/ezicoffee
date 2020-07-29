<?php
class App
{
    protected $controller = 'notfound';
    protected $action = 'notfound';
    protected $params = [];

    public function __construct()
    {
        $converter = new Convert();
        $url = $this->urlProcess();
        if ($url) {
            if (file_exists("./mvc/controllers/$url[0].php")) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        require_once "./mvc/controllers/$this->controller.php";
        $this->controller = $converter->newObject($this->controller);

        if (isset($url[1])) {
            if (method_exists($this->controller, $this->action)) {
                $this->action = $url[1];
            }
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array(array($this->controller, $this->action), $this->params);
    }

    public function urlProcess()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'], '/')));
        }
    }
}
