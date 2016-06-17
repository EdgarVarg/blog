   <?= form_open('blog/recibirComentario') ?>
     <?php

?>
<div id="comentario">
  <h2>Relaizar Comentario:</h2>
    <textarea name="comentario" id="comentario" required="true"></textarea><br>
  <?php
      if (!($entradas )) :
          echo "<center><h1>no hay entradas publicadas</h1></center>";
          
     
     else:
    foreach ($entradas->result() as $entrada) {
    ?>
  
    <input type="visible" name="id_entrada" value="<?= $entrada->id; ?>"></input>
    <input type="hidden" name="titulo" value="<?= $entrada->titulo; ?>"></input>
    <input type="hidden" name="autor" value="<?= $entrada->autor; ?>"></input>  
    <input type="hidden" name="fecha" value="<?= $entrada->fecha; ?>"></input>

    <input type="text" name="email_autor" value="<?= $entrada->email_autor; ?>"></input>    

    
    
  
    <?= form_close() ?>
          <?php }
   endif;
  ?>
   <?php
      if (!($usuarios )) :
          echo "<center><h1>no hay usuarios</h1></center>";
          
     
     else:
    foreach ($usuarios->result() as $usuario) {
    ?>
    <h1>Usuario logeado</h1>
    <input type="text" name="email_comentario" value="<?= $usuario->email; ?>"></input>  
    <input class="btn-lg" type="submit" value="Comentar"></input>

    
  

          <?php }
   endif;
  ?>
