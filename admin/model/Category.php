<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 05.12.2018
 * Time: 20:05
 */

namespace model;


class Category extends Model {
    protected $tableName = 'category';

    public function getCategory() {
        return $this->getRows('select * from category');
    }

    public function getCategoryById($id) {
        return $this->getRow('select * from category WHERE id = :id', [
            'id' => $id
        ]);
    }


    public function updateCategory($data) {
        return $this->query(
            "UPDATE category SET title=:title,image=:image, slug=:slug, parent_id=:parent_id, description=:description WHERE id=:id",
            $data);
    }

    public function deleteCategory($id) {
        return $this->getRow("DELETE FROM category where id=:id", [
            'id' => $id
        ]);
    }

    public function addCategory($data) {
        return $this->query("INSERT INTO category(`title`, `slug`, `description`, `image`, `parent_id`)
                          VALUES(:title, :slug, :description, :image, :parent_id)", $data);

    }


}