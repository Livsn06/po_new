
<!--! FOR login  -->
<?php

if(isset($_POST['login'])){
    $nid = strtolower(trim($_POST['email']));
    $npass = $_POST['pass'];

    if(!isnotRegisteredEmail_Student($nid)){
        
        if(isCorrect_Email_and_Pass($nid, $npass, "student")){

            session_start();
            $_SESSION['studLogin'] = $nid;
            $_SESSION['instrLogin'] = null;

            echo'
            <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Login Success",
                text: "Redirecting as an student account...",
                showConfirmButton: false,
                timer: 1500
              }).then(() => {
                window.location.href = "home.php";
              });
            </script>
            ';

        }else{
            echo'
            <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Wrong email or password",
                showConfirmButton: false,
                timer: 1500
              })
            </script>
            ';
        }
        
    }else if(!isnotRegisteredEmail_Instructor($nid)){
        
        
        if(isCorrect_Email_and_Pass($nid, $npass, "instructor")){

            session_start();
            $_SESSION['studLogin'] = null;
            $_SESSION['instrLogin'] = $nid;

            echo'
            <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Login Success",
                text: "Redirecting as instructor account...",
                showConfirmButton: false,
                timer: 1500
              }).then(() => {
                window.location.href = "dashboard.php";
              });
            </script>
            ';

        }else{
           echo'
            <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Wrong email or password",
                showConfirmButton: false,
                timer: 1500
              })
            </script>
            ';
        }


    }else{
        echo'
        <script>
        Swal.fire({
            position: "center",
            icon: "error",
            title: "'.$nid.'",
            text: "This email is not registered..  ",
            showConfirmButton: true,
          })
        </script>
        '; 
    }

}

if(isset($_POST['validateEmailinput'])){
    $email = trim(strtolower($_POST['email']));
    $pass = $_POST['pass'];
    
    if(!isnotRegisteredEmail_Student($email)){

            echo'
                <label for="id">Email</label>
                <input type="text" placeholder="enter your ID" id="lemail" style="outline-color: rgb(0, 181, 0); color:black;" value="'.$email.'">
                <small class="" style="color: red;"></small>
            '; 
    }else if(!isnotRegisteredEmail_Instructor($email)){
            echo'
                <label for="id">Email</label>
                <input type="text" placeholder="enter your ID" id="lemail" style="outline-color: rgb(0, 181, 0); color:black;" value="'.$email.'">
                <small class="" style="color: red;"></small>
            '; 
    }else{
        echo'
        <label for="id">Email</label>
        <input type="text" placeholder="enter your ID" id="lemail" style="outline-color: red; color:red;" value="'.$email.'">
        <small class="" style="color: red;">* this email is not registered</small>
    '; 
    }

}

if(isset($_POST['validatePassinput'])){
    $nid = trim(strtolower($_POST['email']));
    $pass = $_POST['pass'];


        if(!isnotRegisteredEmail_Student($nid)){
        
            if(isCorrect_Email_and_Pass($nid, $pass, "student")){
                echo'
                    <label for="password">Password</label>
                    <input type="password" placeholder="enter your password" id="lpass" style="outline-color: rgb(0, 181, 0); color:black;" value="'.$pass.'">
                    <small class="" style="color: red;"></small>
                ';
    
            }else{
            echo'
                <label for="password">Password</label>
                <input type="password" placeholder="enter your password" id="lpass" style="outline-color: red; color:red;" value="'.$pass.'">
                <small class="" style="color: red;">* The password you’ve entered is incorrect.</small>
            ';
            }
            
        }else if(!isnotRegisteredEmail_Instructor($nid)){
            
            
            if(isCorrect_Email_and_Pass($nid, $pass, "instructor")){
                
                echo'
                <label for="password">Password</label>
                <input type="password" placeholder="enter your password" id="lpass" style="outline-color: rgb(0, 181, 0); color:black;" value="'.$pass.'">
                <small class="" style="color: red;"></small>
                ';
    
            }else{
               echo'
               <label for="password">Password</label>
               <input type="password" placeholder="enter your password" id="lpass" style="outline-color: red; color:red;" value="'.$pass.'">
               <small class="" style="color: red;">* The password you’ve entered is incorrect.</small>
                ';
            }
    
    
        }else{
            echo'
            <label for="password">Password</label>
            <input type="password" placeholder="enter your password" id="lpass" style="outline-color: red; color:red;" value="'.$pass.'">
            <small class="" style="color: red;">* The password you’ve entered is incorrect.</small>
            '; 
        }
    
}


if(isset($_POST["emptyLoginfieldModal"])){
    echo'
    <script>
    Swal.fire({
        position: "center",
        icon: "error",
        title: "Empty field",
        text: "Please input all required field..",
        showConfirmButton: false,
        timer: 2000
      })
    </script>
    '; 
}

