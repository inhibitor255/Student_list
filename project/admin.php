<?php
include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;


$table = new UsersTable(new MySQL());
$auth = Auth::check();
if ($auth->value <= 1) {
    header("Location: profile.php");
    die();
};
$classFilter = $_GET['class'] ?? null;
$subjectFilter = $_GET['subject'] ?? null;
$all = $auth->value > 2 ? $table->getStudentsAndAdmins($classFilter, $subjectFilter) : $table->getStudents($classFilter, $subjectFilter);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div style="float: right">
            <a href="profile.php">Profile</a> |
            <a href="_actions/logout.php" class="text-danger">Logout</a>
        </div>
        <h1 class="mt-5 mb-5">
            Manage Students
            <span class="badge bg-danger text-white">
                <?= count($all) ?>
            </span>
        </h1>
        <div class="d-flex mb-3">
            <form action="" method="GET">
                <div class=" d-flex justify-content-between">
                    <div class=" me-4">

                        <select name="class" class="form-select bg-primary text-white" aria-label="Filter by Class">
                            <option value="" selected>Filter By Class</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>

                    </div>
                    <div class=" me-4">
                        <select name="subject" class="form-select bg-primary text-white" aria-label="Filter by Subject">
                            <option value="" selected>Filter By Subject</option>
                            <option value="1">English</option>
                            <option value="2">Math</option>
                            <option value="3">Physics</option>
                            <option value="4">History</option>
                        </select>


                    </div>
                    <button class=" btn btn-outline-primary" type="submit">Apply</button>
                </div>
            </form>
        </div>


        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Classroom</th>
                <th>Subject</th>
                <?php if ($auth->value > 1) : ?>
                    <th>Actions</th>
                <?php endif ?>
            </tr>
            <?php foreach ($all as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td>
                        <?php if ($user->value === 1) : ?>
                            <span class="badge bg-success">
                                <?= $user->role ?>
                            </span>
                        <?php elseif ($user->value === 2) : ?>
                            <span class="badge bg-primary">
                                <?= $user->role ?>
                            </span>
                        <?php else : ?>
                            <span class="badge bg-secondary">
                                <?= $user->role ?>
                            </span>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if ($user->value === 1) : ?>
                            <?= $user->class ?>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if ($user->value === 1) : ?>
                            <?= $user->subject ?>
                        <?php endif ?>
                    </td>
                    <?php if ($auth->value > 1) : ?>
                        <td>
                            <?php if ($user->value >= 1) : ?>
                                <div class="btn-group dropdown">
                                    <?php if ($auth->value === 3) : ?>
                                        <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                                            Change Role
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-dark">
                                            <a href="_actions/role.php?id=<?= $user->id ?>&role=1" class="dropdown-item">User</a>
                                            <a href="_actions/role.php?id=<?= $user->id ?>&role=2" class="dropdown-item">Admin</a>
                                        </div>
                                    <?php endif ?>
                                    <?php if ($user->suspended) : ?>
                                        <a href="_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-danger">Suspended</a>
                                    <?php else : ?>
                                        <a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-success">Active</a>
                                    <?php endif ?>
                                    <?php if ($user->id !== $auth->id) : ?>
                                        <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure?')">Delete</a>
                                    <?php endif ?>
                                    <?php if ($user->id !== $auth->id) : ?>
                                        <a href="profile.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-info">Details</a>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>
                        </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>