<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill; 
use App\Models\Major;
use App\Models\JobSearch;
use App\Models\UserSelection;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SkillController extends Controller
{
    public function autocompleteSkills(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Skill::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    } 
    public function autocompleteMajors(Request $request)
    {
          $query = $request->get('query');
          $majors = Major::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($majors);
    }
    public function saveSelections(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'selectedSkills' => 'required|string',
        'selectedMajors' => 'required|string',
    ]);

    // Save the user selections
    $selections = new UserSelection();
    $selections->user_id = auth()->id();
    $selections->skills = $validatedData['selectedSkills'];
    $selections->majors = $validatedData['selectedMajors'];
    $selections->save();

    return redirect()->route('pythondata');

    // Run the Python script with the user_id as an argument
    // $process = new Process(['D:\Apps\Python\python.exe', 'D:\laravelP\Caredge\tes.py', $selections->user_id]);
    // $process->run();

    // // Check if the process ran successfully
    // // if (!$process->isSuccessful()) {
    //     // throw new ProcessFailedException($process);
    // // }

    // // Get the output from the Python script
    // $output = $process->getOutput();
    // $results = json_decode($output, true);

    // // Return the results to the Blade view
    // return view('recommendation', ['results' => $results, 'user_id' => $selections->user_id]);

}

}
