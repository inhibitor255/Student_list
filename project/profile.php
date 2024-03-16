<?php
include("vendor/autoload.php");

use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$auth = Auth::check();
$userId = isset($_REQUEST["id"]) ? $_REQUEST["id"] : ""; // Check if "id" key exists
$table = new UsersTable(new MySQL());
$user = $userId ? $table->userProfile($userId) : null; // Fetch user profile only if $userId is not empty
$renderUser = $userId ? $user : $auth;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container pb-4">
        <div class=" d-flex justify-content-between">
            <div class="mt-5 mb-5">
                <h1 class="">
                    <?= $renderUser->name ?>
                    <span class="fw-normal text-muted">
                        (<?= $renderUser->role ?>)
                    </span>
                </h1>
            </div>
            <div class="mt-5 mb-5">
                <?php if ($auth->value > '1') : ?>
                    <a href="admin.php">Manage Students</a>
                <?php endif ?>
                <a href="_actions/logout.php" class="text-danger">Logout</a>
            </div>
        </div>
        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning">
                Cannot upload file
            </div>
        <?php endif ?>
        <?php if ($renderUser->photo || $renderUser->photo === null) : ?>
            <?php if (strpos($renderUser->photo, 'https://') === 0) : ?>
                <img class="img-thumbnail mb-3" src="<?= $renderUser->photo ?>" alt="Profile Photo" width="200">
            <?php else : ?>
                <img class="img-thumbnail mb-3" src="_actions/photos/<?= $renderUser->photo ?>" alt="Profile Photo" width="200">
            <?php endif ?>
        <?php endif ?>
        <?php if ($auth->id === $userId || $user === null) : ?>
            <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="file" name="photo" class="form-control">
                    <button class="btn btn-secondary">Upload</button>
                </div>
            </form>
        <?php endif  ?>

        <ul class="list-group">
            <li class="list-group-item">
                <b>Email:</b> <?= $renderUser->email ?>
            </li>
            <li class="list-group-item">
                <b>Phone:</b> <?= $renderUser->phone ?>
            </li>
            <li class="list-group-item">
                <b>Address:</b> <?= $renderUser->address ?>
            </li>
            <li class="list-group-item">
                <b>Age:</b> <?= $renderUser->age ?>
            </li>
            <li class="list-group-item">
                <b>Gender:</b> <?= $renderUser->gender ?>
            </li>
            <li class="list-group-item">
                <b>Suspended:</b> <?= $renderUser->suspended ? "Yes" : "No" ?>
            </li>
            <?php if ($renderUser->value <= 1) : ?>
                <li class="list-group-item">
                    <b>Classroom:</b> <?= $renderUser->class ?>
                </li>
                <li class="list-group-item">
                    <b>Subject:</b> <?= $renderUser->subject ?>
                </li>
            <?php endif ?>

        </ul>
        <br>

    </div>
</body>

</html>