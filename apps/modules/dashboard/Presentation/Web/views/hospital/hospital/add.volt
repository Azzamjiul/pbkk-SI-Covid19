{% extends 'admin/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rumah Sakit</h1>
    </div>
    <p>{{ this.flashSession.output() }}</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3 border-bottom-primary">
            <h6 class="m-0 font-weight-bold text-primary">Tambahkan Rumah Sakit</h6>
        </div>
        
        <div class="card-body">
            <form method="POST" action="{{ url('admin/rumah-sakit/add/submit') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Rumah Sakit</label>
                    <input type="text" class="form-control" placeholder="Nama Rumah Sakit" name="name" required="required">
                </div>
                <div class="form-group">
                    <label>Provinsi</label>
                    <select id="provinsi" class="custom-select" required>
                        <option selected disabled>Pilih Provinsi</option>
                        {% for province in provinces %}
                            <option value="{{ province.getId() }}">{{ province.getName() }}</option>
                        {% endfor %}
                      </select>
                </div>
                <div class="form-group">
                    <label>Kota / Kabupaten</label>
                    <select id="kabupaten" class="custom-select" required>
                        <option selected disabled>Pilih Kota / Kabupaten</option>
                      </select>
                </div>
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select id="kecamatan" name="districtId" class="custom-select" required>
                        <option selected disabled>Pilih Kecamatan</option>
                      </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" placeholder="Alamat" name="address" required="required">
                </div>

                <!-- <div class="form-group row">
                    <label for="title" class="col-sm-1 col-form-label text-lg">Judul</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="title" placeholder="Input Judul" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="text-lg">Isi</label>
                    <textarea name="content" class="form-control" id="content" rows="3" required></textarea>
                </div> -->

                <div class="my-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
    $("#nav-rumahsakit").addClass("active");

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
                    $('#kabupaten').append('<option selected disabled>Pilih Kota / Kabupaten</option>');
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
                    $('#kecamatan').append('<option selected disabled>Pilih Kecamatan</option>');
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