<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Treatment;
use App\User;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    public function view()
    {
        $users = User::all();
        $treatments = Treatment::all();
        $calendars = Calendar::all();

        return response()->json([
            'users' => $users,
            'treatments' => $treatments,
            'calendars' => $calendars,
        ]);
    }

    public function saveUser($id)
    {
        $json = json_decode(request()->getContent());

        foreach ($json->users as $json_user) {
            $upUser = User::where('username', $id)
                ->first();
            if ($upUser == null) {
                $userSave = new User();

                $userSave->username = $json_user->username;
                $userSave->password = $json_user->password;

                $userSave->save();

                return response()->json([
                    'message' => 'Ajout&eacute a la base de donn&eacutee',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Identifiant déjà existant',
                ], 404);
            }
        }
    }

    public function saveTreatment($id)
    {
        $json = json_decode(request()->getContent());
        foreach ($json->treatments as $json_treatment) {
            $upTreatment = Treatment::where('date_treatment', $json_treatment->date_treatment)
                ->first();
            if ($upTreatment == null) {
                $createTreatment = new Treatment();

                $createTreatment->date_treatment = $json_treatment->date_treatment;
                $createTreatment->position = $json_treatment->position;
                $createTreatment->dosage = $json_treatment->dosage;
                $createTreatment->users_id = $id;

                $createTreatment->save();

                return response()->json([
                    'message' => 'Ajout&eacute a la base de donn&eacutee',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Aucun identifiant correspondant',
                ], 404);
            }
        }
    }

    public function saveCalendar($id)
    {
        $json = json_decode(request()->getContent());
        foreach ($json->calendars as $json_calendar) {
            $upCalendar = Calendar::where('date_calendar', $json_calendar->date_calendar)
                ->first();
            if ($upCalendar == null) {
                $createCalendar = new Calendar();

                $createCalendar->date_calendar = $json_calendar->date_calendar;
                $createCalendar->location = $json_calendar->location;
                $createCalendar->person = $json_calendar->person;
                $createCalendar->comment = $json_calendar->comment;
                $createCalendar->users_id = $id;

                $createCalendar->save();

                return response()->json([
                    'message' => 'Ajout&eacute a la base de donn&eacutee',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Rdv deja existant a cette heure-ci!',
                ], 404);
            }
        }
    }

    public function deleteUser($id)
    {
        $checkId = User::find($id);
        $json = json_decode(request()->getContent());
        if ($checkId && $id == $json->user->id) {
            $user = User::where('id', $id);
            $user->delete($id);
        }
    }

    public function deleteCalendar($id)
    {
        $checkCalendarId = Calendar::find($id);
        $json = json_decode(request()->getContent());
        if ($checkCalendarId && $id == $json->calendar->id) {
            $calendar = Calendar::where('id', $id);
            $calendar->delete($id);

            return response()->json([
                'message' => 'Effac&eacute de la base de donn&eacutee',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Impossible de supprimer!',
            ], 404);
        }
    }

    public function deleteTreatment($id)
    {
        $checkTreatmentId = Treatment::find($id);
        $json = json_decode(request()->getContent());
        if ($checkTreatmentId && $id == $json->treatment->id) {
            $treatment = Treatment::where('id', $id);
            $treatment->delete($id);

            return response()->json([
                'message' => 'Effac&eacute de la base de donn&eacutee',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Impossible de supprimer!',
            ], 404);
        }
    }
}