if(isset($_POST["emptyIDinput"])){
    $id = $_POST['email'];
    echo'
    <label for="id">Email</label>
    <input type="text" placeholder="enter your ID" id="lemail" style="outline-color: red; color:red;" value="'.$id.'">
    <small class="" style="color: red;">*required field</small>
    '; 
}


if(isset($_POST["emptyPassinput"])){
    $pass = $_POST['pass'];
    echo'
    <label for="password">Password</label>
    <input type="password" placeholder="enter your password" id="lpass" style="outline-color: red; color:red;" value="'.$pass.'">
    <small class="" style="color: red;">*required field</small>
    '; 
}

if(isset($_POST["erroremailFormat"])){
    $email = $_POST['email'];
    echo'
    <label for="id">Email</label>
    <input type="text" placeholder="enter your ID" id="lemail" style="outline-color: red; color:red;" value="'.$email.'">
    <small class="" style="color: red;">* invalid email</small>
    '; 
}


if(isset($_POST["invalidemail"])){
    $email = $_POST['email'];
    echo'
    <script>
    Swal.fire({
        position: "center",
        icon: "error",
        title: "Invalid Email",
        text: "Please enter a valid email address..",
        showConfirmButton: false,
        timer: 2000
      })
    </script>
    '; 
}

?>

<?php


function isnotRegisteredEmail_Instructor($email)
{
    $email = trim(strtolower($email));
    require "../config/config.php";
    $syntax = "SELECT * FROM instructorreg WHERE instremail= '$email'";
    $result = $conn -> query($syntax);
    if($result -> num_rows > 0){
        $result->free();
        return false;
    }
    $result->free();
    return true;
}

function isnotRegisteredEmail_Student($email)
{
    $email = trim(strtolower($email));
    require "../config/config.php";
    $syntax = "SELECT * FROM studentreg WHERE studemail = '$email'";
    $result = $conn -> query($syntax);
    if($result -> num_rows > 0){
        $result->free();
        return false;
    }
    $result->free();
    return true;
}


function isCorrect_Email_and_Pass($id, $pass, $role)
{
    if($role == "student"){
        require "../config/config.php";
        $syntax = "SELECT studemail, studpassword FROM studentreg WHERE studemail = '$id'";
        $result = $conn -> query($syntax);
        if($result -> num_rows > 0){
            while($data = $result -> fetch_assoc()){
                if($data['studpassword'] == sha1($pass)){
                    $result->free();
                    $conn -> close();
                    return true;
                }
            }
        }
        $result->free();
        $conn -> close();
        return false;

    }else if ($role == "instructor"){

        require "../config/config.php";
        $syntax = "SELECT instremail, instrpassword FROM instructorreg WHERE instremail = '$id'";
        $result = $conn -> query($syntax);
        if($result -> num_rows > 0){
            while($data = $result -> fetch_assoc()){
                if($data['instrpassword'] == sha1($pass)){
                    $result->free();
                    $conn -> close();
                    return true;
                }
            }
        }
        $result->free();
        $conn -> close();
        return false;
    }
}


function isCorrect_Email($email, $pass, $role)
{
    if($role == "student"){
        require "../config/config.php";
        $syntax = "SELECT studemail, studpassword FROM studentreg WHERE studemail = '$email'";
        $result = $conn -> query($syntax);
        if($result -> num_rows > 0){

            $result->free();
            $conn -> close();
            return true;
        }
        $result->free();
        $conn -> close();
        return false;

    }else if ($role == "instructor"){

        require "../config/config.php";
        $syntax = "SELECT instremail, instrpassword FROM instructorreg WHERE instremail = '$id'";
        $result = $conn -> query($syntax);
        if($result -> num_rows > 0){
            $result->free();
            $conn -> close();
            return true;
        }

        $result->free();
        $conn -> close();
        return false;
    }
}


function isCorrect_Pass($email,$pass, $role)
{
    $email = trim(strtolower($email));
    if($role == "student"){
        require "../config/config.php";
        $syntax = "SELECT studemail, studpassword FROM studentreg WHERE studemail = '$email'";
        $result = $conn -> query($syntax);
        if($result -> num_rows > 0){
            while($data = $result -> fetch_assoc()){
                if($data['studpassword'] == sha1($pass)){
                    $result->free();
                    $conn -> close();
                    return true;
                }
            }
        }
        $result->free();
        $conn -> close();
    }

    if ($role == "instructor"){

        require "../config/config.php";
        $syntax = "SELECT instremail, instrpassword FROM instructorreg WHERE instremail = '$email'";
        $result = $conn -> query($syntax);
        if($result -> num_rows > 0){
            while($data = $result -> fetch_assoc()){
                if($data['instrpassword'] == sha1($pass)){
                    $result->free();
                    $conn -> close();
                    return true;
                }
            }
        }
        $result->free();
        $conn -> close();

    }
    return false;
}



