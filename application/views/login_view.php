<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>application/views/css/style.css">


   <title>Login</title>
 
 <div class="col-md-4">
     <div class="formula">
   <h1>Login</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
     <label for="username">Username:</label><br>
     <input type="text" size="20"  name="username"/>
    </input><br><br>
     <label for="pass">Password:</label><br>
     <input type="password" size="20" name="pass"/>
     </input><br><br>
     <input type="submit" class="btn-lg" value="Login"/>
     <br>
     <br>
     <a href="http://localhost/blog/index.php/menu"><input type="button" class="btn-lg" value="Registrarse"></a>
   </form>
   </div>
   </div>
 </body>
</html>