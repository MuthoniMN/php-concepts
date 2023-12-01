<?php
function checkForEmpty($inputFields)
{
    foreach ($inputFields as $inputField) {
        if (empty($inputField)) {
            return true;
        }
    }
    return false;
}

function checkForInvalidText($string)
{
    if (!preg_match("/^[a-zA-z\s]*$/", $string)) {
        return true;
    }
    return false;
}

function checkForInvalidEmail($str)
{
    if (!filter_var($str, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function checkForInvalidURL($str)
{
    if (!filter_var($str, FILTER_VALIDATE_URL)) {
        return true;
    }
    return false;
}

function checkForInvalidPassword($password)
{
    $regex = "#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
    if (!preg_match($regex, $password)) {
        return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $url = filter_input(INPUT_POST, 'portfolio', FILTER_SANITIZE_URL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    // check for empty fields
    if (checkForEmpty([$name, $email, $url, $password])) {
        echo "Please fill all the fields";
    }

    // check if the user entered a name
    if (checkForInvalidText($name)) {
        echo "Please enter only characters and spaces";
    }

    // check if the email is valid
    if (checkForInvalidEmail($email)) {
        echo "Please enter a valid email";
    }

    // check if the URL is valid
    if (checkForInvalidURL($url)) {
        echo "Please enter a valid URL";
    }

    // check if the password is valid
    if (checkForInvalidPassword($password)) {
        echo "Please enter a strong password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <section class="p-5">
        <h1 class="text-center">Sign Up</h1>
        <p class="text-center fst-italic">Please enter all the fields</p>
        <form action="" method="post" class="w-25 mx-auto" style="min-width: 300px;">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="portfolio" class="form-label">Portfolio Link</label>
                <input type="text" class="form-control" id="portfolio" name="portfolio">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
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