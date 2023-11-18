<?php
class Model_Index extends Model
{
    public function get_data() {

        $query = $GLOBALS['pdo']->query('SELECT `id`, `SEO_title`, `SEO_description`, `description`, `h1`, `pre_text`, `preview_img` FROM `posts`');

        while ($row = $query->fetch()) {
            $data['posts'][] = $row;
        }

        $query = $GLOBALS['pdo']->query('SELECT * FROM `categories`');

        while ($row = $query->fetch()) {
            $data['categories'][] = $row;
        }

        return array_reverse($data);
    }
}
