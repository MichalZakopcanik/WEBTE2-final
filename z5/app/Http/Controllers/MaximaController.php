<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Maxima\Maxima;
use Illuminate\Http\Request;
use DOMDocument;
use DOMXPath;

class MaximaController extends Controller
{
    public function index(Request $request)
    {
        $command = 'solve(x^2 - 5*x + 6 = 0, x);';
        $output = Maxima::runCommand($command);
        //$this->compareResult();
        return view('calculate', ['output' => $output]);
    }

    public function compareResult(/*$input*/){
        // Read the contents of the LaTeX file
        $latex = file_get_contents(asset('exercises/blokovka01pr.tex'));
        //echo $latex;
        // Define the regular expression pattern to extract the task and solution for a particular question
       // $pattern = '/\\\\section\*{([A-F0-9]{6})}\s*\\\\begin{task}(.*)\\\\end{task}\s*\\\\begin{solution}(.*)\\\\end{solution}/s';
        // Find the matches for the pattern in the LaTeX file
       /* preg_match($pattern, $latex, $matches);

        if (count($matches) > 0) {
            $question_id = $matches[1];
            $task = $matches[2];
            $solution = $matches[3];
            echo $question_id . $task . $solution;
        } else {
            echo 'No matches found.';
        }*/
    
        $pattern = '/\\\\begin{solution}(.*?)\\\\end{solution}/s';
        $desiredResult = null;
        if (preg_match($pattern, $latex, $matches)) {
            // extract the equation inside the solution environment
            $equation = $matches[1];
            echo $equation;
            // match the fraction using a regular expression
            /*preg_match('/\d+\\s*\\*?\\s*s\\s*\\^\\s*2\s*\\+?\s*\d+\\s*\\*?\\s*s\s*\\+?\s*\d+\s*\/\s*\(\s*\d+\\s*\\*?\\s*s\\s*\\^\\s*3\s*\\+?\s*\d+\\s*\\*?\\s*s\\s*\\^\\s*2\s*\\+?\s*\d+\\s*\\*?\\s*s\s*\\+?\s*\d+\s*\)/', $equation, $matches);
            $desiredResult = trim($matches[0]);
            echo $desiredResult;*/
        }

        // evaluate the input expression using Maxima
      /*  $input = '(2 + 2);';
        $output = shell_exec('maxima --very-quiet --batch-string="tex'.$input.'"');
        echo "Správny výsledok: " . $desiredResult . ", Výsledok: " . $output;
        
        // compare the output with the desired result
        if (trim($output) == trim($desiredResult)) {
            echo 'Input is correct!';
        } else {
            echo 'Input is incorrect.';
        }*/
    }

    public function getInput(){
        
    }
}