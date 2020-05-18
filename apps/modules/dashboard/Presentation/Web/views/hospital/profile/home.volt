{% extends 'hospital/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Rumah Sakit</h1>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3 border-bottom-primary">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profil Rumah Sakit</h6>
        </div>
    </div>
    
    <div class="card-body">
    <p>{{ this.flashSession.output() }}</p>
        <form method="POST" action="{{ url('rumah-sakit/profil/submit') }}" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label text-lg">Nama Rumah Sakit</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" placeholder="Nama Rumah Sakit" value="{{ hospital.getName() }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label text-lg">Provinsi</label>
                <div class="col-sm-5">
                    <select class="custom-select" id="provinsi" required>
                        <option selected disabled>Pilih Provinsi...</option>
                        {% for province in provinces %}
                            {% if province.getName() == hospital.getNamaProvinsi() %}
                                <option value="{{ province.getId() }}" selected>{{ province.getName() }}</option>
                            {% else %}
                                <option value="{{ province.getId() }}">{{ province.getName() }}</option>
                            {% endif %}
                        {% endfor %}
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label text-lg">Kabupaten</label>
                <div class="col-sm-5">
                    <select class="custom-select" id="kabupaten" required>
                        <option selected>{{ hospital.getNamaKabupaten() }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label text-lg">Kecamatan</label>
                <div class="col-sm-5">
                    <select class="custom-select" id="kecamatan" name="district_id" required>
                        <option value="{{ hospital.getDistrictId() }}" selected>{{ hospital.getNamaKecamatan() }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label text-lg">Alamat</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="address" placeholder="Jalan..." value="{{ hospital.getAddress() }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label text-lg">Kuota Pasien</label>
                <div class="col-sm-2">
                    <input class="form-control" type="text" name="quota" placeholder="Kuota" value="{{ hospital.getQuota() }}" required>
                </div>
                <label for="title" class="col-sm-2 col-form-label text-lg">Kuota Terisi</label>
                <div class="col-sm-2">
                    <input class="form-control" type="text" name="filled" placeholder="Kuota Terisi" value="{{ hospital.getFilled() }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label text-lg">Jumlah Dokter</label>
                <div class="col-sm-2">
                    <input class="form-control" type="text" name="doctor_number" placeholder="Jumlah Dokter" value="{{ hospital.getDoctorNumber() }}" required>
                </div>
                <label for="title" class="col-sm-2 col-form-label text-lg">Jumlah Perawat</label>
                <div class="col-sm-2">
                    <input class="form-control" type="text" name="nurse_number" placeholder="Jumlah Perawat" value="{{ hospital.getNurseNumber() }}" required>
                </div>
                <label for="title" class="col-sm-2 col-form-label text-lg">Jumlah Tenaga Medis Lain</label>
                <div class="col-sm-2">
                    <input class="form-control" type="text" name="personnel_number" placeholder="Jumlah Perawat" value="{{ hospital.getPersonnelNumber() }}" required>
                </div>
            </div>

            <div class="my-2 text-center">
                <button style="margin-top: 100px;" type="submit" class="btn btn-lg btn-primary">Change</button>
            </div>
        </form>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
$("#nav-profil").addClass("active");

$("#provinsi").change(function() {
    $("#kabupaten option").remove();

    let id = $(this).find(":selected").val();

    $.ajax({
        url: '{{ url('get/regency') }}',
        data: {
            "provinceId": id
        },
        type: 'POST',
        dataType: 'json',
        success: function(results) {
                $('#kabupaten').append('<option selected disabled>Pilih Kabupaten...</option>');
            $.each(results, function(k, v) {
                $('#kabupaten').append($('<option>', {value:k, text:v}));
            });
        },
        error: function() {
            alert('error..');
        }
    });
});

$("#kabupaten").change(function() {
    $("#kecamatan option").remove();

    let id = $(this).find(":selected").val();

    $.ajax({
        url: '{{ url('get/district') }}',
        data: {
            "regencyId": id
        },
        type: 'POST',
        dataType: 'json',
        success: function(results) {
                $('#kecamatan').append('<option selected disabled>Pilih Kecamatan...</option>');
            $.each(results, function(k, v) {
                $('#kecamatan').append($('<option>', {value:k, text:v}));
            });
        },
        error: function($e) {
            console.log($e);
        }
    });
});
</script>
{% endblock %}