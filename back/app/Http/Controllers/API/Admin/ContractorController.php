<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContractorController extends Controller
{
    public function index(): Response
    {
        $contractors = Contractor::all();
        return response(['data' => $contractors]);
    }

    public function store(Request $request): Response
    {
        $data = $request->validate([
            'name' => '',
            'type' => ''
        ]);
        $contractor = Contractor::create([
            'name' => $data['name'],
            'type' => $data['type']
        ]);
        return response($contractor);
    }

    public function update(Request $request, Contractor $contractor):Response
    {
        $data = $request->validate([
            'name' => '',
            'type' => ''
        ]);
        $contractor->update($data);
        return response($contractor);
    }

    public function delete(Contractor $contractor):Response
    {
        $contractor->delete();
        return response(['message' => 'deleted']);
    }

    public function get(Contractor $contractor):Response
    {
        return response($contractor);
    }
}
