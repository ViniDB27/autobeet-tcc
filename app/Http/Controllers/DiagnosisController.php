<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class DiagnosisController extends Controller
{
    public function index()
    {

        return view('history');
    }

    public function store(Request $request)
    {
        $diagnosis = new Diagnosis();

        $file = $request->file('file');
        $fileName = Uuid::uuid4() . "." . $file->getClientOriginalExtension();

        $diagnosis->file = $file->storeAs('diagnostics', $fileName);

        $diagnosis->save();

        dump($diagnosis);
    }




    public function create()
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
