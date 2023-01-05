<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\suppliyer;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class SuppliyerController extends Controller
{
    public function index(Request $request)
    {

        $suppliyer =  suppliyer::where('sup_name', "LIKE", '%' . $request->search . '%')
            ->orwhere('sup_name_2', "LIKE", '%' . $request->search . '%')
            ->orwhere('inactived', "LIKE", '%' . $request->search . '%')
            ->orwhere('address', "LIKE", '%' . $request->search . '%')
            ->orwhere('phone_no', "LIKE", '%' . $request->search . '%')
            ->orwhere('contact_name', "LIKE", '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(15);
        return $suppliyer;
    }
    public function getdatasub()
    {
        $suppliyer = suppliyer::get();
        return $suppliyer;
    }
    public function store(Request $request)
    {
        $photo = $this->uploadPhoto($request);
        $sup = suppliyer::create([
            // 'id' => $request->id,
            'sup_code' => $request->sup_code,
            'sup_name' => $request->sup_name,
            'sup_name_2' => $request->sup_name_2,
            'image_url' => $photo,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'phone_no_2' => $request->phone_no_2,
            'fax_no' => $request->fax_no,
            'email' => $request->email,
            'contact_name' => $request->contact_name,
            'contact_phone' => $request->contact_phone,
            'thumbnail' => $photo,
            'status' => $request->status,
            'inactived' => $request->inactived,
            'is_deleted' => '0',
            'created_by' => 'cute boy',
            'updete_by' => 'cute boy',
            'delete_by' => 'cute boy',
        ]);
        if ($sup) {
            return response()->json(['msg' => 'success']);
        } else {
            return response()->json(['msg' => 'unsuccess']);
        }
    }
    public function update($id, Request $request)
    {
        $sup = suppliyer::findOrFail($id);
        $dir = $this->directory();
        if ($request->image_url != $sup['image_url']) {
            File::delete($dir . $sup['image_url']);
            $photo = $this->uploadPhoto($request);
        } else {
            $photo = $request->image_url;
        }



        // if ($request->image_url != $sup->image_url) {
        //     File::delete($dir . $sup->image_url);
        //     $photo = $this->uploadPhoto($request);
        //     $request->merge(['image_url' => $photo]);
        //     if (file_exists($photo)) {
        //         @unlink($photo);
        //     }
        // } else {
        //     $photo = $request->image_url;
        // }
        // $sup->update($request->all());
        // return $sup;
        // $sup->id = $request->id;
        // $sup->sup_code = $request->sup_code;
        // $sup->sup_name = $request->sup_name;
        // $sup->sup_name_2 = $request->sup_name_2;
        // $sup->image_url = $photo;
        // $sup->address = $request->address;
        // $sup->phone_no = $request->phone_no;
        // $sup->phone_no_2 = $request->phone_no_2;
        // $sup->fax_no = $request->fax_no;
        // $sup->email = $request->email;
        // $sup->contact_name = $request->contact_name;
        // $sup->contact_phone = $request->contact_phone;
        // $sup->thumbnail = $photo;
        // $sup->status = $request->status;
        // $sup->inactived = $request->inactived;
        // $sup->is_deleted = 'chhin pov';
        // $sup->updete_by = 'chhin pov';
        // $sup->delete_by = 'chhin pov';
        // $sup->save();

        // if ($sup) {
        //     return ['statue :' => "success full"];
        // } else {
        //     return ['statue :' => "Note Date"];
        // }

        $sup->update([
            'id' => $request->id,
            'sup_code' => $request->sup_code,
            'sup_name' => $request->sup_name,
            'sup_name_2' => $request->sup_name_2,
            'image_url' => $photo,
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'phone_no_2' => $request->phone_no_2,
            'fax_no' => $request->fax_no,
            'email' => $request->email,
            'contact_name' => $request->contact_name,
            'contact_phone' => $request->contact_phone,
            'thumbnail' => $photo,
            'status' => $request->status,
            'inactived' => $request->inactived,
            'is_deleted' => '0',
            'created_by' => 'cute boy',
            'updete_by' => 'cute boy',
            'delete_by' => 'cute boy',
        ]);
        return response()->json(["$sup"]);
    }

    public function destroy($id)
    {
        // $dir = 'img' . DIRECTORY_SEPARATOR . 'suppliyer' . DIRECTORY_SEPARATOR;
        $sup = suppliyer::find($id);
        // File::delete($dir . $sup['photo']);
        $sup->delete();
        return response()->json(['msg' => 'delete success']);
    }

    public function makeDirectory($directory)
    {
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
    }
    public function directory()
    {
        return $dir = 'img' . DIRECTORY_SEPARATOR . 'suppliyer' . DIRECTORY_SEPARATOR;
    }
    public function uploadPhoto(Request $request)
    {
        $dir = $this->directory();
        $file = $request->image_url;
        $this->makeDirectory($dir);
        $photo = time() . '.' . explode(';', explode('/',  $file)[1])[0];
        Image::make($file)->save(public_path($dir) . $photo);
        return $photo;
    }
}
