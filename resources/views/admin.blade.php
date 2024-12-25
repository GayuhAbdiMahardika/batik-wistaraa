<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}">
    <!-- Page Title  -->
    <title>Aini Swalayan</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=2.4.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=2.4.0') }}">
    <link  rel="stylesheet" href="{{ asset('assets/css/libs/bootstrap-icons.css') }}">
    <link  rel="stylesheet" href="{{ asset('assets/css/libs/fontawesome-icons.css') }}">
    <link  rel="stylesheet" href="{{ asset('assets/css/libs/jstree.css') }}">
    <link  rel="stylesheet" href="{{ asset('assets/css/libs/themify-icons.css') }}">
</head>

<body class="nk-body npc-default has-apps-sidebar has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-apps-sidebar is-dark">
            <div class="nk-apps-brand">
                <a href="/" class="logo-link">
                    <img class="logo-light logo-img" src="{{ asset('assets/img/logo.png') }}" srcset="./images/logo-small2x.png 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{ asset('assets/img/logo.png') }}" srcset="./images/logo-dark-small2x.png 2x" alt="logo-dark">
                </a>
            </div>
            <div class="nk-sidebar-element">
                <div class="nk-sidebar-body">
                    <div class="nk-sidebar-content" data-simplebar>
                        <div class="nk-sidebar-menu">
                            <!-- Menu -->
                            <ul class="nk-menu apps-menu">
                                <li class="nk-menu-item">
                                    <a href="/" class="nk-menu-link" title="Dashboard">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="nk-sidebar-footer">
                            <ul class="nk-menu nk-menu-md">
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link" title="Settings">
                                        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                        <a href="#" data-toggle="dropdown" data-offset="50,-60">
                            <div class="user-avatar">
                                <span>{{ substr(Auth::user()->name, 0, 2) }}</span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md ml-4">
                            <div class="dropdown-inner user-card-wrap d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>{{ substr(Auth::user()->name, 0, 2) }}</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ Auth::user()->name }}</span>
                                        <span class="sub-text text-soft">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                </ul>
                            </div> --}}
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ route('logout') }}"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-app-name">
                                <div class="nk-header-app-logo">
                                    <img class="logo-light logo-img" src="{{ asset('assets/img/logo2.png') }}" alt="logo">
                                </div>
                                <div class="nk-header-app-info">
                                    <span class="sub-text">Aini Swalayan</span>
                                    <span class="lead-text">Dashboard</span>
                                </div>
                            </div>
                            <div class="nk-header-menu is-light">
                                <div class="nk-header-menu-inner">
                                    <!-- Menu -->
                                    <ul class="nk-menu nk-menu-main">
                                        <li class="nk-menu-item">
                                            <a href="/" class="nk-menu-link">
                                                <span class="nk-menu-text">Home</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Menu -->
                                </div>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    {{-- <li class="dropdown chats-dropdown hide-mb-xs">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Recent Chats</span>
                                                <a href="#">Setting</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <ul class="chat-list">
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar">
                                                                <span>IH</span>
                                                                <span class="status dot dot-lg dot-gray"></span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Iliash Hossain</div>
                                                                    <span class="time">Now</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">You: Please confrim if you got my last messages.</div>
                                                                    <div class="status delivered">
                                                                        <em class="icon ni ni-check-circle-fill"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item is-unread">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar bg-pink">
                                                                <span>AB</span>
                                                                <span class="status dot dot-lg dot-success"></span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Abu Bin Ishtiyak</div>
                                                                    <span class="time">4:49 AM</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">Hi, I am Ishtiyak, can you help me with this problem ?</div>
                                                                    <div class="status unread">
                                                                        <em class="icon ni ni-bullet-fill"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar">
                                                                <img src="./images/avatar/b-sm.jpg" alt="">
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">George Philips</div>
                                                                    <span class="time">6 Apr</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">Have you seens the claim from Rose?</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar user-avatar-multiple">
                                                                <div class="user-avatar">
                                                                    <img src="./images/avatar/c-sm.jpg" alt="">
                                                                </div>
                                                                <div class="user-avatar">
                                                                    <span>AB</span>
                                                                </div>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Softnio Group</div>
                                                                    <span class="time">27 Mar</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                                    <div class="status sent">
                                                                        <em class="icon ni ni-check-circle"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar">
                                                                <img src="./images/avatar/a-sm.jpg" alt="">
                                                                <span class="status dot dot-lg dot-success"></span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Larry Hughes</div>
                                                                    <span class="time">3 Apr</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">Hi Frank! How is you doing?</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                    <li class="chat-item">
                                                        <a class="chat-link" href="html/apps/chats.html">
                                                            <div class="chat-media user-avatar bg-purple">
                                                                <span>TW</span>
                                                            </div>
                                                            <div class="chat-info">
                                                                <div class="chat-from">
                                                                    <div class="name">Tammy Wilson</div>
                                                                    <span class="time">27 Mar</span>
                                                                </div>
                                                                <div class="chat-context">
                                                                    <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                                    <div class="status sent">
                                                                        <em class="icon ni ni-check-circle"></em>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li><!-- .chat-item -->
                                                </ul><!-- .chat-list -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="html/chats.html">View All</a>
                                            </div>
                                        </div>
                                    </li> --}}
                                    {{-- <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-primary-dim ni ni-share"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Iliash shared <span>Dashlite-v2</span> with you.</div>
                                                            <div class="nk-notification-time">Just now</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-info-dim ni ni-edit"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Iliash <span>invited</span> you to edit <span>DashLite</span> folder</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-primary-dim ni ni-share"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have shared <span>project v2</span> with Parvez.</div>
                                                            <div class="nk-notification-time">7 days ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-spark"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Subscription</span> renew successfully.</div>
                                                            <div class="nk-notification-time">2 month ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li> --}}
                                    <li class="dropdown list-apps-dropdown d-lg-none">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-menu-circled"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-body">
                                                <ul class="list-apps">
                                                    <li>
                                                        <a href="html/index.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-dashlite bg-primary text-white"></em></span>
                                                            <span class="list-apps-title">Dashboard</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="html/apps/chats.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-chat-circle bg-info-dim"></em></span>
                                                            <span class="list-apps-title">Chats</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="html/apps/mailbox.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-inbox bg-purple-dim"></em></span>
                                                            <span class="list-apps-title">Mailbox</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="html/apps/messages.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-chat bg-success-dim"></em></span>
                                                            <span class="list-apps-title">Messages</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="html/apps/file-manager.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-folder bg-purple-dim"></em></span>
                                                            <span class="list-apps-title">File Manager</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="html/components.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-layers bg-secondary-dim"></em></span>
                                                            <span class="list-apps-title">Components</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="list-apps">
                                                    <li>
                                                        <a href="/demo2/ecommerce/index.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-cart bg-danger-dim"></em></span>
                                                            <span class="list-apps-title">Ecommerce Panel</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/demo4/subscription/index.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-calendar-booking bg-primary-dim"></em></span>
                                                            <span class="list-apps-title">Subscription Panel</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/demo5/crypto/index.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-bitcoin-cash bg-warning-dim"></em></span>
                                                            <span class="list-apps-title">Crypto Wallet Panel</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/demo6/invest/index.html">
                                                            <span class="list-apps-media"><em class="icon ni ni-invest bg-blue-dim"></em></span>
                                                            <span class="list-apps-title">HYIP Invest Panel</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- .nk-dropdown-body -->
                                        </div>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>{{ substr(Auth::user()->name, 0, 2) }}</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ Auth::user()->name }}</span>
                                                        <span class="sub-text">{{ Auth::user()->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    {{-- <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li> --}}
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ route('logout') }}"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main header @e -->
                <div class="nk-sidebar" data-content="sidebarMenu">
                    <div class="nk-sidebar-inner" data-simplebar>
                        <ul class="nk-menu nk-menu-md">
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Dashboards</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item">
                                <a href="/" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                    <span class="nk-menu-text">Default Dashboard</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Inventory</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item">
                                <a href="{{ route('barang.show') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-property-blank"></em></span>
                                    <span class="nk-menu-text">Data Barang</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="{{ route('supplier.tampil') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-truck"></em></span>
                                    <span class="nk-menu-text">Data Supplier</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="{{ route('beli') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-bag"></em></span>
                                    <span class="nk-menu-text">Pembelian</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="{{ route('laporan.pembelian') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                    <span class="nk-menu-text">Laporan Pembelian</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Penjualan</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item">
                                <a href="{{ route('jual') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                    <span class="nk-menu-text">Penjualan</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="{{ route('laporan.penjualan') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                    <span class="nk-menu-text">Laporan Penjualan</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">SDM</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item">
                                <a href="{{ route('datauser.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                    <span class="nk-menu-text">Data User</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                        </ul><!-- .nk-menu -->
                    </div>
                </div>
                @yield('content')
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bundle.js?ver=2.4.0') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=2.4.0') }}"></script>
    <script src="{{ asset('assets/js/charts/gd-analytics.js?ver=2.4.0') }}"></script>
    <script src="{{ asset('assets/js/libs/jqvmap.js?ver=2.4.0') }}"></script>
    <script src="{{ asset('assets/js/example-chart.js?ver=2.4.0') }}"></script>
    {{-- <script src="./assets/js/example-chart.js?ver=2.4.0"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const darkSwitch = document.querySelector('.dark-switch');
            const body = document.body;

            // Apply dark mode if it was previously enabled
            if (localStorage.getItem('dark-mode') === 'enabled') {
                body.classList.add('dark-mode');
                console.log('dark mode enabled');
            } else {
                console.log('dark mode disabled');
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
