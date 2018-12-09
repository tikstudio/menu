<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 05.12.2018
 * Time: 20:03
 */

namespace controller;


class PostController extends Controller
{

    function actionIndex()
    {
        $category = $this->model->getCategory();
        $post_news = $this->model->getNews();
        $this->render('index', [
            'post_news' => $post_news,
            'category' => $category
        ]);

    }

    public function actionUpdateNews()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $item = $this->model->getNewsById($id);
        $menu = $this->model->getNews();
        $category = $this->model->getCategory();


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
                'category' => isset($_POST['checkText']) ? $_POST['checkText'] : null,
                'id' => isset($_POST['id']) ? (int)$_POST['id'] : null,

            ];


            $update = $this->model->updateNews($post_data);
            $this->redirect('post', [
                'alert' => 'Successfully Updated'
            ]);


        }


        $this->render('form', [
            'item' => $item,
            'menu' => $menu,
            'category' => $category
        ]);
    }


    public function actionDeleteNews()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $delete = $this->model->deleteNews($id);
        $this->redirect('post', [
            'alert' => 'Successfully Deleted',
            'type' => 'warning',
        ]);
    }


    public function actionCreateNews()
    {
        $menu = $this->model->getNews();
        $category = $this->model->getCategory();

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
            $create = $this->model->addNews($items);
            if ($create) {
                $this->redirect('post', [
                    'alert' => 'Successfully Created'
                ]);
            }
        }
        $items['id'] = '';

        $this->render('form', [
            'item' => $items,
            'menu' => $menu,
            'category' => $category

        ]);

    }

    public function actionSearch()
    {

        $array_search = ['id', 'title', 'image', 'slug', 'status', 'sort', 'description', 'date', 'category'];

        foreach ($array_search as $search) {
            $search = isset($search) ? $search : '';
        }
        $search_result = $this->model->search($search);

        $this->render('search-column', [
            'search_result' => $search_result,
        ]);
    }


}