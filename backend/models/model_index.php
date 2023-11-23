<?php
class Model_Index extends Model
{
    public function get_data() {
        $query = $GLOBALS['pdo']->query('SELECT `id`, `SEO_title`, `SEO_description`, `description`, `h1`, `pre_text`, `preview_img` FROM `posts`');

        $data = [];
        while ($row = $query->fetch()) {
            $data['content'][] = $row;
        }

        if (key_exists('content', $data)) {
            $data['content'] = array_reverse($data['content']);
        }

        // нужен реверс массива постов

        $query = $GLOBALS['pdo']->query('SELECT * FROM `categories`');

        while ($row = $query->fetch()) {
            $data['categories'][] = $row;
        }

        return $data;
    }
}
