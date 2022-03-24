<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Voiture;
use App\Models\Category;
use App\Models\UserVoiture;
use Illuminate\Http\Request;
use PDF;
class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =User::all();
        $voitures = Voiture::all();
        $categories = Category::all();
        $user_voitures = UserVoiture::all();
        return view('admin.index',compact('voitures', 'categories', 'user_voitures', 'users') );
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newImageName =  '-' . $request->marque . '.' .
        $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);
        $model = new Voiture;
        $model->marque = $request->input('marque');
        $model->description = $request->input('description');
        $model->image =  $newImageName;
        $model->categorie_id =  $request->input('categorie_id');
        $model->prix = $request->input('prix');
        $model->save();
        return redirect('admin')->with('message', 'la voiture a ete creer avec success!');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $voiture = Voiture::find($request->input('id'));
        $categories = Category::all();
        return view('admin.show', compact('voiture','categories' ));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $categories = Category::all();
        $voiture =  Voiture::find($request->input('id'));
        return view('admin.edit', [ 'voiture'=>$voiture, 'categories'=>$categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $newImageName =  '-' . $request->marque . '.' .
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        
        Voiture::where('id', $request->input('id'))->update([
            'marque' =>$request->input('marque'),
            'description' =>$request->input('description'),
            'image' =>  $newImageName,
            'categorie_id' =>  $request->input('categorie_id'),
            
        ]);
        
        return redirect('admin')->with('message', 'la voiture a ete modifier avec success!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $voiture = Voiture::find($request->input('id'))->delete();

        return redirect()->back();
    }

    public function pdf(){
        $user_voitures = UserVoiture::all();
        $voitures = Voiture::all();
        $users = User::all();
        $categories = Category::all();
        $pdf = PDF::loadView('pdf', compact('users','voitures','categories','user_voitures'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('voiture.pdf');
      }
}
