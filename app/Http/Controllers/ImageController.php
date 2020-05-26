<?php
 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
 
use App\Http\Requests;
use Illuminate\Http\Request;
 
use App\Image;
use App\Car;
 
class ImageController extends Controller
{
 
    public function index()
    {
        return view('admin');
    }
 
 
    public function store(Request $request)
    {
        $img = $request->file('file') ?? null;
        $car_id = $request->get('car_id');
        if ($img != null) {

            $path = Storage::disk('public')->put("/car_images/" . $car_id, $img);
            $image = new Image;
            $image->car_id = $car_id;
            $image->image = Storage::disk('public')->url($path);
            $image->save();
            return response()->json(['success'=>true]);

        }
            
        return response()->json(['success'=>false]);

 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect("/admin/$image->car_id/edit")->with('success', 'Slika obrisana');
    }
}
