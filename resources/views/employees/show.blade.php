<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Employee Details</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Employee Details</h2>

        <a
            href="{{ route('employees.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

    <div class="card">

        <div class="card-header">

            <h5 class="mb-0">
                Employee Information
            </h5>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="30%">Employee ID</th>
                    <td>{{ $employee->employee_id }}</td>
                </tr>

                <tr>
                    <th>Name</th>
                    <td>{{ $employee->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $employee->email }}</td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td>{{ $employee->phone }}</td>
                </tr>

                <tr>
                    <th>Department</th>
                    <td>{{ $employee->department }}</td>
                </tr>

                <tr>
                    <th>Designation</th>
                    <td>{{ $employee->designation }}</td>
                </tr>

                <tr>
                    <th>Salary</th>
                    <td>
                        {{ number_format($employee->salary, 2) }}
                    </td>
                </tr>

                <tr>
                    <th>Status</th>

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

                </tr>

            </table>

            <div class="mt-3">

                <a
                    href="{{ route('employees.edit', $employee->employee_id) }}"
                    class="btn btn-warning"
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
                        class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this employee?')"
                    >
                        Delete
                    </button>

                </form>

                <a
                    href="{{ route('employees.index') }}"
                    class="btn btn-secondary"
                >
                    Employee List
                </a>

            </div>

        </div>

    </div>

</div>
<footer class="bg-white text-dark text-center py-3 mt-5">
    <p class="mb-0">
        Developed by <strong>Md. Anwar Parvez</strong>
    </p>
</footer>

</body>
</html>