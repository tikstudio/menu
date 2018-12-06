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

    public function updateMenu($data) {
        return $this->query(
            "UPDATE menu SET title=:title, slug=:slug, p_id=:p_id, status=:status, sort=:sort WHERE id=:id",
            $data);
    }

    public function deleteMenu($id) {
        return $this->getRow("DELETE FROM menu where id=:id", [
            'id' => $id
        ]);
    }

    public function addCategory($data) {
        return $this->query("INSERT INTO menu(`title`, `slug`, `p_id`, `sort`, `status`)
                          VALUES(:title, :slug, :p_id, :sort, :status)", $data);

    }
}