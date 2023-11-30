<?php
include "connect.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$genders = ['Female', 'Male', 'Trans', 'Prefer Not To Say'];
$_SESSION['majribu'] = "MAjaribio";
$questions = [
    "When it comes to reading a map or street directory you:",
    "You're cooking a complicated meal with the radio playing and a friend phones. Do you:",
    "Friends are coming to visit and ask for directions to your new house. Do you:",
    "When explaining an idea or concept, are you more likely to:",
    "When coming home from a great movie, you prefer to:",
    "In a cinema, you usually prefer to sit:",
    "A friend has something mechanical that won't work. You would:",
    "You're in an unfamiliar place and someone asks you where North is. You:",
    "You've found a parking space but it's tight and you must reverse into it. You would:",
    "You are watching TV when the telephone rings. You would:",
    "You've just heard a new song by your favorite artist. Usually you:",
    "You are best at predicting outcomes by:",
    "You've misplaced your keys. Would you:",
    "You're in a hotel room and you hear the distant sound of a siren. You:",
    "You go to a social meeting and are introduced to seven or eight new people. The next day you:",
    "You want to go to the country for your holiday but your partner wants to go to a beach resort. To convince them your idea is better, you:",
    "When planning your day's activities, you usually:",
    "A friend has a personal problem and has come to discuss it with you. You:",
    "Two friends from different marriages are having a secret affair. How likely are you to spot it?",
    "What is life all about, as you see it?",
    "Given the choice, you would prefer to work:",
    "The books you prefer to read are:",
    "When you go shopping you tend to:",
    "You prefer to go to bed, wake up and eat meals:",
    "You've started a new job and met lots of new people on the staff. One of them phones you when you are at home. You would:",
    "What upsets you most when arguing with someone?",
    "In school how did you feel about spelling tests and writing essays?",
    "When it comes to dancing or jazz routines, you:",
    "How good are you at identifying and mimicking animal sounds?",
    "At the end of a long day, you usually prefer to:"
];

