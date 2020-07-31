<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

    <form action="controller/createStudent.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" id="Name" name="Name"><br>
        <label for="surname">ID:</label><br>
        <input type="text" id="ID" name="ID"><br>
        <label for="username">Age:</label><br>
        <input type="text" id="Age" name="Age"><br>
        <label for="password">Class:</label><br>
        <input type="text" id="Class" name="Class"><br>
        <input type="submit" name="createStudent" value="Create">
        <input type="reset">
    </form>

</body>

</html>