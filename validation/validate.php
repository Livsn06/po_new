
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


<!--! FOR SINGING UP -->
<?php

if(isset($_POST['login'])){
    $nid = strtoupper(trim($_POST['id']));
    $npass = $_POST['pass'];

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