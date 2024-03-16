<?php
include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$data = [
    "name" => $_POST['name'] ?? 'Unknown',
    "email" => $_POST['email'] ?? 'Unknown',
    "phone" => $_POST['phone'] ?? 'Unknown',
    "address" => $_POST['address'] ?? 'Unknown',
    "password" => md5($_POST['password']),
    "role_id" => $_POST['role_id'] ?? 'Unknown',
    "gender" => $_POST['gender'] ?? 'Unknown',
    "class_id" => $_POST['class_id'] ?? 'Unknown',
    "subject_id" => $_POST['subject_id'] ?? 'Unknown',
    "age" => $_POST['age'] ?? 'Unknown',
];
$table = new UsersTable(new MySQL());
if ($table) {
    $table->insert($data);
    HTTP::redirect("/index.php", "registered=true");
} else {
    HTTP::redirect("/register.php", "error=true");
}
