<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CalcController extends Controller
{
    public function compareResult(Request $request){
        $input = $request->input('input');
        $input2 = $request->input('result');
       
        $command = "python3 /var/www/site249.webte.fei.stuba.sk/z5/app/Python/sym.py";
        $arguments = escapeshellarg($input) . ' ' . escapeshellarg($input2);
        $command .= ' ' . $arguments . ' 2>&1';
        
        $output = shell_exec($command);
        
        $result = json_decode($output, true);

        $result['input'] = $input;
        $result['command'] = $command;
        $result['output'] = $output;

        return response()->json($result);
    }
}