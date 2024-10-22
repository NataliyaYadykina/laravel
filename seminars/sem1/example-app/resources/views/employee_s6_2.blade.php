<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>
</head>

<body>
    <form action="{{ route('store_employee_s6_2') }}" name="employees6_2" method="POST">
        @csrf
        <label for="first_name">First name:</label>
        <input type="text" name="first_name" id="first_name" required
            value="@if ($employee) {{ $employee->first_name }} @endif"><br>
        <label for="last_name">Last name:</label>
        <input type="text" name="last_name" id="last_name" required
            value="@if ($employee) {{ $employee->last_name }} @endif"><br>
        {{-- <label for="position">Position:</label>
        <select name="department" id="department">
            <option value="finance">Finance</option>
            <option value="it">IT</option>
            <option value="internal_service">Internal service</option>
        </select><br> --}}
        <label for="position">Positions:</label>
        <input type="checkbox" name="department[]" value="finance"
            @if ($employee && in_array('finance', unserialize($employee->department))) checked @endif>Finance</input>
        <input type="checkbox" name="department[]" value="it"
            @if ($employee && in_array('it', unserialize($employee->department))) checked @endif>IT</input>
        <input type="checkbox" name="department[]" value="internal_service"
            @if ($employee && in_array('internal_service', unserialize($employee->department))) checked @endif>Internal service</input><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
