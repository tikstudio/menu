<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 05.12.2018
 * Time: 20:03
 */

namespace controller;


class CategoryController extends Controller {


    function actionIndex() {
        $category = $this->model->getData();
        $this->render('index', [
            'category' => $category,

        ]);

    }

    public function actionUpdateCategory() {
        $id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : null;
        $item = $this->model->getCategoryById($id);
        $menu = $this->model->getCategory();


        $file_name = $item['image'];
        if ($this->isPost()) {
            if (isset($_FILES["file"])) {
                $file_name = '';
                if ($_FILES["file"]["error"] === 0) {
                    $file_types = [
                        "image/png" => '.png',
                        "image/jpeg" => '.jpg',
                    ];
                    $file_type = $_FILES["file"]['type'];
                    if (isset($file_types[$file_type])) {
                        $file_name = uniqid() . $file_types[$file_type];
                        move_uploaded_file(
                            $_FILES["file"]["tmp_name"],
                            "assets/img/categoryUploads/" . $file_name);
                    }
                }
            }
            $post_data = [
                'title' => isset($_POST['new_title']) ? $_POST['new_title'] : '',
                'image' => $file_name,
                'slug' => isset($_POST['new_slug']) ? $_POST['new_slug'] : null,
                'description' => isset($_POST['desc']) ? $_POST['desc'] : null,
                    'parent_id' => isset($_POST['p_id']) && $_POST['p_id'] ? $_POST['p_id'] : null,
                'id' => isset($_POST['id']) ? (int)$_POST['id'] : null,
            ];

            $update = $this->model->updateCategory($post_data);
            $this->redirect('category', [
                'alert' => 'Successfully Updated'
            ]);


        }


        $this->render('form', [
            'item' => $item,
            'menu' => $menu,

        ]);
    }


    public function actionDeleteCategory() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $delete = $this->model->deleteCategory($id);
        $this->redirect('category', [
            'alert' => 'Successfully Deleted',
            'type' => 'warning',
        ]);
    }


    public function actionCreateCategory() {
        $menu = $this->model->getCategory();
        $file_name = '';

        if (isset($_FILES["file"])) {
            if ($_FILES["file"]["error"] === 0) {
                $file_types = [
                    "image/png" => '.png',
                    "image/jpeg" => '.jpg',
                ];
                $file_type = $_FILES["file"]['type'];
                if (isset($file_types[$file_type])) {
                    $file_name = uniqid() . $file_types[$file_type];
                    move_uploaded_file(
                        $_FILES["file"]["tmp_name"],
                        "assets/img/categoryUploads/" . $file_name);

                }
            }
        }

        $items = [
            'title' => isset($_POST['new_title']) ? $_POST['new_title'] : '',
            'image' => $file_name,
            'slug' => isset($_POST['new_slug']) ? $_POST['new_slug'] : '',
            'description' => isset($_POST['desc']) ? $_POST['desc'] : null,
            'parent_id' => isset($_POST['p_id']) && $_POST['p_id'] ? $_POST['p_id'] : null,

        ];
        if ($this->isPost()) {
            $create = $this->model->addCategory($items);
            if ($create) {
                $this->redirect('category', [
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