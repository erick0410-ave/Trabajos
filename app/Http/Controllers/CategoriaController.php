<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function getCategorias()
    {
        return response()->json(Categoria::all(),200);
    }

    public function getCategoriaporid($id)
    {
        $categoria = Categoria::find($id);
        if(is_null($categoria))
        {
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }
            return response()->json($categoria::find($id),200);
    }

    public function insertCategoria(Request $request)
    {
        $categoria = Categoria::create($request->all());
        return response($categoria,200 );
    }

    public function updateCategoria(Request $request,$id)
    {
        $categoria = Categoria::find($id);
        if(is_null($categoria))
        {
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }
            $categoria->update($request->all());
            return response($categoria,200);
    }

    public function deleteCategoria($id)
    {
        $categoria = Categoria::find($id);
        if(is_null($categoria))
        {
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }
            $categoria->delete();
            return response()->json(['Mensaje'=>'Registro Eliminado'], 200);
    }

/********************************************************************************************/
    public function index()
    {
        //
        $categoria = Categoria::all();
        return view('categoria.list', compact('categoria','categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'txtNombreCategoria'=>'required',
        'txtDescripcion'=> 'required'
        ]);

        $categoria = new Categoria([
        'cat_nom' => $request->get('txtNombreCategoria'),
        'cat_obs'=> $request->get('txtDescripcion')
        ]);
        $categoria->save();
        return redirect('/categoria')->with('success', 'La categoria ha sido agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
        return view('categoria.view',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
        return view('categoria.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    $request->validate([
        'txtNombreCategoria'=>'required',
        'txtDescripcion'=> 'required'
        ]);

        $categoria = Categoria::find($id);
        $categoria->cat_nom = $request->get('txtNombreCategoria');
        $categoria->cat_obs = $request->get('txtDescripcion');

        $categoria->update();
        return redirect('/categoria')->with('success', 'La categoria ha sido actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    $categoria->delete();
    return redirect('/categoria')->with('success', 'La categoria ha sido eliminada correctamente');
    }
}
