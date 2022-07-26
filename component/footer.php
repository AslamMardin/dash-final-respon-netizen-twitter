

<footer class="pt-4 my-md-5 pt-md-5p">
  <div class="container " id="icon-grid">
    <h2 class="pb-2 border-bottom">Alur Sistem</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
      <div class="col d-flex align-items-start">
        <i class="bi bi-search text-muted flex-shrink-0 me-3" style="font-size: 3.7em;"></i>
        <div>
          <h4 class="fw-bold mb-0">Pencarian</h4>
          <p>Sistem hanya memakai tiga kata kunci.</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
       <i class="bi bi-server text-muted flex-shrink-0 me-3" style="font-size: 3.7em;"></i>
       <div>
        <h4 class="fw-bold mb-0">API</h4>
        <p>Application Programing Interface seabagai jembatan menghungkan dari aplikasi website dengan database twitter sehingga dapat ditampilkan ke dalam tampilan home.</p>
      </div>
    </div>
    <div class="col d-flex align-items-start">
     <i class="bi bi-twitter text-muted flex-shrink-0 me-3" style="font-size: 3.7em;"></i>
     <div>
      <h4 class="fw-bold mb-0">Twitter</h4>
      <p>merupakan sebagai komunikasi social media yang sama trend nya dengan facebook atau social media lainnya.</p>
    </div>
  </div>
  <div class="col d-flex align-items-start">
    <i class="bi bi-graph-up-arrow text-muted flex-shrink-0 me-3" style="font-size: 3.7em;"></i>
    <div>
      <h4 class="fw-bold mb-0">Analisis</h4>
      <p>informasi yang didapat dari twitter akan sentimen dengan metode K-Means.</p>
    </div>
  </div>

</div>
</div>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/more/js/dashboard.js"></script>
<script type="text/javascript">
 document.addEventListener("DOMContentLoaded", function(event) { 



  $('.tombol-hasil').on('click', function(){
    let positif = $(this).data('positif');
    let negatif = $(this).data('negatif');
    let netral = $(this).data('netral');
    let kalimat = $(this).data('kalimat');

    $('#positif').html(positif);
    $('#negatif').html(negatif);
    $('#netral').html(netral);
    $('#kalimat').html(kalimat);
    $('#hasil').html($(this).html());
  });

  // navbar tetap atas ketika di scroll
  window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    const navbarClass = document.querySelector('.navbar');
    const tombolTop = document.querySelector('.tombol-top');
    if (window.scrollY > 700) {
     tombolTop.style.visibility = "visible";
   }else {
     tombolTop.style.visibility = "hidden";
     document.body.style.paddingTop = '0';
   }


   if (window.scrollY > 50) {
     navbar.classList.add('fixed-top');
     navbar.classList.add('bg-white');
     navbar.classList.add('shadow-sm');
     navbar.classList.add('opacity-75');

      } else {
     navbar.classList.remove('opacity-75');
     navbar.classList.remove('shadow-sm');
       navbar.classList.remove('fixed-top');
       navbar.classList.remove('bg-white');
         
       } 
     });


  
});
</script>

</html>
