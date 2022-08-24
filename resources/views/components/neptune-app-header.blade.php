    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
 <div class="app-header">
                    <nav class="navbar navbar-light navbar-expand-lg">
                        <div class="container-fluid">
                            <div class="navbar-nav" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                    </li>

                                    <li class="nav-item hidden-on-mobile">
                                        <a class="nav-link text-success" href="https://gettheartiste.com/">BACK TO HOMEPAGE</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                    </li>
                                    <li class="nav-item dropdown hidden-on-mobile">
                                        <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="material-icons">add</i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                            <li><a class="dropdown-item" href="#">+ New Business</a></li>
                                            <li><a class="dropdown-item" href="#">+ New Quote</a></li>
                                            <li><a class="dropdown-item" href="#">+ New Invoice</a></li>
                                            <li><a class="dropdown-item" href="#">+ New Contact</a></li>
                                            <li><a class="dropdown-item" href="#">+ New Product</a></li>
                                        </ul>

                                    </li> --}}
                                    {{-- <li class="nav-item dropdown hidden-on-mobile">
                                        <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="material-icons-outlined">explore</i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                                            <li>
                                                <h6 class="dropdown-header">Repositories</h6>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <h5 class="dropdown-item-title">
                                                        Neptune iOS
                                                        <span class="badge badge-warning">1.0.2</span>
                                                        <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                    </h5>
                                                    <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <h5 class="dropdown-item-title">
                                                        Neptune Android
                                                        <span class="badge badge-info">dev</span>
                                                        <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                    </h5>
                                                    <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-btn-item d-grid">
                                                <button class="btn btn-primary">Create new repository</button>
                                            </li>
                                        </ul>
                                    </li> --}}
                                </ul>

                            </div>
                            <div class="d-flex">
                                <ul class="navbar-nav">
                                    {{-- <li class="nav-item hidden-on-mobile">
                                        <a class="nav-link active" href="#">Applications</a>
                                    </li> --}}
                                    {{-- <li class="nav-item hidden-on-mobile">
                                        <a class="nav-link" href="#">Reports</a>
                                    </li> --}}
                                    {{-- <li class="nav-item hidden-on-mobile">
                                        <a class="nav-link" href="#">Projects</a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
                                    </li>
                                    <li class="nav-item hidden-on-mobile">
                                        <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown"><img src="{{Auth::user()->profile_photo_url}}" alt=""></a>
                                            <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                                                {{-- <li><a class="dropdown-item" href="#"><img src="../../assets/images/flags/germany.png" alt="">German</a></li>--}}
                                                <li><a class="dropdown-item" href="/user/profile">{{__('Profile')}}</a></li>
                                                <x-logout-link />
                                                {{-- <li><a class="dropdown-item" href="#"> Logout</a></li>  --}}
                                            </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="header-toolbar">
                        <div class="container-fluid">
                            <ul class="header-toolbar-menu">
                                {{-- <li>
                                    <a href="#">Today</a>
                                </li>
                                <li>
                                    <a href="#">Month</a>
                                </li>
                                <li>
                                    <a href="#">Year</a>
                                </li> --}}
                            </ul>
                            <div class="header-toolbar-actions hidden-on-mobile">
                                {{-- <a href="#" class="btn btn-primary"><i class="material-icons-outlined">print</i>Print</a>
                                <a href="#" class="btn btn-success"><i class="material-icons-outlined">file_download</i>Download Report</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
