<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Documents;
class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

      public static function uploadImages($request, $userId, $gst_type_val, $folderName,$for_multiple=null) {
        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $where = [];
       
        if($for_multiple!=null){
             $where = ['gst_type_val'=>$gst_type_val, 'for_multiple'=>$for_multiple];  
        } else {
            $where = ['gst_type_val'=>$gst_type_val];
        }
        
        $allimages = Documents::where($where)->get();
        $data = [];
        foreach ($allimages as $img) {
            $keyname = $img['doc_key_name'];
            $imgName = str_replace(' ', '', $img['filename']);
            if ($request->hasFile($keyname)) {
                $images = $request->file($keyname);
                $related_imgs = [];
                foreach ($images as $index => $image) {
                    $newName = $imgName . '_' . ($index + 1) . '_' .mt_rand(2000,9000). $userId . '.' . $image->getClientOriginalExtension();
                    $path = $image->move($userFolder, $newName);
                    $related_imgs[] = $newName;
                }
                $data[$keyname] = implode(',', $related_imgs);
            }
        }
        return $data;
    }
}