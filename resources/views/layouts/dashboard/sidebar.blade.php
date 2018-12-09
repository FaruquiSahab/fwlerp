<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- END SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item start active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                </li>
                
                <li>
                    <a href="#" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Warehouse</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        @if(Auth::guard('personal_info')->user())
                        <li>
                            <a href="{{ route('head.index2') }}" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Product Management</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('head.index') }}" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Customer Management</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('dispatch') }}" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Dispatch Order</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('recieve') }}" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Recieve Order</span>
                                <span class="selected"></span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ route('head.stock') }}" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Warehouse Stock</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('warehouse.index') }}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Warehouse</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                        </li>
                        {{-- <li class="nav-item start active open">
                            <a href="{{ route('management.index') }}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Warehouse Management</span>
                                <span class="selected"></span>
                            </a>
                            <ul>
                                <li class="nav-item start active open">
                                    <a href="{{ route('customize.index') }}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Cutomize Warehouse Management</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item start active open">
                                    <a href="{{ url('customize/view') }}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Customize Warehouse</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                         @else
                        <li class="nav-item start active open">
                            <a href="{{ url('login') }}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Admin Login</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        @endif
                    </ul>
                   
                    
                </li>
            <li>
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Customer</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                
                <ul class="sub-menu">
                    @if(Auth::guard('customers')->user())
                    <li>
                        <a href="{{ route('product.index') }}" class="nav-link nav-toggle ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Product Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order_inload.index') }}" class="nav-link nav-toggle ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Orders Detail</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order_offload.index') }}" class="nav-link nav-toggle ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Request Transaction</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('temp.index') }}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Temporary Storage</span>
                            <span class="selected"></span>
                        </a>
                    </li> --}}

                    {{-- <li>
                        <a href="{{ route('customer.stock') }}" class="nav-link nav-toggle ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Logs</span>
                            <span class="selected"></span>
                        </a>
                    </li> --}}
                    @else
                        <li class="nav-item start active open">
                            <a href="{{ url('customer/login') }}" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Customer Login</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            <li>
                <a href="{{ route('mcrindex') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Create MCR</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Assign Vehicle</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('head.assignvehicle') }}" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">Assign Vehicle Intra City A-A</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('head.assignvehicleI') }}" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">Assign Vehicle Inter City A-B</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('head.manifest') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Create Manifest</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            {{-- <li>
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">View Old MCR</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li> --}}
            <li>
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Search C/N</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            {{-- Khas ker k hide kia ha --}}
            {{-- <li>
                <a href="{{ route('barcode.index') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">BarCode</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('distribution.index') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Distribution ReRouted</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('distribution.detail') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Distribution Simple</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaction.index') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Transaction</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaction.view') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Transaction Inter City</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li class="nav-item start active open">
                        <a href="{{ route('temp.index') }}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Temporary Storage</span>
                            <span class="selected"></span>
                        </a>
                    </li>
            <li>
                <a href="#" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">QA Team</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start active open">
                        <a href="{{ route('warehouse.space') }}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Space Utilization</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start active open">
                        <a href="{{ route('warehouse.time') }}" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Time Utilization</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li> --}}
        {{-- Yaha Tak --}}


        </ul>

        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->