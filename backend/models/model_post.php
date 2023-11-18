<?php

class Model_Post extends Model
{
    public function get_data_by_id($id) {

        // TODO: Сделать здесь вместо * поля данных
        $query = $GLOBALS['pdo']->query('SELECT * FROM `posts` WHERE `id` = ' . $id);

        $data['post'] = $query->fetch();

        $query = $GLOBALS['pdo']->query('SELECT * FROM `categories`');

        while ($row = $query->fetch()) {
            $data['categories'][] = $row;
        }

        return $data;
    }
}
