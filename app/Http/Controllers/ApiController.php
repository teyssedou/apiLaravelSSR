<?php

namespace App\Http\Controllers;

use App\Treatment;
use App\User;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    public function list()
    {
        $users = User::all();

        return view('users', [
            'users' => $users,
        ]);
    }

    public function view()
    {
        $users = User::all();
        $treatments = Treatment::all();

        return response()->json([
            'users' => $users,
            'treatments' => $treatments,
        ]);
    }

    public function save()
    {
        $json = json_decode(request()->getContent());

        $userSave = new User();

        $userSave->username = $json->username;
        $userSave->password = $json->password;

        $userSave->save();

        // $treatment = new Treatment();

        // $treatment->date_treatment = $json->date_treatment;
        // $treatment->position = $json->position;
        // $treatment->dosage = $json->dosage;
        // $treatment->users_id = $json->users_id;

        // $treatment->save();

        return response()->json([
            'message' => 'Ajout&eacute a la base de donn&eacutee',
        ], 200);
    }

    public function delete($id)
    {
        $checkId = User::find($id);
        $json = json_decode(request()->getContent());
        if ($checkId && $id == $json->user->id) {
            $user = User::where('id', $id);
            $user->delete($id);
        }
    }
}
