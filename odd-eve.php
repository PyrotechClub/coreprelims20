<?php
session_start();

// checks if user has selected an option
    if(isset($_POST['move'])){
        $err = "";
        $move = $_POST['move'] + 0;
        // checks the user input
        if (!is_int($move)) {
            $err = "Stop Trying to be Heccurman.";
        }

        if ($move > 6 or $move <= 0) {  
            $err = "Stop Trying to be Heccurman.";
        }
   
        //processes user input
        elseif($move <= 6 && $move > 0){
            $comp = rand(1,6);
            
            if(isset($_SESSION['score'])){
                if($move == $comp){
                    $result = "Out! Looks like the Opponent is Winning...";
                    $compMove = "The computer played a " . $comp ;
                    $finalScore = "You Scored " . $_SESSION['score'] . " For Your Team!";
                    session_destroy();
                }
                else{
                    $compMove = "The computer played a " . $comp ;
                    $result = "You scored " . $move . " runs for your team!";
                    $_SESSION['score'] = $_SESSION['score'] + $move;
                }
            }
            if(!isset($_SESSION['score'])){
                if($move == $comp){
                    $result = "Out! Looks like the Opponent is Winning...";
                    $compMove = "The computer played a " . $comp;
                    $finalScore = "You Scored " . $_SESSION['score'] . " For Your Team!";
                    session_destroy();
                }
                else{
                    $compMove = "The computer played a " . $comp ;
                    $result = "You scored " . $move . " runs for your team!";
                    $_SESSION['score'] = $move;
                }
            }
        }
    }

    else{
        $err = "Please Play a Move";
    }
    

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description"
        content="Tagore International School, Vasant Vihar's entry for COЯE 13 creative event. (╯°□°）╯︵ ┻━┻">
    <meta name="keywords" content="GPL, GPL4, gpl, gpl4">
    <meta name="author" content="Pyrotech Club">
    <link
        href="https://fonts.googleapis.com/css2?family=Dosis&family=Open+Sans&family=Poiret+One&family=Raleway&display=swap&family=Poppins:wght@500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fullpage.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.6/jquery.fullPage.min.css" />
    <link rel="icon" href="lib/favicon.png" sizes="26x26" type="image/png">
    <link href='main.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <title>GPL 4 | Ball go brrrrrr.</title>
</head>

<body>

    <!--- jetha MODE SWITCH --->

    <div class="theme-switch-wrapper">
        <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round">
                <center>
                    <img src="lib/jetha.png" class="mehta" title="Jetha ke Jaanbaaz">
                    <img src="lib/mehta.png" class="jetha" title="Mehta ke Maharathi">
                </center>
            </div>
        </label>
    </div>

    <!-- FULLPAGE -->

    <div id="fullpage">

        <!-- HOME -->

        <section class="section text-light game" id="home">
            <div class="row contents">
                <div class="col-md-1"></div>
                <div class="col-md-10 align-center">
                    <div class="heading">

                        <h3 id="score">
                            <?php echo "Your score:";  if(isset($_SESSION['score'])){echo $_SESSION['score'];}   ?></p>
                            <form method="post" action="odd-eve.php">
                                <input type="radio" class="checkbox-tools" name="move" class="bloop" value="1" id="1"></input>
                                <label class="for-checkbox-tools" for="1">
                                    <img src="lib/one.png">
                                </label>
                                <input type="radio" class="checkbox-tools" name="move" class="bloop" value="2" id="2"></input>
                                <label class="for-checkbox-tools" for="2">
                                    <img src="lib/two.png">
                                </label>
                                <input type="radio" class="checkbox-tools" name="move" class="bloop" value="3" id="3"></input>
                                <label class="for-checkbox-tools" for="3">
                                    <img src="lib/three.png">
                                </label>
                                <input type="radio" class="checkbox-tools" name="move" class="bloop" value="4" id="4"></input>
                                <label class="for-checkbox-tools" for="4">
                                    <img src="lib/four.png">
                                </label>
                                <input type="radio" class="checkbox-tools" name="move" class="bloop" value="5" id="5"></input>
                                <label class="for-checkbox-tools" for="5">
                                    <img src="lib/five.png">
                                </label>
                                <input type="radio" class="checkbox-tools" name="move" class="bloop" value="6" id="6"></input>
                                <label class="for-checkbox-tools" for="6">
                                    <img src="lib/six.png">
                                </label>
                                <br>
                                <?php if(isset($err)){echo $err . "<br/>";}?>
                                <input type="submit" value="play">
                            </form>
                            <h5 id="compMove"><?php if(isset($compMove)){echo $compMove;} ?></p>
                                <h5 id="result"><?php if(isset($result)){echo $result;} ?></p>
                                    <h5><?php if(isset($finalScore)){echo $finalScore;} ?></h5>
                                    <h5><a href="index.php">Back to Home</a></h5>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </section>
        <!-- FOOTER -->

        <section class="section fp-auto-height" id="footer">
            <div class="row contents">
                <div class="col-md-1"></div>
                <div class="col-md-10 align-center">
                    <div class="footer-text">
                        <div class="footer-copy font-alt">
                            <img src="lib/logo-text.png" alt="" class="footer-img">
                            <br><br><br>
                        </div>
                        <big>
                            <p class="footer-made"> Made By: Naman Chandok, Namya Chhabra and Shaivi Shewaramani</p>
                        </big>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </section>

    </div>

    <script type="text/javascript" src="fontawesome.js"></script>
    <script type="text/javascript" src="fullpage.js"></script>
    <script type="text/javascript" src="scrolloverflow.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.6/jquery.fullPage.min.js"></script>
    <script type="text/javascript">
        // FULLPAGE


        var myFullpage = new fullpage('#fullpage', {
            scrollOverflow: true,
            sectionsColor: ['rgba(0,0,0,0.7)', '#eee']
        });

        // MEHTA MODE

        const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

        function switchTheme(e) {
            if (e.target.checked) {
                document.documentElement.setAttribute('data-theme', 'jetha');
            } else {
                document.documentElement.setAttribute('data-theme', 'mehta');
            }
        }
        // SAVE PREFERENCE TO LOCAL STORAGE
        toggleSwitch.addEventListener('change', switchTheme, false);

        function switchTheme(e) {
            if (e.target.checked) {
                document.documentElement.setAttribute('data-theme', 'jetha');
                localStorage.setItem('theme', 'jetha');
            } else {
                document.documentElement.setAttribute('data-theme', 'mehta');
                localStorage.setItem('theme', 'mehta');
            }
        }
        // CHECK LOCAL STORAGE FOR PREFERENCE
        const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;
        if (currentTheme) {
            document.documentElement.setAttribute('data-theme', currentTheme);

            if (currentTheme === 'jetha') {
                toggleSwitch.checked = true;
            }
        }
    </script>
</body>

</html>

<!--
   ____     ____
   |   \    |   \     |     |   |    |
   | |\ \   | |\ \    |     |   |    |
   | |/ /   | |/ /    |     |   |    |
   |   /    |___/     |     |   |____|
   |   \    |   \     |     |   |    |
   | |\ \   |    \    |     |   |    |
   | |/ /   |     \   |     |   |    |
   |___/    |      \  \_____/   |    | 
-->