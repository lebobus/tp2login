<?php

namespace App\Http\Controllers;

use App\Models\Etudiants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $etudiants = DB::table('etudiants')
            ->select('etudiants.id', 'etudiants.etudiant_nom', 'etudiants.etudiant_email', 'villes.ville_nom')
            ->join('villes', 'etudiants.ville_id', '=', 'villes.id')
            ->get();

        return view('index', ['etudiants' => $etudiants]);
    }

    public function show($id)
    {
        $results = DB::table('etudiants')
            ->where('id', $id)
            ->count();

        if ($results >= 1) {
            $etudiant = DB::table('etudiants')
                ->select('etudiants.id', 'etudiants.etudiant_nom', 'etudiants.etudiant_phone', 'etudiants.etudiant_email', 'etudiants.etudiant_dateNaissance', 'etudiants.etudiant_adresse', 'villes.ville_nom')
                ->join('villes', 'etudiants.ville_id', '=', 'villes.id')
                ->where('etudiants.id', $id)
                ->get();

            return view('show', ['etudiant' => $etudiant]);
        } else {
            abort(404);
        }
    }

    public function edit($id)
    {
        $results = DB::table('etudiants')
            ->where('id', $id)
            ->count();

        if ($results >= 1) {
            $etudiant = DB::table('etudiants')
                ->select('id', 'etudiant_nom')
                ->where('id', $id)
                ->get();

            return view('edit', ['etudiant' => $etudiant]);
        } else {
            abort(404);
        }
    }

    public function editPost(Request $request)
    {
        $id = $request->get('id');

        switch ($request->get('action')) {
            case "nom":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->update(['etudiant_nom' => $request->get('nom')]);

                return redirect("/show/$id");
            case "adresse":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->update(['etudiant_adresse' => $request->get('adresse')]);

                return redirect("/show/$id");
            case "phone":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->update(['etudiant_phone' => $request->get('phone')]);

                return redirect("/show/$id");
            case "email":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->update(['etudiant_email' => $request->get('email')]);

                return redirect("/show/$id");
            case "naissance":
                DB::table('etudiants')
                    ->where('id', $id)
                    ->update(['etudiant_dateNaissance' => $request->get('naissance')]);

                return redirect("/show/$id");
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

    public function create()
    {
        $villes = DB::table('villes')->get();

        return view('create', ['villes' => $villes]);
    }

    public function createPost(Request $request)
    {
        $id = DB::table('etudiants')->insertGetId([
            'etudiant_nom' => $request->get('nom'),
            'etudiant_adresse' => $request->get('adresse'),
            'etudiant_phone' => $request->get('phone'),
            'etudiant_email' => $request->get('email'),
            'etudiant_dateNaissance' => $request->get('naissance'),
            'ville_id' => $request->get('ville')
        ]);

        if ($id) return (redirect("/show/$id"));
    }
}
