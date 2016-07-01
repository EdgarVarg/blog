  <!-- Main Content -->
    <div class="container">
 <title>Nueva Entrada</title>
                 <?php echo $this->session->flashdata('vacia');?>
        <div class="row">
       
 <?= form_open('blog/recibirdatos')?>
            <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-1">

                <div class="post-preview ">
                    <h1 style="color:#fff;text-shadow: 0 2px 2px red;">Titulo: </h1>
                    <h1 id="titulo">

                    
                    <input  class="post-title"  type="text" name="titulo"> </h1>

                   
                    </a>
                    <h1 style="color:#fff;text-shadow: 0 2px 2px red;">Contenido:</h1>
                      <div id="contenidop">
                          <textarea name="contenido"></textarea>
                          <p class="post-meta">Posted by <?php echo $username;?></p>
                          </div>
                    
                      <h1 class="post-meta"></h1>
                </div>

    <input type="hidden" name="autor" value="<?php echo $username;?>"></h1>
    </div>
    <input type="hidden" name="email" value="<?php  echo $email; ?>">
      <input type="hidden" name="id_autor" value="<?php  echo $id_user; ?>">

      <input class="btn-lg" type="submit" value="Publicar"  ></input>
   </div>

 </div>

 
 
 <?= form_close()?>

  