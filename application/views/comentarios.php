  <h1>Comentarios: </h1>
   <?php

    foreach ($comentarios->result() as $comenta) { ?>

    <div id="comentarios">
   
 	<h3><?= $comenta->comentario;?> </h3>
 	</div>
 	   <?php }
     
   
  ?>
 </body>
 </html>