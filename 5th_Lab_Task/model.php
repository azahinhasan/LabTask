<?php

require_once 'db_connect.php';


function showAllStudents()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `user_info` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showStudent($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


function addStudent($data)       //Done
{
    $conn = db_conn();
    $selectQuery = "INSERT into infouser (Name, ID, Age, Class)
VALUES (:Name, :ID, :Age, :Class)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':Name' => $data['Name'],
            ':ID' => $data['ID'],
            ':Age' => $data['Age'],
            ':Class' => $data['Class']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}


function updateStudent($id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Name = ?, Surname = ?, Username = ? where ID = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['surname'], $data['username'], $id
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function deleteStudent($id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `user_info` WHERE `ID` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}
