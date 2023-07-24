<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
<title>Register</title>

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

.fmessage{
width: 250px;
height: 50px;
backgroud-color: while;
color: black;

}


</style>
</head>

<body>
  <div class="tdiv">
<a class="usr_admin" href='admin.php'>Users Administration</a>
</div>




  <div class="login_frame">
      
      <form aaction="register.php" method="post">
            <h2>Register Form</h2>
       <div class="form_div">
       <!-- Username -->
          <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input style="width: 250px" class="field" type="text" placeholder="Username" name="usrnm">
          </div>

         <!-- Parola -->
          <div class="input-container">
              <i class="fa fa-key icon"></i>
              <input style="width: 250px" class="field" type="password" placeholder="Password" name="psw">
          </div>

        <!-- Nume complet -->
          <div class="input-container"> 
              <i class="fa fa-address-card-o icon"></i>
              <input style="width: 250px" class="field" type="text" placeholder="Full name" name="cpnm">
          </div>

          <!-- Adresa de email -->
          <div class="input-container">
              <i class="fa fa-at icon"></i>
              <input style="width: 250px" class="field" type="email" placeholder="E-mail" name="email">
          </div>

          <!-- Varsta -->
          <div class="input-container"> 
              <i class="fa fa-birthday-cake icon"></i>
              <input style="width: 250px" class="field" type="number" placeholder="Age" name="yrs" min="14" max="120">
          </div>

          <!-- Biografie -->
          <div class="input-container">
              <i class="fa fa-pencil-square-o icon"></i>
              <input style="width: 250px" class="field" type="textarea" placeholder="Bio" name="bio">
          </div>
       </div>
      <br>
      <button class="sbm_btn" type="submit" name="butonn" class="btn" value="Add">Register</button>
</form>
<br>

<p class="ifregister">Already have an account</p>
      <a class="register" href="http://localhost/proiect/index.php">&nbsp;Login now!</a>
</div>



<?php




  

        if(isset($_POST['butonn'])){
        $user_name = $_POST['usrnm']; 
        $passwd = $_POST['psw'];
        $compl_name = $_POST['cpnm'];
        $e_mail = $_POST['email'];
        $years = $_POST['yrs'];
        $bio = $_POST['bio'];

        // verificam daca toate campurile au fost completate.
        if (!empty($user_name) && !empty($passwd) && !empty($compl_name) && !empty($e_mail) && !empty($years) && !empty($bio)) {
              

        include_once ("sql&db-conn.php");

        $result = mysqli_query($sql,"INSERT INTO usrsprof(username, password, full_name, email, age, bio) VALUES ('$user_name','$passwd', '$compl_name', '$e_mail', '$years', '$bio')");
        
        echo "The username was register with succes!.<a href='index.php'></a>";
} 
 else {  echo "You don't have complete all fields!";
       }

      }


?>

