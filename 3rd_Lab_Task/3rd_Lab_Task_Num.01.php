<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }

        #date {
            width: 27px;
        }

        #form {
            text-align: left;
        }
    </style>
</head>

<body>
    <?php

    $nameErr = $dBirth = $Gender = $password =  $passErr = $name = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "UserName is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z  _]*$/", $name)) {
                $nameErr = "Only letters  space allowed";
            } elseif (strlen($_POST["name"]) < 2) {
                $nameErr = "Must Contain 2 characters";
            }
        }
        if (empty($_POST["password"])) {
            $passErr = "Email is required";
        } else {
            $password = test_input($_POST["password"]);
            if (strlen($_POST["password"]) > 8) {
                $passErr = "Must Contain less then 8 characters";
            } elseif (!preg_match("/[@#$%]/", $password)) {
                $passErr = "Password must contain at least one of the special characters (@, #, $,%)";
            }
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        User Name: <input type="text" name="name" value=<?php echo $name ?>>
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Password: <input type="password" name="password" value=<?php echo $password ?>>
        <span class="error">* <?php echo $passErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <spn> <a href="#">Forgot Password?</a></spn>
    </form>
</body>

</html>