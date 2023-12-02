<?php
include "./db.php";
include "./form-validate.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    //validating the username
    if (checkForEmpty($username)) {
        $usernameError = "Please enter a username";
    } elseif (checkForInvalidUsername($username)) {
        $usernameError = "Please use characters, numbers and underscores only";
    }
    $formFields['username'] = $username;

    // validating the password
    if (checkForEmpty($password)) {
        $passwordError = "Please enter your password";
    } elseif (checkForInvalidPassword($password)) {
        $passwordError = "Please use a strong password";
    }
    $formFields['password'] = $password;

    if (isset($usernameError)) {
        $_SESSION['usernameError'] = $usernameError;
    }
    if (isset($passwordError)) {
        $_SESSION['passwordError'] = $passwordError;
    }
    $_SESSION['formFields'] = $formFields;

    if (!$usernameError || !$passwordError) {
        $query = "INSERT INTO userDetails(`name`, email, username, `password`) VALUES (?, ?, ?, ?)";

        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssss", $name, $email, $username, $password);
        $result = $stmt->execute();

        if ($result) {
            echo "User saved successfully";
            header("Location: landing.php");
        } else {
            $loginError = "Log-in failed";
            $_SESSION['loginError'] = $loginError;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <section class="p-5">
        <h1 class="text-center">Log In</h1>
        <p class="text-center fst-italic">Please fill all the fields</p>
        <form action="" method="post" class="w-25 mx-auto" style="min-width: 300px;">
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

            <p class="text-danger fw-bold"><? echo isset($_SESSION['loginError']) ? $_SESSION['loginError'] : "" ?></p>
            <input type="submit" value="Sign Up" class="btn btn-outline-primary">
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>