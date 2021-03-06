
<section id="title">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-6">
        <div class="center">
          <p><img class="img-responsive img-thumbnail" src="images/<?php echo $_SESSION['path']; ?>" alt=""></p>
        </div>
      </div>
    </div>
  </div>
</section><!--/#title-->

<section id="portfolio" class="container">
  <ul class="portfolio-filter">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
            add Picture
          </a>
        </h4>
      </div>
      <div id="collapseOne1" class="panel-collapse collapse" style="height: 0px;">
        <form method="post" enctype="multipart/form-data">
          <p>
            <input type="file" name="fichier" value="fichier" size="30">
            <input type="submit" name="upload" value="Uploader">
          </p>
        </form>
      </div>
    </div>        </ul><!--/#portfolio-filter-->
    <ul class="portfolio-items col-3">
      <?php
      $tab = array();
      $tab = $this->data['tab'];
      foreach ($tab as $key) { ?>
        <li class="portfolio-item joomla bootstrap">
          <div class="item-inner">
            <img src="images/<?php echo $key;?>" alt="">
            <h5></h5>
            <div class="overlay">
              <form method="post" enctype="multipart/form-data" class="preview">

                <button type="submit" name="fav" value="<?php echo $key; ?>" class="preview btn btn-success" ><i class=" icon-user"></i></button>
                <button type="submit" name="del" value="<?php echo $key; ?>" class="preview btn btn-danger" ><i class=" icon-remove"></i></button>
              </form>
            </div>
          </div>
        </li><!--/.portfolio-item--> <?php } ?>
      </ul>
    </section><!--/#portfolio-->


  </body>
  </html>
