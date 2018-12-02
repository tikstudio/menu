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
}