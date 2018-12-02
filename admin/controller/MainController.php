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
            'menu' => $menu,
        ]);
    }
}