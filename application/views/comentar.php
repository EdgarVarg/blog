   <?= form_open('blog/recibirComentario') ?>
     <?php

?>
<div id="comentario">
  <h2>Relaizar Comentario:</h2>
    <textarea name="comentario" id="comentario"></textarea><br>
  <?php
foreach ($entradas->result() as $entrada) {
?>
  
    <input type="hidden" name="id_entrada" value="<?= $entrada->id; ?>"></input>
    <input type="hidden" name="titulo" value="<?= $entrada->titulo; ?>"></input>
    <input type="hidden" name="autor" value="<?= $entrada->autor; ?>"></input>  
    <input type="hidden" name="fecha" value="<?= $entrada->fecha; ?>"></input>  
    <input class="btn-lg"type="submit" value="Comentar"></input>
    </div>
    
  
    <?= form_close() ?>
      <?php
}


?>