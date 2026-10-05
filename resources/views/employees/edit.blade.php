
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Update Employee</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Update Employee</h2>

        <a
            href="{{ route('employees.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card">

        <div class="card-body">

            <form
                action="{{ route('employees.update', $employee->employee_id) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                {{-- Employee ID --}}
                <div class="mb-3">

                    <label class="form-label">
                        Employee ID
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $employee->employee_id }}"
                        readonly
                    >

                </div>

                {{-- Employee Name --}}
                <div class="mb-3">

                    <label class="form-label">
                        Employee Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $employee->name) }}"
                        required
                    >

                </div>

                {{-- Email --}}
                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $employee->email) }}"
                        required
                    >

                </div>

                {{-- Phone --}}
                <div class="mb-3">

                    <label class="form-label">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        value="{{ old('phone', $employee->phone) }}"
                        maxlength="11"
                        minlength="11"
                        pattern="[0-9]{11}"
                        inputmode="numeric"
                        placeholder="Enter 11 digit phone number"
                        required
                    >

                </div>

                {{-- Department --}}
                <div class="mb-3">

                    <label class="form-label">
                        Department
                    </label>

                    <input
                        type="text"
                        name="department"
                        class="form-control"
                        value="{{ old('department', $employee->department) }}"
                        required
                    >

                </div>

                {{-- Designation --}}
                <div class="mb-3">

                    <label class="form-label">
                        Designation
                    </label>

                    <input
                        type="text"
                        name="designation"
                        class="form-control"
                        value="{{ old('designation', $employee->designation) }}"
                        required
                    >

                </div>

                {{-- Salary --}}
                <div class="mb-3">

                    <label class="form-label">
                        Salary
                    </label>

                    <input
                        type="text"
                        name="salary"
                        class="form-control"
                        value="{{ old('salary', $employee->salary) }}"
                        placeholder="Enter salary"
                        required
                    >

                </div>

                {{-- Status --}}
                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required
                    >

                        <option
                            value="active"
                            {{ $employee->status === 'active' ? 'selected' : '' }}
                        >
                            Active
                        </option>

                        <option
                            value="inactive"
                            {{ $employee->status === 'inactive' ? 'selected' : '' }}
                        >
                            Inactive
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Update Employee
                </button>

                <a
                    href="{{ route('employees.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>

