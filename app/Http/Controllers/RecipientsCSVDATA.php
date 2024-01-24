<?php

namespace App\Http\Controllers;

use App\Jobs\RecipientsCSVDATA as JobsRecipientsCSVDATA;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class RecipientsCSVDATA extends Controller
{
    public function store(Request $request)
    {
        if ($request->has('csv')) {
            $csvFilePath = $request->csv;

            $chunks = array_chunk(file($csvFilePath), 200);

            $header = [];
            $batch = Bus::batch([])->dispatch();

            foreach ($chunks as $key => $chunk) {
                $data = array_map('str_getcsv', $chunk);

                if ($key === 0) {
                    $header = array_shift($data);
                }

                $batch->add(new JobsRecipientsCSVDATA($data, $header));
            }

            return redirect()->route('recipients.index')->with('success', 'Welcome to CSV');
        }
    }
}
