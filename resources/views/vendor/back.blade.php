<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Store</title>

        <link rel="stylesheet" href="{!! asset('assets/css/back.css') !!}">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/admin">Laravel Store</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> {{ trans('back/template.globalnavUserProfile') }}</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-gear fa-fw"></i> {{ trans('back/template.globalnavSettings') }}</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="/admin/logout"><i class="fa fa-sign-out fa-fw"></i> {{ trans('back/template.globalnavLogout') }}</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sb-info">
                            <img src="{!! asset('assets/img/back/admin-avatar.png') !!}" alt="{{ Auth::user()->name }}">
                            <ul class="sb-info-content">
                                <li class="sb-info-name">
                                    {{ Auth::user()->name }}
                                </li>
                                <li class="sb-info-role">
                                    {{ trans('back/template.sidebarRole') }}
                                </li>
                            </ul>
                        </div>
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> {{ trans('back/template.sidebarItemDashboard') }}</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-info-circle fa-fw"></i> {{ trans('back/template.sidebarItemRelativeInformation') }}<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="/admin/brands">{{ trans('back/template.sidebarSubitemBrands') }}</a>
                                    </li>
                                    <li>
                                        <a href="/admin/categories">{{ trans('back/template.sidebarSubitemCategories') }}</a>
                                    </li>
                                    <li>
                                        <a href="/admin/types">{{ trans('back/template.sidebarSubitemTypes') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="tables.html"><i class="fa fa-product-hunt fa-fw"></i> {{ trans('back/template.sidebarItemProducts') }}</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-language fa-fw"></i> {{ trans('back/template.sidebarItemLanguage') }}<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">{{ trans('back/template.sidebarSubitemEnglish') }}</a>
                                    </li>
                                    <li>
                                        <a href="#">{{ trans('back/template.sidebarSubitemVietnamese') }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                @yield('content')
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <script src="{!! asset('assets/js/back.js') !!}"></script>
    </body>
</html>