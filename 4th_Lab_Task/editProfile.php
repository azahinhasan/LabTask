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
            top: -150px;
            width: 1600px;

        }
    </style>
</head>

<body>
    <?php

    $nameErr = $dBirth = $Gender = $Degree =  $bGroup =  $emailErr = "";
    $name = "bob";
    $email = "ad@aiub.edu";
    $dd = "22";
    $mm = "1";
    $yy = "1998";
    $genderr = $degree = $group = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z  _]*$/", $name)) {
                $nameErr = "Only letters  space allowed";
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["dd"]) && empty($_POST["mm"]) && empty($_POST["yy"])) {
            $dBirth = "Date Of  Birth is Empty";
        } else {
            $dd = test_input($_POST["dd"]);
            $mm = test_input($_POST["mm"]);
            $yy = test_input($_POST["yy"]);
            if ($dd < 1 || $dd > 31) {
                $dBirth = "Only this format (dd: 1-31) allowed";
            } else if ($mm < 1 || $mm > 12) {
                $dBirth = "Only this format (mm: 1-12) allowed";
            } else if ($yy < 1953) {
                $dBirth = "Only this format (yyyy:1953-1998) allowed";
            } else if ($yy > 1998) {
                $dBirth = "Only this format (yyyy:1953-1998) allowed";
            }
        }
        if (empty($_POST["female"]) && empty($_POST["male"]) && empty($_POST["other"])) {
            $Gender = "At Last One Gender is required";
        }
        if (empty($_POST["class1"]) && empty($_POST["class2"]) || empty($_POST["class2"]) && empty($_POST["class3"]) || empty($_POST["class1"]) && empty($_POST["class3"])) {
            $Degree = "At Last Two Degree is required";
        }
        if (empty($_POST["BloodG"]) || $_POST["BloodG"] == 'Group') {
            $bGroup = "At Last One BloodG is required";
        } else {
            $group = test_input($_POST["BloodG"]);
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
    <form class="main" id="form" class="main" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Edit Profile</h2>
        Name: <input type="text" name="name" value=<?php echo $name ?>>
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Email: <input type="text" name="email" value=<?php echo $email ?>><b> i</b>
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Date of Birth: <input type="text" name="dd" id="date" value=<?php echo $dd ?>> / <input type="text" name="mm" id="date" value=<?php echo $mm ?>> /<input type="text" name="yy" id="date" value=<?php echo $yy ?>>
        <span class="error">* <?php echo $dBirth; ?></span>
        <br><br>
        Gender:
        <input type="radio" name="female" <?php echo (isset($_POST['female']) == 'checked') ?  'checked' : ''; ?>, checked>Female
        <input type="radio" name="male" <?php echo (isset($_POST['male']) == 'checked') ?  'checked' : ''; ?>>Male
        <input type="radio" name="other" <?php echo (isset($_POST['other']) == 'checked') ?  'checked' : ''; ?>>Other
        <span class="error">* <?php echo $Gender; ?></span>
        <br><br>
        Degree:
        <input type="checkbox" name="class1" <?php echo (isset($_POST['class1']) == 'checked') ?  'checked' : ''; ?>checked>HSC
        <input type="checkbox" name="class2" <?php echo (isset($_POST['class2']) == 'checked') ?  'checked' : ''; ?>checked>BSc
        <input type="checkbox" name="class3" <?php echo (isset($_POST['class3']) == 'checked') ?  'checked' : ''; ?>>MSc
        <span class="error">* <?php echo $Degree; ?></span>
        <br><br>
        Blood Group:
        <select name="BloodG" id="bGroup">
            <option name="">Group</option>
            <option name="B+" <?php if ($group == 'B+') { ?>selected="true" <?php }; ?>>B+</option>
            <option name="A+" <?php if ($group == 'A+') { ?>selected="true" <?php }; ?>>A+</option>
        </select>
        <span class="error">* <?php echo $bGroup; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php include 'footer.php'; ?>
</body>

</html>