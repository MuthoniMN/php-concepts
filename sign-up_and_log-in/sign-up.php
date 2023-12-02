<?php
include "./db.php";
include "./form-validate.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <section class="p-5">
        <h1 class="text-center">Sign Up</h1>
        <p class="text-center fst-italic">Please enter all the fields</p>
        <form action="" method="post" class="w-25 mx-auto" style="min-width: 300px;">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($_SESSION['formFields']['name']) ? $_SESSION['formFields']['name'] : "" ?>">
                <div class="text-danger fw-bold"><?php echo isset($_SESSION['nameError']) ? $_SESSION['nameError'] : "" ?></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_SESSION['formFields']['email']) ? $_SESSION['formFields']['email'] : "" ?>">
                <div class="text-danger fw-bold"><?php echo isset($_SESSION['emailError']) ? $_SESSION['emailError'] : "" ?></div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($_SESSION['formFields']['username']) ? $_SESSION['formFields']['username'] : "" ?>">
                <div class="text-danger fw-bold"><?php echo isset($_SESSION['usernameError']) ? $_SESSION['usernameError'] : "" ?></div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_SESSION['formFields']['password']) ? $_SESSION['formFields']['password'] : "" ?>">
                <div class="text-danger fw-bold"><?php echo isset($_SESSION['passwordError']) ? $_SESSION['passwordError'] : "" ?></div>
                <div class="form-text">
                    Your password should have:
                    <ul>
                        <li>at least one lowercase letter</li>
                        <li>at least one uppercase letter</li>
                        <li>at least one number</li>
                        <li>at least one special character</li>
                    </ul>
                </div>
            </div>

            <input type="submit" value="Sign Up" class="btn btn-outline-primary">
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>