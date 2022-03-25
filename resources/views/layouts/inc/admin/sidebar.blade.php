@php
$menus = config('menu');
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <i class="fas fa-home"></i>
        <span class="brand-text font-weight-light">Trang chủ</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a href="{{ route($menu['route']) }}" class="nav-link">
                            <i class="nav-icon fas {{ $menu['icon'] }}"></i>
                            <p>
                                {{ $menu['label'] }}
                            </p>
                        </a>
                        @if (!empty($menu['items']))
                            <ul class="nav nav-treeview">
                                @foreach ($menu['items'] as $m)
                                    <li class="nav-item">
                                        <a href="{{ route($m['route']) }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ $m['label'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
