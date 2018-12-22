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

    protected $tableName = 'news';


    public function getNews()
    {
        return $this->getRows('select * from news order by sort');
    }


    public function getCategory()
    {
        return $this->getRows('select * from category');
    }

    public function getNewsById($id)
    {

        return $this->getRow('select * from news WHERE id = :id', [
            'id' => $id
        ]);
    }



    public function updateNews($data)
    {

        return $this->query(
            "UPDATE news SET title=:title,image=:image, slug=:slug, description=:description,category=:category, status=:status,date=:date, sort=:sort WHERE id=:id",
            $data);
    }

    public function deleteNews($id)
    {
        return $this->getRow("DELETE FROM news where id=:id", [
            'id' => $id
        ]);
    }


    public function addNews($data)
    {

        return $this->query("INSERT INTO news(`title`, `image`, `slug`, `status`, `sort`, `description`,`date`)
                          VALUES(:title, :image, :slug, :status, :sort, :description, :date)", $data);

    }


    public function setCategory($id, $cat_ids, $old_ids = []) {
        foreach ($old_ids as $del_id) {
            if (!in_array($del_id, $cat_ids)) {
                $this->query('DELETE FROM cat_rel WHERE obj_id = :id AND cat_id = :cat_id', [
                    'id' => $id,
                    'cat_id' => $del_id,
                ]);
            }
        }
        foreach ($cat_ids as $cat_id) {
            if (!$this->hasCategory($id, $cat_id)) {
                $this->query("INSERT INTO cat_rel(`obj_id`, `cat_id`)
                          VALUES(:id, :cat_id)", [
                    'id' => $id,
                    'cat_id' => $cat_id,
                ]);
            }
        }
    }

    public function hasCategory($id, $cat_id) {
        return $this->getVar('SELECT id FROM cat_rel WHERE obj_id = :id AND cat_id = :cat_id', [
            'id' => $id,
            'cat_id' => $cat_id,
        ]);
    }


    public function getCategoryIds($id) {
        return $this->getCol('SELECT cat_id FROM cat_rel WHERE obj_id = :id', [
            'id' => $id,
        ]);
    }


}