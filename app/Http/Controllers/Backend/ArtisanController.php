<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

class ArtisanController extends Controller
{
    public function runCommand($command)
    {
        $process = new Process(['php', 'artisan', $command]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \Exception($process->getErrorOutput());
        }

        return $process->getOutput();
    }
}