?>


















<!--! FOR SINGING UP -->
<?php

if(isset($_POST['signup'])){
    $nid = strtoupper(trim($_POST['id']));
    $nemail = strtolower(trim($_POST['email']));
    $npass = $_POST['pass'];
    $ncpass = $_POST['cpass'];


    if($npass != $ncpass){
        echo'
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Password does not match..",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        ';

    }else if(!(isnotRegistered_Student($nid) &&  isnotRegistered_Instructor($nid))){
        echo'
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "This person is already registered..",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        ';
    }else if(!(isStudent_Exist($nid) || isInstructor_Exist($nid))){
        echo'
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "'.$nid.' does not exist",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        ';
    }else if (!(isUnique_Email_Student($nemail) && isUnique_Email_Instructor($nemail))){
        echo'
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Email already taken",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        ';

    } else{

        $role ="";

        if(isStudent_Exist($nid) ){
            
            $role = "student";
            signup_Account($nid, $nemail, $npass, $role);

            session_start();
            $_SESSION['activeAccount'] = $nid;

            echo'
            
            <script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Register Success",
                    text: "Redirecting....",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "dashboard.php";
                });
            </script>
            ';
            
        }else if(isInstructor_Exist($nid)){

            $role = "instructor";
            
            signup_Account($nid, $nemail, $npass, $role);

            session_start();
            $_SESSION['activeAccount'] = $nid;

            echo'
            <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Register Success",
                text: "Redirecting....",
                showConfirmButton: false,
                timer: 1500
              }).then(() => {
                window.location.href = "dashboard.php";
              });
            </script>
            ';
        }

    }

  
}

?>




<?php

function signup_Account($id, $email, $pass, $role)
{
    
    $pass = sha1($pass);

    require "../config/config.php";
    if ($role === "student") {
        $syntax = "INSERT INTO studentreg (studid, studemail,studpassword) VALUES ('$id', '$email', '$pass')";
        $conn -> query($syntax);
    }
    else if($role === "instructor"){
        $syntax = "INSERT INTO instructorreg (instrid, instremail, instrpassword) VALUES ('$id', '$email', '$pass')";
        $conn -> query($syntax);
    }

    $conn->close();
   
}




function isUnique_Email_Instructor($email)
{
    $email = trim(strtolower($email));
    require "../config/config.php";
    $syntax = "SELECT * FROM instructorreg WHERE instremail = '$email'";
    $result = $conn -> query($syntax);
    if($result -> num_rows > 0){
        $result->free();
        return false;
    }
    $result->free();
    return true;
}


function isUnique_Email_Student($email)
{
    $email = trim(strtolower($email));
    require "../config/config.php";
    $syntax = "SELECT * FROM studentreg WHERE studemail = '$email'";
    $result = $conn -> query($syntax);
    if($result -> num_rows > 0){
        $result->free();
        return false;
    }
    $result->free();
    return true;
}



function isStudent_Exist($id)
{
    $uid = trim(strtoupper($id));
    require "../config/config.php";

    $syntax = "SELECT * FROM overallstudent WHERE allstudid = '$uid'";
    $result = $conn->query($syntax);


    if($result -> num_rows > 0){
        $result->free();
        return true;
    }
    $result->free();
    return false;
}


?>

<?php

function isInstructor_Exist($id)
{
    $uid = trim(strtoupper($id));
    require "../config/config.php";
    $syntax = "SELECT * FROM overallinstructor WHERE allinstrid = '$uid'";
    $result = $conn -> query($syntax);
    if($result -> num_rows > 0){
        $result->free();
        return true;
    }
    $result->free();
    return false;
}


function isnotRegistered_Student($id)
{
    $id = trim(strtoupper($id));
    require "../config/config.php";
    $syntax = "SELECT * FROM studentreg WHERE studid = '$id'";
    $result = $conn -> query($syntax);
    if($result -> num_rows > 0){
        $result->free();
        return false;
    }
    $result->free();
    return true;
}


function isnotRegistered_Instructor($id)
{
    $id = trim(strtoupper($id));
    require "../config/config.php";
    $syntax = "SELECT * FROM instructorreg WHERE instrid = '$id'";
    $result = $conn -> query($syntax);
    if($result -> num_rows > 0){
        $result->free();
        return false;
    }
    $result->free();
    return true;
}



?>


<?php

if(isset($_POST['emtyModal'])){
    
}

?>