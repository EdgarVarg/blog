  <h1>Comentarios: </h1>
   <?php
   if (!($comentarios)) :
   	      echo "no hay comentarios";
          
 	   
     else:
     	  
    foreach ($comentarios->result() as $comentari) { ?>

    <div id="comentario">
 	<textarea disabled><?= $comentari->comentario;?> </textarea>
  <h1>autor del comentario: <?= $comentari->email_comentario;?></h1>
    <h1>autor del post: <?= $comentari->email_autor;?></h1>
 	</div>
        <?php }
   endif;
  ?>
 </body>
 </html>
