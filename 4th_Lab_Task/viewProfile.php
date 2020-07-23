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

        #Pic {
            display: block;
            position: relative;
            left: 310%;
            top: -80%;
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
    ?>
    <?php include 'h2.php'; ?>
    <?php include 'sideBar.php'; ?>
    <form class="main" id="form" class="main" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Profile</h2>
        Name: <input type="text" name="name" value=<?php echo $name ?>>
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        Email: <input type="text" name="email" value=<?php echo $email ?>><b> i</b>
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Date of Birth: <input type="text" name="dd" id="date" value=<?php echo $dd ?>> / <input type="text" name="mm" id="date" value=<?php echo $mm ?>> /<input type="text" name="yy" id="date" value=<?php echo $yy ?>>
        <span class="error">* <?php echo $dBirth; ?></span>
        <br><br>
        <a href="editProfile.php">Edit Profile</a>
    </form>
    <form id="Pic">
        <img src="uploads/pro.jpg" height="150px">
        <br>
        <a href="uploadPic.php">Change Picture</a>
    </form>

    <?php include 'footer.php'; ?>
</body>

</html>