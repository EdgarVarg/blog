 <!-- Main Content -->
     <?php echo $this->session->flashdata('correcto'); ?>
     <?php echo $this->session->flashdata('bienvenido'); ?>
    <div class="container">
 
        <div class="row">

            <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-1" >
           
            <?php

    if (empty($entradas)):
          echo "<center><h1>no hay entradas publicadas</h1></center>";

          
     
     else:

     
        foreach ($entradas->result() as $entrada) { 

          ?>

               <div class="post-preview">

                    <a href="<?= base_url('blog/entradas/'.$entrada->id)?>">
                        <h2 class="post-title" id="titulo">
                           <?= $entrada->titulo;?>
                        </h2>
                    </a>
                        
                    
                      <div id="contenidop">
                          <textarea disabled><?= $entrada->contenido;?></textarea>
                          <spaan style="float:right;color:#fff;font-family:'Open Sans';"> visitas :<?= $entrada->visitas;?></spaan>
                          </div>
                    <p class="post-meta">Posted by <a href="<?= base_url('blog/post_by_user/'.$entrada->id_autor)?>"><?= $entrada->autor;?></a> <?= $entrada->fecha;?></p>

                      <h1 class="post-meta"></h1>

                </div>
                 <?php }
                 endif;
                ?>

                </div>