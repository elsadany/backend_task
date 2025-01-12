<!DOCTYPE html>
<html>

<head>
    <title>Employee Salaries</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('employees.index') }}">
                    <label for="n">Enter a number (5-50):</label>
                    <input type="number" name="n" id="n" min="5" max="50" value="{{ request('n') }}" required>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($employees))
                        <table>
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->max_salary }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No employees found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
