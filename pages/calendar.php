<?php
include "../scripts/dash.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <script src="../scripts/dashfunction.js"></script>
    
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('cal');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
      </script>

    <title>Project Orbit | Dashboard</title>
</head>
<body>
    <section class="outer-body">
        
    <!-- main content -->
        <main class="right-sec">
            <header class="navigation">
                
                <button class="notif">
                    <i class="fa-solid fa-bell fa-xl"></i>
                </button>

                <button class="user">
                    <img src="../images/profile.jpg" alt="">
                    <h1>Junn jr</h1>
                    <i class="fa-solid fa-caret-down"></i>
                </button>

            </header>

            <section class="inner-contents" id="content-show">
              <!-- show contents of something -->
              <div id='cal'></div>
              
            </section>
        </main>

        <!-- SIDEBAR -->
        <main class="left-sec">    
            <aside class="sidebar">
                <button class="logo">
                    <img src="../images/logo_2.png" alt="">
                </button>
                
                <div class="menu">
                   <small> Main menu</small>

                   <button  id="navboard" value="showboard">
                   <i class="fa-solid fa-folder-closed fa-lg icon"></i>
                        Board
                   </button>
                   <button id="navmember" value="showmember">
                   <i class="fa-solid fa-user-group fa-lg icon "></i>
                        Members
                   </button>
                   <button class="selected" id="navcalendar" value="showcalendar">
                   <i class="fa-solid fa-calendar-days fa-lg icon"></i>
                        Calendar
                   </button>
                </div>
                
                <hr class="line">
                
                <div class="starred">
                    <small>Starred project</small>
                    <div class="pin-card">
                        <!-- this is ajax fetching query -->
                        <div class="card">
                            <button id="" value="">
                                <img src="../images/signup_bg.png" alt="">
                                project 1
                            </button>
                            <i class="fa-solid fa-star star" style="color: #ffbb00;"></i>
                        </div>        
                    </div>                
                </div>
            </aside>
        </main>

    </section>
    
    <div>


    </div>


</body>
</html>
