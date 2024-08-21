<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PythonController extends Controller
{
    public function getDataFromPython()
    {
        // Path to your Python script
        $pythonScript = base_path('scripts/tes.py');

        // Execute the Python script and capture the output
        $output = shell_exec("python3 " . escapeshellarg($pythonScript));

        // Decode the JSON output from the Python script
        $data = json_decode($output, true);

        // Pass the data to your Blade view
        return view('python-data', compact('data'));
    }
}
