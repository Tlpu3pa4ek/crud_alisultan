<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ClientController extends Controller
{
    public function getInfo(Request $request){


    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        // Возврат ответа

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->first_name_doc = $request->first_name_doc;
        $client->last_name_doc = $request->last_name_doc;

        $clientByCreated = $client->save();
        if ($clientByCreated){
            return 'client was created';
        } else {
            return "client wasn't created";
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }
    public function restore(Request $request)
    {
        $id = $request -> client_id;
        $record = Client::withTrashed()->find($id);
        $record->restore();
        return 'client was restored';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->first_name_doc = $request->first_name_doc;
        $client->last_name_doc = $request->last_name_doc;
        $client->update();
        return 'data was updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $client = Client::find($id);
        if ($client->delete()) {
            return 'successfully deleted';
        } else {
            return 'not deleted';
        }
    }


}
