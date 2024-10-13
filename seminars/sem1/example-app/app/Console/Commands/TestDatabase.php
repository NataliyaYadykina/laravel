<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;

class TestDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:test_insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Insert 5 records into the 'employees' table
        // for ($i = 0; $i < 5; $i++) {
        //     $employee = new Employee();
        //     $employee->first_name = 'John';
        //     $employee->save();
        // }

        // Update the first name of the employee with ID 5 to 'Jane'
        $employee = Employee::where('id', 5)->first();
        $employee->first_name = 'Jane';
        $employee->save();

        // Delete the employee with ID 6
        // $employee = Employee::where('id', 6)->first();
        // $employee->delete();
        Employee::where('id', 6)->delete();

        return 0;
    }
}
