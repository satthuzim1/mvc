<?php
class App{
    protected $controller = 'HomeController';
    protected $action = 'Hello';
    protected $params = [];
    function __construct()
    {
        //
        $arr = $this->UrlProcess();

        //kiem tra url co chua controller khong, neu khong thi tu dong chay controller home
        if(!isset($arr[0])){
            require_once './mvc/controllers/'.$this->controller.'.php';
            unset($arr[0]);
        }else{
            //xu ly controller
            if (file_exists('./mvc/controllers/'.$arr[0].'.php')){
                require_once './mvc/controllers/'.$arr[0].'.php';
                $this->controller = $arr[0];
                unset($arr[0]);
            }else{
                //neu khong ton tai controller se chay lenh nay
                require_once './mvc/controllers/'.$this->controller.'.php';
                unset($arr[0]);
            }
        }

        //xu ly action
        if (isset($arr[1])){
            if (method_exists($this->controller, $arr[1])){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        //xu ly param
        $this->params = $arr?array_values($arr):[];

         call_user_func_array([$this->controller, $this->action], $this->params);
    }

    //xet dang sau (index) ten mien
    function UrlProcess(){
        if (isset($_GET['url'])){
            return explode('/',filter_var(trim($_GET['url'],'/')));
        }
        return null;
    }
}
?>