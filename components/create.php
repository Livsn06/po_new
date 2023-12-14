

<?php

echo '
<script>

Swal.fire({
title: "Create Board",
html: `<div class="inner-card" >

        <div class="for-image">

            <div class="show-image">
                <img src="#" id="show-image">
            </div>

            <div class="image-btn">
                <h4>Select Cover</h4>
                <input type="file" id="select-image"> 
            </div>
        </div>

        <div class="for-title">
            <label for="title">Board Title</label>
            <input type="text" class="valid-title" id="projecttitle">
            <small class="valid-input">please insert something</small>
        </div>

        <div class="for-btn">
            <button type="button" id="createbutton">Create Board</button>
        </div>

</div>`,
showConfirmButton: false,
showCloseButton: true,
});
</script>



';



?>