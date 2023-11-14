<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

        $url = 'http://172.18.0.1:8082';
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        $response = $client->post($url, [
            'body' => json_encode(['file' =>  $diagnosis->file])
        ]);

        $body = json_decode($response->getBody()->getContents());

        if($body->error) {
            return view('history', [ 'error' => $body->error] );
        }


        //$diagnosis->save();

        dump($body);
    }

}
