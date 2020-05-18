{% extends 'hospital/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

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