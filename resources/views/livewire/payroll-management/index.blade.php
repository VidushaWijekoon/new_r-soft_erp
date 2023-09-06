<div>
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>{{ __('Payroll') }}</strong> {{ __('Dashboard') }}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-md-12 d-flex">
                <div class="w-100">

                    <div class="row">
                        <div class="col-sm-3">
                            <a href="{{ route('holiday.index') }}">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <h1 class="display-5 mt-1 mb-3">{{ __('Year Holidays') }}</h1>
                                        <div class="mb-1">
                                            <span class="text-danger">
                                                <h1 class="text-danger">14</h1>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-3">
                            <a href="{{ route('leaves.index') }}">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <h1 class="display-5 mt-1 mb-3">{{ __('Leaves Request') }}</h1>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-3">
                            <a href="{{ route('attendance.index') }}">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <h1 class="display-5 mt-1 mb-3">{{ __('Attendance') }}</h1>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-3">
                            <a href="{{ route('employee-salary.index') }}">
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <h1 class="display-5 mt-1 mb-3">{{ __('Salary') }}</h1>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-7 col-xxl-7">
                <div class="card flex-fill">
                    <div class="card-header">
                        <a href="{{ route('holiday.create') }}"
                            class="btn btn-sm btn-primary">{{ __('Create New Holiday') }}</a>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>{{ __('#') }}</th>
                                <th>{{ __('Holiday Name') }}</th>
                                <th>{{ __('Holiday Date') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Created By') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; ?>
                            @forelse ($holidays as $allHolidays)
                                <tr>
                                    <td>{{ $x++ }}</td>
                                    <td>{{ $allHolidays->holiday_name }}</td>
                                    <td>{{ $allHolidays->holiday_date }}</td>
                                    <td>{{ $allHolidays->created_at }}</td>
                                    <td>{{ $allHolidays->created_by_username->username }}</td>
                                    <td class="table-action">
                                        <a href="{{ url('admin/holiday/' . $allHolidays->id . '/show') }}">
                                            <i class="fa-solid fa-eye mx-1 text-primary"></i>
                                        </a>
                                        <a href="{{ url('admin/holiday/' . $allHolidays->id . '/edit') }}">
                                            <i class="fa-solid fa-pen mx-1 text-info"></i>
                                        </a>
                                        <a href="{{ url('admin/holiday/' . $allHolidays->id . '/destroy') }}"
                                            onclick="return confirm('Are you sure you want to delete this holiday')">
                                            <i class="fa-solid fa-trash mx-1 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <span class="text-danger">No Holidays Has Been Found</span>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>