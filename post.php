<?php
session_start();




    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $upper = preg_match('@[A-Z]@',$password);
    $lower = preg_match('@[a-z]@',$password);
    $number = preg_match('@[0-9]@',$password);
    $spcl = preg_match('@[!,#,$,%,^,&,*,-,_,+,=,/]@',$password);



    $flag = false;

    if(!$name){
        $flag = true;
        $_SESSION['name_err']= 'Please enter Your Name';
    }
    else{
        $_SESSION['old_name']= $name;
    }



    if(!$email){
        $flag = true;
        $_SESSION['email_err']= 'Please enter Your Email';
    }
  
        else{
        
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $bangla = true;
                $_SESSION['email_err'] = 'Invalid Email Format.';
                $_SESSION['old_email'] = $email;
            }
    }



    if(!$password){
        $flag = true;
        $_SESSION['password_err']= 'Please enter Your Password';
    }
    else{

        if(!$upper){
            $flag = true;
            $_SESSION['password_upper'] = 'Uppercase  Required. ';
        }

        if(!$lower){
            $flag = true;
            $_SESSION['password_lower'] = 'Lowercase  Required. ';
        }

        if(!$number){
            $flag = true;
            $_SESSION['password_number'] = 'Number  Required. ';
        }

        if(!$spcl){
            $flag = true;
            $_SESSION['password_spcl'] = 'Special Charecter Required. ';
        }

        if(strlen($password)<8){
            $flag = true;
            $_SESSION['password_number_len'] = 'Minimum 8 Charecter Required. ';
        }




        $_SESSION['old_password']= $password;
    }


    if(!$gender){
        $flag = true;
        $_SESSION['gender_err']= 'Please enter Your Gender';
    }
    else{
        $_SESSION['old_gender']= $gender;
    }


    if($flag){
        header('location:index.php');
    }

?>