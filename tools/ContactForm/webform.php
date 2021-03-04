<?php
    $url_web = "https://ifanc.ardyslexiatoy.com";
    $message_sent = false;  
    if(isset($_POST['email']) &&$_POST['email'] != ''){

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){

        // submit the form   
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $messageSubject = $_POST['subject'];
        $message = $_POST['message'];    
       
        //mail setting
        $headers = "From: Ifan <ifancheung@ardyslexiatoy.com>\r\n";
        $headers .= "Bcc: ifancheung@ardyslexiatoy.com\r\n";
        $headers .= "Reply-To: ifancheung@ardyslexiatoy.com\r\n";

        $to = "$userEmail";
        $body = "";
    
        $body .= "姓名 Name: \r\n";
        $body .= "$userName \r\n" ;
        $body .= "\r\n";
        $body .= "電郵 Email: \r\n " ;
        $body .= "$userEmail \r\n";
        $body .= "\r\n";
        $body .= "訊息 Message: \r\n";
        $body .= "$message \r\n";
        $body .= "\r\n";
       // $body .= "我們已收到您的信息，我們會盡快回覆您的訊息。若在兩個工作天內未收到回覆請直接電郵至info@ardyslexiatoy.com謝謝。 \r\n"
        //$body .= "\r\n";
        $body .= "===========\r\n";
        $body .= "\r\n";
        $body .= "Ifan\r\n";


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
    <title>C.A.R.D. | 聯絡我們</title>
    <link rel="icon" href="/Sources/img/WebLogo2.png" >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="webform.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script src="main.js"></script>
</head>

<body>
    <?php
    if($message_sent):
    ?>
       
        <p>
       <center><font size="10" color="white">感謝您的訊息，我們將盡快回覆!</font><br>
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
            <font size="8" color="black">聯絡我們</font>
            <div class="form-group">
                <label for="name" class="form-label">姓名 Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="John" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">電郵 Email</label>
                <input <?= $invalid_class_name ??"" ?> type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="subject" class="form-label">主題 Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="請輸入有關查詢內容的主題" tabindex="3" required>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">訊息 Message</label>
                <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="請輸入訊息內容" tabindex="4"></textarea>
            </div>
            <div>
               <center> <button  type="submit" class="btn">提交 Submit</button></center>
            </div>
        </form>
    </div>
    <?php
    endif;
    ?>
</body>

</html>