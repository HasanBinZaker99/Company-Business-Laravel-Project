@extends('admin.layouts.app')

@section('title')
E-Learning | Role Edit Page
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix g-3">
            <form class="row g-1" action="{{ route('role-permission.update', $role->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="col-lg-8 col-md-12 flex-column">
                    <div class="row row-deck g-3">
                        <div class="col-12">
                            <div class="card bg-success">
                                <div class="card-body text-white d-flex flex-column">
                                    <div class="d-flex align-items-center mb-auto ">
                                        <div class="flex-fill ms-3 text-truncate">
                                            <h4 class=""><b><i>Role Edit</i></b> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row row-deck">
                            <div class="col-md-12">
                                <div class="owl-carousel owl-theme owl-carouseltwo">
                                    <div class="item">
                                        <div class="card">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row g-1">
                                                        <div class="col-12">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Role Name</b></label>
                                                                <input type="text" class="form-control form-control-lg" name="name" value="{{ $role->name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 flex-column">
                    <div class="row row-deck g-3">
                        <div class="col-12">
                            <div class="card bg-info">
                                <div class="card-body text-white d-flex flex-column">
                                    <div class="d-flex align-items-center mb-auto ">
                                        <div class="flex-fill ms-3 text-truncate">
                                            <h4 class=""><b><i>Permission Edit</i></b> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row row-deck">
                            <div class="col-md-12">
                                <div class="owl-carousel owl-theme owl-carouseltwo">
                                    <div class="item">
                                        <div class="card">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row g-1">
                                                        <div class="col-12">
                                                            <div class="">
                                                                <input type="checkbox" id="checkPermissionAll" value="1" {{ App\Models\User::roleHasPermissions($role, $all_permissions) ? 'checked' : ''  }}>
                                                                <label for="checkPermissionAll">All Permission</label><br>
                                                            </div>
                                                            <hr>
                                                            @php $i = 1; @endphp
                                                            @foreach ($permissionsGroup as $group)
                                                            <div class="row">
                                                                @php
                                                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                                                $j = 1;
                                                                @endphp
                                                                <div class="col-3">
                                                                    <input type="checkbox" value="{{ $group->name }}" id="{{ $i }}Management" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : ''  }}>
                                                                    <label for="checkPermission">{{ $group->group_name }}</label>
                                                                    <br>
                                                                </div>

                                                                <div class="col-9 role-{{ $i }}-management-checkbox">
                                                                    @foreach($permissions as $permission)
                                                                    <div class="d-inline-block col-sm-3">
                                                                        <input type="checkbox" id="checkPermission{{$permission->id}}" name="permissions[]" value="{{ $permission->name }}" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                                        <label for="checkPermission{{$permission->id}}">{{ $permission->name }}</label><br>
                                                                    </div>
                                                                    @php $j++; @endphp
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                            <br>
                                                            <hr>
                                                            @php $i++; @endphp
                                                            @endforeach

                                                        </div>
                                                        <div class="col-12 text-right m-2 mt-4">
                                                            <button type="submit" class="btn btn-outline-success form-control-lg"><b>Role Update</b></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- Row End -->
    </div>
</div>

@endsection

@push('script')

@include('admin.components.checkbox-script');

@endpush