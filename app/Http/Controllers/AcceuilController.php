<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Specialite;
use Illuminate\Contracts\View\View;

use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    

     public function index(): View{
        return view('acceuil.index');
    }

    public function home()
{
    $filieres = Filiere::all();

    return view('acceuil.home', compact('filieres'));
}

  public function createFiliere(Request $request){
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:10|unique:filieres,code',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $filiere = Filiere::firstOrCreate([
        'name' => $validatedData['name']
    ]);

    $validatedData['filiere_id'] = $filiere->id;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('image'), $imageName);
        $validatedData['image'] = "image/".$imageName;
    } else {
        $validatedData['image'] = null;
    }

    Specialite::create($validatedData);

    return redirect()->route('dashboard')->with('success', "Article créé avec succès");
}

    public function dashboardSpecialite(): View
    {
        // $articles = Article::where('author_id', Auth::id())->get();
        $specialite = Specialite::all();
        return view('dashboard', ['specialite' => $specialite]);
    }

    public function dashboardArticleSingle($id): View
{
    $specialite = Specialite::findOrFail($id);
    $filiere = Filiere::all();
    return view('gestion.edit-specialite', compact('specialite', 'filiere'));
}
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
{
    $filieres = Filiere::all();
    return view('gestions.filieres.create-filiere', compact('filieres'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:filieres,code',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filiere = new Filiere();
        $filiere->name = $validatedData['name'];
        $filiere->code = $validatedData['code'];
        $filiere->description = $validatedData['description'] ?? null;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $filiere->image = 'images/' . $imageName;
        }

        $filiere->save();

        return redirect()->route('filieres.index')->with('success', 'Filière créée avec succès.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $specialite = Specialite::findOrFail($id);
    $specialite->delete();
    return redirect()->route('dashboard')->with('delete', 'Specialite supprimé avec succès');
}

}
