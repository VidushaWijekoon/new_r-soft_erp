<div>
    @if (session('message'))
        <div class="alert alert-success bg-info p-2 mb-3 text-white text-capitalize" id="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong class="mx-2">{{ __('HRM') }}</strong> {{ __('Departments') }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8 col-xxl-9 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <a href="{{ route('department.create') }}"
                        class="btn btn-sm btn-primary">{{ __('Create New Department') }}</a>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Department Name') }}</th>
                            <th>{{ __('Discription') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Created By') }}</th>
                            <th class="text-center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $x = 1; ?>
                        @forelse ($departments as $departmentItem)
                            <tr>
                                <td>{{ $x++ }}</td>
                                <td>{{ $departmentItem->id }}</td>
                                <td class="text-capitalize">{{ $departmentItem->department_name }}</td>
                                <td class="text-capitalize">{{ $departmentItem->description }}</td>
                                <td>
                                    @if ($departmentItem->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Not Active</span>
                                    @endif
                                </td>
                                <td>{{ $departmentItem->created_at }}</td>
                                <td class="text-capitalize">{{ $departmentItem->created_by_username->username }}</td>
                                <td class="table-action">
                                    @if ($departmentItem->status == '1')
                                        <a href="{{ url('admin/department/' . $departmentItem->id . '/dectivate') }}"
                                            onclick="return confirm('Are you sure you want to deactivate this department')">
                                            <i class="fa-solid fa-circle-xmark mx-1 text-danger"></i>
                                        </a>
                                    @elseif($departmentItem->status == '0')
                                        <a href="{{ url('admin/department/' . $departmentItem->id . '/activate') }}"
                                            onclick="return confirm('Are you sure you want to activate this department')">
                                            <i class="fa-solid fa-circle-check mx-1 text-success"></i>
                                        </a>
                                    @endif
                                    <a href="{{ url('admin/department/' . $departmentItem->id . '/show') }}">
                                        <i class="fa-solid fa-eye mx-1 text-primary"></i>
                                    </a>
                                    <a href="{{ url('admin/department/' . $departmentItem->id . '/edit') }}">
                                        <i class="fa-solid fa-pen mx-1 text-info"></i>
                                    </a>
                                    <a href="{{ url('admin/department/' . $departmentItem->id . '/destroy') }}"
                                        onclick="return confirm('Are you sure you want to delete this department')">
                                        <i class="fa-solid fa-trash mx-1 text-danger"></i>
                                    </a>
                                </td>
                            @empty
                                <span class="text-danger">{{ __('No Found!') }}</span>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mx-3 mt-2">
                    {{ $departments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>