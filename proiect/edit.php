<?php

include_once ("sql&db-conn.php");

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $compl_name = $_POST['cpnm'];
    $years = $_POST['yrs'];
    $bio = $_POST['bio'];

    $result = mysqli_query($sql,"UPDATE usrsprof SET full_name='$compl_name', age='$years', bio='$bio' WHERE id=$id");
    header("Location: index.php");
}
?>

<?php
$id = $_GET['id'];
    $result = mysqli_query($sql,"SELECT * FROM usrsprof WHERE  id=$id");

    while ($user_data = mysqli_fetch_array($result)){
        $compl_name = $user_data['full_name'];
        $years = $user_data['age'];
        $bio = $user_data['bio'];
    }


?>
<html>
<head>
    <title>Modify profiles</title>
</head>
    <body>
    <a href="admin.php">Back to admin page</a>
    <br><br>
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Compleate Name</td>
                <td><input type="text" name="cpnm" value=<?php echo $compl_name;?>></td>
            </tr>
            <tr>
                <td>Your age</td>
                <td><input type="number" name="yrs" value=<?php echo $years;?>></td>
            </tr>
            <tr>
                <td>Bio</td>
                <td><input type="text" name="bio" value=<?php echo $bio;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </body>
</html>




<?php