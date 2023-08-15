<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view("backend.pages.upload_tuto", compact("images"));
    }

    public function store(Request $request)
    {

        request()->validate([
            "name" => "required",
            "image" => "required|image|mimes:png,jpg,jpeg,gif|max:2048"
        ]);

        $request->file("image")->storePublicly('img/', 'public');

        $data = [
            "name" => $request->name,
            "image" => $request->file("image")->hashName(),
        ];

        Image::create($data);

        return redirect()->back();
    }

    public function destroy(Image $image)
    {
        Storage::disk("public")->delete('img/' . $image->image);
        $image->delete();
        return redirect()->back();
    }




    public function update(Request $request, Image $image)
    {
        request()->validate([
            "name" => "required",
            "image" => "image|mimes:png,jpg,jpeg,gif|max:2048",
        ]);

        if ($request->file('image') != null) {
            // delete image from storage
            Storage::disk("public")->delete('img/' . $image->image);

            // update image
            $request->file("image")->storePublicly('img/', 'public');
            $data = [
                "name" => $request->name,
                "image" => $request->file("image")->hashName(),
            ];

            $image->update($data);
        } else {
            $image->name = $request->name;
            $image->save();
        }
        return redirect()->back();
    }

    public function download(Image $image)
    {
        return    Storage::disk("public")->download('img/' . $image->image , $image->name);
    }
}
