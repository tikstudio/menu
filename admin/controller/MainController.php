<?php

namespace controller;


class MainController extends Controller
{

    public function actionIndex()
    {

        $menu = $this->model->getMenu();
        $this->render('index', [
            'menu' => $menu
        ]);

    }

    public function actionUpdate()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $item = $this->model->getMenuById($id);
        $menu = $this->model->getMenu();


        $this->render('update', [
            'item' => $item,
            'menu' => $menu,
            'id' => $id,

        ]);

        $title = isset($_POST['new_title']) ? $_POST['new_title'] : null;
        $slug = isset($_POST['new_slug']) ? $_POST['new_slug'] : null;
        $status = isset($_POST['status']) ? $_POST['status'] : null;
        $sort = isset($_POST['sort']) ? (int)$_POST['sort'] : null;
        $p_id = isset($_POST['parent']) ? $_POST['parent'] : null;

        $update = $this->model->updateMenu($id, $title, $slug, $p_id, $status, $sort);
    }


    public function actionDelete()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $delete = $this->model->deleteMenu($id);

    }

    public function actionCreate()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $menu = $this->model->getMenu();
        $item = $this->model->getMenuById($id);

        $this->render('create', [
            'item' => $item,
            'menu' => $menu,
        ]);

        $title = isset($_POST['new_title']) ? $_POST['new_title'] : '';
        $slug = isset($_POST['new_slug']) ? $_POST['new_slug'] : '';
        $sort = isset($_POST['sort']) ? $_POST['sort'] : null;
        $status = isset($_POST['status']) ? $_POST['status'] : null;
        $p_id = isset($_POST['p_id']) ? $_POST['p_id'] : null;

        $create = $this->model->addCategory($title, $slug, $p_id, $sort, $status);


    }


}