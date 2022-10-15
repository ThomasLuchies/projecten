<!DOCTYPE html>
<html>
  <head>
    <title>Estado</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <link href="fonts/1848.otf" rel="font/otf">
    <link href="fonts/1849.otf" rel="font/otf">
    <link href="fonts/1850.otf" rel="font/otf">
    <link href="fonts/1851.otf" rel="font/otf">
    <link href="fonts/Avenir.ttc" rel="font/collection">
    <?php
        $conn = mysqli_connect("localhost", "root", "", "Webshop");
        session_start();
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php
        include("loginAndSignup.php");
    ?>
    <div id="container">
      <?php
        include("header.php");
      ?>
      <div id="serviceMain">
          <p id="pageLocation"><a href="index.php">HOME</a> | <strong>SERVICE</strong></p>
          <div id="serviceMainCenter">
            <div id="serviceMainCenterContent">
              <div id="serviceMainCenterTop">
                <div class="serviceMainCenterTopSide">
                  <h1>FAQ</h1>
                  <div class="questionMain" onclick="showQuestionMain()">
                  </div>
                  <div class="questionContentMain" id="questionMain">
                    <div class="question" onclick="showQuestionContent(0)">
                      <p>Question 1</p>
                    </div>
                    <div class="questionContent">
                    </div>
                    <div class="question" onclick="showQuestionContent(1)">
                      <p>Question 2</p>
                    </div>
                    <div class="questionContent">
                    </div>
                    <div class="question" onclick="showQuestionContent(2)">
                      <p>Question 3</p>
                    </div>
                    <div class="questionContent">
                    </div>
                    <div class="question" onclick="showQuestionContent(3)">
                      <p>Question 4</p>
                    </div>
                    <div class="questionContent">
                    </div>
                    <div class="question" onclick="showQuestionContent(4)">
                      <p>Question 5</p>
                    </div>
                    <div class="questionContent">
                    </div>
                    <div class="question" onclick="showQuestionContent(5)">
                      <p>Question 6</p>
                    </div>
                    <div class="questionContent">
                    </div>
                  </div>
                </div>
                <div class="serviceMainCenterTopSide" id="serviceMainCenterTopSideRight">
                  <h1>DEAR CUSTOMER</h1>
                  <p>
                    If you have any questions about our services or products. You can find answers in our frequently asked questions.
                  </p>
                  <h1>Did you not find your question</h1>
                  <p>
                    Please scroll down to contact us so we can help you with your question. We try to respond as quickly as possible and solve your problem.
                  </p>
                </div>
              </div>
              <h1>Contact us.</h1>
              <form method="post">
                <input type="text" name="fName" placeholder="Firstname"/>
                <input type="text" name="lName" placeholder="Lastname"/>
                <input type="text" name="email" placeholder="Email"/>
                <select id="questionSelect" name="question">
                  <option value="question1">question1</option>
                  <option value="question2">question2</option>
                  <option value="question3">question3</option>
                  <option value="question4">question4</option>
                  <option value="other">other</option>
                </select>
                <input type="text" id="otherQuestion" name="otherQuestion" placeholder="Enter your question." />
                <textarea name="description" placeholder="Describe your problem."></textarea>
                <input type="submit" name="submitForm" value="Send"/>
              </form>
              <?php
                function addSupportToDatabase($conn)
                {
                  $conn = mysqli_connect("localhost", "root", "", "Webshop");
                  $firstName = filter_input(INPUT_POST, "fName", FILTER_SANITIZE_STRING);
                  $lastName = filter_input(INPUT_POST, "lName", FILTER_SANITIZE_STRING);
                  $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
                  $questionSelect = trim($_POST["question"]);
                  $otherQuestion = filter_input(INPUT_POST, "otherQuestion", FILTER_SANITIZE_STRING);
                  $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
                  if($firstName && $lastName && !empty($_POST["email"]))
                  {
                    if($email)
                    {
                      if($questionSelect == "other")
                      {
                        $question = $otherQuestion;
                        if(empty($otherQuestion))
                        {
                          echo "please enter your question.";
                          return false;
                        }
                      }
                      else
                      {
                        $question = $questionSelect;
                      }
                      if($description)
                      {
                        $sql = "INSERT INTO support VALUES (null, ?, ?, ?, ?, ?)";
                        if($stmt = mysqli_prepare($conn, $sql))
                        {
                          mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $question, $description);
                          if(mysqli_stmt_execute($stmt))
                          {
                            $to = "support@estadoclothing.com";
                            $subject = $question;
                            $message = "Name: " . $firstName . " " . $lastName . "<br>Email: " . $email . "<br>Question: " . $question . "<br>" . $description;
                            $header = "From: " . $email;
                            mail($to, $subject, $message, $header);
                          }
                          else
                          {
                            echo mysqli_error($conn);
                          }
                        }
                        else
                        {
                          echo mysqli_error($conn);
                        }
                        mysqli_stmt_close($stmt);
                      }
                      else
                      {
                        echo "Please enter a description of your problem";
                      }
                    }
                    else
                    {
                      echo "Invalid email.";
                    }
                  }
                  else
                  {
                      echo "please fill in all the fields";
                  }
                }
                if(isset($_POST["submitForm"]))
                {
                  addSupportToDatabase($conn);
                }
              ?>
            </div>
          </div>
      </div>
      <?php
        include("footer.php");
      ?>
    </div>
    <script src="javascript/getCookie.js"></script>
    <script src="javascript/cart.js"></script>
    <script src="javascript/account.js"></script>
    <script src="javascript/service.js"></script>
  </body>
</html>
