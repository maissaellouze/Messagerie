<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
  <script src="javascript/pass-show-hide.js"></script>
    <meta charset="UTF-8">
    <script src="login.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
<body>
<form action="signup-check.php" method="post">
<div class="container" style="height: 600px;">
        <div class="forms">
        
            <div class="form signup">
                <br><br><br><br><br><br><br><br>
                <span class="title">registration </span>
                <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
                <div class="input-field">
                <?php if (isset($_GET['name'])) { ?>
                        <<input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">

          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                    <input type="password" 
                 name="password" 
                 placeholder="Password"><br>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field">
                    <input type="password" 
                         name="re_password" 
                            placeholder="Re_Password"><br>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <br>
                    <!---
                    <div class="field image">
                        <label>Select Image</label>
                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                    </div>
                    --->
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div>
     

                    <div class="input-field button">
                     
                        <input type="submit" value="signup">
                    </div>
                    <div class="login-signup">
                    <span class="text">have an account?
                        <a href="index.php" class="text signup-link">login </a>
                    </span>
                </div>
            </div>
            </div>
            
</form>

</body>
</html>
