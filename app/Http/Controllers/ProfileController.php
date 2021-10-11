<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function index($id)
    {
        if ($id != session('etudiant_id')[0]->id) return abort(403);

        $results = DB::table('etudiants')
            ->where('id', $id)
            ->count();

        if ($results >= 1) {
            $etudiant = DB::table('etudiants')
                ->where('id', $id)
                ->get();

            return view('profile.index', ['etudiant' => $etudiant]);
        } else {
            abort(404);
        }
    }

    public function editProfile(Request $request)
    {
        $id = $request->get('id');

        switch ($request->get('action')) {
            case "nom":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->update(['etudiant_nom' => $request->get('nom')]);

                return redirect("/profile/$id");
            case "adresse":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->update(['etudiant_adresse' => $request->get('adresse')]);

                return redirect("/profile/$id");
            case "phone":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->update(['etudiant_phone' => $request->get('phone')]);

                return redirect("/profile/$id");
            case "email":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->update(['etudiant_email' => $request->get('email')]);

                return redirect("/profile/$id");
            case "naissance":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->update(['etudiant_dateNaissance' => $request->get('naissance')]);

                return redirect("/profile/$id");
            case "delete":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->delete();

                return redirect("/");
            default:
                abort(500);
                break;
        }
    }
}
