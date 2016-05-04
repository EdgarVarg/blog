  <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php 
                    foreach ($consulta->result() as $fila ) {
                       
                    }

                  ?>
                <div class="post-preview">
                    <a href="post.html">
                <h2 class="post-title">
                            <?= $fila->post ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?= $fila->descripcion ?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Edgar</a> on <?= $fila->fecha?></p>
                </div>
                <hr>
                        <?php
                          }

                  ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>