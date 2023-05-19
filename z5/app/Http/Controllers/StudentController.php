<?php

    

namespace App\Http\Controllers;

    

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;

use App\Models\Assignment;

use Spatie\Permission\Models\Role;

use DB;

use Hash;

use Illuminate\Support\Arr;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

    

class StudentController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request): View

    {
        $role = Role::where('name', 'student')->first();
        $data = User::Role($role)->latest()->paginate(5);

  

        return view('students.index',compact('data'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }


    public function show($id): View

    {

        $user = User::find($id);
        $assignments = $user->assignments()->paginate(5);
        
        return view('students.show', compact('user', 'assignments'));
    }

    public function generate($assignmentId)
{
    $assignment = Assignment::findOrFail($assignmentId);
    $files = $assignment->tex_files;
    
    if (count($files) > 1) {
        $randomFile = collect($files)->random();
    } else {
        $randomFile = $files[0];
    }
    
    $latexContent = Storage::disk('local')->get("assignments/{$randomFile}");
    
    $taskPattern = '/\\\\section\*{([^}]+)}\s*\\\\begin{task}(.*?)\\\\end{task}/s';
    //$solutionPattern = '/\\\\section\*{([^}]+)}\s*\\\\begin{solution}(.*?)\\\\end{solution}/s';
    //$solutionPattern = '/\\\\section\*{([^}]+)}\s*(?!\\\\begin{task})(.*?)\\\\begin{solution}(.*?)\\\\end{solution}/s';
    $solutionPattern = '/\\\\section\*{([^}]+)}.*?\\\\begin{solution}(.*?)\\\\end{solution}/s';

    preg_match_all($taskPattern, $latexContent, $taskMatches);
    preg_match_all($solutionPattern, $latexContent, $solutionMatches);
    $tasks = $taskMatches[2];
    $imageNames = [];
    foreach ($tasks as &$task) {
        preg_match('/\\\\includegraphics{([^}]+)}/', $task, $imageMatch);
        $task = preg_replace('/\\\\includegraphics{[^}]+}/', '', $task);
       // dd($tasks);
       if(!empty($imageMatch)){
        $imagePath = $imageMatch[1]; // Extract the image path from the task
        
        // Filename
        $filename = basename($imagePath);
        array_push($imageNames, $filename);
       }
        // Full path to the image file
        //$imageFilePath = 'assignments/images/' . $filename;
        //dd($imageFilePath);
    }
    unset($task);

    $solutionEquations = array_map(function ($solution) {
        preg_match('/\\\\begin{equation\*}(.*?)\\\\end{equation\*}/s', $solution, $equationMatch);
        return $equationMatch[1] ?? '';
    }, $solutionMatches[2]);
    
    $solutions = array_combine($solutionMatches[1], $solutionEquations);

    $tasks = array_combine($taskMatches[1], $tasks);
    $randomSection = array_rand($tasks);
    $filename = null;
if(!empty($imageNames)){
    $imageNames = array_combine($taskMatches[1], $imageNames);
    $filename = $imageNames[$randomSection];
}
    $taskContent = $tasks[$randomSection];
    $solutionContent = $solutions[$randomSection];
    $solutionContent = preg_replace('/.*=/', '', $solutionContent);
    //dd($solutionContent);
    return view('students.generate', compact('assignmentId', 'taskContent', 'solutionContent', 'filename'));
   // return view('students.generate', compact('assignmentId', 'taskContent', 'solutionContent', 'imageFilePath'));
}
}