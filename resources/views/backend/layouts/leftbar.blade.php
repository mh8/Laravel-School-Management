<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{url('/')}}" class="logo logo-large"><img src="{{ asset('backend/assets/images/logo.svg') }}" class="img-fluid" alt="logo"></a>
            <a href="{{url('/')}}" class="logo logo-small"><img src="{{ asset('backend/assets/images/small_logo.svg') }}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li class="">
                    <a href="{{route('dashboard')}}">
                        <i class="fa fa-dashcube"></i><span>Dashboard</span>
                    </a>
                </li>
                @if(Auth::user()->role == 'Admin')
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-user-circle-o"></i><span>User</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('user.view') }}">User List</a></li>
                        <li><a href="{{ route('user.create') }}">User Add</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-slideshare"></i>Manage Profile</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('profile.view') }}">Profile</a></li>
                        <li><a href="{{ route('password.view') }}">Change Password</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ion ion-ios-settings"></i><span>Setup Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('student.class.view') }}">Student Class</a></li>
                        <li><a href="{{ route('student.year.view') }}">Student Year</a></li>
                        <li><a href="{{ route('student.group.view') }}">Student Group</a></li>
                        <li><a href="{{ route('student.shift.view') }}">Student Shift</a></li>
                        <li><a href="{{ route('fee.category.view') }}">Fee Category</a></li>
                        <li><a href="{{ route('fee.amount.view') }}">Fee Category Amount</a></li>
                        <li><a href="{{ route('exam.type.view') }}">Exam Type</a></li>
                        <li><a href="{{ route('subject.view') }}">Subject</a></li>
                        <li><a href="{{ route('assign.subject.view') }}">Assign Subject</a></li>
                        <li><a href="{{ route('designation.view') }}">Designation</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-mortar-board"></i></i><span>Student Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{route('student.registration.view')}}">Student Registration</a></li>
                        <li><a href="{{route('registration.fee.view')}}">Registration Fee</a></li>
                        <li><a href="{{route('monthly.fee.view')}}">Monthly Fee</a></li>
                        <li><a href="{{route('exam.fee.view') }}">Exam Fee</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-users"></i><span>Employee Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('employee.registration.view') }}">Employee Registration</a></li>
                        <li><a href="{{ route('employee.salary.view') }}">Employee Salary</a></li>
                        <li><a href="{{ route('employee.leave.view') }}">Employee Leave</a></li>
                        <li><a href="{{ route('employee.attendance.view') }}">Employee Attendance</a></li>
                        <li><a href="{{ route('employee.monthly.salary.view') }}">Employee Monthly Salary</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-shekel"></i><span>Marks Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('marks.entry.add') }}">Marks Entry</a></li>
                        <li><a href="{{ route('marks.entry.edit') }}">Marks Edit</a></li>
                        <li><a href="{{ route('marks.grade.view') }}">Marks Grade</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="fa fa-money"></i><span>Account Management</span><i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('student.fee.view') }}">Student Fee</a></li>
                        <li><a href="{{ route('account.salary.view') }}">Employee Salary</a></li>
                        <li><a href="{{ route('account.other.view') }}">Others</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
