<?php

namespace model;

use includes\DbManager;

class Model extends DbManager {
    protected $tableName;

    protected function passHash($pass) {
        return md5(md5($pass) . '_' . PASS_HASH);
    }


    public function getData($table_name = null) {
        $table_name = $table_name ? $table_name : $this->tableName;
        $query = '';
        if (isset($_GET['s'])) {
            $cols = $this->getCol('DESCRIBE ' . $table_name);
            $arr = [];
            foreach ($cols as $col) {
                if (isset($_GET[$col]) && $_GET[$col] != '') {
                    $arr[] = $col . '  LIKE "%' . $_GET[$col] . '%"';
                }
            }

            if (!empty($arr)) {
                $query = 'where ' . implode(' and ', $arr);
            }

        }
        return $this->getRows("SELECT * FROM  {$table_name} " . $query);
    }
}