<?php

class Model_Post extends Model
{
    public function get_data_by_id($id) {
        $query = $GLOBALS['pdo']->query('SELECT `id`, `h1`, `pre_text`, `preview_img`, `post_content`, `likes`, `views`, `SEO_title`, `SEO_description` FROM `posts` WHERE `id` = ' . $id);
        $data = [];

        $data['content'] = $query->fetch();


        $query = $GLOBALS['pdo']->query('SELECT * FROM `categories`');

        while ($row = $query->fetch()) {
            $data['categories'][] = $row;
        }

        $data['SEO_title'] = $data['content']['SEO_title'] . ' | Блог Никиты Гуреенкова';
        $data['SEO_description'] = $data['content']['SEO_description'];

        // TODO:
//        $this->plus_one_view_counter($id, $data['content']['views']);

        return $data;
    }

    private function plus_one_view_counter($id, $view_count) {
        $updated_view_count = $view_count + 1;
        $GLOBALS['pdo']->query("UPDATE `posts` SET `views` = " . $updated_view_count . " WHERE `posts`.`id` = " . $id);
    }
}
