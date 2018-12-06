<?php


namespace controller;


class PostController extends Controller {

    function actionIndex() {
        $menu = $this->model->getMenu();
        $this->render('index', [
            'menu' => $menu
        ]);


    }

    public function actionDelete() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $this->model->deleteNews($id);
        $this->redirect('post', [
            'alert' => 'Successfully Deleted',
            'type' => 'warning',
        ]);
    }


    public function actionUpdate() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $item = $this->model->getMenuById($id);
        $menu = $this->model->getMenu();

        if ($this->isPost()) {
            $post_data = [
                'title' => isset($_POST['new_title']) ? $_POST['new_title'] : '',
                'news' => isset($_POST['news']) ? htmlspecialchars($_POST['news']) : '',
                'slug' => isset($_POST['new_slug']) ? $_POST['new_slug'] : '',
                'sort' => isset($_POST['sort']) ? $_POST['sort'] : null,
                'status' => isset($_POST['status']) ? $_POST['status'] : '1',
                'id' => isset($_POST['id']) ? (int)$_POST['id'] : null,
            ];
            $this->model->updateNews($post_data);
            $this->redirect('post', [
                'alert' => 'Successfully Updated'
            ]);
        }


        $this->render('form', [
            'item' => $item,
            'menu' => $menu,
        ]);
    }


    public function actionCreate() {
        $menu = $this->model->getMenu();

            $items = [
                'title' => isset($_POST['new_title']) ? $_POST['new_title'] : '',
                'slug' => isset($_POST['new_slug']) ? $_POST['new_slug'] : '',
                'sort' => isset($_POST['sort']) ? $_POST['sort'] : null,
                'status' => isset($_POST['status']) ? $_POST['status'] : null,
                'image' => isset($_POST['img']) ? $_POST['img'] : '',
                'news' => isset($_POST['news']) ? htmlspecialchars($_POST['news']) : null
            ];


        if ($this->isPost()) {

            if (isset($_FILES["img"])) {
                $photo = $_FILES["img"];
                if ($photo["error"] === 0) {
                    $types = ["image/png", "image/jpeg"];
                    $photo_type = $photo["type"];
                    if (in_array($photo_type, $types)) {
                        $photo_name = uniqid() . $photo['name'];
                        if ($photo["size"] > 4000000) {
                            echo "File size is bigger 4mb" . "<br>";
                            echo "Please choose smaller file";
                            return;
                        } else {
                            move_uploaded_file($photo["tmp_name"], "./assets/images/" . $photo_name);
                        }
                    } else {
                        echo 'Not allowed file type';
                    }
                } else {
                    echo "Upload error";
                }
            }

            $create = $this->model->addNews($items);

            if ($create) {
                $this->redirect('post', [
                    'alert' => 'Successfully Added'
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