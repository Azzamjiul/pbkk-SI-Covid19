<nav class="navbar navbar-expand-lg navbar-light bg-white pt-3 pb-3">
	<!-- Navbar content -->
	<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('assets/img/logo.png') }}" width="52px" height="auto"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="{{ url('/') }}"><b>BERANDA</b></a>
			</li>
			
			{% if cek is defined %}
			<li class="nav-item"  data-toggle="modal" data-target="#modal-cek">
				<a class="nav-link" href="#"><b>CEK KESEHATAN</b></a>
			</li>

				<!-- Modal -->
				<div class="modal fade" id="modal-cek" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Hasil Pengecekan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							{{ cek.getHasil() }}
						</div>
						</div>
					</div>
				</div>

			{% else %}
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/cek-kesehatan') }}"><b>CEK KESEHATAN</b></a>
			</li>
			{% endif %}

			<li class="nav-item" data-toggle="modal" data-target="#modal-pengumuman">
				<a class="nav-link" href="#"><b>PENGUMUMAN</b></a>
			</li>
			{% if auth is defined %}
				{% if auth['role'] == 1 %}
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/admin') }}"><b>ADMIN</b></a>
				</li>
				{% elseif auth['role'] == 2 %}
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/rumah-sakit') }}"><b>RUMAH SAKIT</b></a>
				</li>
				{% endif %}
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><b> {{ auth['username'] }}</b></a>
				<div class="dropdown-menu">
					{# <a class="dropdown-item" href="{{ url("user/" ~ auth['id']) }}">Data Profil</a> #}
					<div class="dropdown-divider"></div>
					<form method="POST" action="{{ url('logout/submit') }}">
						{# CSRF Token #}
						<input type='hidden' name="{{ this.security.getTokenKey() }}" value="{{ this.security.getToken() }}" />
						<button type="submit" class="dropdown-item">Logout</button>
					</form>
				</div>
			</li>
			{% else %}
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/login') }}"><b>LOGIN</b></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/register') }}"><b>DAFTAR</b></a>
			</li>
			{% endif %}
		</ul>
	</div>
</nav>

<!-- Modal -->
<div class="modal fade" id="modal-pengumuman" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle">{{ announcement.getTitle() }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		{{ announcement.getContent() }}
      </div>
      <div class="modal-footer">
        Diposting tanggal {{ announcement.getDateOnly() }}
      </div>
    </div>
  </div>
</div>