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
    </style>
</head>

<body>
    <?php

    $nameErr = $dBirth = $Gender = $Degree =  $bGroup = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        }
        if (empty($_POST["dd"]) || empty($_POST["mm"]) || empty($_POST["yy"])) {
            $dBirth = "Date Of  Birth is Empty";
        }
        if (empty($_POST["gender"])) {
            $Gender = "Gender is required";
        }
        if (empty($_POST["class1"]) || empty($_POST["class2"]) || empty($_POST["class3"])) {
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

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Email: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Date of Birth: <input type="text" name="dd" id="date"> / <input type="text" name="mm" id="date"> /<input type="text" name="yy" id="date">
        <span class="error">* <?php echo $dBirth; ?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender">Female
        <input type="radio" name="gender">Male
        <input type="radio" name="gender">Other
        <span class="error">* <?php echo $Gender; ?></span>
        <br><br>
        Degree:
        <input type="checkbox" name="class1">HSC
        <input type="checkbox" name="class2">BSc
        <input type="checkbox" name="class3">MSc
        <span class="error">* <?php echo $Degree; ?></span>
        <br><br>
        Blood Group:
        <select name="BloodG" id="bGroup">
            <option>A+</option>
            <option>B+</option>
        </select>
        <span class="error">* <?php echo $bGroup; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>