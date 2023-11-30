<?php
include "processor.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Masculinity Test</title>
</head>
<body>
    <h1><span class="italics">Nguvu ~</span> T<i class="fa-regular fa-star"></i>st</h1>
    <div class="main">
        <?php 
        if (isset($_SESSION['username'])/* && !isset($_SESSION['gender'])*/) { 
            $userform = "";
            $test = "show";
        }
        else{
            $test = "";
            $userform = "active";
        }
        ?>
        <div class="welcome-form section <?php echo $userform ?>">
            <form action="" class="welomeform" id="user-data">
            <h3> Let's get you started</h3>
                <div class="inputSection">
                    <label for="username">Your Name:</label>
                    <input type="text" id="username" placeholder="John">
                </div>
                <div class="inputSection">
                    <label for="username">Gender</label>
                    <?php getGenderOptions($genders) ?>
                </div>
                <input type="submit" class="proceed" value="Proceed">
            </form>
        </div>
        <div class="section quiz <?php echo $test ?>">
            <section class="topnav">
                <?php if (isset($_SESSION['username'])) {
                    ?>
                    <p class="username"><?php echo $_SESSION['username'] ?></p>
                    <?php
                }?>
                <span class="reset" title="Reset"><i class="fa-solid fa-power-off"></i></span>
            </section>
            <section class="dynamic">
                <?php getQuestion($questions, $answers); ?>
            </section>
            <section class="controls">
                <span class="control" id="previous"><i class="fa-solid fa-arrow-left"></i></span>
                <span class="control" id="next"><i class="fa-solid fa-arrow-right"></i></span>
            </section>
        </div>
    </div>
</body>
<script src="app.js"></script>
</html>