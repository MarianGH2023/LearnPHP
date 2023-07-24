<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
<title>Title of the document</title>

<style>
body{
  margin: 0px;
  padding: 0px;
  background-color: darkslategray;

}


.tdiv{
  display: flex;
justify-content: center;
  margin: auto;

}


.usr_admin{
  color: white;
  font-weight: bold;
  font-size: 20px;
  text-decoration: none;
  opacity: 0.8;
}
.usr_admin:hover{
  text-decoration: underline;
  opacity: 1;
}

.login_frame{
  width: auto;
  height: auto;
  background-color: azure;;
  margin: auto;
  margin-top: 200px;
  width: 50%;
  padding: 10px;
  letter-spacing: 0.4em;
  text-align: center;
  border-radius: 20px; 
  }

  


.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.form_div{
  margin: auto;
  display: grid;
 
}
.field{
  font-size: 20px;
  margin: auto;
  display: inline;
}


.ifregister{
  display: inline-block;
  text-align: center;
  color: black;
}

.register{
  text-decoration:none;
}

.register:hover{
text-decoration: underline;

}

.sbm_btn{
width:  250px;
height: 40px ;
background-color: #1E90FF;
color: lightgray;
font-weight: bold;
font-size: 20px;
opacity: 0.8;

}

.sbm_btn:hover{
  color: white;
  border: 2px solid white;
  opacity: 1;
}

</style>
</head>

<body>
<div class="tdiv">
<a class="usr_admin" href='admin.php'>Users Administration</a>
</div>





  <div class="login_frame">
      
      <form action="index.php">
       <h2>Login Form</h2>
       <div class="form_div">
          <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input style="width: 250px" class="field" type="text" placeholder="Username" name="usrnm">
          </div>


          <div class="input-container">
              <i class="fa fa-key icon"></i>
              <input style="width: 250px" class="field" type="password" placeholder="Password" name="psw">
          </div>
        </div>
      <br>
      <button class="sbm_btn" type="submit" class="btn" name="butonn">Login</button>
</form>
<br>

<p class="ifregister">You don't have an account?</p>
      <a class="register" href="http://localhost/wf/proiect/register.php">&nbsp;Register now!</a>
</div>


<div id="wrap">
        <!-- start PHP code -->
        <?php
          
  

        if(isset($_POST['butonn'])){
          $user_name = $_POST['usrnm']; 
          $passwd = $_POST['psw'];
          
  
          // verificam daca toate campurile au fost completate.
          if (!empty($user_name) && !empty($passwd)) {
                
          
          include_once ("sql&db-conn.php");
  
        
          


 // Prepare our SQL, preparing the SQL statement will prevent SQL injection.

 $sqluser = mysqli_query($sql,"INSERT INTO users(username, password) VALUES ('$user_name','$passwd')");
 $sqlpass = mysqli_query($sql,"INSERT INTO users(username, password) VALUES ('$user_name','$passwd')");


 if ($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?')) {
  // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
  $stmt->bind_param('s', $_POST['usrnm']);
  $stmt->execute();
  // Store the result so we can check if the account exists in the database.
  $stmt->store_result();


  if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();
    // Account exists, now we verify the password.
    // Note: remember to use password_hash in your registration file to store the hashed passwords.
    if (password_verify($_POST['psw'], $password)) {
      // Verification success! User has logged-in!
      // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name'] = $_POST['username'];
      $_SESSION['id'] = $id;
      echo 'Welcome ' . $_SESSION['name'] . '!';
    } else {
      // Incorrect password
      echo 'Incorrect username and/or password!';
    }
  } else {
    // Incorrect username
    echo 'Incorrect username and/or password!';
  }


  $stmt->close();
}











  } 
   else {  echo "You don't have complete all fields!";
         }
  
        }


         
          ?>





        </div>

 
</body>

</html>
  





