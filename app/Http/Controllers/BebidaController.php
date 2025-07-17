<?php

namespace App\Http\Controllers;


use App\Models\Producto;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class BebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $bebidas = Producto::porCategoria('bebidas');

        return view('back.bebidas.index', [
            'bebidas' => $bebidas
        ]);
        //     return view('back/comidas');
        // }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $SubCategorias = SubCategoria::porCategoria('bebidas');

        // $subCategorias = SubCategoria::all();
        return view('back.bebidas.create', [
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


        return redirect('back/bebidas');
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
    public function edit(Producto $bebida)
    {

        $SubCategorias = SubCategoria::porCategoria('bebidas');

        return view('back.bebidas.edit', [
            'bebida' => $bebida,
            'SubCategorias' => $SubCategorias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, Producto $bebida)
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
        $bebida->update($request->only(['nombre', 'precio', 'descripcion', 'id_sub_categoria']));

        // Reemplazar imagen si subieron una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($bebida->imagen && Storage::disk('public')->exists($bebida->imagen)) {
                Storage::disk('public')->delete($bebida->imagen);
            }

            // Guardar la nueva imagen y asignar ruta al modelo
            $bebida->imagen = $request->file('imagen')->store('photos', 'public');
        }

        // Regenerar slug y verificar duplicados (excepto el mismo producto)
        $slug = Str::slug($request->nombre);
        $originalSlug = $slug;
        $contador = 1;

        while (Producto::where('slug', $slug)->where('id', '!=', $bebida->id)->exists()) {
            $slug = $originalSlug . '-' . $contador;
            $contador++;
        }

        $bebida->slug = $slug;

        // Guardar cambios
        $bebida->save();

        return redirect('back/bebidas');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $bebida)
    {



        // Verificar si tiene imagen y eliminarla del storage
        if ($bebida->imagen && Storage::disk('public')->exists($bebida->imagen)) {
            Storage::disk('public')->delete($bebida->imagen);
        }

        // Eliminar el bebida de la base de datos
        $bebida->delete();

        return redirect('back/bebidas');
    }
}
