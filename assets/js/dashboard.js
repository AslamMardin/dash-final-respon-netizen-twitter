
$(document).ready(function(){
  // Code

  // Function Abmil Data
  const ambilData = (fileName = "db_unasman.php", name = "unasman", loading = false) => {
   $.ajax({
    url: fileName,
    success:function(result){
      result = JSON.parse(result)
      results = result.data
      let v = []
      let p = []
      loading = true;
      for(let prop in results){
        v.push(results[prop])
        p.push(prop)
      }
      myChart({
        p, v
      }, name)

      table(name, results)

      if (loading) {
        if (name == "sulbar") {
          $('#background-loading').hide();
        }
      }
    }
  })
 }
  // End Function Abmil Data

  ambilData("../db_unasman.php", "unasman");
  ambilData("../db_polewali.php", "polewali");
  ambilData("../db_sulbar.php", "sulbar");


  function table(name, results)
  {
    let table = `<div class="d-flex justify-content-start gap-1">`;

    for(let prop in results)
      if (results[prop] != 0) {

        table += `
        <a href="" class="tombol-tweet btn btn-sm btn-warning text-white" data-name="${name}" data-tgl="${prop}">${prop}
        </a>
        `;
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
      console.log(m)
      $.ajax({
        url:"../tweet_unasman.php",
        type:"get",
        data:{
          tgl:tgl,
          name:name
        },
        success:function(results){
          results = JSON.parse(results)
          $('#hasilTweet').html(tgl)
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

// My Chart
const myChart = (data, name) => {
 var ctx3 = document.getElementById("chart-"+ name).getContext("2d");

 new Chart(ctx3, {
  type: "line",
  data: {
    labels: data.p,
    datasets: [{
      label: "Diagram " + name,
      tension: 0,
      borderWidth: 0,
      pointRadius: 5,
      pointBackgroundColor: "rgba(255, 255, 255, .8)",
      pointBorderColor: "transparent",
      borderColor: "rgba(255, 255, 255, .8)",
      borderWidth: 4,
      backgroundColor: "transparent",
      fill: true,
      data: data.v,
      maxBarThickness: 6

    }],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5],
          color: 'rgba(255, 255, 255, .2)'
        },
        ticks: {
          display: true,
          padding: 10,
          color: '#f8f9fa',
          font: {
            size: 14,
            weight: 300,
            family: "Roboto",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          color: '#f8f9fa',
          padding: 10,
          font: {
            size: 14,
            weight: 300,
            family: "Roboto",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
    },
  },
});

}
    // end Code
  });