<?php

namespace controller;


class MainController extends Controller {

    public function actionIndex() {
        $menu = $this->model->getMenu();
        $this->render('index', [
            'menu' => $menu
        ]);
    }

    public function actionUpdate() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $item = $this->model->getMenuById($id);
        $menu = $this->model->getMenu();
        $this->render('update', [
            'item' => $item,
            'menu' => $menu
        ]);


            $title = isset($_POST['title']) ? $_POST['title'] : null;
            $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
            $status = isset($_POST['status']) ? $_POST['status'] : null;
            $sort = isset($_POST['sort']) ? (int)$_POST['sort'] : null;
            $p_id = isset($_POST['parent']) ? $_POST['parent'] : null;
            $this->model->updateMenu($id, $title, $slug, $p_id, $status, $sort);
        }




    public function actionDelete() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $this->model->deleteRow($id);
        $this->actionIndex();
    }


}


