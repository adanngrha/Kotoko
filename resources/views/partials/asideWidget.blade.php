<!-- aside Widget -->
<div class="aside">
    <h4>Informasi Akun</h4>
    <h5><a href="/account" class="{{ Request::is('account*') ? 'active' : '' }}"><i class="fa fa-fw fa-user-o"></i> Profil Saya {{-- <divclass="notif"></div> --}}</a></h5>
    <h5><a href="/address" class="{{ Request::is('address*') ? 'active' : '' }}"><i class="fa fa-fw fa-map-marker"></i> Alamat Saya</a></h5>
    <h5><a href="/favorite" class="{{ Request::is('favorite*') ? 'active' : '' }}"><i class="fa fa-fw fa-heart"></i> Favorit Saya</a></h5>
    <h5><a href="/order" class="{{ Request::is('order*') ? 'active' : '' }}"><i class="fa fa-fw fa-file-text-o"></i> Pesanan Saya</a></h5>
    <br>
    <h5><a href="/logout"><i class="fa fa-fw fa-sign-out"></i> Keluar</a></h5>
</div>
<!-- /aside Widget -->
