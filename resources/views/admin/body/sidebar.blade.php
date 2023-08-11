 
 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Algemeen</li>

                            <li>
                                <a href="{{ route('dashboard') }}" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('customer.all') }}" class=" waves-effect">
                                    <i class="ri-group-line"></i>
                                    <span>Klanten</span>
                                </a>
                             
                            </li>

                            
            
                            <li>
                                <a href="{{ route('product.all') }}">
                                    <i class="ri-hammer-line"></i>
                                    <span>Producten</span>
                                </a>
                                {{-- <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="{{ route('category.all') }}">Categorieën</a></li>
                                </ul> --}}
                             
                            </li>

                            <li>
                                <a href="{{ route('supplier.all') }}">
                                    <i class="ri-building-line"></i>
                                    <span>Leveranciers</span>
                                </a>
                             
                               

                            </li>
                            
                            <li class="menu-title">FINANCIEEL</li>
                            <li>
                                <a href="javascript: void(0);" class=" waves-effect">
                                    <i class="ri-currency-line"></i>
                                    <span>Offertes</span>
                                </a>
                               
                            </li>

                            <li>
                                <a href="{{ route('purchase.all') }}" class=" waves-effect">
                                    <i class="ri-survey-line"></i>
                                    <span>Opdrachten</span>
                                </a>
                               
                            </li>

                            
                            @role('Admin')
                            <li class="menu-title">ADMINISTRATOR</li>
                            
                            <li>
                                <a href="{{ route('admin.all') }}" class=" waves-effect">
                                    <i class="ri-admin-line"></i>
                                    <span>Gebruikers</span>
                                </a>
                             
                            </li>
                            
                            <li>
                                <a href="{{ route('admin.instellingen') }}" class=" waves-effect">
                                    <i class="ri-settings-2-line"></i>
                                    <span>Instellingen</span>
                                </a>
                             
                            </li>  
                             @else 
                            
                        
                            @endrole
                        
                        

                            

                            {{-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Layouts</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">Vertical</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                                            <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                                            <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                                            <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                                            <li><a href="layouts-preloader.html">Preloader</a></li>
                                            <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
                                        <ul class="sub-menu" aria-expanded="true">
                                            <li><a href="layouts-horizontal.html">Horizontal</a></li>
                                            <li><a href="layouts-hori-topbar-light.html">Topbar light</a></li>
                                            <li><a href="layouts-hori-boxed-width.html">Boxed width</a></li>
                                            <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                                            <li><a href="layouts-hori-colored-header.html">Colored Header</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-title">Pagina's</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Authenticatie</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="auth-login.html">Inloggen</a></li>
                                    <li><a href="auth-register.html">Registreren</a></li>
                                    <li><a href="auth-recoverpw.html">Wachtwoord herstellen</a></li>
                                    <li><a href="auth-lock-screen.html">Vergrendelen</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-profile-line"></i>
                                    <span>Utility</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html">Starter Page</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li> --}}

                           

                            
                         

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>