<?php

namespace controller;


class MainController extends Controller
{

    public function actionIndex()
    {

        $menu = $this->model->getData();
        $this->render('index', [
            'menu' => $menu
        ]);
    }

    public function actionUpdate()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $item = $this->model->getMenuById($id);
        $menu = $this->model->getMenu();

        if ($this->isPost()) {
            $post_data = [
                'title' => isset($_POST['new_title']) ? $_POST['new_title'] : '',
                'slug' => isset($_POST['new_slug']) ? $_POST['new_slug'] : '',
                'sort' => isset($_POST['sort']) ? $_POST['sort'] : null,
                'status' => isset($_POST['status']) ? $_POST['status'] : '1',
                'p_id' => isset($_POST['p_id']) ? $_POST['p_id'] : null,
                'id' => isset($_POST['id']) ? (int)$_POST['id'] : null,
            ];
            $this->model->updateMenu($post_data);
            $this->redirect('main', [
                'alert' => 'Successfully Updated'
            ]);
        }
        $this->render('form', [
            'item' => $item,
            'menu' => $menu,
        ]);
    }


    public function actionDelete()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $delete = $this->model->deleteMenu($id);
        $this->redirect('main', [
            'alert' => 'Successfully Deleted',
            'type' => 'warning',
        ]);
    }

    public function actionCreate()
    {
        $menu = $this->model->getMenu();
        $items = [
            'title' => isset($_POST['new_title']) ? $_POST['new_title'] : '',
            'slug' => isset($_POST['new_slug']) ? $_POST['new_slug'] : '',
            'sort' => isset($_POST['sort']) ? $_POST['sort'] : null,
            'status' => isset($_POST['status']) ? $_POST['status'] : null,
            'p_id' => isset($_POST['p_id']) && $_POST['p_id'] ? $_POST['p_id'] : null,
        ];
        if ($this->isPost()) {
            $create = $this->model->addCategory($items);
            if ($create) {
                $this->redirect('main', [
                    'alert' => 'Successfully Created'
                ]);
            }
        }
        $items['id'] = '';

        $this->render('form', [
            'item' => $items,
            'menu' => $menu,
        ]);

    }


}