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
</style>

{% endblock %}

{% block content %}
<p>{{ this.flashSession.output() }}</p>
<div class="text-center mb-5 font-weight-bold">
    <h3> SISTEM INFORMASI COVID-19 (Beta version) </h3>
</div>

<div class="row justify-content-center mb-4">
  <div class="col-4 col-sm-4 kartu kartu-merah">
      <h5 class="text-center">ANTREAN</h5>
      <table>
        <tr>
            <td>Status</td>
            <td>: Belum Mengantre</td>
        </tr>
        <tr>
            <td>Mengantre di Rumah Sakit</td>
            <td>: -</td>
        </tr>
        <tr>
            <td>Nomor Antrean</td>
            <td>: -</td>
        </tr>
        <tr>
            <td>Nomor Rumah Sakit Saat ini</td>
            <td>: -</td>
        </tr>
      </table>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-3 d-sm-flex justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">List Rumah Sakit</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
              <th>Nama Rumah Sakit</th>
              <th>Alamat</th>
              <th>Kecamatan</th>
              <th>Kota/Kabupaten</th>
              <th>Provinsi</th>
              <th>Action</th>
          </tr>
          </thead>
          <tfoot>
          <tr>
              <th>Nama Rumah Sakit</th>
              <th>Alamat</th>
              <th>Kecamatan</th>
              <th>Kota/Kabupaten</th>
              <th>Provinsi</th>
              <th>Action</th>
          </tr>
          </tfoot>
          <tbody>
          {% for hospital in hospitals %}
          <tr>
              <td>{{ hospital.getName() }}</td>
              <td>{{ hospital.getAddress() }}</td>
              <td>{{ hospital.getDistrictId() }}</td>
              <td>Masih Belum Buat Fungsinya</td>
              <td>Masih Belum Buat Fungsinya</td>
              <td><form method='POST' action='/antre/get'><input name='hospital_id' type='hidden' value={{ hospital.getId() }}><button class='btn btn-primary btn-submit' type='submit'>Antre</button></form></td>
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

{% endblock %}