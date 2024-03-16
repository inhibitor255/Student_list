<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .wrap {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style>
</head>

<body class="text-center">
    <div class="wrap">
        <h1 class="h3 mb-3">Register</h1>
        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning">
                Cannot create account. Please try again.
            </div>
        <?php endif ?>
        <form action="_actions/create.php" method="POST">
            <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <input type="number" name="phone" class="form-control mb-2" placeholder="Phone" required>
            <input type="number" name="age" class="form-control mb-2" placeholder="Age" required>
            <select name="gender" class="form-select mb-2" aria-label="Default select example">
                <option selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
            </select>
            <select name="class_id" class="form-select mb-2" aria-label="Default select example">
                <option selected>Select Class</option>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
                <option value="4">D</option>
            </select>
            <select name="subject_id" class="form-select mb-2" aria-label="Default select example">
                <option selected>Select Subject</option>
                <option value="1">English</option>
                <option value="2">Math</option>
                <option value="3">Physics</option>
                <option value="4">History</option>
            </select>
            <input type="hidden" name="role_id" value="1">
            <textarea name="address" class="form-control mb-2" placeholder="Address" required></textarea>

            <button type="submit" class="w-100 btn btn-lg btn-primary">
                Register
            </button>
        </form><br>
        <a href="index.php">Login</a>
    </div>
</body>

</html>