<?php
/**
 * Created by PhpStorm.
 * User: Gasparyan
 * Date: 05.12.2018
 * Time: 20:05
 */

namespace model;


class Post extends Model
{
    public function getNews(){
        return $this->getRows('select * from news order by sort');
    }

    public function getNewsById($id) {
        return $this->getRow('select * from news WHERE id = :id', [
            'id' => $id
        ]);
    }


    public function updateNews($data) {
        return $this->query(
            "UPDATE news SET title=:title,image=:image, slug=:slug, description=:description, status=:status,date=:date, sort=:sort WHERE id=:id",
            $data);
    }

    public function deleteNews($id) {
        return $this->getRow("DELETE FROM news where id=:id", [
            'id' => $id
        ]);
    }

    public function addNews($data) {
        return $this->query("INSERT INTO news(`title`, `image`, `slug`, `status`, `sort`, `description`,`date`)
                          VALUES(:title, :image, :slug, :status, :sort, :description, :date)", $data);

    }

}