<?php 
require "db_connect.php";
// include 'php/defaultavatar.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
session_start();
$email = "";
$lname = "";
$errors = array();

//if user signup button
// if(isset($_POST['signup'])){
//     $f_name = mysqli_real_escape_string($connect, $_POST['firstname']);
//     $l_name = mysqli_real_escape_string($connect, $_POST['lastname']);
//     $email = mysqli_real_escape_string($connect, $_POST['email']);
//     $cn = mysqli_real_escape_string($connect, $_POST['contactnumber']);
//      $avatar = mysqli_real_escape_string($connect, $_FILES['avatar']['name']);
//     $password = mysqli_real_escape_string($connect, $_POST['password']);
//     $cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);


//     if (strlen(trim($password)) < 8 ){
//         $errors["password"] = "Password must have atleast 8 characters.";
//     }
//     if(trim($password !== $cpassword)){
//         $errors['password'] = "Confirm password not matched!";
//     }
   
//     $email_check = "SELECT * FROM users WHERE email = '$email'";
//     $res = mysqli_query($connect, $email_check);
//     if(mysqli_num_rows($res) > 0){
//         $errors['email'] = "Email that you have entered is already exist!";
//     }
//     if(count($errors) === 0){
//         $encpass = password_hash($password, PASSWORD_BCRYPT);
//         $code = rand(999999, 111111);
//         $target = "images/".basename($_FILES['avatar']['name']);

//         $random_uid = (int)rand();

//         if (move_uploaded_file($_FILES['avatar']['tmp_name'],$target)) {
//               $insert_data = "INSERT INTO users (f_name, l_name, email,  contactnumber, password, code, avatar, google_id, userid)
//                         VALUES ('$f_name', '$l_name', '$email', $cn, '$encpass', '', '$avatar', '', {$random_uid})";
//             if(mysqli_query($connect,$insert_data)){
//                  echo ("<SCRIPT LANGUAGE='JavaScript'>
//             window.alert('Succesfully Registered')
//             window.location.href='login-user.php';
//             </SCRIPT>");
//             }
//         }
//         else{
//             $errors['insertion-error'] =  "There was a problem uploading image";
//         }
      
      // echo "<script>alert('Signup Sucessfully');location.href='login-user.php';</script>";
       
        

        //for sending verification code.
        // if($data_check){
        //     $subject = "Email Verification Code";
        //     $message = "Your verification code is $code";
        //     $sender = "From: mommystummyrestaurant@gmail.com";
        //     if(mail($email, $subject, $message, $sender)){
        //         $info = "We've sent a verification code to your email - $email";
        //         $_SESSION['info'] = $info;
        //         $_SESSION['email'] = $email;
        //         $_SESSION['password'] = $password;
        //         header('location: user-otp.php');
        //         exit();
        //     }else{
        //         $errors['otp-error'] = "Failed while sending code!";
        //     }
    //     }



    //     else{
    //         $errors['db-error'] = "Failed while inserting data into database!";
    //     }
    // }


//}
    //for email verification code.
    //if user click verification code submit button
    // if(isset($_POST['check'])){
    //     $_SESSION['info'] = "";
    //     $otp_code = mysqli_real_escape_string($connect, $_POST['otp']);
    //     $check_code = "SELECT * FROM users WHERE code = $otp_code";
    //     $code_res = mysqli_query($connect, $check_code);
    //     if(mysqli_num_rows($code_res) > 0){
    //         $fetch_data = mysqli_fetch_assoc($code_res);
    //         $fetch_code = $fetch_data['code'];
    //         $email = $fetch_data['email'];
    //         $code = 0;
    //         $status = 'verified';
    //         $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
    //         $update_res = mysqli_query($connect, $update_otp);
    //         if($update_res){
    //             $_SESSION['name'] = $name;
    //             $_SESSION['email'] = $email;
    //             header('location: index.php');
    //             exit();
    //         }else{
    //             $errors['otp-error'] = "Failed while updating code!";
    //         }
    //     }else{
    //         $errors['otp-error'] = "You've entered incorrect code!";
    //     }
    // }

    //if user click login button
    // if(isset($_POST['login'])){
    //     $email = mysqli_real_escape_string($connect, $_POST['email']);
    //     $password = mysqli_real_escape_string($connect, $_POST['password']);
    //     // $attempt = $_SESSION['hidden'];
    //     // $attemt=$_POST['hidden'];
    //     // $attempt=0;
    //     // if($attempt<4){

    //     // }
    //     $check_email = "SELECT * FROM users WHERE email = '$email'";
    //     $res = mysqli_query($connect, $check_email);
    //     if(mysqli_num_rows($res) > 0){
    //         $fetch = mysqli_fetch_assoc($res);
    //         $fetch_pass = $fetch['password'];
    //         if(password_verify($password, $fetch_pass)){
    //             $_SESSION['email'] = $email;
    //              $_SESSION['password'] = $password;

    //             //check if the email status is verified.
    //             // $status = $fetch['status'];
    //             // if($status == 'verified'){
    //             //   $_SESSION['email'] = $email;
    //             //   $_SESSION['password'] = $password;
    //             //     header('location: index.php');
    //             // }else{
    //             //     $info = "It's look like you haven't still verify your email - $email";
    //             //     $_SESSION['info'] = $info;
    //             //     header('location: user-otp.php');
    //             // }
    //             header('Location: index.php');
    //         }else{
    //           // $attempt ++;
    //             $errors['email'] = "Incorrect email or password!";
    //         }
    //     }
    //     else{
    //         $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    //     }
         
    // }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($openconnection, $_POST['email']);
        $check_email = "SELECT * FROM admin WHERE email ='$email'";
        $run_sql = mysqli_query($openconnection, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE admin SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($openconnection, $insert_code);
             if($run_query){

                //Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'riuseigitempest@gmail.com';                     //SMTP username  email ng gumagamit ng phpmailer (Account ko yan. pero pwede mo makita sa mysql yung code)
                    $mail->Password   = 'Wolfgang234';                               //SMTP password password ng email ko
                    $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    //Eto yung format ng email.
                    //Recipients
                    $mail->setFrom('riuseigitempest@gmail.com', 'Alumni Tracker');
                    $mail->addAddress($email);     //Add a recipient
                    $mail->addReplyTo('riuseigitempest@gmail.com', 'No reply');

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Password Reset Code';
                    $mail->Body    = "Your password reset code is $code";
                    $mail->send();
                      $info = "We've sent a passwrod reset otp to your email - $email";
                                 $_SESSION['info'] = $info;
                                     $_SESSION['email'] = $email;
                                     header('location: reset-code.php');
                                     exit();
                }
                catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
             else{
                    $errors['db-error'] = "Something went wrong!";
             }
        }
       
        else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    // if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($openconnection, $_POST['otp']);
        $check_code = "SELECT * FROM admin WHERE code = $otp_code";
        $code_res = mysqli_query($openconnection, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            // $fetch_data = mysqli_fetch_assoc($code_res);
            // $email = $fetch_data['email'];
            // $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: admin_new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    // if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($openconnection, $_POST['password']);
        $cpassword = mysqli_real_escape_string($openconnection, $_POST['cpassword']);
        
         if (strlen(trim($password)) < 8 ){
        $errors['password'] = "Password must have atleast 8 characters.";
         }
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = md5($password);
            $update_pass = "UPDATE admin SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($openconnection, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: admin_password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
   
    
   // if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login.php');
    }
?>