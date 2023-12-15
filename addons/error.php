



<!-- <?php

if(isset($_POST['signup'])){
    echo'

    <script>
    Swal.fire({
        position: "center",
        icon: "error",
        title: "Invalid inputs",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    ';
}

?> -->

<?php

if(isset($_POST['notEnrolled'])){
    echo'
        <div>
            <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Student is not enrolled",
                showConfirmButton: false,
                timer: 1500
            });
            </script>
        </div>
    ';

}

?>

<?php

if(isset($_POST['isEmtyfield'])){
    echo'
<div>
    <script>
    Swal.fire({
        position: "center",
        icon: "error",
        title: "Please Fill all form..",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
</div>
    ';

}

?>

<?php

if(isset($_POST['invalidEmail'])){
    echo'
<div>
    <script>
    Swal.fire({
        position: "center",
        icon: "error",
        title: "Invalid email input..",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
</div>
    ';
}

?>