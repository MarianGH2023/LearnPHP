<?php



include_once ("sql&db-conn.php");

// Preluam toate datele utilizatorilor din baza de date


$result = mysqli_query($sql,"SELECT * FROM usrsprof ORDER BY id DESC ");

?>

<html>
<head>
    <title>Administrarea userilor</title>


    <Style>
        body{
            margin: 0px;
            padding: 0px;
            background-color: darkslategray;

        }



        .register{
  color: white;
  font-weight: bold;
  font-size: 20px;
  text-decoration: none;
  opacity: 0.8;
}
.register:hover{
  text-decoration: underline;
  opacity: 1;
} 
        
        .tble{
            border: solid 5px gray;
            color: white;
            display: flex;
            justify-content: center;
            margin: auto;
        }




        
    </Style>
</head>
<body>

    <a class="register" href="register.php">Register a new user here!</a>

    <table class="tble" width="80%"border="1">

        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
            <th>Complete name</th>
            <th>Email</th>
            <th>Varsta</th>
            <th>Bio</th>
            <th>Update</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)){
            // afisam utilizatori din baza de date dupa nume, mobile si email
            echo "<tr>";
            echo "<td>".$user_data['id']."</td>";
            echo "<td>".$user_data['username']."</td>";
            echo "<td>".$user_data['password']."</td>";
            echo "<td>".$user_data['full_name']."</td>";
            echo "<td>".$user_data['email']."</td>";
            echo "<td>".$user_data['age']."</td>";
            echo "<td>".$user_data['bio']."</td>";
            echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a>"; // editam si stergem utilizatori
        }
        ?>
    </table>

</body>
</html>
