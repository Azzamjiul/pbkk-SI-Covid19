{% extends 'hospital/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<div class="text-center mb-5 mt-1">
    <h1> Antrean Rumah Sakit {{ hospital.getName() }} </h1>
</div>
<p>{{ this.flashSession.output() }}</p>
<div class="card shadow mb-4">
    <div class="card-body text-center">
        <h5>Status Antrean: 
            {% if hospital.getQueueStatus() %}
                Dibuka
            {% else %}
                Ditutup
            {% endif %}
        </h5>
        <h4><?php echo "$mydate[weekday], $mydate[mday] $mydate[month] $mydate[year]"; ?></h4>
        <br/>
        <h1>10/100</h1>
        <br/>
        <table>
            <tr><a style="margin-right: 1rem;" class="btn btn-primary" href="{{url('/')}}">Back</a></tr>
            <tr><a style="margin-left: 1rem;" class="btn btn-primary" href="{{url('/')}}">Next</a></tr>
        </table>
        <br/>
        <form method="POST" action="{{ url('/rumah-sakit/update-queue-status') }}">
            <?php
                if( !$hospital->getQueueStatus() )
                {
                    echo "<input type='hidden' name='newStatus' value='1'>";
                    echo "<button type='submit' class='btn btn-primary btn-submit'>Buka Antrean</button>";
                }
                else
                {
                    echo "<input type='hidden' name='newStatus' value='0'>";
                    echo "<button type='submit' class='btn btn-primary btn-submit'>Tutup Antrean</button>";
                }
            ?>
        </form>
    </div>
</div>

{% endblock %}

{% block scripts %}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $("#nav-dashboard").addClass("active");

    $(document).on('click', ".edit", async function() {
        const dataId = $(this).attr('data-id');
        console.log(dataId)
        swal({
          title: "Apakah kamu yakin?",
          text: "Mengatur akun ini menjadi Admin berarti punya hak akses sepenuhnya",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $('#idUser').val(dataId);
            $('#editUser').submit();
          } else {
            return false;
          }
        });
    });
</script>
{% endblock %}