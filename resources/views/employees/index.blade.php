<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Management System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Employee Management System</h2>

        <a href="{{ route('employees.create') }}"
           class="btn btn-primary">
            Add Employee
        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">Employee List</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($employees as $employee)

                        <tr>

                            <td>
                                {{ $employee->employee_id }}
                            </td>

                            <td>
                                {{ $employee->name }}
                            </td>

                            <td>
                                {{ $employee->email }}
                            </td>

                            <td>
                                {{ $employee->phone }}
                            </td>

                            <td>
                                {{ $employee->department }}
                            </td>

                            <td>
                                {{ $employee->designation }}
                            </td>

                            <td>
                                {{ $employee->salary }}
                            </td>

                            <td>

                                @if($employee->status === 'active')

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a
                                    href="{{ route('employees.show', $employee->employee_id) }}"
                                    class="btn btn-info btn-sm"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('employees.edit', $employee->employee_id) }}"
                                    class="btn btn-warning btn-sm"
                                >
                                    Update
                                </a>

                                <form
                                    action="{{ route('employees.destroy', $employee->employee_id) }}"
                                    method="POST"
                                    style="display:inline;"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this employee?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9"
                                class="text-center">

                                No employees found.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>