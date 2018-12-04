<?php

namespace controller;


class MainController extends Controller {

    public function actionIndex() {
        $menu = $this->model->getMenu();
        $this->render('index', [
            'menu' => $menu
        ]);
    }
public function actionDelete(){
	$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
	$this->model->delMenu($id);
	$this->actionIndex();

//$this->render('update')

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
    public function actionAdd(){
	$submit=isset($_POST['submit']) ? (int)$_POST['submit'] : null;
	if ($submit){
	    $title=isset($_POST['title']) ? (int)$_POST['title'] : null;
	    $slug=isset($_POST['slug']) ? (int)$_POST['slug'] : null;
	    $parent=isset($_POST['parent']) ? (int)$_POST['parent'] : null;
	    $status=isset($_POST['status']) ? (int)$_POST['status'] : null;
	    $sort=isset($_POST['sort']) ? (int)$_POST['sort'] : null;
	    $this->model->addMenu($title,$slug,$parent,$status,$sort);
		$menu = $this->model->getMenu();
	    $this->render('index',[
	    	'menu'=>$menu,
	    ]);
	}
    }
}