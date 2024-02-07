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
    <h1><span class="italics">Masculinity ~</span> T<i class="fa-regular fa-star"></i>st</h1>
    <div class="main">
        <?php 
        if (isset($_SESSION['username']) && isset($_SESSION['gender'])) { 
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
                    <input type="text" id="username" name="username" placeholder="John" required>
                </div>
                <div class="inputSection">
                    <label for="gender">Gender</label>
                    <?php getGenderOptions($genders) ?>
                </div>
                <input type="submit" class="proceed" value="Proceed">
            </form>
        </div>
        <div class="section quiz <?php echo $test ?>">
            <section class="topnav">
                <div class="user-details">
                    <p class="username"><?php echo $_SESSION['username']?></p>
                    <span class="gender"><?php echo $_SESSION['icon']?></span>
                </div>
                <span class="reset" title="Reset"><i class="fa-solid fa-power-off"></i></span>
            </section>
            <section class="dynamic">
                <?php
                if (isset($_SESSION['username']) AND isset($_SESSION['gender'])) {
                    getQuestion($questions, $answers); 
                }
                else {
                    echo '<span class="loginbtn" title="Reset"><i class="fa-solid fa-power-off"></i></span>';
                }
                ?>
            </section>
            <section class="controls">
                <span class="control" id="previous"><i class="fa-solid fa-arrow-left"></i></span>
                <span class="control" id="next"><i class="fa-solid fa-arrow-right"></i></span>
            </section>
        </div>
        <div class="section analysis" id="analysis">
            <h3 class="">Analysing the Result</h3>
                <p>Most males will score between 0-180 and most
                    females, 150-300. Brains that are 'wired' for mainly
                    masculine thinking usually score below 150. The closer 
                    to 0 they are, the more masculine they are, and the 
                    higher their testosterone level is likely to be. These
                    people demonstrate strong logical, analytical and
                    verbal skills and tend to be disciplined and wellorganised. The closer to 0 they score, the better they are 
                    at projecting costs and planning outcomes for statistical 
                    data, with their emotions hardly influencing them at all. 
                    Scores in the minus range are high masculine scores. These scores show that large amounts of testosterone were present in the early stages of the foetal development. The lower the score for a woman, the more likely she will be to have lesbian tendencies. Brains that are wired for mainly feminine thinking will score higher than 180. The higher the number, the more feminine the brain will be, and the more likely the person is to demonstrate significant creative, artistic and musical talents. They will make more of their decisions on intuition or gut feeling, and are good at recognising problems using minimal data. They are also good at solving problems using creativity and insight.
                    The higher the score is above 180 for a man, the greater the chance he will be gay.
                    Males who score below 0 and women who score
                    above 300 have brains that are wired so oppositely that 
                    the only thing they are likely to have in common is that 
                    they live on the same planet! Scores between 150-180 show compatibility of
                    thought for both sexes, or a foot in both sexual camps. These people do not show a bias for either male or female thinking and usually demonstrate a flexibility in thinking that can be a significant advantage to any group who are going through a problem-solving process. They have the predisposition to make friends with both men and women.
                </p>
        </div>
    </div>
</body>
<script src="app.js"></script>
</html>
