<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <style>
      .pass{
        position: relative;
      }

      .pass i{
        position: absolute;
        height: 34px;
        width: 34px;
        line-height: 33px;
        background-color:burlywood;
        color: black;
        cursor: pointer;
        text-align: center;
        top: 34px;
        right: 2px;
        border-radius: 2px;
      }

      .pass i:hover{
        color: red;
        transition: .3s;     
      }

    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="card">
              
          <div class="card-header">
              <h3>Registration Form</h3>
          </div>
          <div class="card-body">
          <form action="post.php" method="post" >


  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="<?=(isset($_SESSION['old_name'])?$_SESSION['old_name']:'')?>" >
    <?php
        if(isset($_SESSION['name_err'])){?>
          <div class="alert alert-danger"><?= $_SESSION['name_err'];?> </div>
        <?php } ?>
    
  </div>



  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="text" class="form-control" name="email" value="<?=(isset($_SESSION['old_email'])?$_SESSION['old_email']:'')?>" >
    <?php
        if(isset($_SESSION['email_err'])){?>
          <div class="alert alert-danger"><?= $_SESSION['email_err'];?> </div>
        <?php } ?>
  </div>



  <div class="mb-3 pass">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="input" value="<?=(isset($_SESSION['old_password'])?$_SESSION['old_password']:'')?>">
    


    <!-- password Condition -->
    <?php
        if(isset($_SESSION['password_err'])){?>
         <div class="alert alert-danger"> <?= $_SESSION['password_err'];?> </div>
       <?php }?>


       <?php
        if(isset($_SESSION['password_upper'])){?>
         <div class="alert alert-danger"> <?= $_SESSION['password_upper'];?> </div>
       <?php }?>


       <?php
        if(isset($_SESSION['password_lower'])){?>
         <div class="alert alert-danger"> <?= $_SESSION['password_lower'];?> </div>
       <?php }?>

       <?php
        if(isset($_SESSION['password_spcl'])){?>
         <div class="alert alert-danger"> <?= $_SESSION['password_spcl'];?> </div>
       <?php }?>

       <?php
        if(isset($_SESSION['password_number'])){?>
         <div class="alert alert-danger"> <?= $_SESSION['password_number'];?> </div>
       <?php }?>

       

       <?php
        if(isset($_SESSION['password_number_len'])){?>
         <div class="alert alert-danger"> <?= $_SESSION['password_number_len'];?> </div>
       <?php }?>

       <i class="fa fa-eye" id="show_pass"> </i>
  </div>
  
<div class="mt-4">

<?php
    if(isset($_SESSION['old_gender'])){
      $gender = $_SESSION['old_gender'];
    }
?>
  <p> Select your Gender</p>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" value="male" <?=($gender == 'male'? 'checked':'')?> >
                
  <label class="form-check-label" >
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" value="female" <?=($gender == 'female'? 'checked':'')?> >
  <label class="form-check-label" >
    Female
  </label>
</div>
<?php
        if(isset($_SESSION['gender_err'])){?>
         <div class="alert alert-danger"> <?= $_SESSION['gender_err'];?> </div>
       <?php }?>
</div>

<div class="mb-3 mt-3 form-check">
    <input type="checkbox" class="form-check-input" >
    <label class="form-check-label " >Check me out</label>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
          </div>

            </div>
          </div>
        </div>
      </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        $('#show_pass').click(function(){
             var input = document.getElementById('input');
             if(input.type == 'password'){
                input.type = 'text';
             }
             else{
                input.type = 'password';
             }
             
        })
    </script>
  </body>
</html>

<?php
    unset($_SESSION['name_err']);
    unset($_SESSION['old_name']);
    unset($_SESSION['email_err']);
    unset($_SESSION['old_email']);
    unset($_SESSION['password_err']);
    unset($_SESSION['password_upper']);
    unset($_SESSION['password_lower']);
    unset($_SESSION['password_spcl']);
    unset($_SESSION['password_number']);
    unset($_SESSION['password_number_len']);
    unset($_SESSION['old_password']);
    unset($_SESSION['gender_err']);

?>