{% extends 'hospital/layout.volt' %}

{% block title %}PENGANTRE{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}

<!-- Page Heading -->
<div class="align-items-center text-center mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>PENGANTRE</strong></h1>
</div>
<p>{{ this.flashSession.output() }}</p>
<!-- DataTales Example -->
<div class="card shadow mb-4">
<!-- <div class="card-header py-3 d-sm-flex justify-content-between"> -->
    <!-- <h6 class="m-0 font-weight-bold text-primary">Data Pengantre</h6> -->
        <!-- <a href="{{ url('rumah-sakit/pasien/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambahkan Pasien</a> -->
<!-- </div> -->

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Nomor</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Nomor</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
            {% for queue in queues %}
                {% if queue.getHospitalId() == this.session.auth['hospital_id'] %}
                {% for user in users %}
                {% if queue.getUserId() == user.getUserId().id() %}
                <tr>
                    <td></td>
                    <td>{{ user.getUsername() }}</td>
                    <td>{{ user.getEmail() }}</td>
                    <td>{{ queue.getStatus() }}</td>
                    <td>Masih Belum Buat Fungsinya</td>
                </tr>
                {% endif %}
                {% endfor %}
                {% endif %}
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>
</div>

{% endblock %}

{% block scripts %}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $("#nav-pengantre").addClass("active");
</script>
{% endblock %}