{% extends 'layout.volt' %}

{% block title %}asd{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<div class="text-center mt-1 mb-4">
    <h1> Pengecekan Kesehatan Gejala COVID-19 </h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 border-bottom-primary text-center">
        <h6 class="m-0 font-weight-bold text-primary">Mohon Isi Formulir dengan Lengkap</h6>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ url('cek-kesehatan/submit') }}" enctype="multipart/form-data">
            <input type="hidden" name="userId" value="{{ auth['id'] }}">
            <div class="form-group row">
                <label for="title" class="col-sm-1 col-form-label text-lg">Suhu Tubuh</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="suhuTubuh" placeholder="Berapa celcius?" required autofocus>
                </div>

                <label for="title" class="col-sm-2 col-form-label text-lg">Frekuensi Nafas</label>
                <div class="col-sm-5">
                    <input class="form-control" type="text" name="frekuensiNapas" placeholder="Hitung banyak napas dalam 1 menit" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="text-lg">Gejala</label>
                <textarea name="gejalaLain" class="form-control" rows="4" placeholder="Contoh: Batuk, Radang Tenggorokan, " required></textarea>
            </div>

            <div class="form-group">
                <label for="description" class="text-lg">Riwayat Perjalanan</label>
                <textarea name="riwayatPerjalanan" class="form-control" rows="4" placeholder="Ceritakan Perjalanan anda dalam 14 hari terakhir" required></textarea>
            </div>

            <div class="my-2 mt-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
{% endblock %}

{% block scripts %}

{% endblock %}