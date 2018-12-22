<?php

/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 05.12.2018
 * Time: 20:03
 */


namespace controller;


use model\Category;

class PostController extends Controller {

    function actionIndex() {
        $post_news = $this->model->getData();
        $this->render('index', [
            'post_news' => $post_news
        ]);
    }

    public function actionUpdateNews() {
        $id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : null;
        $item = $this->model->getNewsById($id);
        $menu = $this->model->getNews();
        $category_model = new Category();
        $all_cat = $category_model->getData();
        $cat_ids = $this->model->getCategoryIds($id);
        $file_name = $item['image'];

        if ($this->isPost()) {
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
                            "assets/img/uploads/" . $file_name);
                    }
                }
            }

            $post_data = [
                'title' => isset($_POST['new_title']) ? $_POST['new_title'] : '',
                'image' => $file_name,
                'slug' => isset($_POST['new_slug']) ? $_POST['new_slug'] : null,
                'description' => isset($_POST['desc']) ? $_POST['desc'] : null,
                'date' => date("Y-m-d H:i:s"),
                'status' => isset($_POST['status']) ? $_POST['status'] : '1',
                'sort' => isset($_POST['sort']) ? $_POST['sort'] : null,
                'id' => isset($_POST['id']) ? (int)$_POST['id'] : null,
            ];

            $update = $this->model->updateNews($post_data);
            $cat_id = isset($_POST['cat_id']) ? $_POST['cat_id'] : [];
            $this->model->setCategory($id, $cat_id, $cat_ids);

            $this->redirect('post', [
                'alert' => 'Successfully Updated'
            ]);
        }


        $this->render('form', [
            'item' => $item,
            'menu' => $menu,
            'cat_ids' => $cat_ids ? $cat_ids : [],
            'all_cat' => $all_cat,
        ]);
    }


    public function actionDeleteNews() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $delete = $this->model->deleteNews($id);
        $this->redirect('post', [
            'alert' => 'Successfully Deleted',
            'type' => 'warning',
        ]);
    }


    public function actionCreateNews() {
        $menu = $this->model->getNews();
        $file_name = '';
        $category_model = new Category();
        $all_cat = $category_model->getData();

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
                        "assets/img/uploads/" . $file_name);

                }
            }
        }
        $items = [
            'title' => isset($_POST['new_title']) ? $_POST['new_title'] : '',
            'image' => $file_name,
            'slug' => isset($_POST['new_slug']) ? $_POST['new_slug'] : '',
            'status' => isset($_POST['status']) ? $_POST['status'] : null,
            'sort' => isset($_POST['sort']) ? $_POST['sort'] : null,
            'description' => isset($_POST['desc']) ? $_POST['desc'] : null,
            'date' => date("Y-m-d H:i:s"),

        ];
        if ($this->isPost()) {
            $post_id = $this->model->addNews($items);

            $cat_id = isset($_POST['cat_id']) ? $_POST['cat_id'] : [];

            $this->model->setCategory($post_id, $cat_id);

            if ($post_id) {
                $this->redirect('post', [
                    'alert' => 'Successfully Created'
                ]);
            }
        }
        $items['id'] = '';


        $this->render('form', [
            'item' => $items,
            'menu' => $menu,

            'all_cat' => $all_cat,
            'cat_ids' => [],

        ]);

    }

}