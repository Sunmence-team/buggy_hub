<?php
 session_start();

 include('db_conn.php');

 $mssg = "";
 $success_message = "";
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ratings = $_POST['ratings'];
    $select_item = $_POST['select_item'];
    $suggestions = $_POST['suggestions'];
    $message = $_POST['message'];

    if((($name && $email && $ratings && $select_item && $suggestions && $message) == "")){
      $_SESSION['form_data']= $_POST;
        echo "Kindly fill the form";
    } else{
 
      if(isset($email)){
        $row = "SELECT * FROM `hub` where `email` = '$email'";
        $result = mysqli_query($conn, $row);
  
        $result = mysqli_num_rows($result);
  
          if($result>0){
            $mssg = "Email already exist in database";
            // echo $mssg;
          } else{
            $collect = "INSERT INTO `hub`( `name`, `email`, `ratings`, `select_item`, `suggestions`, `message`) VALUES ('$name','$email', '$ratings','$select_item','$suggestions','$message')";
            if (mysqli_query($conn, $collect)) {
              $success_message = "Review Recieved Successfully!";
              
              
              unset($_SESSION['form_data']);
          } else {
              $mssg = "Error: " . $collect . "<br>" . mysqli_error($conn);
          }
            
  
          }
      }
    }

  }














?>













 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="buggy.css">
    <link rel="stylesheet" href="bootstrap-5.2.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="icons files/css/all.css">
</head>
<body>
    

    <div class="general">
        <div class="container">
            <div class="asset">
                <img src="images/Asset 117.png" alt="" width="100%">
            </div>
           <div class="row row-cols-4 every">
              <div class="col col-lg-6 col-12 system">
                
                  <h1>Customers <br> Review System</h1>
                  <p>Kindly help us fill the form to know your thought on our services</p>
                  
                  <img src="images/rate.webp" alt="" width="100%" class="help">
              </div>

              <div class="col col-lg-6 col-12">
                <div class="form-outer">
                    <div class="container"> 
                        <form method="POST" class="form" enctype="multipart/form-data">
                        
                            <div class="container p-4">
                                <h5>Your feedback helps us understand what we're doing right and where we can improve.</h5>
                                <div class="output">
                          <?php
                           echo $mssg;
                            echo '<p class="success-message">' .  $success_message . '</p>';
                          ?>
                        </div>
                            </div>
                            
                            <div class="form-input">
                                
                                <span class="icon"><i class="fa-solid fa-signature"></i></span>
                                <input type="text" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="form-input">
                                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="rating">
                                  <h6>How was the quality of the hub?</h6>
                                  <div class="rate">
                                     <input type="radio" id="star5" name="ratings" value="5" required>
                                     <label for="star5">&#9733;</label>
                                     <input type="radio" id="star4" name="ratings" value="4" required>
                                     <label for="star4">&#9733;</label>
                                     <input type="radio" id="star3" name="ratings" value="3" required>
                                     <label for="star3">&#9733;</label>
                                     <input type="radio" id="star2" name="ratings" value="2" required>
                                     <label for="star2">&#9733;</label>
                                     <input type="radio" id="star1" name="ratings" value="1" required>
                                     <label for="star1">&#9733;</label>
                                    <!-- <input type="hidden" name="ratings" id="ratingsInput" value="0" required> -->
                                  </div>   
                             </div>
                            <div class="how">
                                <h6>How you found us?</h6>
                                <div class="select">
                                    <select name="select_item" id="" aria-placeholder="Open this select menu" required>
                                        <option value="">Open this select menu</option>
                                        <option value="Online post">Online post</option>
                                        <option value="Through referral">Through referal </option>
                                        <option value="Banners">Banners </option>
                                    </select>
                                </div>
                             </div>
                             
                             <h6>Your suggestions on how we can improve</h6>
                             <div class="suggestion">
                                <textarea name="suggestions" id="" cols="30" rows="10" placeholder="e.g Please help us adjust the timing" required></textarea>
                               
                             </div>
                             <h6>What do you enjoy about buggy hub?</h6>
                             <div class="enjoy">
                                   <textarea name="message" id="" cols="30" rows="10" placeholder="e.g I enjoy the constant power supply" required></textarea>
                                
                             </div>
          
                          <div class="form-button">
                              <button type="submit" name="submit">Rate Us</button>
                          </div>
                            
                          
                        </form>
                    </div>
                 </div>
              </div>
           </div>
         </div>
     </div>


















    <!-- <script src="https://kit.fontawesome.com/351943b51e.js" crossorigin="anonymous"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
















    <script src="buggy.js"></script>


    <!-- <script src="https://kit.fontawesome.com/351943b51e.js" crossorigin="anonymous"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>