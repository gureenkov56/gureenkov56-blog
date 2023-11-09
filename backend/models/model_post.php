<?php

class Model_Post extends Model
{
    public function get_data_by_id($id) {

        $query = $GLOBALS['pdo']->query('SELECT * FROM `posts` WHERE `id` = ' . $id);

        return $query->fetch();
    }
}
