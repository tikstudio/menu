<?php

namespace model;


class Post extends Model {


    public function getMenu() {
        return $this->getRows('select * from news order by sort');
    }

    public function getMenuById($id) {
        return $this->getRow('select * from news WHERE id = :id', [
            'id' => $id
        ]);
    }

    public function updateNews($data) {
        return $this->query(
            "UPDATE news SET title=:title, slug=:slug, status=:status, sort=:sort,news=:news WHERE id=:id",
            $data);
    }

    public function deleteNews($id) {
        return $this->getRow("DELETE FROM news where id=:id", [
            'id' => $id
        ]);
    }



    public function addNews($data) {
        return $this->query("INSERT INTO news(`title`, `slug`, `sort`, `status`,`image`,news)
                          VALUES(:title, :slug, :sort, :status, :image, :news)", $data);

    }
}