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

        .main {
            display: block;
            position: relative;
            left: 180px;
            top: -250px;
            width: 1600px;

        }
    </style>
</head>

<body>
    <?php

    $cPassword = $nPassword = $rPassword =  $cPasswordErr = $nPasswordErr = $rPasswordErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["cPassword"])) {
            $cPasswordErr = "cPassword is required";
        }
        if (empty($_POST["nPassword"])) {
            $nPasswordErr = "nPassword is required";
        } else {
            if ($_POST["cPassword"] == $_POST["nPassword"]) {
                $nPasswordErr = "New Password should not be same as the Current Password";
            }
        }
        if (empty($_POST["rPassword"])) {
            $rPasswordErr = "rPasswordErr is required";
        } else {
            if ($_POST["rPassword"] <> $_POST["nPassword"]) {
                $rPasswordErr = "New Password must match with the Retyped Password";
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
    <?php include 'h2.php'; ?>
    <?php include 'sideBar.php'; ?>
    <dev class="main">
        <form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table>
                <tr>
                    <td>
                        Current Password:
                    </td>
                    <td>
                        <input type="password" name="cPassword" value=<?php echo $_POST["cPassword"] ?>>
                        <span class="error">* <?php echo $cPasswordErr; ?></span>
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td>
                        New Password:
                    </td>
                    <td>
                        <input type="password" name="nPassword" value=<?php echo $_POST["nPassword"] ?>>
                        <span class="error">* <?php echo $nPasswordErr; ?></span>
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td>
                        Retype New Password:
                    </td>
                    <td>
                        <input type="password" name="rPassword" value=<?php echo $_POST["rPassword"] ?>>
                        <span class="error">* <?php echo $rPasswordErr; ?></span>
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </dev>
    <?php include 'footer.php'; ?>
</body>

</html>