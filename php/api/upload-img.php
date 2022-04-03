<?php

$way_for_save = $_SERVER['DOCUMENT_ROOT'] . "/img/post/" . $_FILES['uploadimg']['name'];

if (move_uploaded_file($_FILES['uploadimg']['tmp_name'], $way_for_save)) {
	echo json_encode($_FILES['uploadimg']['name']);
} else {
	echo json_encode('ERROR');
}

?>