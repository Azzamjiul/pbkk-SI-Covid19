{% extends 'admin/layout.volt' %}

{% block title %}Dashboard{% endblock %}

{% block styles %}

<style>

</style>

{% endblock %}

{% block content %}
<div class="text-center mb-5 mt-1">
    <h1> Selamat Datang! </h1>
</div>
<p>{{ this.flashSession.output() }}</p>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data User dan Admin</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Tipe Akun</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Tipe Akun</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                {% for user in users %}
                <tr>
                    <td>{{ user.getUsername() }}</td>
                    <td>{{ user.getEmail() }}</td>
                    {% if user.getRole() == 1 %}
                        <td>Admin</td>
                        <td></td>
                    {% else %}
                        <td>User</td>
                        <td class="align-middle text-center">
                            <button class="btn btn-warning btn-icon-split btn-sm edit" data-id="{{ user.getUserId().id() }}">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Edit Tipe Akun</span>
                            </button>
                        </td>
                    {% endif %}
                </tr>
                {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>

<form method="post" id="editUser" action="{{ url('admin/user/rolesubmit' ) }}">
    <input type="hidden" name="userId" id="idUser">
</form> 

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