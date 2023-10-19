<script>
    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
    if (isFluid) {
        var container = document.querySelector('[data-layout]');
        container.classList.remove('container');
        container.classList.add('container-fluid');
    }
</script>

<nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
        </div><a class="navbar-brand" href="index-2.html">
            <div class="d-flex align-items-center py-3"><img class="me-2"
                    src="{{ asset('assets/img/logos/finsol.png') }}" alt=""
                    width="120" /></div>
        </a>
    </div>
    <!-- Current Sidebar -->
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-chart-pie"></span></span><span
                                class="nav-link-text ps-1">Dashboard</span></div>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#users" role="button" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="forms">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-file-alt"></span></span><span class="nav-link-text ps-1">Users</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="users">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/users/all') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Users</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>
                        @if(Auth::user()->type_of_user === 'Head Office')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/employee/all') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Employee</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/users/addform') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add Employee</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>
                        @endif
                    </ul>
                </li>
                @if(Auth::user()->type_of_user === 'Head Office')
                <li class="nav-item">
                    <a class="nav-link dropdown-indicator" href="#payment" role="button" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="forms">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-rupee-sign"></span></span><span class="nav-link-text ps-1">Payment</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="payment">

                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/payment/history') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">History</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/payment/form-value') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Form Value</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>
                    </ul>
                </li>
                @endif
            </ul>

        </div>
    </div>
</nav>
<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg" style="display: none;">
    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false"
        aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                class="toggle-line"></span></span></button>
    <a class="navbar-brand me-1 me-sm-3" href="index-2.html">
        <div class="d-flex align-items-center">
            <img class="me-2" src="{{ asset('assets/img/logos/finsol.png') }}" alt=""
                width="40" />
        </div>
    </a>
    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
        <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dashboards">Dashboard13</a>

            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
        <li class="nav-item px-2">
            <div class="theme-control-toggle fa-icon-wait"><input
                    class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox"
                    data-theme-control="theme" value="dark" /><label
                    class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                    data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span
                        class="fas fa-sun fs-0"></span></label><label
                    class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                    data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span
                        class="fas fa-moon fs-0"></span></label></div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="{{ asset('../../../assets/img/team/3-thumb.png') }}"
                        alt="" />
                </div>
            </a>
            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0"
                aria-labelledby="navbarDropdownUser">
                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                    <a class="dropdown-item fw-bold text-warning" href="#!"><span
                            class="fas fa-crown me-1"></span><span>Go Pro</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#!">Set status</a>
                    <a class="dropdown-item" href="pages/user/profile.html">Profile &amp; account</a>
                    <a class="dropdown-item" href="#!">Feedback</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pages/user/settings.html">Settings</a>
                    <a class="dropdown-item" href="pages/authentication/card/logout.html">Logoutss</a>
                </div>
            </div>
        </li>
    </ul>
</nav>
<div class="content">
    <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand" style="display: none;">
        <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
            aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                    class="toggle-line"></span></span></button>
        <a class="navbar-brand me-1 me-sm-3" href="index-2.html">
            <div class="d-flex align-items-center"><img class="me-2"
                    src="{{ asset('assets/img/logos/finsol.png') }}" alt=""
                    width="40" /><span class="font-sans-serif">falcon</span></div>
        </a>
        <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
            <li class="nav-item px-2">
                <div class="theme-control-toggle fa-icon-wait"><input
                        class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle"
                        type="checkbox" data-theme-control="theme" value="dark" /><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span
                            class="fas fa-sun fs-0"></span></label><label
                        class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span
                            class="fas fa-moon fs-0"></span></label></div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-xl">
                        <img class="rounded-circle" src="{{ asset('assets/img/team/3-thumb.png') }}"
                            alt="" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0"
                    aria-labelledby="navbarDropdownUser">
                    <div class="bg-white dark__bg-1000 rounded-2 py-2">
                        <!-- <a class="dropdown-item" href="pages/authentication/card/logout.html">Logout1</a> -->
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                            style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a class="dropdown-item"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <script>
        var navbarPosition = localStorage.getItem('navbarPosition');
        var navbarVertical = document.querySelector('.navbar-vertical');
        var navbarTopVertical = document.querySelector('.content .navbar-top');
        var navbarTop = document.querySelector('[data-layout] .navbar-top:not([data-double-top-nav');
        var navbarDoubleTop = document.querySelector('[data-double-top-nav]');
        var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');

        if (localStorage.getItem('navbarPosition') === 'double-top') {
            document.documentElement.classList.toggle('double-top-nav-layout');
        }

        if (navbarPosition === 'top') {
            navbarTop.removeAttribute('style');
            navbarTopVertical.remove(navbarTopVertical);
            navbarVertical.remove(navbarVertical);
            navbarTopCombo.remove(navbarTopCombo);
            navbarDoubleTop.remove(navbarDoubleTop);
        } else if (navbarPosition === 'combo') {
            navbarVertical.removeAttribute('style');
            navbarTopCombo.removeAttribute('style');
            navbarTop.remove(navbarTop);
            navbarTopVertical.remove(navbarTopVertical);
            navbarDoubleTop.remove(navbarDoubleTop);
        } else if (navbarPosition === 'double-top') {
            navbarDoubleTop.removeAttribute('style');
            navbarTopVertical.remove(navbarTopVertical);
            navbarVertical.remove(navbarVertical);
            navbarTop.remove(navbarTop);
            navbarTopCombo.remove(navbarTopCombo);
        } else {
            navbarVertical.removeAttribute('style');
            navbarTopVertical.removeAttribute('style');
            navbarTop.remove(navbarTop);
            navbarDoubleTop.remove(navbarDoubleTop);
            navbarTopCombo.remove(navbarTopCombo);
        }
    </script>
