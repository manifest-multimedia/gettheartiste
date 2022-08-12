 <!-- Side Nav START -->
 <div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">

            {{-- Super Admin Menu --}}

            @can('isSuperAdmin')
            <li class="nav-item">
                <a href="/dashboard">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                    
                </a>
               
            </li>

            <li class="nav-item">
                <a href="/profile">
                    <span class="icon-holder">
                        <i class="anticon anticon-user"></i>
                    </span>
                    <span class="title">Profile</span>
                    
                </a>
               
            </li>
            @endcan

            {{-- Admin Menu --}}

            @can('isAdmin')
            <li class="nav-item">
                <a href="/dashboard">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                    
                </a>
               
            </li>

            <li class="nav-item">
                <a href="/user/profile">
                    <span class="icon-holder">
                        <i class="anticon anticon-user"></i>
                    </span>
                    <span class="title">Profile</span>
                    
                </a>
               
            </li>
            @endcan

            {{-- User Menu --}}

            @can('isUser')
            <li class="nav-item">
                <a href="/dashboard">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                    
                </a>
               
            </li>

            <li class="nav-item">
                <a href="{{url('organizations')}}">
                    <span class="icon-holder">
                        <i class="anticon anticon-solution"></i>
                    </span>
                    <span class="title">Businesses</span>
                </a>
            </li>

           
            <li class="nav-item">
                <a href="/shopping-area">
                    <span class="icon-holder">
                        <i class="anticon anticon-shop"></i>
                    </span>
                    <span class="title">Shopping Area</span>
                </a>
            </li>
            
            

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);"> 
                    <span class="icon-holder"> 
                        <i class="anticon anticon-container"> </i>
                    </span>
                    <span class="title"> Procurement </span>
                    <span class="arrow">
                    <i class="arrow-icon"></i>
                    </span>
                </a>
                
                <ul class="dropdown-menu">
                    <li><a href="{{url('tenders')}}">View Tenders</a></li>
                    <li><a href="{{url('new-tender')}}">Create Tender</a></li>
                    <li><a href="{{url('edit-tender')}}">Edit Tender</a></li>
                    <li><a href="{{url('tender-history')}}">History</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);"> 
                    <span class="icon-holder"> 
                        <i class="anticon anticon-dollar"> </i>
                    </span>
                    <span class="title"> Finance </span>
                    <span class="arrow">
                    <i class="arrow-icon"></i>
                    </span>
                </a>
                
                <ul class="dropdown-menu">
                    <li><a href="{{url('quotes')}}"> Quotes</a></li>
                    <li><a href="{{url('invoices')}}">Invoices</a></li>
                    <li><a href="{{url('finance-reports')}}">Reports</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);"> 
                    <span class="icon-holder"> 
                        <i class="anticon anticon-shopping-cart"> </i>
                    </span>
                    <span class="title"> Products </span>
                    <span class="arrow">
                    <i class="arrow-icon"></i>
                    </span>
                </a>
                
                <ul class="dropdown-menu">
                    <li><a href="{{url('products')}}">Add New Product</a></li>
                    <li><a href="{{url('new-product')}}">View Products</a></li>
                    <li><a href="{{url('stock-management')}}"> Stock Management</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);"> 
                    <span class="icon-holder"> 
                        <i class="anticon anticon-team"> </i>
                    </span>
                    <span class="title"> CRM </span>
                    <span class="arrow">
                    <i class="arrow-icon"></i>
                    </span>
                </a>
                
                <ul class="dropdown-menu">
                    <li><a href="{{url('sms')}}">SMS</a></li>
                    <li><a href="{{url('contacts')}}">Contacts</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);"> 
                    <span class="icon-holder"> 
                        <i class="anticon anticon-setting"> </i>
                    </span>
                    <span class="title"> Settings </span>
                    <span class="arrow">
                    <i class="arrow-icon"></i>
                    </span>
                </a>
                
                <ul class="dropdown-menu">
                    <li><a href="{{url('account-setup')}}">Account Setup</a></li>
                    <li><a href="{{url('upgrade')}}">Upgrade </a></li>
                    <li><a href="{{url('user/profile')}}">User Profile</a></li>
                    <li><a href="{{url('business-profiles')}}">Business Profiles</a></li>
                </ul>
            </li>

           

            
            <x-logout-link /> 
           


            @endcan
          
            {{-- Staff Menu --}}

            @can('isStaff')
            <li class="nav-item">
                <a href="/dashboard">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                    
                </a>
            
            </li>

            <li class="nav-item">
                <a href="/profile">
                    <span class="icon-holder">
                        <i class="anticon anticon-user"></i>
                    </span>
                    <span class="title">Profile</span>
                    
                </a>
            
            </li>
            @endcan

            
            {{-- <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Apps</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="app-chat.html">Chat</a>
                    </li>
                    <li>
                        <a href="app-file-manager.html">File Manager</a>
                    </li>
                    <li>
                        <a href="app-mail.html">Mail</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Projects</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="app-project-list.html">Project List</a>
                            </li>
                            <li>
                                <a href="app-project-details.html">Project Details</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>E-commerce</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="app-e-commerce-order-list.html">Orders List</a>
                            </li>
                            <li>
                                <a href="app-e-commerce-products.html">Products</a>
                            </li>
                            <li>
                                <a href="app-e-commerce-products-list.html">Products List</a>
                            </li>
                            <li>
                                <a href="app-e-commerce-products-edit.html">Products Edit</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-build"></i>
                    </span>
                    <span class="title">UI Elements</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="avatar.html">Avatar</a>
                    </li>
                    <li>
                        <a href="alert.html">Alert</a>
                    </li>
                    <li>
                        <a href="badge.html">Badge</a>
                    </li>
                    <li>
                        <a href="buttons.html">Buttons</a>
                    </li>
                    <li>
                        <a href="cards.html">Cards</a>
                    </li>
                    <li>
                        <a href="icons.html">Icons</a>
                    </li>
                    <li>
                        <a href="lists.html">Lists</a>
                    </li>
                    <li>
                        <a href="typography.html">Typography</a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-hdd"></i>
                    </span>
                    <span class="title">Components</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="accordion.html">Accordion</a>
                    </li>
                    <li>
                        <a href="carousel.html">Carousel</a>
                    </li>
                    <li>
                        <a href="dropdown.html">Dropdown</a>
                    </li>
                    <li>
                        <a href="modals.html">Modals</a>
                    </li>
                    <li>
                        <a href="toasts.html">Toasts</a>
                    </li>
                    <li>
                        <a href="popover.html">Popover</a>
                    </li>
                    <li>
                        <a href="slider-progress.html">Slider & Progress</a>
                    </li>
                    <li>
                        <a href="tabs.html">Tabs</a>
                    </li>
                    <li>
                        <a href="tooltips.html">Tooltips</a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-form"></i>
                    </span>
                    <span class="title">Forms</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="form-elements.html">Form Elements</a>
                    </li>
                    <li>
                        <a href="form-layouts.html">Form Layouts</a>
                    </li>
                    <li>
                        <a href="form-validation.html">Form Validation</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-table"></i>
                    </span>
                    <span class="title">Tables</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="basic-table.html">Basic Table</a>
                    </li>
                    <li>
                        <a href="data-table.html">Data Table</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-pie-chart"></i>
                    </span>
                    <span class="title">Charts</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="chartist.html">Chartist</a>
                    </li>
                    <li>
                        <a href="chartjs.html">ChartJs</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-file"></i>
                    </span>
                    <span class="title">Pages</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="invoice.html">Invoice</a>
                    </li>
                    <li>
                        <a href="members.html">Members</a>
                    </li>
                    <li>
                        <a href="pricing.html">Pricing</a>
                    </li>
                    <li>
                        <a href="setting.html">Setting</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Blog</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-grid.html">Blog Grid</a>
                            </li>
                            <li>
                                <a href="blog-list.html">Blog List</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-lock"></i>
                    </span>
                    <span class="title">Authentication</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="login-1.html">Login 1</a>
                    </li>
                    <li>
                        <a href="login-2.html">Login 2</a>
                    </li>
                    <li>
                        <a href="login-3.html">Login 3</a>
                    </li>
                    <li>
                        <a href="sign-up-1.html">Sign Up 1</a>
                    </li>
                    <li>
                        <a href="sign-up-2.html">Sign Up 2</a>
                    </li>
                    <li>
                        <a href="sign-up-3.html">Sign Up 3</a>
                    </li>
                    <li>
                        <a href="error-1.html">Error 1</a>
                    </li>
                    <li>
                        <a href="error-2.html">Error 2</a>
                    </li>
                </ul> 
            </li>--}}
        </ul>
    </div>
</div>