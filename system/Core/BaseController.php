<?php


namespace System\Core;


abstract class BaseController
{
    abstract public function index();

    public function checkLogin($type)
    {
        return !empty($_SESSION[$type]);
    }


    public function paginate($model, $limit, $name)
    {
        $models = $model->select('id')->get();
        $pages = ceil( count($models) / $limit);
        if(!empty($_GET['page'])) {
            $pageno = $_GET['page'];

            if($pageno > $pages){
                $pageno = $pages;
            }
        }
        else {
            $pageno = 1;
        }

        $offset = ($pageno - 1) * $limit;

        ${$name} = $model->offset($offset)
            ->limit($limit)
            ->get();

        $pagination = compact('pageno', 'pages', 'offset', 'limit');

        return compact($name, 'pagination');

    }

}