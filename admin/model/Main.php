<?php


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


    public function deleteRow($id){
        return $this->getRow("DELETE FROM menu where id=:id",[
            'id' => $id
        ]);
    }


    public function updateMenu($id, $title, $slug, $p_id, $status, $sort){
        return $this->query("UPDATE menu SET title=:title, slug=:slug, p_id=:p_id,status=:status, sort=:sort WHERE id=:id",[
            'id' => $id,
            'title' => $title,
            'slug' => $slug,
            'p_id' => $p_id,
            'status' => $status,
            'sort' => $sort,
        ]);
    }

}