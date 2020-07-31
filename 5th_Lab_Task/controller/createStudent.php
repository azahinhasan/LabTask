<<<<<<< HEAD
<?php
require_once '../model.php';


if (isset($_POST['createStudent'])) {
	$data['Name'] = $_POST['Name'];
	$data['ID'] = $_POST['ID'];
	$data['Subject'] = $_POST['Subject'];
	$data['Class'] = $_POST['Class'];

	if (addStudent($data)) {
		echo 'Successfully added!!';
	}
} else {
	echo 'You are not allowed to access this page.';
}
=======
<?php
require_once '../model.php';


if (isset($_POST['createStudent'])) {
	$data['Name'] = $_POST['Name'];
	$data['ID'] = $_POST['ID'];
	$data['Age'] = $_POST['Age'];
	$data['Class'] = $_POST['Class'];

	if (addStudent($data)) {
		echo 'Successfully added!!';
	}
} else {
	echo 'You are not allowed to access this page.';
}
>>>>>>> c30937a513d6159678d20ad1b652dfa7f53b7e58
