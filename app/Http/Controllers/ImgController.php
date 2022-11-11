<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\img;
use Illuminate\Support\Facades\Storage;

class ImgController extends Controller
{
    /* public function destroyIMG($id)
    {
        dd($id);
        $img = img::where('id',$id)->first();
        $company = company::where('id',$img->company_id)->first();
        $company_path = str_replace(' ', '',$company->company_name_english);

        if (!empty($img->company_name)) {
            Storage::disk('public')->delete($img->path);
        }
        
        $img->forceDelete();
        return redirect()->back()->with('delete','Image Deleted successfully');
    }//end of destroyIMG */
    public function destroyIMG(Request $request)
    {
        /* dd($request->path); */
        $img = img::findOrFail($request->img_id);
        $img->delete();
        Storage::disk('public_gallery')->delete($request->path);
        return redirect()->back()->with('delete','Image Deleted successfully');
    }
}
