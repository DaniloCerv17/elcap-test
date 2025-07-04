<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Publicacion;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publicacion::all();

        return view('back.publicacion.index', [
            'publicaciones' => $publicaciones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.publicacion.create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar campos
        $request->validate([
            'titulo' => 'required|min:5|max:30',
            'contenido' => 'required|max:200',
            'imagen' => 'nullable|image|mimes:png,jpg|max:2048',
            'fecha' => 'required',
            'hora' => 'required',
        ], [
            'titulo.required' => 'Coloque un titulo',
            'titulo.min' => 'Coloque minimo 5 caracteres',
            'titulo.max' => 'Coloque menos de 30 carcateres',
            'contenido.required' => 'Coloque un Contenido',
            'contenido.max' => 'Coloque maximo 200 caracteres',
            'imagen.mimes' => 'Solo imagenes de tipo PNG y JPG',
            'imagen.max' => 'Solo imagenes no mayores a 2MB',
            'fecha.required' => 'Coloque una fecha',
            'hora.required' => 'coloque una hora',
        ]);

        $imagePath = null;
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('photos', 'public');
        }

        $publicacion = new Publicacion();
        $publicacion->titulo = $request->titulo;
        $publicacion->contenido = $request->contenido;
        $publicacion->imagen = $imagePath;
        $publicacion->fecha = $request->fecha;
        $publicacion->hora = $request->hora;
       

        $slug = $publicacion->slug = Str::slug($request->titulo);
        $originalSlug = $slug;
        $contador = 1;

        // Revisa si ya existe el slug
        while (Publicacion::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $contador;
            $contador++;
        }

        $publicacion->slug = $slug;

        $publicacion->save();


        return redirect('back/publicacion');
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
    public function edit(Publicacion $publicacion)
    {
        return view('back.publicacion.edit', [
            'publicacion' => $publicacion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicacion $publicacion)
    {
      
        //Validar campos
        $request->validate([
            'titulo' => 'required|min:5|max:30',
            'contenido' => 'required|max:200',
            'imagen' => 'nullable|image|mimes:png,jpg|max:2048',
            'fecha' => 'required',
            'hora' => 'required',
        ], [
            'titulo.required' => 'Coloque un titulo',
            'titulo.min' => 'Coloque minimo 5 caracteres',
            'titulo.max' => 'Coloque menos de 30 carcateres',
            'contenido.required' => 'Coloque un Contenido',
            'contenido.max' => 'Coloque maximo 200 caracteres',
            'imagen.mimes' => 'Solo imagenes de tipo PNG y JPG',
            'imagen.max' => 'Solo imagenes no mayores a 2MB',
            'fecha.required' => 'Coloque una fecha',
            'hora.required' => 'coloque una hora',
        ]);

        // Actualizar solo los campos básicos usando $fillable y only
        $publicacion->update($request->only(['titulo', 'contenido', 'fecha', 'hora']));

        // Reemplazar imagen si subieron una nueva
        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($publicacion->imagen && Storage::disk('public')->exists($publicacion->imagen)) {
                Storage::disk('public')->delete($publicacion->imagen);
            }

            // Guardar la nueva imagen y asignar ruta al modelo
            $publicacion->imagen = $request->file('imagen')->store('photos', 'public');
        }

        // Regenerar slug y verificar duplicados (excepto el mismo producto)
        $slug = Str::slug($request->titulo);
        $originalSlug = $slug;
        $contador = 1;

        while (Publicacion::where('slug', $slug)->where('id', '!=', $publicacion->id)->exists()) {
            $slug = $originalSlug . '-' . $contador;
            $contador++;
        }

        $publicacion->slug = $slug;

        // Guardar cambios
        $publicacion->save();

        return redirect('back/publicacion');
    }

    /**
     * Remove the specified resource from storage.
     */
      public function destroy(Publicacion $publicacion)
    {



        // Verificar si tiene imagen y eliminarla del storage
        if ($publicacion->imagen && Storage::disk('public')->exists($publicacion->imagen)) {
            Storage::disk('public')->delete($publicacion->imagen);
        }

        // Eliminar el comida de la base de datos
        $publicacion->delete();

        return redirect('back/publicacion');
    }
}
