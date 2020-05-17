{% extends 'hospital/layout.volt' %}

{% block title %}Pasien{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}

<!-- Page Heading -->
<div class="align-items-center text-center mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>PASIEN</strong></h1>
</div>
<p>{{ this.flashSession.output() }}</p>
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3 d-sm-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
        <a href="{{ url('rumah-sakit/pasien/add') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambahkan Pasien</a>
</div>

<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Action</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Kabupaten</th>
            <th>Provinsi</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Action</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Kabupaten</th>
            <th>Provinsi</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
        </tr>
        </tfoot>
        <tbody>
        {% for pasien in pasiens %}
        {% if pasien.getHospitalId()==hospital_id %}
        <tr>
            <td class="align-middle text-center">
                <a href="{{ url('/admin/pasien/' ~ pasien.getId().id() ~ '/edit') }}"><button class="btn btn-warning btn-icon-split btn-sm" style="margin-bottom: 6px;">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">Edit</span>
                </button> </a><br>
                <button class="btn btn-danger btn-icon-split btn-sm delete" data-id="{{ pasien.getId().id() }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Delete</span>
                </button>
            </td>
            <td>{{ pasien.getNamaLengkap() }}</td>
            <td>{{ pasien.getAlamat() }} Kec.{{ pasien.getNamaKecamatan() }}</td>
            <td>{{ pasien.getNamaKabupaten() }}</td>
            <td>{{ pasien.getNamaProvinsi() }}</td>
            <td>{{ pasien.getJenisKelamin() }}</td>
            <td>{{ pasien.getNamaStatus() }}</td>

            <form method="post" id="deletePasien" action="{{ url('admin/pasien/delete' ) }}">
                <input name="_method" type="hidden" value="DELETE">
                <input type="hidden" name="id" id="idPasien">
            </form> 
        </tr>
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
    $("#nav-pasien").addClass("active");

    $(document).on('click', ".delete", async function() {
        const dataId = $(this).attr('data-id');
        console.log(dataId)
        swal({
          title: "Are you sure?",
          text: "Data yang telah dihapus tidak dapat dikembalikan!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $('#idPasien').val(dataId);
            $('#deletePasien').submit();
          } else {
            return false;
          }
        });
    });
</script>
{% endblock %}