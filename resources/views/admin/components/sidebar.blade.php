@php

use App\Models\Setting;

$user = Auth::guard('web')->user();
$settings = Setting::first();

@endphp

<div class="sidebar px-4 py-4 py-md-4  me-0" style="overflow: scroll;">
    <div class="d-flex flex-column h-100">
        <a href="{{ route('home') }}" class="mb-0 brand-icon">
            <span class="logo-icon">
                <img src="{{ asset('company-logo') . '/' . $settings->company_logo }}" alt="" width="80px">
            </span>
            <span class="logo-text">{{ $settings->title }}</span>
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            @if($user->can('Dashboard View'))
            <li><a class="m-link active" href="{{ route('home') }}"><i class="icofont-ui-home " style="color:#191970"></i><span>Dashboard</span></a></li>
            @endif
            @if ($user->can('Manage User') || $user->can('Role Create') || $user->can('Role List View') || $user->can('Role Edit') || $user->can('Role Delete') || $user->can('User List') || $user->can('User List View') || $user->can('Create Users View') || $user->can('User Create') || $user->can('User Edit') || $user->can('User Delete'))

            @if($user->can('Manage User'))
            <li class="collapsed"><a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-users" href="#"><i class="icofont-users-social"  style="color:#191970"></i><span>Manage Users</span><span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse {{ Route::is('role-permission.create') || Route::is('role-permission.index') ? 'in' : '' }}" id="menu-users">
                    @if($user->can('Role Create'))
                    <li><a class="ms-link" href="{{ route('role-permission.create') }}"><span>Create Role</span></a></li>
                    @endif
                    @if($user->can('Role list View'))
                    <li><a class="ms-link" href="{{ route('role-permission.index') }}"><span>Role List</span></a></li>
                    @endif
                    @if($user->can('User Create'))
                    <li><a class="ms-link" href="{{ route('user-create.create') }}"><span>Create User</span></a></li>
                    @endif
                    @if($user->can('Users List View'))
                    <li><a class="ms-link" href="{{ route('user-create.index') }}"><span>User List</span></a></li>
                    @endif
                </ul>
            </li>
            @endif
            @endif
            @if($user->can('Notice Board View'))
            <li><a class="m-link" href="{{ route('notice-board.index') }}"><i class="icofont-clip-board" style="color:#28ff49"></i> <span>Notice Board</span></a></li>
            @endif
            @if($user->can('View Payment'))
            <li><a class="m-link" href="{{ route('payment.index') }}"><i class="icofont-money" style="color:#28ff49"></i> <span>Payment Received</span></a></li>
            @endif
            @if($user->can('Teacher'))
            <li class="collapsed"><a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Teachers" href="#"><i class="icofont-teacher" style="color:#191970"></i><span>Teachers</span><span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse" id="menu-Teachers">
                    @if($user->can('Designation View'))
                    <li><a class="ms-link" href="{{ route('designation') }}"><span>Designation Add</span></a></li>
                    @endif
                    @if($user->can('Teacher View'))
                    <li><a class="ms-link" href="{{ route('teacher.index') }}"><span>Teachers</span></a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if($user->can('Course'))
            <li class="collapsed"><a class="m-link" data-bs-toggle="collapse" data-bs-target="#corses-Components" href="#"><i class="icofont-certificate" style="color:#191970"></i> <span>Courses</span><span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse" id="corses-Components">
                    @if($user->can('Course Create'))
                    <li><a class="ms-link" href="{{ route('course-add.index') }}"><span>Courses Add</span></a></li>
                    @endif
                    @if($user->can('Course Details Create'))
                    <li><a class="ms-link" href="{{ route('course-details.index') }}"><span>Courses Details Add</span></a></li>
                    @endif
                    @if($user->can('All Course View'))
                    <li><a class="ms-link" href="{{ route('course-view') }}"><span>All Course</span></a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if($user->can('Batch'))
            <li class="collapsed"><a class="m-link" data-bs-toggle="collapse" data-bs-target="#batch-Components" href="#"><i class="icofont-architecture-alt" style="color:#28ff49"> </i> <span>Batch</span><span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse" id="batch-Components">
                    @if($user->can('Batch Create View'))
                    <li><a class="ms-link" href="{{ route('batch.index') }}"><span>Batch Create</span></a></li>
                    @endif
                    @if($user->can('Teacher Assign View'))
                    <li><a class="ms-link" href="{{ route('teacher-assign.index') }}"><span>Teacher Assign</span></a></li>
                    @endif
                    @if($user->can('Batch List View'))
                    <li><a class="ms-link" href="{{ route('batch-list') }}"><span>Batch Lists</span></a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if($user->can('Class'))
            <li class="collapsed"><a class="m-link" data-bs-toggle="collapse" data-bs-target="#class-Components" href="#"><i class="icofont-read-book-alt" style="color:#28ff49"></i> <span>Class</span><span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse" id="class-Components">
                    @if($user->can('Class List View'))
                    <li><a class="ms-link" href="{{ route('class.index') }}"><span>Class Lists</span></a></li>
                    @endif
                    <!-- <li><a class="ms-link" href="{{ route('teacher-assign.index') }}"><span>Teacher Assign</span></a></li>
                    <li><a class="ms-link" href="{{ route('batch-list') }}"><span>Batch Lists</span></a></li> -->
                </ul>
            </li>
            @endif
            @if($user->can('Admission'))
            <li class="collapsed"><a class="m-link" data-bs-toggle="collapse" data-bs-target="#admission-Components" href="#"><i class="icofont-ebook" style="color:#191970"></i><span>Admission</span><span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse" id="admission-Components">
                    @if($user->can('Admission View'))
                    <li><a class="ms-link" href="{{ route('admission.index') }}"><span>Admission</span></a></li>
                    @endif
                    @if($user->can('Admission List View'))
                    <li><a class="ms-link" href="{{ route('admission-lists') }}"><span>Admission Lists</span></a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if($user->can('Panel'))
            <li class="collapsed"><a class="m-link" data-bs-toggle="collapse" data-bs-target="#studentpanel-Components" href="#"><i class="icofont-users-alt-2" style="color:#191970"></i><span>Student Panel</span><span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse" id="studentpanel-Components">
                    @if($user->can('Panel View'))
                    <li style="color:#000 !important"><a class="ms-link" href="{{ route('student-panel.create') }}"><span>Create Panel</span></a></li>
                    @endif
                    @if($user->can('Panel List View'))
                    <li><a class="ms-link" href="{{ route('student-panel.index') }}"><span>Panel Lists</span></a></li>
                    @endif
                </ul>
            </li>
            @endif
        </ul>
        <!-- Theme: Switch Theme -->
        <ul class="list-unstyled mb-0">
            <li class="d-flex align-items-center justify-content-center">
                <div class="form-check form-switch theme-switch">
                    <input class="form-check-input" type="checkbox" id="theme-switch" >
                    <label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
                </div>
            </li>
        </ul>
        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right" style="color:#39ff14"></i></span>
        </button>
    </div>
</div>