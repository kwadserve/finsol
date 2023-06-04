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
                    src="{{asset('assets/img/icons/spot-illustrations/falcon.png')}}" alt="" width="40" /><span
                    class="font-sans-serif">falcon</span></div>
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
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Modules</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div><!-- parent pages-->
                    <a class="nav-link dropdown-indicator" href="#users" role="button"
                        data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-file-alt"></span></span><span class="nav-link-text ps-1">Users</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="users">

                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/users/all') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All</span>
                                </div>
                            </a><!-- more inner pages-->
                        </li>
                </li>

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
        <div class="d-flex align-items-center"><img class="me-2"
                src="{{ asset('assets/img/icons/spot-illustrations/falcon.png')}}" alt="" width="40" /><span
                class="font-sans-serif">falcon</span></div>
    </a>
    <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
        <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dashboards">Dashboard13</a>

            </li>


            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="moduless">Modules</a>
                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="moduless">
                    <div class="card navbar-card-components shadow-none dark__bg-1000">
                        <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown"
                                src="{{ asset('assets/img/icons/spot-illustrations/authentication-corner.png')}}" width="130"
                                alt="" />
                            <div class="row">
                                <div class="col-6 col-xxl-3">
                                    <div class="nav flex-column">
                                        <p class="nav-link text-700 mb-0 fw-bold">Components</p><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/icons/feather.html">Feather</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/icons/material-icons.html">Material icons</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/maps/google-map.html">Google map</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/maps/leaflet-map.html">Leaflet map</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/accordion.html">Accordion</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/alerts.html">Alerts</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/anchor.html">Anchor</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/animated-icons.html">Animated icons</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/background.html">Background</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/badges.html">Badges</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/bottom-bar.html">Bottom bar<span
                                                class="badge rounded-pill ms-2 badge-subtle-success">New</span></a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/breadcrumbs.html">Breadcrumbs</a>
                                    </div>
                                </div>
                                <div class="col-6 col-xxl-3">
                                    <div class="nav flex-column mt-md-4 pt-md-1"><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/buttons.html">Buttons</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/calendar.html">Calendar</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/cards.html">Cards</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/carousel/bootstrap.html">Bootstrap
                                            carousel</a><a class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/carousel/swiper.html">Swiper</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/collapse.html">Collapse</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/cookie-notice.html">Cookie notice</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/countup.html">Countup</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/draggable.html">Draggable</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/dropdowns.html">Dropdowns</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/jquery-components.html">Jquery<span
                                                class="badge rounded-pill ms-2 badge-subtle-success">New</span></a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/list-group.html">List group</a></div>
                                </div>
                                <div class="col-6 col-xxl-3">
                                    <div class="nav flex-column mt-xxl-4 pt-xxl-1"><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/modals.html">Modals</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/navs-and-tabs/navs.html">Navs</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/navs-and-tabs/navbar.html">Navbar</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/navs-and-tabs/vertical-navbar.html">Navbar
                                            vertical</a><a class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/navs-and-tabs/top-navbar.html">Top
                                            nav</a><a class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/navs-and-tabs/double-top-navbar.html">Double
                                            top<span
                                                class="badge rounded-pill ms-2 badge-subtle-success">New</span></a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/navs-and-tabs/combo-navbar.html">Combo
                                            nav</a><a class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/navs-and-tabs/tabs.html">Tabs</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/offcanvas.html">Offcanvas</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/pictures/avatar.html">Avatar</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/pictures/images.html">Images</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/pictures/figures.html">Figures</a></div>
                                </div>
                                <div class="col-6 col-xxl-3">
                                    <div class="nav flex-column mt-xxl-4 pt-xxl-1"><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/pictures/hoverbox.html">Hoverbox</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/pictures/lightbox.html">Lightbox</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/progress-bar.html">Progress bar</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/placeholder.html">Placeholder</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/pagination.html">Pagination</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/popovers.html">Popovers</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/scrollspy.html">Scrollspy</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/search.html">Search</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/spinners.html">Spinners</a></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-xxl-3">
                                    <div class="nav flex-column">
                                        <p class="nav-link text-700 mb-0 fw-bold">Forms</p><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/basic/form-control.html">Form control</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/basic/input-group.html">Input group</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/basic/select.html">Select</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/basic/checks.html">Checks</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/basic/range.html">Range</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/basic/layout.html">Layout</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/advance/advance-select.html">Advance
                                            select</a><a class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/advance/date-picker.html">Date picker</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/advance/editor.html">Editor</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/advance/emoji-button.html">Emoji button</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/advance/file-uploader.html">File uploader</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/advance/input-mask.html">Input mask</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/advance/range-slider.html">Range slider</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/advance/rating.html">Rating</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/floating-labels.html">Floating labels</a>
                                    </div>
                                </div>
                                <div class="col-6 col-xxl-3">
                                    <div class="nav flex-column">
                                        <p class="nav-link text-700 mb-0 fw-bold">Tables</p><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/wizard.html">Wizard</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/forms/validation.html">Validation</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/tables/basic-tables.html">Basic tables</a>
                                        <p class="nav-link text-700 mb-0 fw-bold">Charts</p><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/tables/advance-tables.html">Advance tables</a>
                                        <p class="nav-link text-700 mb-0 fw-bold">ECharts</p><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/tables/bulk-select.html">Bulk select</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/chartjs.html">Chartjs</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/d3js.html">D3js<span
                                                class="badge rounded-pill ms-2 badge-subtle-success">New</span></a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/echarts/line-charts.html">Line charts</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/echarts/bar-charts.html">Bar charts</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/echarts/candlestick-charts.html">Candlestick
                                            charts</a><a class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/echarts/geo-map.html">Geo map</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/echarts/scatter-charts.html">Scatter
                                            charts</a><a class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/echarts/pie-charts.html">Pie charts</a>
                                    </div>
                                </div>
                                <div class="col-6 col-xxl-3">
                                    <div class="nav flex-column">
                                        <p class="nav-link text-700 mb-0 fw-bold">Utilities</p><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/timeline.html">Timeline</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/toasts.html">Toasts</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/tooltips.html">Tooltips</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/treeview.html">Treeview</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/typed-text.html">Typed text</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/videos/embed.html">Embed</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/components/videos/plyr.html">Plyr</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/utilities/borders.html">Borders</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/utilities/clearfix.html">Clearfix</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/utilities/colors.html">Colors</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/utilities/colored-links.html">Colored links</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/utilities/display.html">Display</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/utilities/flex.html">Flex</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/utilities/float.html">Float</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/utilities/grid.html">Grid</a>
                                    </div>
                                </div>
                                <div class="col-6 col-xxl-3">
                                    <div class="nav flex-column pt-xxl-1">
                                        <p class="nav-link text-700 mb-0 fw-bold">Icons</p><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/echarts/gauge-charts.html">Gauge charts</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/echarts/radar-charts.html">Radar charts</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/echarts/heatmap-charts.html">Heatmap
                                            charts</a><a class="nav-link py-1 link-600 fw-medium"
                                            href="modules/charts/echarts/how-to-use.html">How to use</a>
                                        <p class="nav-link text-700 mb-0 fw-bold">Maps</p><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/icons/font-awesome.html">Font awesome</a><a
                                            class="nav-link py-1 link-600 fw-medium"
                                            href="modules/icons/bootstrap-icons.html">Bootstrap icons</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        <li class="nav-item d-none d-sm-block">
            <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait"
                href="app/e-commerce/shopping-cart.html"><span class="fas fa-shopping-cart" data-fa-transform="shrink-7"
                    style="font-size: 33px;"></span><span class="notification-indicator-number">1</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait"
                id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell"
                    data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg"
                aria-labelledby="navbarDropdownNotification">
                <div class="card card-notification shadow-none">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h6 class="card-header-title mb-0">Notifications</h6>
                            </div>
                            <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark all
                                    as read</a></div>
                        </div>
                    </div>
                    <div class="scrollbar-overlay" style="max-height:19rem">
                        <div class="list-group list-group-flush fw-normal fs--1">
                            <div class="list-group-title border-bottom">NEW</div>
                            <div class="list-group-item">
                                <a class="notification notification-flush notification-unread" href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-2xl me-3">
                                            <img class="rounded-circle" src="{{ asset('assets/img/team/1-thumb.png')}}"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1"><strong>Emma Watson</strong> replied to your comment :
                                            "Hello world 😍"</p>
                                        <span class="notification-time"><span class="me-2" role="img"
                                                aria-label="Emoji">💬</span>Just now</span>
                                    </div>
                                </a>
                            </div>
                            <div class="list-group-item">
                                <a class="notification notification-flush notification-unread" href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-2xl me-3">
                                            <div class="avatar-name rounded-circle"><span>AB</span></div>
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia
                                                Khalifa's</strong> status</p>
                                        <span class="notification-time"><span
                                                class="me-2 fab fa-gratipay text-danger"></span>9hr</span>
                                    </div>
                                </a>
                            </div>
                            <div class="list-group-title border-bottom">EARLIER</div>
                            <div class="list-group-item">
                                <a class="notification notification-flush" href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-2xl me-3">
                                            <img class="rounded-circle" src="../../../assets/img/icons/weather-sm.jpg"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1">The forecast today shows a low of 20&#8451; in
                                            California. See today's weather.</p>
                                        <span class="notification-time"><span class="me-2" role="img"
                                                aria-label="Emoji">🌤️</span>1d</span>
                                    </div>
                                </a>
                            </div>
                            <div class="list-group-item">
                                <a class="border-bottom-0 notification-unread  notification notification-flush"
                                    href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-xl me-3">
                                            <img class="rounded-circle" src="../../../assets/img/logos/oxford.png"
                                                alt="" />
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1"><strong>University of Oxford</strong> created an event :
                                            "Causal Inference Hilary 2019"</p>
                                        <span class="notification-time"><span class="me-2" role="img"
                                                aria-label="Emoji">✌️</span>1w</span>
                                    </div>
                                </a>
                            </div>
                            <div class="list-group-item">
                                <a class="border-bottom-0 notification notification-flush" href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-xl me-3">
                                            <img class="rounded-circle" src="../../../assets/img/team/10.jpg" alt="" />
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1"><strong>James Cameron</strong> invited to join the
                                            group: United Nations International Children's Fund</p>
                                        <span class="notification-time"><span class="me-2" role="img"
                                                aria-label="Emoji">🙋‍</span>2d</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center border-top"><a class="card-link d-block"
                            href="app/social/notifications.html">View all</a></div>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown px-1">
            <a class="nav-link fa-icon-wait nine-dots p-1" id="navbarDropdownMenu" role="button"
                data-hide-on-body-scroll="data-hide-on-body-scroll" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="43" viewBox="0 0 16 16"
                    fill="none">
                    <circle cx="2" cy="2" r="2" fill="#6C6E71"></circle>
                    <circle cx="2" cy="8" r="2" fill="#6C6E71"></circle>
                    <circle cx="2" cy="14" r="2" fill="#6C6E71"></circle>
                    <circle cx="8" cy="8" r="2" fill="#6C6E71"></circle>
                    <circle cx="8" cy="14" r="2" fill="#6C6E71"></circle>
                    <circle cx="14" cy="8" r="2" fill="#6C6E71"></circle>
                    <circle cx="14" cy="14" r="2" fill="#6C6E71"></circle>
                    <circle cx="8" cy="2" r="2" fill="#6C6E71"></circle>
                    <circle cx="14" cy="2" r="2" fill="#6C6E71"></circle>
                </svg></a>
            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-caret-bg"
                aria-labelledby="navbarDropdownMenu">
                <div class="card shadow-none">
                    <div class="scrollbar-overlay nine-dots-dropdown">
                        <div class="card-body px-3">
                            <div class="row text-center gx-0 gy-0">
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="pages/user/profile.html" target="_blank">
                                        <div class="avatar avatar-2xl"> <img class="rounded-circle"
                                                src="../../../assets/img/team/3.jpg" alt="" /></div>
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2">Account</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="https://themewagon.com/" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/themewagon.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Themewagon
                                        </p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="https://mailbluster.com/" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/mailbluster.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Mailbluster
                                        </p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/google.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Google</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/spotify.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Spotify</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/steam.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Steam</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/github-light.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Github</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/discord.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Discord</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/xbox.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">xbox</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/trello.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Kanban</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/hp.png" alt="" width="40" height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Hp</p>
                                    </a></div>
                                <div class="col-12">
                                    <hr class="my-3 mx-n3 bg-200" />
                                </div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/linkedin.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Linkedin</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/twitter.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Twitter</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/facebook.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Facebook</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/instagram.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Instagram
                                        </p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/pinterest.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Pinterest
                                        </p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/slack.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Slack</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="#!" target="_blank"><img class="rounded"
                                            src="../../../assets/img/nav-icons/deviantart.png" alt="" width="40"
                                            height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Deviantart
                                        </p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                        href="app/events/event-detail.html" target="_blank">
                                        <div class="avatar avatar-2xl">
                                            <div class="avatar-name rounded-circle bg-primary-subtle text-primary">
                                                <span class="fs-2">E</span>
                                            </div>
                                        </div>
                                        <p class="mb-0 fw-medium text-800 text-truncate fs--2">Events</p>
                                    </a></div>
                                <div class="col-12"><a class="btn btn-outline-primary btn-sm mt-4" href="#!">Show
                                        more</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="{{ asset('../../../assets/img/team/3-thumb.png')}}" alt="" />
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
                    src="{{asset('assets/img/icons/spot-illustrations/falcon.png')}}" alt="" width="40" /><span
                    class="font-sans-serif">falcon</span></div>
        </a>
        <ul class="navbar-nav align-items-center d-none d-lg-block">
            <li class="nav-item">
                <div class="search-box" data-list='{"valueNames":["title"]}'>
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input
                            class="form-control search-input fuzzy-search" type="search" placeholder="Search..."
                            aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                    <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none"
                        data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0"
                            aria-label="Close"></button></div>
                    <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                        <div class="scrollbar list py-3" style="max-height: 24rem;">
                            <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs--2 pt-0 pb-2">Recently
                                Browsed</h6><a class="dropdown-item fs--1 px-x1 py-1 hover-primary"
                                href="app/events/event-detail.html">
                                <div class="d-flex align-items-center">
                                    <span class="fas fa-circle me-2 text-300 fs--2"></span>
                                    <div class="fw-normal title">Pages <span
                                            class="fas fa-chevron-right mx-1 text-500 fs--2"
                                            data-fa-transform="shrink-2"></span> Events</div>
                                </div>
                            </a>
                            <a class="dropdown-item fs--1 px-x1 py-1 hover-primary"
                                href="app/e-commerce/customers.html">
                                <div class="d-flex align-items-center">
                                    <span class="fas fa-circle me-2 text-300 fs--2"></span>
                                    <div class="fw-normal title">E-commerce <span
                                            class="fas fa-chevron-right mx-1 text-500 fs--2"
                                            data-fa-transform="shrink-2"></span> Customers</div>
                                </div>
                            </a>
                            <hr class="text-200 dark__text-900" />
                            <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs--2 pt-0 pb-2">Suggested
                                Filter</h6><a class="dropdown-item px-x1 py-1 fs-0"
                                href="app/e-commerce/customers.html">
                                <div class="d-flex align-items-center"><span
                                        class="badge fw-medium text-decoration-none me-2 badge-subtle-warning">customers:</span>
                                    <div class="flex-1 fs--1 title">All customers list</div>
                                </div>
                            </a>
                            <a class="dropdown-item px-x1 py-1 fs-0" href="app/events/event-detail.html">
                                <div class="d-flex align-items-center"><span
                                        class="badge fw-medium text-decoration-none me-2 badge-subtle-success">events:</span>
                                    <div class="flex-1 fs--1 title">Latest events in current month</div>
                                </div>
                            </a>
                            <a class="dropdown-item px-x1 py-1 fs-0" href="app/e-commerce/product/product-grid.html">
                                <div class="d-flex align-items-center"><span
                                        class="badge fw-medium text-decoration-none me-2 badge-subtle-info">products:</span>
                                    <div class="flex-1 fs--1 title">Most popular products</div>
                                </div>
                            </a>
                            <hr class="text-200 dark__text-900" />
                            <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs--2 pt-0 pb-2">Files
                            </h6><a class="dropdown-item px-x1 py-2" href="#!">
                                <div class="d-flex align-items-center">
                                    <div class="file-thumbnail me-2"><img
                                            class="border h-100 w-100 object-fit-cover rounded-3"
                                            src="../../../assets/img/products/3-thumb.png" alt="" /></div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 title">iPhone</h6>
                                        <p class="fs--2 mb-0 d-flex"><span class="fw-semi-bold">Antony</span><span
                                                class="fw-medium text-600 ms-2">27 Sep at 10:30 AM</span></p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item px-x1 py-2" href="#!">
                                <div class="d-flex align-items-center">
                                    <div class="file-thumbnail me-2"><img class="img-fluid"
                                            src="../../../assets/img/icons/zip.png" alt="" /></div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 title">Falcon v1.8.2</h6>
                                        <p class="fs--2 mb-0 d-flex"><span class="fw-semi-bold">John</span><span
                                                class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                                    </div>
                                </div>
                            </a>
                            <hr class="text-200 dark__text-900" />
                            <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs--2 pt-0 pb-2">Members
                            </h6><a class="dropdown-item px-x1 py-2" href="pages/user/profile.html">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-l status-online me-2">
                                        <img class="rounded-circle" src="assets/img/team/1.jpg" alt="" />
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 title">Anna Karinina</h6>
                                        <p class="fs--2 mb-0 d-flex">Technext Limited</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item px-x1 py-2" href="pages/user/profile.html">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-l me-2">
                                        <img class="rounded-circle" src="../../../assets/img/team/2.jpg" alt="" />
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 title">Antony Hopkins</h6>
                                        <p class="fs--2 mb-0 d-flex">Brain Trust</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item px-x1 py-2" href="pages/user/profile.html">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-l me-2">
                                        <img class="rounded-circle" src="../../../assets/img/team/3.jpg" alt="" />
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 title">Emma Watson</h6>
                                        <p class="fs--2 mb-0 d-flex">Google</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="text-center mt-n3">
                            <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
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
            <li class="nav-item d-none d-sm-block">
                <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait"
                    href="app/e-commerce/shopping-cart.html"><span class="fas fa-shopping-cart"
                        data-fa-transform="shrink-7" style="font-size: 33px;"></span><span
                        class="notification-indicator-number">1</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait"
                    id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell"
                        data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg"
                    aria-labelledby="navbarDropdownNotification">
                    <div class="card card-notification shadow-none">
                        <div class="card-header">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h6 class="card-header-title mb-0">Notifications</h6>
                                </div>
                                <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark
                                        all as read</a></div>
                            </div>
                        </div>
                        <div class="scrollbar-overlay" style="max-height:19rem">
                            <div class="list-group list-group-flush fw-normal fs--1">
                                <div class="list-group-title border-bottom">NEW</div>
                                <div class="list-group-item">
                                    <a class="notification notification-flush notification-unread" href="#!">
                                        <div class="notification-avatar">
                                            <div class="avatar avatar-2xl me-3">
                                                <img class="rounded-circle" src="../../../assets/img/team/1-thumb.png"
                                                    alt="" />
                                            </div>
                                        </div>
                                        <div class="notification-body">
                                            <p class="mb-1"><strong>Emma Watson</strong> replied to your comment
                                                : "Hello world 😍"</p>
                                            <span class="notification-time"><span class="me-2" role="img"
                                                    aria-label="Emoji">💬</span>Just now</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group-item">
                                    <a class="notification notification-flush notification-unread" href="#!">
                                        <div class="notification-avatar">
                                            <div class="avatar avatar-2xl me-3">
                                                <div class="avatar-name rounded-circle"><span>AB</span></div>
                                            </div>
                                        </div>
                                        <div class="notification-body">
                                            <p class="mb-1"><strong>Albert Brooks</strong> reacted to
                                                <strong>Mia Khalifa's</strong> status
                                            </p>
                                            <span class="notification-time"><span
                                                    class="me-2 fab fa-gratipay text-danger"></span>9hr</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group-title border-bottom">EARLIER</div>
                                <div class="list-group-item">
                                    <a class="notification notification-flush" href="#!">
                                        <div class="notification-avatar">
                                            <div class="avatar avatar-2xl me-3">
                                                <img class="rounded-circle"
                                                    src="../../../assets/img/icons/weather-sm.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="notification-body">
                                            <p class="mb-1">The forecast today shows a low of 20&#8451; in
                                                California. See today's weather.</p>
                                            <span class="notification-time"><span class="me-2" role="img"
                                                    aria-label="Emoji">🌤️</span>1d</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group-item">
                                    <a class="border-bottom-0 notification-unread  notification notification-flush"
                                        href="#!">
                                        <div class="notification-avatar">
                                            <div class="avatar avatar-xl me-3">
                                                <img class="rounded-circle" src="../../../assets/img/logos/oxford.png"
                                                    alt="" />
                                            </div>
                                        </div>
                                        <div class="notification-body">
                                            <p class="mb-1"><strong>University of Oxford</strong> created an
                                                event : "Causal Inference Hilary 2019"</p>
                                            <span class="notification-time"><span class="me-2" role="img"
                                                    aria-label="Emoji">✌️</span>1w</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="list-group-item">
                                    <a class="border-bottom-0 notification notification-flush" href="#!">
                                        <div class="notification-avatar">
                                            <div class="avatar avatar-xl me-3">
                                                <img class="rounded-circle" src="../../../assets/img/team/10.jpg"
                                                    alt="" />
                                            </div>
                                        </div>
                                        <div class="notification-body">
                                            <p class="mb-1"><strong>James Cameron</strong> invited to join the
                                                group: United Nations International Children's Fund</p>
                                            <span class="notification-time"><span class="me-2" role="img"
                                                    aria-label="Emoji">🙋‍</span>2d</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center border-top"><a class="card-link d-block"
                                href="app/social/notifications.html">View all</a></div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown px-1">
                <a class="nav-link fa-icon-wait nine-dots p-1" id="navbarDropdownMenu" role="button"
                    data-hide-on-body-scroll="data-hide-on-body-scroll" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="43"
                        viewBox="0 0 16 16" fill="none">
                        <circle cx="2" cy="2" r="2" fill="#6C6E71"></circle>
                        <circle cx="2" cy="8" r="2" fill="#6C6E71"></circle>
                        <circle cx="2" cy="14" r="2" fill="#6C6E71"></circle>
                        <circle cx="8" cy="8" r="2" fill="#6C6E71"></circle>
                        <circle cx="8" cy="14" r="2" fill="#6C6E71"></circle>
                        <circle cx="14" cy="8" r="2" fill="#6C6E71"></circle>
                        <circle cx="14" cy="14" r="2" fill="#6C6E71"></circle>
                        <circle cx="8" cy="2" r="2" fill="#6C6E71"></circle>
                        <circle cx="14" cy="2" r="2" fill="#6C6E71"></circle>
                    </svg></a>
                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-caret-bg"
                    aria-labelledby="navbarDropdownMenu">
                    <div class="card shadow-none">
                        <div class="scrollbar-overlay nine-dots-dropdown">
                            <div class="card-body px-3">
                                <div class="row text-center gx-0 gy-0">
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="pages/user/profile.html" target="_blank">
                                            <div class="avatar avatar-2xl"> <img class="rounded-circle"
                                                    src="../../../assets/img/team/3.jpg" alt="" /></div>
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2">Account</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="https://themewagon.com/" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/themewagon.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">
                                                Themewagon</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="https://mailbluster.com/" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/mailbluster.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">
                                                Mailbluster</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/google.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Google
                                            </p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/spotify.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Spotify
                                            </p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/steam.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Steam
                                            </p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/github-light.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Github
                                            </p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/discord.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Discord
                                            </p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/xbox.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">xbox</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/trello.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Kanban
                                            </p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/hp.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Hp</p>
                                        </a></div>
                                    <div class="col-12">
                                        <hr class="my-3 mx-n3 bg-200" />
                                    </div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/linkedin.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Linkedin
                                            </p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/twitter.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Twitter
                                            </p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/facebook.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Facebook
                                            </p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/instagram.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">
                                                Instagram</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/pinterest.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">
                                                Pinterest</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/slack.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Slack
                                            </p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="#!" target="_blank"><img class="rounded"
                                                src="../../../assets/img/nav-icons/deviantart.png" alt="" width="40"
                                                height="40" />
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">
                                                Deviantart</p>
                                        </a></div>
                                    <div class="col-4"><a
                                            class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                            href="app/events/event-detail.html" target="_blank">
                                            <div class="avatar avatar-2xl">
                                                <div class="avatar-name rounded-circle bg-primary-subtle text-primary">
                                                    <span class="fs-2">E</span>
                                                </div>
                                            </div>
                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2">Events</p>
                                        </a></div>
                                    <div class="col-12"><a class="btn btn-outline-primary btn-sm mt-4" href="#!">Show
                                            more</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-xl">
                        <img class="rounded-circle" src="{{ asset('assets/img/team/3-thumb.png')}}" alt="" />
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