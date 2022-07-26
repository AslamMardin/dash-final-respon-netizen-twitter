<?php 
include_once 'component/function.php';

$connection = conn();

$profile = $connection->get("account/verify_credentials");

$tweets = myGet("statuses/user_timeline", [
  'screen_name' => $profile->screen_name
]);

// var_dump($tweets);die();
// var_dump($profile); die();

// echo "<pre>";
// var_dump($profile);
// echo "</pre>";

?>
<?php include_once 'component/header.php' ?>

<div class="container-fluid py-3">
  <header>
    <?php include_once 'component/navbar.php' ?>
  </header>
</div>
<div class="container">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-5">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><i class="bi bi-twitter"></i> Twitter</li>
      <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-person-fill"></i> Profil</li>
    </ol>
  </nav>


  <main>
    <div class="container mb-2">
      <div class="row">
        <div class="col">
          <div class="d-flex justify-content-center align-items-center position-relative">
          <img class="w-100" style=" background-size: cover; background-blend-mode: screen;filter: blur(3px);;" src="<?= $profile->profile_banner_url ?>">
          <img class="position-absolute border border-white p-2 rounded-circle" style="background-blend-mode: overlay;" src="<?= $profile->profile_image_url ?>" width="150" height="150">
          </div>
          <div class="card mb-3 mt-5 mx-auto border-0">
            <div class="row  g-2">
              
                <div class="col-md-8">
                  <div class="card-body shadow-sm">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="mx-2">
                        <h5 class="card-title mb-1 fw-bold">@<?= $profile->screen_name ?></h5>
                        <div class="d-flex justify-content-between gap-2" style="max-width: 150px;">
                          <small class="badge badge-sm bg-warning">
                            <strong><?= $profile->friends_count ?></strong> Mengikut
                          </small>
                          <small class="badge badge-sm bg-danger">
                            <strong><?= $profile->followers_count ?></strong> Diikuti
                          </small>
                        </div>
                      </div>
                      <div>
                        <a target="_blank" href="https://twitter.com/<?= $profile->screen_name ?>" class="btn btn-info text-light btn-sm"><i class="bi bi-twitter"></i></a>
                      </div>
                    </div>
                    <!-- isi -->
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col" width="60"></th>
                          <th scope="col"></th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">ID</th>
                          <td><i class="bi bi-card-heading"></i> <?= $profile->id_str ?></td>

                        </tr>
                        <tr>
                          <th scope="row">Nama</th>
                          <td><i class="bi bi-person-workspace"></i> <?= $profile->name ?></td>

                        </tr>
                        <tr>
                          <th scope="row">Alamat</th>
                          <td><i class="bi bi-geo-alt-fill"></i> <?= $profile->location ?></td>

                        </tr>
                      </tbody>
                    </table>
                    <!--  / isi -->
                    <p class="card-text"><small class="text-muted"><strong><i class="bi bi-chat-left-quote-fill"></i> Bio :</strong></small></p>
                    <textarea class="form-control bg-secondary bg-opacity-10" style="border-radius: 0; border:none; border-left: 5px solid rgba(0,0,0,.4); height: 150px;" readonly><?= $profile->description ?></textarea>

                  </div>
                </div>
                <div class="col-md-4">
                  <h6 class="fs-5 bg-light mb-2 text-center py-2">Postingan</h6>
                <?php 
                foreach ($tweets as $key => $tweet) {
                  // code...

                  ?>

                  <div class="card shadow-sm p-2 border-0 mb-3" style="max-width: 540px;">
                    <div class="row d-flex justify-content-between g-0" style="font-size:11px">
                      <div class="col-1">
                        <img src="<?= $tweet->user->profile_image_url ?>" class="img-fluid rounded-circle m-2" width="30" height="30" alt="...">
                      </div>

                      <div class="col">
                        <div class="card-body" style="font-size: 11px;">
                      
                          <p class="card-text border-start border-5 border-danger p-2 fw-semibold" style="font-size:14px; overflow-wrap: break-word; background:#eee">
                            <i class="bi bi-quote" style="opacity: .7; font-size: 14px;;"></i><?= $tweet->text ?>.<i class="bi bi-quote" style="opacity: .7; font-size: 14px;;"></i></p>
                            <p class="card-text"><small class="text-muted"><?= $tweet->created_at ?></small></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>



  <?php include_once 'component/footer.php' ?>