

<div class="col-md-4 col-md-offset-4">

      <div class="formula">

   <h1>Login</h1>
 
   <?php echo form_open('verifylogin'); ?>
    <?php echo $this->session->flashdata('registrado'); ?>
    <?php echo $this->session->flashdata('vacio2'); ?>
    <?php echo $this->session->flashdata('correobad'); ?>
        <?php echo $this->session->flashdata('recover'); ?>
    
     <label for="username">Username:</label><br>
     <input type="text" size="20"  name="username" required="true" />
    </input><br><br>
     <label for="pass">Password:</label><br>
     <input type="password" size="20" name="pass" required="true" />
     </input><br><br>

     <input type="submit" class="btn-lg" value="Login"  style="padding:3%;" />
     <br>
     <br>
     
     <a href="menu"><input type="button" class="btn-lg" value="Registrarse" style="padding:3%;" ></a>
     <br>
     <br>
     <a href="blog/recuperar_pass_view" style="color:#fff;text-shadow: 5px 5px 5px #000000;font-family:'Open Sans';">olvidaste tu contraseña?</a>
   </form>
    <?= form_close() ?>
      

</div>
</div>
