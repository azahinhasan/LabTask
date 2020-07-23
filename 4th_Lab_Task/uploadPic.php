<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$msg = "";
$fileToUpload = 1;
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $msg =  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $msg =  "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $msg =  "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $msg =  "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
$upload = "img.png";
if ($uploadOk == 0) {
    $msg =  "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $msg =  "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        $upload = basename($_FILES["fileToUpload"]["name"]);
    } else {
        $msg =  "Sorry, there was an error uploading your file.";
    }
}

?>
<html>
<style>
    .main {
        display: block;
        position: relative;
        left: 180px;
        top: -150px;
        width: 1600px;

    }
</style>

<body>
    <?php include 'h2.php'; ?>
    <?php include 'sideBar.php'; ?>
    <form action="" method="POST" enctype="multipart/form-data" class="main">
        <h1>Profile Picture</h1>
        <img src="uploads/<?php echo $upload ?>" height="150px">
        <br>
        <input type="file" name="fileToUpload" />
        <br>
        <?php echo $msg; ?></span>
        <br>
        <input type="submit" />
    </form>
    <?php include 'footer.php'; ?>

</body>

</html>