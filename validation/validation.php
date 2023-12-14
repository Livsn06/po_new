
<?php

if(isset($_POST['finalSign'])){

    $user = trim($_POST["user"]);
    $email = trim($_POST["email"]);
    $pass = $_POST["pass"];

    echo "<main id =\"modal\">";
    if(isUnique($email)){
?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Register Successfully",
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
            let timerInterval;
            Swal.fire({
            title: "Redirecting",
            html: "loading...",
            timer: 2000,
            showConfirmButton: false,
            timerProgressBar: false,
            }).then((result) => {
                if(result){
                    window.location.href = '../pages/dashboard.php';
                }
            });

        });

    </script>
    

<?php
    }else{
?>

<script>
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Email has already used",
            showConfirmButton: false,
            timer: 1500
        });
    </script>

<?php
    }

    echo "<main id =\"modal\">";
}

?>



<?php

function isUnique($mail)
{
    $mail = trim($mail);
    require "../config/config.php";
    $syntax = "SELECT * FROM user WHERE email = '$mail'";
    $result = $conn -> query($syntax);

    if($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            return false;
        }
    }
    return true;
}


?>