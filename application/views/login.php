<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>application/views/css/style.css">


<div class="col-md-4">
     <div class="formula">
        <?= form_open('blog/logearse')?>
     <?php
  
    ?>
    <h2>Usuario:</h2>
    <input type="text"></input><br>
     <h2>Contraseña:</h2>
     <input type="text"></input><br><br>  
  
    <input class="btn-lg" type="submit" value="Entrar"></input>
    
    </div>
    </div>
  
    <?= form_close()?>
