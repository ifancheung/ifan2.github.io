<?php
    $url_web = "https://ifanc.ardyslexiatoy.com/tools/sendemail/webform.php";
    $message_sent = false;  
    if(isset($_POST['email']) &&$_POST['email'] != ''){

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){

        // submit the form   
        $sname = $_POST['sname'];
        $semail = $_POST['semail'];
        $bccemail = $_POST['bccemail'];
        $replyemail = $_POST{'replyemail'};
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $messageSubject = $_POST['subject'];
        $message = $_POST['message'];    
       
        //mail setting
        $headers = "From: $sname<$semail>\r\n";
        $headers .= "Bcc: $bccemail\r\n";
        $headers .= "Reply-To: $replyemail\n";

        $to = "$userEmail";
        $body = "";
    
        //$body .= "姓名 Name: \r\n";
        $body .= "$userName, \r\n" ;
        $body .= "\r\n";
        //$body .= "電郵 Email: \r\n " ;
        //$body .= "$userEmail \r\n";
        //$body .= "\r\n";
        //$body .= "訊息 Message: \r\n";
        $body .= "$message \r\n";
        $body .= "\r\n";
        //$body .= "我們已收到您的信息，我們會盡快回覆您的訊息。若在兩個工作天內未收到回覆請直接電郵至info@ardyslexiatoy.com謝謝。 \r\n";
        //$body .= "\r\n";
        $body .= "===========\r\n";
        $body .= "\r\n";
        $body .= "$sname\r\n";


        mail($to,$messageSubject,$body,$headers);

        $message_sent = true;
        }
        else{
            $invalid_class_name = "form-invalid";
        }
    }
?>


<html lang="en">
<head>
    <title>Ifan | Free send email</title>
    <link rel="icon" href="mail.png" >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="webform.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script src="main.js"></script>
</head>

<body>
    <?php
    if($message_sent):
    ?>
       
        <p>
       <center><font size="10" color="white">Sent</font><br>
      <font size="6" color="white">請稍等，三秒後自動跳轉...</font><br></center>
        </p>

        <script language="JavaScript">
        function myrefresh(){
        window.location.href="<?php echo $url_web ?>";
        }
        setTimeout('myrefresh()',3000); //指定3秒跳轉
        </script>

    <?php
    else:
    ?>
    <div class="container">
        <form action="webform.php" method="POST" class="form">
            <font size="8" color="black">Send Email</font>
            <div class="form-group">
                <label for="name" class="form-label">Sender Name</label>
                <input type="text" class="form-control" id="same" name="sname" placeholder="Sender Name" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Sender Email</label>
                <input <?= $invalid_class_name ??"" ?> type="email" class="form-control" id="semail" name="semail" placeholder="Sender Email" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Bcc to (optional)</label>
                <input <?= $invalid_class_name ??"" ?> type="email" class="form-control" id="bccemail" name="bccemail" placeholder="Bcc to" tabindex="3">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Reply to (optional)</label>
                <input <?= $invalid_class_name ??"" ?> type="email" class="form-control" id="replyemail" name="replyemail" placeholder="Reply to" tabindex="4">
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Receiver's Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Receiver's Name" tabindex="5" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Receiver's Email</label>
                <input <?= $invalid_class_name ??"" ?> type="email" class="form-control" id="email" name="email" placeholder="Reciever's Email" tabindex="6" required>
            </div>
            <div class="form-group">
                <label for="subject" class="form-label">Email Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Please enter the email subject" tabindex="7" required>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Please enter the message" tabindex="8"></textarea>
            </div>
            <div>
               <center> <button  type="submit" class="btn">Send</button></center>
            </div>
        </form>
    </div>
    <?php
    endif;
    ?>
</body>

</html>