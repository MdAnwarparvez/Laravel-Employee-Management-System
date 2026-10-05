<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Employee</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2>Add Employee</h2>

        <a href="{{ route('employees.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>

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
                action="{{ route('employees.store') }}"
                method="POST"
            >

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Employee ID
                    </label>

                    <input
                        type="text"
                        name="employee_id"
                        class="form-control"
                        value="{{ old('employee_id') }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Employee Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Phone
                    </label>

                    <input
    type="text"
    name="phone"
    class="form-control"
    value="{{ old('phone') }}"
    maxlength="11"
    minlength="11"
    pattern="[0-9]{11}"
    inputmode="numeric"
    placeholder="Enter 11 digit phone number"
    required
                        
                        
                
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Department
                    </label>

                    <input
                        type="text"
                        name="department"
                        class="form-control"
                        value="{{ old('department') }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Designation
                    </label>

                    <input
                        type="text"
                        name="designation"
                        class="form-control"
                        value="{{ old('designation') }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Salary
                    </label>

<input
    type="text"
    name="salary"
    class="form-control"
    value="{{ old('salary') }}"
    placeholder="Enter salary"
    required
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required
                    >

                        <option value="active">
                            Active
                        </option>

                        <option value="inactive">
                            Inactive
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Save Employee
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
<footer class="bg-white text-dark text-center py-3 mt-5">
    <p class="mb-0">
        Developed by <strong>Md. Anwar Parvez</strong>
    </p>
</footer>
</footer>
</body>
</html>