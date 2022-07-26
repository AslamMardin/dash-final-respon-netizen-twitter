<?php 
$profile = $connection->get("account/verify_credentials");

$tweets = myGet("statuses/user_timeline", [
  'screen_name' => $profile->screen_name
]);


?>
 ?>
<div class="card shadow-lg">
  <div class="card-header pb-0 pt-3">
    <div class="float-start">
      <h5 class="mt-3 mb-0">Akun Terkait</h5>
    </div>
    <div class="float-end mt-4">
      <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
        <i class="material-icons">clear</i>
      </button>
    </div>
    <!-- End Toggle Button -->
  </div>
  <hr class="horizontal dark my-1">
  <div class="card-body pt-sm-3 pt-0">
    <!-- Sidebar Backgrounds -->
    <div class="row">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="<?= $profile->profile_image_url ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            @<?= $profile->screen_name ?>
          </h5>
          <p class="mb-0 font-weight-normal text-sm">
            Mengikuti <strong><?= $profile->friends_count ?></strong>
             Di ikuti <strong><?= $profile->followers_count ?></strong>
          </p>
        </div>
      </div>
    </div>
    <!-- Sidenav Type -->
    <hr>
    <ul class="list-group">
      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">ID:</strong> &nbsp; ?= $profile->id_str ?></li>
      <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama Asli:</strong> &nbsp; <?= $profile->name ?></li>
      <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong> &nbsp; <?= $profile->location ?></li>
    
    </ul>
    <!-- Navbar Fixed -->
    <div class="row mt-2">
      <div class="col-md-8 d-flex align-items-center">
        <h6 class="mb-0">Profil Informasi</h6>
      </div>
      <p class="text-sm">
       <?= $profile->description ?>
      </p>
    </div>
  </div>
</div>
