<?php
namespace App\Maxima;
class Maxima
{
    public static function runCommand($command)
    {
        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
            1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
            2 => array("pipe", "w")   // stderr is a pipe that the child will write to
        );

        $process = proc_open('maxima', $descriptorspec, $pipes);

        if (is_resource($process)) {
            fwrite($pipes[0], $command);
            fclose($pipes[0]);

            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);

            $error = stream_get_contents($pipes[2]);
            fclose($pipes[2]);

            $status = proc_get_status($process);
            proc_close($process);

            if ($status['exitcode'] !== 0) {
                throw new \Exception($error);
            }

            return trim($output);
        } else {
            throw new \Exception('Failed to start Maxima process.');
        }
    }
}
