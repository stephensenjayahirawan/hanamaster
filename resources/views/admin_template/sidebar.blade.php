<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <div align="center">
                                <img alt="image"  src="/assets/img/logo.png" />
                            </div>
                            </span>
                    </div>
                    <div class="logo-element">
                        HM
                    </div>
                </li>
                <li {{ $dashboard ?? '' }}>
                    <a href="/admin/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li {{ $job_vacancy ?? '' }}>
                    <a href="/admin/job_vacancy"><i class="fa fa-briefcase"></i> <span class="nav-label">Job Vacancy</span></a>
                </li>
        </div>
    </nav>