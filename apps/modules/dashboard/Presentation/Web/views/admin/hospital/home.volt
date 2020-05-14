{% extends 'admin/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}

<!-- Page Heading -->
<div class="align-items-center text-center mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>RUMAH SAKIT</strong></h1>
</div>
<p>{{ this.flashSession.output() }}</p>
<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Rumah Sakit</h6>
            <a href="{{ url('admin/rumah-sakit/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambahkan Rumah Sakit</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nama Rumah Sakit</th>
                    <th>Kuota</th>
                    <th>Dokter</th>
                    <th>Perawat</th>
                    <th>Tenaga Medis Lain</th>
                    <th>Alamat</th>
                    <th>Kecamatan</th>
                    <th>Kota/Kabupaten</th>
                    <th>Provinsi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nama Rumah Sakit</th>
                    <th>Kuota</th>
                    <th>Dokter</th>
                    <th>Perawat</th>
                    <th>Tenaga Medis Lain</th>
                    <th>Alamat</th>
                    <th>Kecamatan</th>
                    <th>Kota/Kabupaten</th>
                    <th>Provinsi</th>
                </tr>
                </tfoot>
                <tbody>
                {% for hospital in hospitals %}
                <tr>
                    <td>{{ hospital.getName() }}</td>
                    <td>{{ hospital.getQuota() }}/{{ hospital.getFilled() }}</td>
                    <td>{{ hospital.getDoctorNumber() }}</td>
                    <td>{{ hospital.getNurseNumber() }}</td>
                    <td>{{ hospital.getPersonnelNumber() }}</td>
                    <td>{{ hospital.getAddress() }}</td>
                    <td>{{ hospital.getDistrictId() }}</td>
                    <td>{{ hospital.getDistrictId() }}</td>
                    <td>{{ hospital.getDistrictId() }}</td>
                </tr>
                <!-- {% endfor %} -->
                </tbody>
            </table>
        </div>
    </div>
</div>


{% endblock %}

{% block scripts %}
<script>
    $("#nav-rumahsakit").addClass("active");
</script>
{% endblock %}