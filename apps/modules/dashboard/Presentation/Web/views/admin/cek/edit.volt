{% extends 'admin/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cek Kesehatan</h1>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3 border-bottom-primary">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pengecekan</h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ url('admin/cek-kesehatan/' ~ cek.getId().id() ~ '/edit/submit') }}" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="title" class="col-sm-1 col-form-label text-lg">Suhu Tubuh</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="suhuTubuh" placeholder="Berapa celcius?" value="{{ cek.getSuhuTubuh() }}" readonly>
                    </div>

                    <label for="title" class="col-sm-2 col-form-label text-lg">Frekuensi Nafas</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="frekuensiNapas" placeholder="Hitung banyak napas dalam 1 menit" value="{{ cek.getFrekuensiNapas() }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="text-lg">Gejala</label>
                    <textarea name="gejalaLain" class="form-control" rows="4" placeholder="Contoh: Batuk, Radang Tenggorokan, " readonly>{{ cek.getGejalaLain() }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description" class="text-lg">Riwayat Perjalanan</label>
                    <textarea name="riwayatPerjalanan" class="form-control" rows="4" placeholder="Ceritakan Perjalanan anda dalam 14 hari terakhir" readonly>{{ cek.getRiwayatPerjalanan() }}</textarea>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-sm-1 col-form-label text-lg">Hasil</label>
                    <div class="col-sm-5">
                        <select class="custom-select" id="provinsi" name="hasil" required>
                            <option selected disabled>Pilih Hasil...</option>
                            <option value="Sehat, Diam di rumah">Sehat, tetap diam di rumah</option>
                            <option value="Ada kemungkinan, Periksa di RS terdekat">Ada kemungkinan, Periksa di RS terdekat</option>
                            <option value="Sangat berkemungkinan, segera menuju RS Rujukan">Sangat berkemungkinan, segera menuju RS Rujukan</option>
                        </select>
                    </div>
                </div>

                <div class="my-2 mt-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
$("#nav-cek").addClass("active");

</script>
{% endblock %}