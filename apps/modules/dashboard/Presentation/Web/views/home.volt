{% extends 'layout.volt' %}

{% block title %}Home{% endblock %}

{% block styles %}
  <!-- Custom styles for this page -->
  <link href="{{ url('assets/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
.kartu {
  width: 300px;
  box-sizing: border-box;
  padding: 2em;
  border-radius: 25px;
  color: white;
  line-height: 25px;
  box-shadow: 5px 5px 10px #ccc;
  float: left;
  margin-right: 1em;
}

.kartu h2 {
    font-weight: 600;
}

.kartu-ungu {
  background: linear-gradient(150deg, #f731db, #4600f1 100%);
}

.kartu-hijau {
  background: linear-gradient(150deg, #39ef74, #4600f1 100%);
}

.kartu-merah {
  background: linear-gradient(150deg, #F5515F, #A1051D 100%);
}

.kartu-kuning {
  background: linear-gradient(150deg, #fad961, #f76b1c 100%);
}

.kartu-biru {
  background: linear-gradient(150deg, #13f1fc, #0470dc 100%);
}

.carousel {
  max-width: 480px;
  height: auto;
  margin: 0 auto;
}
</style>

{% endblock %}

{% block content %}
<p>{{ this.flashSession.output() }}</p>
<div class="text-center mb-4 font-weight-bold">
    <h3> SISTEM INFORMASI COVID-19 </h3>
</div>
{% if posters is defined %}
{% set is_active = 1 %}
<div class="justify-content-center text-center">
  <div class="carousel slide mb-5" data-ride="carousel">
    <div class="carousel-inner">
    {% for poster in posters %}
      {% if is_active == 1 %}
        <div class="carousel-item active">
          <img src="{{ url('storage/' ~ poster.getPath()) }}" class="rounded d-block w-100 gambar-slide" alt="...">
        </div>
        {% set is_active = 0 %}
      {% else %}
        <div class="carousel-item">
          <img src="{{ url('storage/' ~ poster.getPath()) }}" class="rounded d-block w-100 gambar-slide" alt="...">
        </div>
      {% endif %}
    {% endfor %}
    </div>
    <a class="carousel-control-prev" href="#" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>
{% endif %}

<div class="row justify-content-center mb-3">
    <div class="col-3 col-sm-3 kartu kartu-ungu text-center">
        <h5>ODP</h5>
        <h2>{% if jumlah['ODP'] is defined %}
        {{ jumlah['ODP'] }}
        {% else %}
        0
        {% endif %}</h2>
    </div>
    <div class="col-3 col-sm-3 kartu kartu-hijau text-center">
        <h5>PDP</h5>
        <h2>{% if jumlah['PDP'] is defined %}
        {{ jumlah['PDP'] }}
        {% else %}
        0
        {% endif %}</h2>
    </div>
    <div class="col-3 col-sm-3 kartu kartu-merah text-center">
        <h5>Positif</h5>
        <h2>{% if jumlah['Positif'] is defined %}
        {{ jumlah['Positif'] }}
        {% else %}
        0
        {% endif %}</h2>
    </div>
</div>
<div class="row justify-content-center mb-5">
    <div class="col-3 col-sm-3 kartu kartu-kuning text-center">
        <h5>Negatif</h5>
        <h2>{% if jumlah['Negatif'] is defined %}
        {{ jumlah['Negatif'] }}
        {% else %}
        0
        {% endif %}</h2>
    </div>
    <div class="col-3 col-sm-3 kartu kartu-biru text-center">
        <h5>Sembuh</h5>
        <h2>{% if jumlah['Sembuh'] is defined %}
        {{ jumlah['Sembuh'] }}
        {% else %}
        0
        {% endif %} </h2>
    </div>
</div>
<div class="text-center">
  <h3>Grafik COVID-19 di Indonesia</h3>
  
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Grafik Kenaikan Kasus Positif</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-area">
        <canvas id="myAreaChart"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Data Kasus di Indonesia</h6>
  </div>
  <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
              <th>Jenis Kasus</th>
              <th>Kabupaten</th>
              <th>Provinsi</th>
              <th>Jumlah</th>
          </tr>
          </thead>
          <tfoot>
          <tr>
              <th>Jenis Kasus</th>
              <th>Kabupaten</th>
              <th>Provinsi</th>
              <th>Jumlah</th>
          </tr>
          </tfoot>
          <tbody>
          {% for table in tables %}
          <tr>
              <td>{{ table['nama_status'] }}</td>
              <td>{{ table['nama_kabupaten'] }}</td>
              <td>{{ table['nama_provinsi'] }}</td>
              <td>{{ table['jumlah'] }}</td>
          </tr>
          {% endfor %}
          </tbody>
      </table>
      </div>
  </div>
</div>

{% endblock %}

{% block scripts %}
<!-- Page level plugins -->
<script src="{{ url('assets/sb-admin-2/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('assets/js/chart-area-demo.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ url('assets/sb-admin-2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('assets/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('assets/sb-admin-2/js/demo/datatables-demo.js') }}"></script>

<script>
// Area Chart Example
var ctx = document.getElementById("myAreaChart");

// var tanggal = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
var bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des"];

var tanggal = [];
var jumlahKasus = [];
{% for key,value in kasus %}
tanggal.push('{{ key }}');
jumlahKasus.push({{ value }});
{% endfor %}

var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: tanggal,
    datasets: [{
      label: "Positif",
      lineTension: 0.3,
      backgroundColor: "rgba(255, 0, 0, 0.05)",
      borderColor: "rgba(255, 0, 0, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(255, 0, 0, 1)",
      pointBorderColor: "rgba(255, 0, 0, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(255, 0, 0, 1)",
      pointHoverBorderColor: "rgba(255, 0, 0, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: jumlahKasus,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

</script>
{% endblock %}