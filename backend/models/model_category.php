<?php
class Model_Category extends Model
{
    public function get_data_by_id($id) {

        $query = $GLOBALS['pdo']->query('SELECT * FROM `posts` WHERE `category` = ' . $id);
        $data = [];
        while ($row = $query->fetch()) {
            $data['content'][] = $row;
        }

        if (key_exists('content', $data)) {
            $data['content'] = array_reverse($data['content']);
        }

        $query = $GLOBALS['pdo']->query('SELECT * FROM `categories`');

        while ($row = $query->fetch()) {
            $categoryId = $row['id'];
            $data['categories'][$categoryId] = $row;
        }

        $data['active_category'] = $data['categories'][$id];

        $data['SEO_title'] = $data['active_category']['category-name'] . ' | Блог Никиты Гуреенкова';
        $data['SEO_description'] = 'Посты из категории ' . $data['active_category']['category-name'] . ' в блоге Никиты Гуреенкова. You are welcome!';

        return $data;
    }
}
