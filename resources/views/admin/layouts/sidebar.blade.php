
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><h2 class="test-white">Home Service</h2></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ route('admin.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        <a href="{{ route('contactmanage.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Contact </a>
                        <a href="{{ route('bookingmanage.index') }}"> <i class="menu-icon fa fa-dashboard"></i>Booking List </a>
                    </li>
                    <h3 class="menu-title">Service</h3><!-- /.menu-title -->
                   
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Service</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('service.category.index') }}">Service Category</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('service.index') }}">Services</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Content Manage</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route("home-content.edit") }}">Home Page Content</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route("hvacpage.edit") }}">HVAC Page Content</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route("civilpage.edit") }}">Civil Page Content</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route("plumbingpage.edit") }}">Plumbing Page Content</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route("electricalpage.edit") }}">Electrical Page Content</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route("airconpage.edit") }}">Aircon Page Content</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route("settings.edit") }}">Settings</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route("brandimage.index") }}">Brand Image</a></li>
                        </ul>
                    </li>                   
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route("user.profile") }}">User</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Setting</a></li>
                        </ul>
                    </li>                   
                </ul>
            </div>
        </nav>
    </aside>