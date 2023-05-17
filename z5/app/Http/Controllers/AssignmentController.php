<?php

    

namespace App\Http\Controllers;

    

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Assignment;
use App\Models\Result;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use DB;

use Hash;

use Illuminate\Support\Arr;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

    

class AssignmentController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request): View

    {

        $data = Assignment::latest()->paginate(5);

  

        return view('assignments.index',compact('data'))

            ->with('i', ($request->input('page', 1) - 1) * 5);

    }

    

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create(): View

    {
        $studentRole = Role::where('name', 'student')->first();
        $students = User::Role($studentRole)->pluck('name','id')->all();

 
        $files = Storage::disk('local')->files("/assignments");
        foreach($files as &$file){
            $file = str_replace("assignments/",'',$file);
        }
        return view('assignments.create',compact(['students','files']));

    }

    

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request): RedirectResponse
    {

        $this->validate($request, [
            'from_time' => 'nullable|date',
            'to_time' => 'nullable|date',
            'max_points' => 'required|numeric',
            'tex_files' => 'required|array'
        ]);

        $input = $request->all();
        
        $input['created_by'] = Auth::id();
       
        $ass = Assignment::create($input);
        foreach($input['students'] as $student)
{
    $tempRes = Result::create([
        "user_id" => $student,
        'assignment_id' => $ass->id,
        "status" => "open"
    ]);
}
        return redirect()->route('assignments.index')

                        ->with('success',__('Assignment created successfully'));

    }

    

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id): View

    {

        $studentRole = Role::where('name', 'student')->first();
        $students = User::Role($studentRole)->pluck('name','id')->all();

 
        $files = Storage::disk('local')->files("/assignments");
        foreach($files as &$file){
            $file = str_replace("assignments/",'',$file);
        }
        return view('assignments.show',compact(['files','students']));

    }

    

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id): View

    {
        $assignment = Assignment::find($id);
        $studentRole = Role::where('name', 'student')->first();
        $students = User::Role($studentRole)->pluck('name','id')->all();
        $assignedStudents = Result::where("assignment_id",'=',$id)->pluck('user_id');
 
        $files = Storage::disk('local')->files("/assignments");
        foreach($files as &$file){
            $file = str_replace("assignments/",'',$file);
        }

        return view('assignments.edit',compact(['assignment','students','files','assignedStudents']));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id): RedirectResponse

    {
        $this->validate($request, [
            'from_time' => 'nullable|date',
            'to_time' => 'nullable|date',
            'max_points' => 'required|numeric',
            'tex_files' => 'required|array',
            'students' => 'required|array'
        ]);

        $input = $request->all();
        $ass = Assignment::find($id);
        $ass->update($input);
        $tempRes = [];
        foreach($input['students'] as $student)
        {
            $tempResult = Result::where("assignment_id",'=',$ass->id)->where("user_id",'=',$student )->first();
            if(!$tempResult){
                $tempRes[] =(Result::create([
                    "user_id" => $student,
                    'assignment_id' => $ass->id,
                    "status" => "open"
                ]))->id;
            }else{
                $tempRes[] = $tempResult->id;
            }
            
        }
        $resToRemove = Result::whereNotIn('id',$tempRes)->delete();
        return redirect()->route('assignments.index')

                        ->with('success','User updated successfully');

    }

    

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id): RedirectResponse

    {

        Assignment::find($id)->delete();

        return redirect()->route('assignments.index')

                        ->with('success','User deleted successfully');

    }

}