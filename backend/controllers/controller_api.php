<?php

class Controller_Api extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function set_like_to_post($post_id, $is_minus)
    {
        include 'backend/models/model_post.php';
        $model = new Model_Post();
        $model->set_post_likes($post_id, $is_minus);
    }
}
