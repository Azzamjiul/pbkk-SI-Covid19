{% extends 'hospital/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pasien</h1>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3 border-bottom-primary">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pasien</h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ url('rumah-sakit/pasien/' ~ pasien.getId().id() ~ '/edit/submit') }}" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label text-lg">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="namaLengkap" placeholder="Nama lengkap" value="{{ pasien.getNamaLengkap() }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label text-lg">Provinsi</label>
                    <div class="col-sm-5">
                        <select class="custom-select" id="provinsi" required>
                            <option disabled>Pilih Provinsi...</option>
                            {% for province in provinces %}
                                {% if province.getName() == pasien.getNamaProvinsi() %}
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
                            <option selected>{{ pasien.getNamaKabupaten() }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label text-lg">Kecamatan</label>
                    <div class="col-sm-5">
                        <select class="custom-select" id="kecamatan" name="districtId" required>
                            <option value="{{ pasien.getDistrictId() }}" selected>{{ pasien.getNamaKecamatan() }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label text-lg">Alamat</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="alamat" placeholder="Jalan..." value="{{ pasien.getAlamat() }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label text-lg">Jenis Kelamin</label>
                    <div class="col-sm-5">
                        <div class="form-check">
                            {% if pasien.getJenisKelamin() == "L" %}
                            <input class="form-check-input" type="radio" name="jenisKelamin" value="L" checked>
                            {% else %}
                            <input class="form-check-input" type="radio" name="jenisKelamin" value="L">
                            {% endif %}
                            <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            {% if pasien.getJenisKelamin() == "P" %}
                            <input class="form-check-input" type="radio" name="jenisKelamin" value="P" checked>
                            {% else %}
                            <input class="form-check-input" type="radio" name="jenisKelamin" value="P">
                            {% endif %}
                            <label class="form-check-label">Perempuan</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label text-lg">Tinggi Badan</label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" name="tinggiBadan" placeholder="(meter)" value="{{ pasien.getTinggiBadan() }}" required>
                    </div>
                    <label for="title" class="col-sm-2 col-form-label text-lg">Berat Badan</label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" name="beratBadan" placeholder="(kilogram)" value="{{ pasien.getBeratBadan() }}" required>
                    </div>
                    <label for="title" class="col-sm-2 col-form-label text-lg">Tekanan darah</label>
                    <div class="col-sm-2">
                        <input class="form-control" type="text" name="tekananDarah" placeholder="cth: 110/80 mmHg" value="{{ pasien.getTekananDarah() }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label text-lg">Jenis Penyakit</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="jenisPenyakit" placeholder="Jenis Penyakit" value="{{ pasien.getJenisPenyakit() }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="text-lg col-sm-2">Riwayat Penyakit</label>
                    <div class="col-sm-10">
                        <textarea name="riwayatPenyakit" class="form-control" rows="4"  value="{{ pasien.getRiwayatPenyakit() }}"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="text-lg col-sm-2">Alergi</label>
                    <div class="col-sm-10">
                        <textarea name="alergi" class="form-control" rows="4" value="{{ pasien.getAlergi() }}"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label text-lg">Status</label>
                    <div class="col-sm-5">
                        <select class="custom-select" name="statusId" required>
                            <option disabled>Status Kondisi Pasien...</option>
                            {% for statuscovid in statusCovids %}
                                {% if statuscovid.getNama() == pasien.getNamaStatus() %}
                                <option value="{{ statuscovid.getId() }}" selected>{{ statuscovid.getNama() }}</option>
                                {% else %}
                                <option value="{{ statuscovid.getId() }}">{{ statuscovid.getNama() }}</option>
                                {% endif %}
                            {% endfor %}
                        </select>
                    </div>
                </div>

                <div class="my-2 text-center">
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
$("#nav-pasien").addClass("active");

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