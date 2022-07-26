
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
        p.push("Tgl " + prop)
      }
      myChart({
        p, v
      }, name)

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

// My Chart
const myChart = (data, name) => {
 var ctx3 = document.getElementById("chart-"+ name).getContext("2d");

 new Chart(ctx3, {
  type: "line",
  data: {
    labels: data.p,
    datasets: [{
      label: "Diagram" + name,
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