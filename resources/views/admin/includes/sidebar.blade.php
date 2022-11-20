<ul class="sidebar-menu">
                        <li class="active">
                            <a href="/admin/dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- <li class="active">
                            <a href="/admin/messages">
                                <i class="fa fa-envelope-o"></i> <span>Messages</span>
                            </a>
                        </li> -->
                        <li class="active">
                            <a href="/admin/bills">
                                <i class="fa fa-money"></i> <span>Bills</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="/admin/reading">
                                <i class="fa fa-list"></i> <span>Reading</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="/admin/consumer">
                                <i class="fa fa-male"></i> <span>Consumers</span>
                            </a>
                        </li>
                        <!-- <li class="active">
                            <a href="/admin/applicants">
                                <i class="fa fa-th-large"></i> <span>Applicants</span>
                                <!-- <span class="pull-right-container">
                                <span class="label label-primary pull-right">4</span>
                                </span> 
                            </a>
                        </li> -->
                        <li class="active">
                            <a href="/admin/employee">
                                <i class="fa fa-user"></i> <span>Users</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="/admin/setting">
                                <i class="fa  fa-gears"></i> <span>Setting</span>
                            </a>
                        </li>
                        <!-- <li class="active">
                            <a href="/admin/report">
                                <i class="fa fa-folder-open-o"></i> <span>Report</span>
                            </a>
                        </li> -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder-open-o"></i> <span>Reports</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/admin/report/payments"><i class="fa fa-angle-double-right"></i> Collections</a></li>
                                <li><a href="/admin/report/collectibles"><i class="fa fa-angle-double-right"></i> Collectibles</a></li>
                                <li><a href="/admin/report/consumers"><i class="fa fa-angle-double-right"></i> Consumers</a></li>
                                <li><a href="/admin/report"><i class="fa fa-angle-double-right"></i> Summary</a></li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="/admin/logs">
                                <i class="fa fa-folder"></i> <span>Logs</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" > <i class="fa fa-reply"></i> <span>Logout</span></a>
                           
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                          
                          
                        </li>
                    </ul>