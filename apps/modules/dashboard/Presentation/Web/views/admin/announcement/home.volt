{% extends 'admin/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}

<!-- Page Heading -->
<div class="align-items-center text-center mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>PENGUMUMAN</strong></h1>
</div>
<p>{{ this.flashSession.output() }}</p>
<!-- DataTables Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengumuman</h6>
            <a href="{{ url('admin/pengumuman/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambahkan Pengumuman</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Waktu</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Waktu</th>
                </tr>
                </tfoot>
                <tbody>
                {% for announcement in announcements %}
                <tr>
                    <td>{{ announcement.getTitle() }}</td>
                    <td>{{ announcement.getContent() }}</td>
                    <td>{{ announcement.getTimestamp() }}</td>
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
    $("#nav-pengumuman").addClass("active");
</script>
{% endblock %}