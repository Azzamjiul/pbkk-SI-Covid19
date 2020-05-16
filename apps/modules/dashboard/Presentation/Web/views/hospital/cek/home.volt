{% extends 'admin/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}

<!-- Page Heading -->
<div class="align-items-center text-center mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>CEK KESEHATAN</strong></h1>
</div>
<p>{{ this.flashSession.output() }}</p>
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3 d-sm-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Data Pengecekan</h6>
        {# <a href="{{ url('admin/pengumuman/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambahkan Pengumuman</a> #}
</div>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Action</th>
            <th>Suhu Tubuh</th>
            <th>Frekuensi Napas</th>
            <th>Gejala</th>
            <th>Riwayat Perjalanan</th>
            <th>Status Cek</th>
            <th>Hasil</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Action</th>
            <th>Suhu Tubuh</th>
            <th>Frekuensi Napas</th>
            <th>Gejala</th>
            <th>Riwayat Perjalanan</th>
            <th>Status Cek</th>
            <th>Hasil</th>
        </tr>
        </tfoot>
        <tbody>
        {% for cek in ceks %}
        <tr>
            <td class="align-middle text-center">
                <a href="{{ url('/admin/cek-kesehatan/' ~ cek.getId().id() ~ '/edit') }}">
                <button class="btn btn-warning btn-icon-split btn-sm" style="margin-bottom: 6px;">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Edit</span>
                </button> </a>
            </td>
            <td>{{ cek.getSuhuTubuh() }}</td>
            <td>{{ cek.getFrekuensiNapas() }}</td>
            <td>{{ cek.getGejalaLain() }}</td>
            <td>{{ cek.getRiwayatPerjalanan() }}</td>
            <td>{{ cek.getIsChecked() }}</td>
            <td>{{ cek.getHasil() }}</td>
        </tr>
        {% endfor %}
        </tbody>
    </table>
    </div>
</div>
</div>


{% endblock %}

{% block scripts %}
<script>
    $("#nav-cek").addClass("active");
</script>
{% endblock %}