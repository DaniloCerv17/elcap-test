<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


use function Laravel\Prompts\select;

class ComidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::porCategoria('comidas');

        //$productos = Producto::with('subcategoria')->get();

        return view('back.comidas.index', [
            'productos' => $productos
        ]);
        //     return view('back/comidas');
        // }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $SubCategorias = SubCategoria::porCategoria('comidas');

        // $subCategorias = SubCategoria::all();
        return view('back.comidas.create', [
            'SubCategorias' => $SubCategorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar campos
        $request->validate([
            'nombre' => 'required|min:5|max:30',
            'precio' => 'required|numeric|max:99999',
            'descripcion' => 'required|max:200',
            'id_sub_categoria' => 'required',
            'imagen' => 'nullable|image|mimes:png,jpg|max:2048',
        ], [
            'nombre.required' => 'Coloque un Nombre',
            'nombre.min' => 'Coloque minimo 5 caracteres',
            'nombre.max' => 'Coloque menos de 30 carcateres',
            'precio.required' => 'coloque un precio',
            'precio.numeric' => 'Coloque un numero no letra',
            'precio.max' => 'Coloque un precio no mayor a 99999',
            'descripcion.required' => 'Coloque un Descripcion',
            'descripcion.max' => 'Coloque maximo 200 caracteres',
            'imagen.mimes' => 'Solo imagenes de tipo PNG y JPG',
            'id_sub_categoria' => 'Ingrese un SubCategoria',
            'imagen.max' => 'Solo imagenes no mayores a 2MB',
        ]);

        $imagePath = null;
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('photos', 'public');
        }

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->id_sub_categoria = $request->id_sub_categoria;
        $producto->imagen = $imagePath;

        $slug = $producto->slug = Str::slug($request->nombre);
        $originalSlug = $slug;
        $contador = 1;

        // Revisa si ya existe el slug
        while (Producto::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $contador;
            $contador++;
        }

        $producto->slug = $slug;

        $producto->save();


        return redirect('back/comidas');
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
    public function edit(Producto $comida)
    {

        $SubCategorias = SubCategoria::porCategoria('comidas');
        return view('back.comidas.edit', [
            'comida' => $comida,
            'SubCategorias' => $SubCategorias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */


public function update(Request $request, Producto $comida) 
{
    // Validación
    $request->validate([
        'nombre' => 'required|min:5|max:30',
        'precio' => 'required|numeric|max:99999',
        'descripcion' => 'required|max:200',
        'id_sub_categoria' => 'required',
        'imagen' => 'nullable|image|mimes:png,jpg|max:2048',
    ], [
        'nombre.required' => 'Coloque un Nombre',
        'nombre.min' => 'Coloque mínimo 5 caracteres',
        'nombre.max' => 'Coloque menos de 30 caracteres',
        'precio.required' => 'Coloque un precio',
        'precio.numeric' => 'Coloque un número, no letra',
        'precio.max' => 'Coloque un precio no mayor a 99999',
        'descripcion.required' => 'Coloque una descripción',
        'descripcion.max' => 'Coloque máximo 200 caracteres',
        'id_sub_categoria.required' => 'Seleccione una categoría',
        'imagen.mimes' => 'Debe ser PNG o JPG',
        'imagen.image' => 'Debe ser una imagen',
    ]);

    // Actualizar solo los campos básicos usando $fillable y only
    $comida->update($request->only(['nombre', 'precio', 'descripcion', 'id_sub_categoria']));

    // Reemplazar imagen si subieron una nueva
    if ($request->hasFile('imagen')) {
        // Eliminar imagen anterior si existe
        if ($comida->imagen && Storage::disk('public')->exists($comida->imagen)) {
            Storage::disk('public')->delete($comida->imagen);
        }

        // Guardar la nueva imagen y asignar ruta al modelo
        $comida->imagen = $request->file('imagen')->store('photos', 'public');
    }

    // Regenerar slug y verificar duplicados (excepto el mismo producto)
    $slug = Str::slug($request->nombre);
    $originalSlug = $slug;
    $contador = 1;

    while (Producto::where('slug', $slug)->where('id', '!=', $comida->id)->exists()) {
        $slug = $originalSlug . '-' . $contador;
        $contador++;
    }

    $comida->slug = $slug;

    // Guardar cambios
    $comida->save();

    return redirect('back/comidas');
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $comida)
    {



        // Verificar si tiene imagen y eliminarla del storage
        if ($comida->imagen && Storage::disk('public')->exists($comida->imagen)) {
            Storage::disk('public')->delete($comida->imagen);
        }

        // Eliminar el comida de la base de datos
        $comida->delete();

        return redirect('back/comidas');
    }
}
