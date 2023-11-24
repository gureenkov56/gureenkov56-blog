<?php
class Model_Category extends Model
{
    public function get_data_by_id($id) {

        $data = [];

        $query = $GLOBALS['pdo']->query('SELECT * FROM `categories`');

        while ($row = $query->fetch()) {
            $categoryId = $row['id'];
            $data['categories'][$categoryId] = $row;
        }

        if (!key_exists($id, $data['categories'])) {
            (new Router())::ErrorPage404();
        }

        $data['active_category'] = $data['categories'][$id];

        $query = $GLOBALS['pdo']->query('SELECT * FROM `posts` WHERE `category` = ' . $id);
        while ($row = $query->fetch()) {
            $data['content'][] = $row;
        }

        if (key_exists('content', $data)) {
            $data['content'] = array_reverse($data['content']);
        }

        $data['SEO_title'] = $data['categories'][$id]['category-name'] . ' | Блог Никиты Гуреенкова';
        $data['SEO_description'] = 'Посты из категории ' . $data['active_category']['category-name'] . ' в блоге Никиты Гуреенкова. You are welcome!';

        return $data;
    }
}
