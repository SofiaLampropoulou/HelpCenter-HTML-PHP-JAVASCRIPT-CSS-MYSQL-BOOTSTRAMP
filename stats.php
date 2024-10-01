<?php
include "header.php";
?>

<?php
include "menu.php";
?>

<div class="container">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<h1>Στατιστικά</h1>

<div class=container>
<div style='background-color:white' >
  <canvas id="myChart"></canvas>
</div>
</div>
<script>
  const ctx = document.getElementById('myChart');
$.getJSON("api.php?q=stats",(res)=>{
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Αιτήματα σε Αναμονή', 'Αιτήματα σε Αναθεση', 'Αιτηματα Συνολικά','Προσφορές Αναμονή', 'Προσφορές Ανάθεση', 'Προσφορές Συνολικά'],
      datasets: [{
        label: '#',
        data: [res[0], res[1], res[2], res[3], res[4], res[5]],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}
);
</script>
</div>

<?php
include "footer.php";

?>