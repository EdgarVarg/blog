 <title>Entradas</title>
 <div class="col-md-10">
 <?php echo $this->session->flashdata('correcto'); ?>
    <?php
    if (!($entradas )) :
          echo "<center><h1>no hay entradas publicadas</h1></center>";
          
     
     else:
        foreach ($entradas->result() as $entrada) { ?>
        	
        
 	<div id="titulo">
 
 	
 	<h1><a href="<?= base_url('index.php/blog/entradas/'.$entrada->id)?>"><?= $entrada->titulo;?></a></h1>
 	</div>

 	<div id="contenidop">
 	<textarea disabled><?php echo $entrada->contenido;?></textarea>
 	</div>
 	<div id="fecha">
 	<h1><?= $entrada->fecha;?></h1>
 	</div>
   <hr>
  <div id="autor">
  <h5>By:<?= $entrada->autor;?></h5>
  </div>
  
     <?php }
   endif;
  ?>


