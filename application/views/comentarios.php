  <h1 style="color:#fff;">Comentarios: </h1>
   <?php
   if (!($comentarios)) :
   	      echo "<h4 style='color:blue;'>no hay comentarios</h4>";
          
 	   
     else:
     	  
    foreach ($comentarios->result() as $comentari) { ?>

    <div id="comentario">
 	<textarea disabled><?= $comentari->comentario;?> </textarea>
  <h4 style="color:#000;text-shadow: 0 2px 2px red;">autor del comentario: <?= $comentari->email_comentario;?></h4>
    <h4 style="color:#fff523;text-shadow: 0 2px 2px green;">autor del post: <?= $comentari->email_autor;?></h4 >
 	</div>

        <?php }
   endif;
  ?>
        </div>
        </div>
    </div>
 </body>
 </html>
