<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solution;


class CalcController extends Controller
{
    public function compareResult(Request $request,$solutionId){
        $this->validate($request,[
            'result' => 'required'
        ]);
        
        $solution = Solution::find($solutionId);

        if(is_null($solution)){
            return response()->withErrors(__("trans.compareResultsNoSolution"));
        }

        $input2 = $request->input('result');
       
        $command = "python3 ".__DIR__."/../../Python/sym.py";

        $arguments = escapeshellarg($solution->solution_html) . ' ' . escapeshellarg($input2);
        $command .= ' ' . $arguments . ' 2>&1';
        
        $output = shell_exec($command);
        
        $result = json_decode($output, true);
        if(isset($result) && $result["result"] === 1){
            $solution->status= 'finished';
            $solution->save();
            $resultModel = $solution->result;
            $resultModel->status = "review";  
            $resultModel->save();
            return response(["message"=> __('trans.solutionCorrect')],200);
        }else{
            return response(["message"=> __("trans.solutionWrong")],422);
        }

    }
}