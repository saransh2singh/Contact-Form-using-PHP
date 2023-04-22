<?php

    // print_r($_POST);
    $error = "";
    $successMessage = "";
    if($_POST){
        if(!$_POST["email"]){
            $error .= "An email address is required.<br>";
        }
        if(!$_POST["content"]){
            $error .= "An content address is required.<br>";
        }
        if(!$_POST["sub"]){
            $error .= "An subject address is required.<br>";
        }
        if($_POST['email'] && filter_var($_POST,FILTER_VALIDATE_EMAIL) === false ){
            $error .= "The email is invalid.<br>";
        }
        if($error != ""){
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form</p>'.$error.'</div>';
        }
        else{
            $emailto = "me@mydomain.com";
            $subject = $_POST['sub'];
            $content = $_POST['content'];
            $headers = "From: ".$_POST['email'];
            if(mail($emailto,$sub,$content,$headers)){
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent we\'ll get back to you ASAP.</div>';
            }
            else{
                $error = '<div class="alert alert-danger" role="alert"><p>Your message couldn\'t be sent please try again!</div>';
            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <h1>Get in touch!</h1>
    <div id="error"><?php echo $error.$successMessage; ?></div>
    <form method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="subject" class="form-label">Subject</label>
    <input type="text" class="form-control" id="subject" name="sub"> 
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <div class="mb-3">
  <label for="content" class="form-label">What would you like to ask us?</label>
  <textarea class="form-control" id="content" name="content" rows="3"></textarea>
</div>
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
    <script type="text/javascript">

        $("form").submit(function(e){
            // e.preventDefault();
        var error = "";
        if($("#email").val() == ""){
            error += "The email field is required.<br>";
        }
        if($("#subject").val() == ""){
            error += "The subject field is required.<br>";
        }
        if($("#content").val() == ""){
            error += "The content field is required.";
        }
        if(error != ""){
        $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form</strong></p>'+error+'</div>');
            return false;
    }
        else{
            return true;
            // $("form").unbind("submit").submit();
        }
    });
    </script> 

    

</body>
</html>

