<section class="sidebar">
    {{-- panel pengguna --}}
    <div class="user-panel">
        <div class="image pull-left"><img alt="Pengguna" class="img-circle" src="{{ asset ('Gambar/alexander.jfif')}}"></div>
        <div class="info pull-left">
            <p>Alexander Pierce</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    {{-- panel pengguna --}}
    {{-- pencarian --}}
    <form action="#" class="sidebar-form">
        <div class="input-group">
            <input class="form-control" name="q" placeholder="Cari..." type="text">
            <span class="input-group-btn">
                <button class="btn btn-flat" id="search-btn" name="search" type="submit"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    {{-- pencarian --}}
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li {!! url()->current() === route('dashboard') ? 'class="active"' : '' !!}>
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-tachometer"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li {!! url()->current() === route('employee.index') ? 'class="active"' : '' !!}>
            <a href="{{ route('employee.index') }}">
                <i class="fa fa-users"></i>
                <span>Employees</span>
            </a>
        </li>
    </ul>
</section>
