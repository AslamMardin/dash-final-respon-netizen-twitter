  $(document).ready(function() {
    $('#background-loading').hide()
   

    $('#loading-chart').show()
    $('.canvas-group').hide()
    const ambilData = (fileName = "db_unasman.php", name = "unasman", loading = false) => {
     $.ajax({
      url: fileName,
      success:function(result){
        result = JSON.parse(result)
        results = result.data
        // console.log(results);
        let v = []
        let p = []
        loading = true;
        for(let prop in results){
          v.push(results[prop])
          p.push("Tgl " + prop)
        }
        myChart({
          p, v
        }, name)

        table(name, results)

        if (loading) {
          if (name == "sulbar") {
            $('.canvas-group').show()
          }
        }
      }
    })
   }
   ambilData("db_unasman.php", "unasman");
   ambilData("db_polewali.php", "polewali");
   ambilData("db_sulbar.php", "sulbar");
   
   
   function table(name, results)
   {
    let table = `<div class="container d-inline-flex flex-column gap-1">`;

    for(let prop in results)
      if (results[prop] != 0) {

        table += `<a href="" class="tombol-tweet btn btn-sm btn-warning text-white" data-name="${name}" data-tgl="${prop}">${prop}</a>`;
      }

      table +=`</div>`;

      $('#table-'+name).html(table)
    }

    $(document).on('click', '.tombol-tweet', function(e){
      e.preventDefault()
      let tgl = $(this).data('tgl')
      let name = $(this).data('name')
      let date = new Date()
      let y = date.getFullYear()
      let m = date.getMonth()
      $.ajax({
        url:"tweet_unasman.php",
        type:"get",
        data:{
          tgl:tgl,
          name:name
        },
        success:function(results){
          results = JSON.parse(results)
          $('#hasilTweet').html(tgl+"/"+ m + "/" + y)
          let table = `<table class="table" style="border:0">
          <thead>
          <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Tweet</th>
          <th scope="col">Detail</th>
          </tr>
          </thead>
          <tbody>`;

          results.forEach((v,p) => {
            table += `<tr>
            <td>${p + 1}</td>
            <td>${v.name}</td>
            <td>${v.komentar}</td>
            <td>
            <a target="_blank" href="https://twitter.com/${v.name}/status/${v.id}" class="btn btn-sm btn-danger"><i class="bi bi-eye-fill"></i> Liat</a>
            </td>
            </tr>
            <tr>`;
          })

          table +=`</tbody>
          </table>`;
          $('#modalTweets').modal('show')
          $('.modal-tweet').html(table)
        }
      })
    });

    function myChart(data, name = "unasman"){
// chart

feather.replace({ 'aria-hidden': 'true' })
  // Graphs
  const ctx = document.getElementById('myChart-'+name)
  // eslint-disable-next-line no-unused-vars
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: data.p,
      datasets: [{
        data: data.v,
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 2,
        pointBackgroundColor: '#3423f2'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })

// end chart
$('#loading-chart').hide()

}


})


