<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestDataSelect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:data-select';

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
        echo "Select:\n";

        $employees = Employee::all();
        // var_dump($employees);
        foreach ($employees as $employee) {
            $this->info("ID: {$employee->id}, Name: {$employee->first_name}");
        }

        $employee = Employee::find(2);
        $this->info("\nID: {$employee['id']}, Name: {$employee['first_name']}\n");

        $employees = Employee::where('first_name', '=', 'John')->get();
        foreach ($employees as $employee) {
            $this->info("ID: {$employee->id}, Name: {$employee->first_name}");
        }

        echo PHP_EOL;

        $employees = Employee::where('first_name', '=', 'John')
            ->where('age', '>', 27)->get();
        foreach ($employees as $employee) {
            $this->info("ID: {$employee->id}, Name: {$employee->first_name}");
        }

        echo PHP_EOL;

        $employees = Employee::where('first_name', '=', 'John')
            ->orWhere('age', '>', 27)->get();
        foreach ($employees as $employee) {
            $this->info("ID: {$employee->id}, Name: {$employee->first_name}");
        }

        $employee = Employee::where('first_name', '=', 'John')
            ->orWhere('age', '>', 27)->first();
        $this->info("\nID: {$employee['id']}, Name: {$employee['first_name']}\n");

        echo "Order by:\n";
        $employees = Employee::orderBy('age', 'ASC')->get();
        foreach ($employees as $employee) {
            $this->info("ID: {$employee->id}, Name: {$employee->first_name}, Age: {$employee->age}");
        }

        echo PHP_EOL;

        $employees = Employee::orderBy('age', 'DESC')->limit(3)->get();
        foreach ($employees as $employee) {
            $this->info("ID: {$employee->id}, Name: {$employee->first_name}, Age: {$employee->age}");
        }

        echo PHP_EOL;

        $employees = Employee::orderBy('age', 'DESC')->skip(2)->limit(3)->get();
        foreach ($employees as $employee) {
            $this->info("ID: {$employee->id}, Name: {$employee->first_name}, Age: {$employee->age}");
        }

        echo "\nGroup by:\n";
        $employees = DB::table('employees')
            ->groupBy('first_name')
            ->select('first_name', DB::raw('count(1) as employee_total'))
            ->get();

        foreach ($employees as $employee) {
            $this->info("Name: {$employee->first_name}, Count: {$employee->employee_total}");
        }

        echo "\nDistinct:\n";
        $employees = Employee::distinct()->orderBy('first_name')->get(['first_name']);

        foreach ($employees as $employee) {
            $this->info("{$employee->first_name}");
        }

        return 0;
    }
}
