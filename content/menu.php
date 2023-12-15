

<!-- bOARD -->
<?php
if(isset($_POST['isboard'])){
    echo'
    <main class="board" id="board">
    ';
?>
                <div class="sorter">

                    <div>
                        <label for="sort">Sort by</label>
                        <select name="" id="">
                            <option value="">Sort by date</option>
                        </select>
                    </div>

                    <div>
                        <button>search</button>
                        <input type="text">
                    </div>

                    </div>
                    <div class="cards">
                    <div id="create-proj">
                        <button id="newproj">
                            Create board
                            <i class="fa-regular fa-plus fa-lg create-icon "></i>
                        </button>
                    </div>

                    <div style="background-image: url();" id="exisproj">
                        <button id="proj" value="">
                            Title name
                        </button>
                        
                            <i class="fa-solid fa-star star" style="color: #ffbb00;"></i>
                        
                            <!-- <i class="fa-regular fa-star star" style="color: #ffbb00;"></i> -->

                    </div>

                </div>
<?php 
    echo '
            </main>
    ';
}
?>


<!-- MEMBER -->
<?php
if(isset($_POST['ismember'])){
    echo'
    <main class="member" id="member">
    ';
?>
          
          <table id="myTable" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>


<?php
    echo '
    </main>
    ';
}
?>

<!-- calendar -->
<?php
if(isset($_POST['iscalendar'])){
    echo'
    ';
}
?>



