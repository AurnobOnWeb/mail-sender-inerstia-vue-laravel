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

            return redirect()->route('recipients.csvimport')->with('success', 'Welcome to CSV');
        }
    }

    public function upload(Request $request)
    {
        // $image = $request->file('image')->store('Topics', 'public');
        // return dd($image);
        // Category::create([
        //     'name' => $image,
        //     'status' => 'Active'
        // ]);

        // $request->validate([
        //     'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        // ]);


        // $fileName = time() . '.' . $request->file->extension();
        // return dd($fileName);
        // $abir =  $request->file->move(public_path('uploads'), $fileName);

        // return back()
        //     ->with('success', 'You have successfully upload file.')
        //     ->with('file', $fileName);



        $file_path = '';

        if ($request->hasFile('file')) {
            $file_path = $request->file('file')->store('file', 'public');
        }

        $data = Category::create([
            'name' => $file_path,
            'status' => 'Active',

        ]);

        return redirect()->route('recipients.index');
    }
}
