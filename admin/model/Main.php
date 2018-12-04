<?php
/**
 * Created by PhpStorm.
 * User: tik
 * Date: 02/12/18
 * Time: 13:03
 */

namespace model;


class Main extends Model {

    public function getMenu() {
        return $this->getRows('select * from menu order by sort');
    }

    public function getMenuById($id) {
        return $this->getRow('select * from menu WHERE id = :id', [
            'id' => $id
        ]);
    }
public function delMenu($id){
    	return $this->getRow('UPDATE `menu` SET `status` = 0 WHERE id=:id',[
    		'id'=> $id
	    ]);
}
public function addMenu($title,$slug,$parent,$status,$sort){
	return $this->query(
		"INSERT INTO `menu` (`title`, `slug`, `p_id`, `status`, `sort`) 
                VALUES (:title, :slug, :parent, :status, :sort)",
		[
			'title' => $title,
			'slug' => $slug,
			'p_id' => $parent,
			'status' => $status,
			'sort' => $sort,
		]
	);
}
}
