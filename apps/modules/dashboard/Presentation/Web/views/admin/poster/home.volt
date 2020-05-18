{% extends 'admin/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}

<!-- Page Heading -->
<div class="align-items-center text-center mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>POSTER</strong></h1>
</div>
<p>{{ this.flashSession.output() }}</p>
<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengumuman</h6>
            <a href="{{ url('admin/poster/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambahkan Poster</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                {% for poster in posters %}
                <tr>
                    <td>{{ poster.getName() }}</td>
                    <td>{{ poster.getPath() }}</td>
                    <td></td>
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
    $("#nav-poster").addClass("active");
</script>
{% endblock %}