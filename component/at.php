<?php 
$ats = myGet("statuses/mentions_timeline");
?>
<div class="container-fluid sticky-top mt-5">
<br class="" />
	
<?php
	foreach ($ats as $key => $at) {
		// code...
	
 ?>

 <div class="card  p-2 border-0 mb-1" style="max-width: 540px;">
  <div class="row d-flex justify-content-between g-0" style="font-size:11px">
    <div class="col-1">
      <img src="<?= $at->user->profile_image_url_https ?>" class="img-fluid rounded-circle m-2" width="30" height="30" alt="...">
    </div>
    
    <div class="col">
      <div class="card-body" style="font-size: 11px;">
        <h6 class="card-title" style="font-size:11px">@<?= $at->user->screen_name ?></h6>
        <p class="card-text border-start border-5 border-danger p-2 fw-semibold" style="font-size:14px; overflow-wrap: break-word; background:#eee">
        	<i class="bi bi-quote" style="opacity: .7; font-size: 14px;;"></i><?= $at->text ?>.<i class="bi bi-quote" style="opacity: .7; font-size: 14px;;"></i></p>
        <p class="card-text"><small class="text-muted"><?= $at->created_at ?></small></p>
      </div>
    </div>
  </div>
</div>
<?php } ?>
</div>