  <h1>Comentarios: </h1>
   <?php
   if (!($comentarios)) :
   	      echo "no hay comentarios";
          
 	   
     else:
     	  
    foreach ($comentarios->result() as $comentari) { ?>

    <div id="comentarios">
 	<h3><?= $comentari->comentario;?> </h3>
 	</div>
        <?php }
   endif;
  ?>
 </body>
 </html>
