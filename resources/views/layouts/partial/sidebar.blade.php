<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a  href="{{url('/')}}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>

                </li>
                <li class="nav-label">Apps</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa fa-hospital-o"></i><span class="hide-menu">Patients</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('/patients')}}">Patients</a></li>
                        <li><a href="{{url('/serials')}}">Serials</a></li>
                        <li><a href="{{url('/prescriptions')}}">Prescriptions</a></li>

                    </ul>
                </li>

                <li> <a href="{{url('/doctors')}}" aria-expanded="false"><i class="fa fa fa-user-md"></i><span class="hide-menu">Doctors</span></a>                </li>
                <li> <a href="{{url('/pcdoctors')}}" aria-expanded="false"><i class="fa fa fa-user-md"></i><span class="hide-menu">PC Doctors</span></a>                </li>
                <li> <a href="{{url('/workers')}}" aria-expanded="false"><i class="fa fa fa-users"></i><span class="hide-menu">Workers</span></a>                </li>
                <li> <a href="{{url('/shareholders')}}" aria-expanded="false"><i class="fa fa fa-users"></i><span class="hide-menu">Share holders</span></a>                </li>


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa fa-hospital-o"></i><span class="hide-menu">Survey</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('/cardholders')}}">Card Holders</a></li>


                    </ul>
                </li>



                <li class="nav-label">EXTRA</li>


                @hasrole('Admin')
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('users')}}">Users</a></li>
                        <li><a href="{{url('roles')}}">Roles</a></li>
                        <li><a href="{{url('permissions')}}">Permissions</a></li>

                    </ul>
                </li>
                @endhasrole
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Documents</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">How to use</a></li>

                        <li> <a class="has-arrow" href="#" aria-expanded="false">Videos</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">item 1.3.1</a></li>
                                <li><a href="#">item 1.3.2</a></li>
                                <li><a href="#">item 1.3.3</a></li>
                                <li><a href="#">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">item 1.4</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->