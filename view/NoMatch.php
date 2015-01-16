<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php

if (isset($_SESSION['match']))
{

  if($_SESSION['match']==1)
  { ?>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#myModal").modal('show');
    });
    </script>
    <?php
    $_SESSION['match']=0;
  }
}
?>

<section id="error" class="container">
    <h1>Il n'y a plus personne</h1>
    <p>Attendez que de nouvelles personne s'inscrive pour pouvoir les match !</p>
    <a class="btn btn-success" href="<?php echo $app->urlFor('profil');?>">GO BACK TO YOUR PROFIL</a>
</section>

<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title">It's a match !</h2>
      </div>
      <div class="modal-body">
        <h5>Félication ! C'est un match , vous pouvez désormais discuter avec elle! </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Continuez ma recherche</button>
        <button type="button" class="btn btn-primary"><a href=" <?php echo $app->urlFor('chat'); ?>">Lui envoyez un message</a></button>
      </div>
    </div>
  </div>
</div>
