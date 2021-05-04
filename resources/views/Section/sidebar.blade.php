<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>GPF</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('asset/images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info mt-3">
               
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
          
                <ul class="nav side-menu">
                  <li><a href="{{url('home')}}"><i class="fa fa-home"></i> Home </a>
                   
                  </li>
                  <li><a href="{{url('Taluka')}}"><i class="fa fa-edit"></i> तालुका  मुख्यालय  संकेताक 
                  </a>
                   
                  </li>
                  <li><a href="{{url('Year')}}"><i class="fa fa-desktop"></i> वर्षाचे व्याज दर  भरणे 
                  </a>
                   
                  </li>
                  <li><a href="{{url('Customer_Registration')}}"><i class="fa fa-table"></i> कर्मचाऱ्यांची  मुळ माहिती  </a>
                   
                  </li>
                 <li><a><i class="fa fa-bug"></i> मुख्यालय <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('Master')}}">बँकेत नाव</a></li>
                      <li><a href="{{url('department')}}">विभाग संकेतांक</a></li>
                      <li><a href="{{url('designation')}}">पदनाम</a></li>
                      <li><a href="{{url('classification')}}">वर्गीकरण</a></li>
                      
                    </ul>
                  </li>
                  <li><a href="{{url('Nomination_record')}}"><i class="fa fa-clone"></i>नामनिर्दशन नोंद
                  </a>
                  </li>

                  <li><a><i class="fa fa-bug"></i> मासिक बदल  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('Trend_add')}}">चलन</a></li>
                      <li><a href="{{url('monthly_chalan')}}">मासिक चलन खतावणी</a></li>
                    </ul>
                  </li>

                  <li><a href="{{url('user_registration')}}"> <i class="fa fa-users"></i>वापरकर्त्यांची नोंदणी</a></li>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>