$answers = [
    "Have difficulty and often ask for help; Turn it round to face the direction you're going; Have no difficulty reading maps or street directories",
    "Leave the radio on and continue cooking while talking on the phone; Turn the radio off, talk and keep cooking; Say you'll call them back as soon as you've finished cooking",
    "Draw a map with clear directions and send it to them or get someone else to explain how to get there; Ask what landmarks they know then try to explain to them how to get there; Explain verbally how to get there: 'Take the M3 to Newcastle, turn off, turn left, go to the second traffic lights... '",
    "Use a pencil, paper and body language gestures; Explain it verbally using body language and gestures; Explain it verbally, being clear and concise",
    "Picture scenes from the movie in your mind; Talk about the scenes and what was said; Quote mainly what was said in the movie",
    "On the right side; Anywhere; On the left side",
    "Sympathize, and discuss how they feel about it; Recommend someone reliable who can fix it; Figure out how it works and attempt to fix it for them",
    "Confess you don't know; Guess where it is, after a bit of thought; Point towards North without difficulty",
    "Rather try to find another space; Carefully attempt to back into it; Reverse into it without any difficulty",
    "Answer the phone with the TV on; Turn the TV down and then answer; Turn the TV off, tell others to be quiet and then answer",
    "Can sing some of the song afterwards without difficulty; Can sing some of it afterwards if it's a really simple song; Find it hard to remember how the song sounded but you might recall some of the words",
    "Using intuition; Making a decision based on both the available information and 'gut feeling'; Using facts, statistics, and data",
    "Do something else until the answer comes to you; Do something else, but keep trying to remember where you put them; Mentally retrace your steps until you remember where you left them",
    "Couldn't identify where it's coming from; Could probably point to it if you concentrate; Could point straight to where it's coming from",
    "Can easily picture their faces; Would remember a few of their faces; Would be more likely to remember their names",
    "Tell them sweetly how you feel: you love the countryside and the kids and family always have fun there; Tell them if they go to the country you'll be grateful and will be happy to go to the beach next time; Use the facts: the country resort is closer, cheaper, and well-organized for sporting and leisure activities",
    "Write a list so you can see what needs to be done; Think of the things you need to do; Picture in your mind the people you will see, places you will visit, and things you'll be doing",
    "Are sympathetic and understanding; Say that problems are never as bad as they seem and explain why; Give suggestions or rational advice on how to solve the problem",
    "You could spot it very early; You'd pick up on it half the time; You'd probably miss it",
    "Having friends and living in harmony with those around you; Being friendly to others while maintaining personal independence; Achieving worthwhile goals, earning others' respect and winning prestige and advancement",
    "In a team where people are compatible; Around others but maintaining your own space; By yourself",
    "Novels and fiction; Magazines and newspapers; Non-fiction, autobiographies",
    "Often buy on impulse, particularly the specials; Have a general plan but take it as it comes; Read the labels and compare costs",
    "Whenever you feel like it; On a basic schedule but you are flexible; At about the same time each day",
    "Find it easy to recognize their voice; Recognize it about half the time; Have difficulty identifying the voice",
    "Their silence or lack of response; When they won't see your point of view; Their probing or challenging questions and comments",
    "Found them both fairly easy; Were generally OK with one but not the other; Weren't very good at either",
    "Can 'feel' the music once you've learned the steps; Can do some exercises or dances, but get lost with others; Have difficulty keeping time or rhythm",
    "Not very good; Reasonable; Very good",
    "Talk to friends or family about your day; Listen to others talk about their day; Read a paper, watch TV and not talk"
];
function getGenderOptions($genders){
    if (isset($_SESSION['gender'])) {
        $currentgender = $_SESSION['gender'];
    }
    else{
        $currentgender = "";
    }
    foreach ($genders as $gender) {
        if($gender==$currentgender){
            ?>
            <input type="radio" name="gender" class="gender" id="<?php echo $gender ?>" value="<?php echo $gender ?>" checked>
            <?php
        }
        else{
            ?>
            <input type="radio" name="gender" class="gender" id="<?php echo $gender ?>" value="<?php echo $gender ?>">
            <?php
        }
        if ($gender=="Male") {
            $icon = '<i class="fa-solid fa-person"></i>';
        }
        else if($gender == "Female"){
            $icon = '<i class="fa-solid fa-person-dress"></i>';
        }
        else{
            $icon = '<i class="fa-solid fa-transgender"></i>';
        }
        ?>
        <label class="genderClass" for="<?php echo $gender ?>"><?php echo "$icon $gender" ?></label>
        <?php
    }
}
function nextQuestion($questions){
    if ($_SESSION['number']<count($questions)) {
        $_SESSION['number']++;   
    }
    else{
        $_SESSION['number'] = 1;
    }
}
function previousQuestion($questions){
    if ($_SESSION['number']>1) {
        $_SESSION['number']--;
    }
    else{
        $_SESSION['number'] =  count($questions);
    }
}
function getQuestion($questions, $answers){
    if (isset($_SESSION['username'])) {
    $no = $_SESSION['number'];
    $no--;
    $number = 0;
    $choices = ['a', 'b', 'c'];
    $question = $questions[$no];
    $answer = $answers[$no];
    $options = explode(';', $answer);
    ?>
    <section class="question">
        <p class="swali"><?php echo $question ?></p>
    </section>
    <section class="answers">
    <?php
    if(!empty($_SESSION['answers'][$_SESSION['number']])) {
        $selectedanswer = $_SESSION['answers'][$_SESSION['number']];
    }
    else{
        $selectedanswer = "";
    }
    foreach($options as $option){
        $choice = $choices[$number];
        ?>
        <?php
            if ($selectedanswer==$choice) {
        ?>
            <input type="radio" name="choices" class="choice" id="<?php echo $choice ?>" checked>    
        <?php
            }
            else{
        ?>
            <input type="radio" name="choices" class="choice" id="<?php echo $choice ?>">
        <?php
            }
        ?>
            <label for="<?php echo $choice ?>" class="option"><?php echo $option ?></label>
        <?php
        $number++;
    }
    ?>
    </section>
    <section class="number">
        <p><?php echo $_SESSION['number']."/".count($questions) ?></p>
    </section>
    <?php
    }
    else{
        ?>
        <p class="message">Oops, Something happened</p>
        <?php
    }
}
function getTotal($questions){
    //$gender = $_SESSION['gender'];
    $gender = "Male";
    $answers = $_SESSION['answers'];
    $numofanswers = count($answers);
    $total = 0;
    if ($numofanswers<count($questions)) {
        $remaining = count($questions);
        $remaining =$remaining - $numofanswers;
        $remaindertotal = $remaining*5;
    }
    else{
        $remaindertotal = 0;
    }
    foreach ($answers as $answer) {
        switch ($answer) {
            case 'a':
                if($gender=="Male"){
                    $total= $total + 10;
                }
                else{
                    $total =$total + 15;
                }
                break;
            case 'b':
                $total = $total+5;
                break;
            case 'c':
                $total=$total-5;
                break;
            default:
                $total+=0;
                break;
        }
    }
    $total += $remaindertotal;
    return $total;
}
function saveResult($con, $username, $gender, $email, $result){
    $gender = 1;
    $saveResult = mysqli_query($con, "INSERT INTO `results` (`User ID`, `NAME`, `EMAIL`, `GENDER`, `RESULT`, `DATE`)
                                                    VALUES (NULL, '$username', '$email', '$gender', '$result', 'current_timestamp()')");
     if($saveResult){
        $notification = "Saved Successfully";
        echo $notification;
        return true;
        
     }
     else{
        $notification = "Failed to Saved";
        echo $notification;
     }

}
if(isset($_POST['name']) /*&& isset($_POST['gender'])*/){
    $username = $_POST['name'];
    $gender = $_POST['gender'];
    $number = 1;
    $_SESSION['number'] = $number;
    $_SESSION['username'] = $username;
    
    getQuestion($questions, $answers);
}
if (isset($_POST['getusername'])) {
    $_SESSION['majribu'] = "Teshting";
    $username = $_SESSION['majribu'];
    echo $_SESSION['majribu'];
}
if(isset($_POST['action'])){
    $action = $_POST['action'];
    if ($action=="next") {
        nextQuestion($questions);
    }
    else{
        previousQuestion($questions);
    }
    getQuestion($questions, $answers);
}
if(isset($_POST['selectedAnswer'])) {
    $seletedanswer = $_POST['selectedAnswer'];
    if (!isset($_SESSION['answers'])) {
        $_SESSION['answers'] = array();
    }
    $question = $_SESSION['number'];
    $_SESSION['answers'][$question] = $seletedanswer;
    if ($_SESSION['number']==(count($questions))) {
    ?>
    <div class="dynamic">
        <h1>Time for results</h1>
        <?php
        $username = mysqli_real_escape_string($con, $_SESSION['username'] );
       // $gender = mysqli_real_escape_string($con, $_SESSION['gemder'] );
        $gender =1;
       //$email = mysqli_real_escape_string($con, $_SESSION['email'] );
        $result = getTotal($questions);
        echo $result;
        echo $username;
        echo "Answered Questions".count($_SESSION['answers'])."/".count($questions);
        ?>
        <p id="points">Total Points: <?php $result?></p>
        <?php
        echo getTotal($questions);
        ?>
        <button id= "save" class="save">Save Result</button>
    </div>
    <?php
    }
    else{
        nextQuestion($questions);
        getQuestion($questions, $answers);   
    }
}
//Reset Session
if (isset($_POST['deed'])) {
    if ($_POST['deed']=="reset") {
        session_destroy();
    }
    elseif ($_POST['deed']=="save") {
        $username = mysqli_real_escape_string($con, $_SESSION['username'] );
       // $gender = mysqli_real_escape_string($con, $_SESSION['gemder'] );
        $gender =1;
       //$email = mysqli_real_escape_string($con, $_SESSION['email'] );
       $email = "xyz@x.com";
        $result = getTotal($questions);
       saveResult($con, $username, $gender, $email, $result);
    }
}
?>