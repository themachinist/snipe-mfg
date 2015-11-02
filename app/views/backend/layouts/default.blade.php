<!DOCTYPE html>

<html lang="en">
    <head>

        <!-- Basic Page Needs
        ================================================== -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="utf-8" />
        <title>
            @section('title')
             {{{ Setting::getSettings()->site_name }}}
            @show
        </title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


		 <!-- bootstrap -->
	    <link href="{{ asset('assets/css/bootstrap/bootstrap.css') }}" rel="stylesheet" />


	    <!-- global styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/compiled/layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/compiled/elements.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/compiled/icons.css') }}">

	    <!-- libraries -->
	    <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-ui-1.10.2.custom.css') }}" type="text/css">
	    <link rel="stylesheet" href="{{ asset('assets/css/lib/font-awesome.min.css') }}" type="text/css">
	    <link rel="stylesheet" href="{{ asset('assets/css/lib/morris.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/css/lib/select2.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.datepicker.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/css/compiled/index.css') }}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{ asset('assets/css/compiled/user-list.css') }}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{ asset('assets/css/compiled/user-profile.css') }}" type="text/css" media="screen" />

        <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery.dataTables.css') }}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{ asset('assets/css/compiled/dataTables.colVis.css') }}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{ asset('assets/css/compiled/dataTables.tableTools.css') }}" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/compiled/print.css') }}" media="print" />
        <link href="{{ asset('assets/css/bootstrap/bootstrap-overrides.css') }}" type="text/css" rel="stylesheet" />


        <!-- global header javascripts -->
        <script src="{{ asset('assets/js/jquery-latest.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables.colVis.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables.tableTools.js') }}"></script>

        <script>
            window.snipeit = {
                settings: {
                    "per_page": {{{ Setting::getSettings()->per_page }}}
                }
            };
        </script>



		@if (Setting::getSettings()->load_remote=='1')
        <!-- open sans font -->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		@endif

        <!--[if lt IE 9]>
          <script src="{{ asset('assets/js/html5.js') }}"></script>
        <![endif]-->

        <style>

        @section('styles')
        h3 {
            padding: 10px;
        }

        @show

		@if (Setting::getSettings()->header_color)
			.navbar-inverse {
				background-color: {{{ Setting::getSettings()->header_color }}};
				background: -webkit-linear-gradient(top,  {{{ Setting::getSettings()->header_color }}} 0%,{{{ Setting::getSettings()->header_color }}} 100%);
				border-color: {{{ Setting::getSettings()->header_color }}};
                background-image: -moz-linear-gradient(top, {{{ Setting::getSettings()->header_color }}}, {{{ Setting::getSettings()->header_color }}});

			}
		@endif

        </style>


    </head>

    <body>

    <!-- navbar -->


    <!-- navbar -->
    <header class="navbar navbar-inverse" role="banner">
	    <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" id="menu-toggler">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


	            @if (Setting::getSettings()->logo)
	            	<a class="navbar-brand" href="{{ Config::get('app.url') }}" style="padding: 5px;">
	            	<img src="{{ Config::get('app.url') }}/uploads/{{{ Setting::getSettings()->logo }}}">
	            	</a>
	            @else
	            	<a class="navbar-brand" href="{{ Config::get('app.url') }}">
	            	{{{ Setting::getSettings()->site_name }}}
	            	</a>
	            @endif
        </div>


        <ul class="nav navbar-nav navbar-right">
            @if (Sentry::check())

                 @if(Sentry::getUser()->hasAccess('admin'))
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-plus"></i> @lang('general.create')
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
						<li {{{ (Request::is('admin/categories/create') ? 'class="active"' : '') }}}>
							<a href="{{ route('create/category') }}">
							<i class="fa fa-tag"></i>
							@lang('general.category')</a>
						</li>
						<li {{{ (Request::is('admin/assets/create') ? 'class="active"' : '') }}}>
							<a href="{{ route('create/asset') }}">
							<i class="fa fa-barcode"></i>
							@lang('general.asset')</a>
						</li>
						<li {{{ (Request::is('admin/tools/create') ? 'class="active"' : '') }}}>
							<a href="{{ route('create/tool') }}">
							<i class="fa fa-wrench"></i>
							@lang('general.tool')</a>
						</li>
						<li {{{ (Request::is('admin/consumables/create') ? 'class="active"' : '') }}}>
							<a href="{{ route('create/consumable') }}">
							<i class="fa fa-recycle"></i>
							@lang('general.consumable')</a>
                        </li>
						<li {{{ (Request::is('admin/fixtures/create') ? 'class="active"' : '') }}}>
							<a href="{{ route('create/fixtures') }}">
							<i class="fa fa-certificate"></i>
							@lang('general.fixture')</a>
                       </li>
                        <li {{{ (Request::is('admin/users/create') ? 'class="active"' : '') }}}>
					        <a href="{{ route('create/user') }}">
							<i class="fa fa-user"></i>
							@lang('general.user')</a>
						</li>
                    </ul>
                </li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{{ Lang::get('general.welcome', array('name' => Sentry::getUser()->first_name)) }}}
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li{{{ (Request::is('account/profile') ? ' class="active"' : '') }}}>
                         	<a href="{{ route('view-assets') }}">
                                <i class="fa fa-check"></i> @lang('general.viewassets')
                        	</a>
                             <a href="{{ route('profile') }}">
                                <i class="fa fa-user"></i> @lang('general.editprofile')
                            </a>
                             <a href="{{ route('change-password') }}">
                                <i class="fa fa-lock"></i> @lang('general.changepassword')
                            </a>
                            <a href="{{ route('change-email') }}">
                                <i class="fa fa-envelope"></i> @lang('general.changeemail')
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="fa fa-sign-out"></i>
                                @lang('general.logout')
                            </a>
                        </li>
                    </ul>
                </li>
                @if(Sentry::getUser()->hasAccess('admin'))
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-wrench icon-white"></i> @lang('general.admin')
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li{{ (Request::is('asset/models*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::to('asset/models') }}">
                                <i class="fa fa-th"></i> @lang('general.asset_models')
                            </a>
                        </li>
                        <li{{ (Request::is('admin/settings/categories*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::to('admin/settings/categories') }}">
                                <i class="fa fa-check"></i> @lang('general.categories')
                            </a>
                        </li>
                        <li{{ (Request::is('admin/settings/manufacturers*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::to('admin/settings/manufacturers') }}">
                                <i class="fa fa-briefcase"></i> @lang('general.manufacturers')
                            </a>
                        </li>
                        <li{{ (Request::is('admin/settings/suppliers*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::to('admin/settings/suppliers') }}">
                                <i class="fa fa-credit-card"></i> @lang('general.suppliers')
                            </a>
                        </li>
                        <li{{ (Request::is('admin/settings/statuslabels*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::to('admin/settings/statuslabels') }}">
                                <i class="fa fa-list"></i> @lang('general.status_labels')
                            </a>
                        </li>
                        <li{{ (Request::is('admin/settings/depreciations*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::to('admin/settings/depreciations') }}">
                                <i class="fa fa-arrow-down"></i> @lang('general.depreciation')
                            </a>
                        </li>
                        <li{{ (Request::is('admin/settings/locations*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::to('admin/settings/locations') }}">
                                <i class="fa fa-globe"></i> @lang('general.locations')
                            </a>
                        </li>
                        <li{{ (Request::is('admin/groups*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::to('admin/groups') }}">
                                <i class="fa fa-group"></i> @lang('general.groups')
                            </a>
                        </li>
                        <li{{ (Request::is('admin/settings/backups*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::to('admin/settings/backups') }}">
                                <i class="fa fa-download"></i> @lang('admin/settings/general.backups')
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('app') }}">
                                <i class="fa fa-cog"></i> @lang('general.settings')
                            </a>
                        </li>

                    </ul>
                </li>
                @endif

            @else
                    <li {{{ (Request::is('auth/signin') ? 'class="active"' : '') }}}><a href="{{ route('signin') }}">@lang('general.sign_in')</a></li>
            @endif
            </ul>
    </header>


    <!-- end navbar -->
    @if (Sentry::check())
    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
			@if(Sentry::getUser()->hasAccess('admin'))
			<li{{ (Request::is('*/') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{Config::get('app.url')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
            </li>
            <li{{ (Request::is('*assets') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ URL::to('admin/assets') }}" class="dropdown-toggle">
                    <i class="fa fa-industry"></i>
                    <span>@lang('general.assets')</span>
					<b class="fa fa-chevron-down"></b>
                </a>
                <ul class="submenu{{ (Request::is('admin/assets*') ? ' active' : '') }}">
                    <li><a href="{{ URL::to('admin/assets') }}">@lang('general.list_all')</a></li>
                    <li class="divider">&nbsp;</li>
                    <li><a href="{{ URL::to('asset/models') }}" {{{ (Request::is('asset/models*') ? ' class="active"' : '') }}} >@lang('general.asset_models')</a></li> 
                    <li><a href="{{ URL::to('asset?status=Deleted') }}" {{{ (Request::query('Deleted') ? ' class="active"' : '') }}} >@lang('general.deleted')</a></li>
                    <li><a href="{{ URL::to('admin/asset_maintenances') }}"  >@lang('general.asset_maintenances') </a></li> 
                </ul>
            </li>
            <li{{ (Request::is('*admin/settings/categories') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ URL::to('admin/settings/categories') }}">
                    <i class="fa fa-tags"></i>
                    <span>@lang('general.categories')</span>
                </a>
            </li>
            <li{{ (Request::is('admin/tools*') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ URL::to('admin/tools') }}">
                    <i class="fa fa-wrench"></i>
                    <span>@lang('general.tools')</span>
                </a>
            </li>
            <li{{ (Request::is('admin/consumables*') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ URL::to('admin/consumables') }}">
                    <i class="fa fa-recycle"></i>
                    <span>@lang('general.consumables')</span>
                </a>
            </li>

            <li{{ (Request::is('admin/fixtures*') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ URL::to('admin/fixtures') }}"  >
					<i class="fa fa-simplybuilt"></i>
			         <span>@lang('general.fixtures')</span>

                </a>

            </li>

            <li{{ (Request::is('admin/users*') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ URL::to('admin/users') }}">
                    <i class="fa fa-users"></i>
                    <span>@lang('general.people')</span>
                </a>
            </li>
        	 @endif
        	 @if(Sentry::getUser()->hasAccess('reports'))
            <li{{ (Request::is('reports*') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ URL::to('reports') }}"  class="dropdown-toggle">
                    <i class="fa fa-bar-chart"></i>
                    <span>@lang('general.reports')
                    <b class="fa fa-chevron-down"></b></span>

                </a>

                <ul class="submenu{{ (Request::is('reports*') ? ' active' : '') }}">
	                 <li><a href="{{ URL::to('reports/activity') }}" {{ (Request::is('reports/activity') ? ' class="active"' : '') }} >@lang('general.activity_report')</a></li>
<!-- # current unused reports
                    <li><a href="{{ URL::to('reports/depreciation') }}" {{{ (Request::is('reports/depreciation') ? ' class="active"' : '') }}} >@lang('general.depreciation_report')</a></li>
					<li><a href="{{ URL::to('reports/fixtures') }}" {{{ (Request::is('reports/fixtures') ? ' class="active"' : '') }}} >@lang('general.fixture_report')</a></li>
                    <li><a href="{{ URL::to('reports/asset_maintenances') }}" {{{ (Request::is('reports/asset_maintenances') ? ' class="active"' : '') }}} >@lang('general.asset_maintenance_report')</a></li>
                    <li><a href="{{ URL::to('reports/assets') }}" {{{ (Request::is('reports/assets') ? ' class="active"' : '') }}} >@lang('general.asset_report')</a></li>
                    <li><a href="{{ URL::to('reports/unaccepted_assets') }}" {{{ (Request::is('reports/unaccepted_assets') ? ' class="active"' : '') }}} >@lang('general.unaccepted_asset_report')</a></li>
-->

                    <li><a href="{{ URL::to('reports/checkedout') }}" {{{ (Request::is('reports/checkedout') ? ' class="active"' : '') }}} >@lang('general.checkedout_report')</a></li>
                    <li><a href="{{ URL::to('reports/tools') }}" {{{ (Request::is('reports/tools') ? ' class="active"' : '') }}} >@lang('general.tool_report')</a></li>
                    <li><a href="{{ URL::to('reports/custom') }}" {{{ (Request::is('reports/custom') ? ' class="active"' : '') }}} >@lang('general.custom_report')</a></li>
                </ul>
            </li>
             @endif
             @if(!Sentry::getUser()->hasAccess('admin'))
              <li{{ (Request::is('account/requestable-assets') ? ' class="active"><div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>' : '>') }}
                <a href="{{ route('requestable-assets') }}">
                    <i class="fa fa-laptop"></i>
                    <span>@lang('admin/hardware/general.requestable')</span>
                </a>
            </li>
            @endif



        </ul>
    </div>
    <!-- end sidebar -->

    @endif


<!-- main container -->
    <div class="content">

        @if ((Sentry::check()) && (Sentry::getUser()->hasAccess('admin')))
        @if (Request::is('/'))

        <!-- upper main stats -->
<!--        <div id="main-stats">
            <div class="row stats-row">
                <div class="col-md-3 col-sm-3 stat">
                    <div class="data">
                            <a href="{{ URL::to('hardware') }}">
                                <span class="number">{{ number_format(Asset::assetcount()) }}</span>
                                   <span style="color:black">@lang('general.total_assets')</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 stat">
                        <div class="data">
                            <a href="{{ URL::to('hardware?status=RTD') }}">
                                <span class="number">{{ number_format(Asset::availassetcount()) }}</span>
                                <span style="color:black">@lang('general.assets_available')</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 stat">
                        <div class="data">
                            <a href="{{ URL::to('admin/fixtures') }}">
                                <span class="number">{{ number_format(Fixture::assetcount()) }}</span>
                                <span style="color:black">@lang('general.total_fixtures')</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 stat last">
                        <div class="data">
                            <a href="{{ URL::to('admin/fixtures') }}">
                                <span class="number">{{ number_format(Fixture::availassetcount()) }}</span>
                                <span style="color:black">@lang('general.fixtures_available')</span>
                            </a>
                        </div>
                    </div>
                </div>
-->

        <!-- end upper main stats -->
        @endif
        @endif


                <div id="pad-wrapper">

                        <!-- Notifications -->
                        @include('frontend/notifications')

                        <!-- Content -->
                        @yield('content')

                </div>
            </div>
        </div>
    </div>

    <footer>

        <div id="footer" class="col-md-offset-2 col-md-9 col-sm-12 col-xs-12 text-center">
		                <div class="muted credit hidden-xs">
	                  			<a target="_blank" href="http://github.com/themachinist/snipe-mfg">Snipe MFG</a> is a free open source
					  		project by
								<a target="_blank" href="http://twitter.com/the_machinist_">@the_machinist_</a>, based on 
					  			<a target="_blank" href="http://twitter.com/snipeyhead">@snipeyhead</a>'s Snipe IT project.
						  		<a target="_blank" href="https://github.com/themachinist/snipe-mfg">Fork it</a> |
<!--						  		<a target="_blank" href="http://docs.snipeitapp.com/">Documentation</a> |
						  		<a target="_blank" href="http://docs.snipeitapp.com/translations.html">Translate It! </a> | -->
						  		<a target="_blank" href="https://github.com/themachinist/snipe-mfg/issues?state=open">Report a Bug</a>
						  		 &nbsp; &nbsp; ({{{  Config::get('version.app_version') }}})
                  		</div>
        </div>
    </footer>

    <!-- end main container -->

    <div class="modal fade" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><a class="btn btn-danger btn-sm" id="dataConfirmOK">@lang('general.yes')</a>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.knob.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.uniform.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/snipeit.js') }}"></script>
	<script>
		$(function(){
			$( ".ColVis" ).prepend('<button class="ColVis_Button">Reset Defaults</button>').click(function(e){
				e.preventDefault();
				oTable.api().state.clear();
				window.location.reload();
			});
		});
	</script>
    </body>
</html>
