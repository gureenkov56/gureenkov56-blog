<?php
/* @var $data */
print_r($data);
$count = [1,2,3];
foreach ($count as $post) :
?>
<a href="">
    <div class="post-preview">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Moench_2339.jpg/1200px-Moench_2339.jpg" alt="">
        <div class="post-preview__text">
            <div class="title-and-label">
                <h3>
                    Автостопом до Малайзии или что делать после
                    армии. Part I
                </h3>
                <div>новьё</div>
            </div>
            <p>
                Калининградская область, город Балтийск, военный полуживой
                корабль. Меня отправляют в кубрик к новобранцам, чтобы
                привлечь любого из них на кухню для помощи.
            </p>
        </div>
    </div>
</a>
<?php endforeach; ?>
