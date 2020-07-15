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

    $nameErr = $dBirth = $Gender = $Degree =  $bGroup = "";
    $name = $dd = $mm = $yy = $genderr = $degree = $group = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }
        if (empty($_POST["dd"]) || empty($_POST["mm"]) || empty($_POST["yy"])) {
            $dBirth = "Date Of  Birth is Empty";
        } else {
            $dd = test_input($_POST["dd"]);
            $mm = test_input($_POST["mm"]);
            $yy = test_input($_POST["yy"]);
        }
        if (empty($_POST["female"]) && empty($_POST["male"]) && empty($_POST["other"])) {
            $Gender = "Gender is required";
        }
        if (empty($_POST["class1"]) && empty($_POST["class2"]) && empty($_POST["class3"])) {
            $Degree = "Degree is required";
        }
        if (empty($_POST["BloodG"])) {
            $bGroup = "BloodG is required";
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
        Email: <input type="text" name="name" value=<?php echo $name ?>>
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Date of Birth: <input type="text" name="dd" id="date" value=<?php echo $dd ?>> / <input type="text" name="mm" id="date" value=<?php echo $mm ?>> /<input type="text" name="yy" id="date" value=<?php echo $yy ?>>
        <span class="error">* <?php echo $dBirth; ?></span>
        <br><br>
        Gender:
        <input type="radio" name="female" <?php echo (isset($_POST['female']) == 'checked') ?  'checked' : ''; ?>>Female
        <input type="radio" name="male" <?php echo (isset($_POST['male']) == 'checked') ?  'checked' : ''; ?>>Male
        <input type="radio" name="other" <?php echo (isset($_POST['other']) == 'checked') ?  'checked' : ''; ?>>Other
        <span class="error">* <?php echo $Gender; ?></span>
        <br><br>
        Degree:
        <input type="checkbox" name="class1" <?php echo (isset($_POST['class1']) == 'checked') ?  'checked' : ''; ?>>HSC
        <input type="checkbox" name="class2" <?php echo (isset($_POST['class2']) == 'checked') ?  'checked' : ''; ?>>BSc
        <input type="checkbox" name="class3" <?php echo (isset($_POST['class3']) == 'checked') ?  'checked' : ''; ?>>MSc
        <span class="error">* <?php echo $Degree; ?></span>
        <br><br>
        Blood Group:
        <select name="BloodG" id="bGroup">
            <option name="A+">A+</option>
            <option name="B+">B+</option>
        </select>
        <span class="error">* <?php echo $bGroup; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>