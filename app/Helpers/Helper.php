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


     public static function uploadImagesNew($request, $userId, $folderName,$for_multiple) {
        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $where = [];
       
        // if($for_multiple!=null){
             $where = ['for_multiple'=>$for_multiple];  
        // } else {
        //     $where = ['gst_type_val'=>$gst_type_val];
        // }
        
        $allimages = Documents::where($where)->get();
        $data = [];
        foreach ($allimages as $img) {
            $keyname = $img['doc_key_name'];
            // $imgName = str_replace(' ', '', $img['filename']);
            if ($request->hasFile($keyname)) {
                $images = $request->file($keyname);
                $related_imgs = [];
                foreach ($images as $index => $image) {
                    $newName = ($index + 1) . '_' .mt_rand(2000,9000). $userId . '.' . $image->getClientOriginalExtension();
                    $path = $image->move($userFolder, $newName);
                    $related_imgs[] = $newName;
                }
                $data[$keyname] = implode(',', $related_imgs);
            }
        }
        return $data;
    }

    public static function uploadImagesNormal($request, $userId, $folderName,$name){
        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $keyname = $name ? $name :  'additional_img';
   
         if ($request->hasFile($keyname)) {
                $images = $request->file($keyname);
             
                $related_imgs = [];
                foreach ($images as $index => $image) {
                    $newName = ($index + 1) . '_' .mt_rand(2000,9000). $userId . '.' . $image->getClientOriginalExtension();
                    $path = $image->move($userFolder, $newName);
                    $related_imgs[] = $newName;
                }
                $data[$keyname] = implode(',', $related_imgs);
            }
         return  $data;
    } 


    public static function uploadSignatoryImages($request, $key, $userId, $folderName,$dataon,$for_multiple) {

        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $allimages = Documents::where(['for_multiple' => $for_multiple])->get();
          $data=[];
        foreach ($allimages as $img) {
            if ($request->file($dataon)) {
                $keyname = $img['doc_key_name'];
                $imgName = str_replace(' ', '', $img['filename']);
               $images = $request->file($dataon)[$key];
                $related_imgs = [];
                if (isset($images[$keyname])) {
                    foreach ($images[$keyname] as $index => $p) {
                        $newName = $imgName . '_' . ($index + 1) . '_' .($key).'_'. mt_rand(2000,9000) . '.' . $p->getClientOriginalExtension();
                        $imagePath = $p->move($folderName, $newName);
                        $related_imgs[] = $newName; 
                    }
                }
                
            }
          $data[$keyname] =  implode(',', $related_imgs);
        } 
        return $data;
    }



    public static function uploadAddMultipleImages($request, $key, $userId, $folderName,$dataon,$for_multiple) {

        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $allimages = Documents::where(['for_multiple' => $for_multiple])->get();
          $data=[];
        foreach ($allimages as $img) {
            if ($request->file($dataon)) {
                $keyname = $img['doc_key_name'];
                // $imgName = str_replace(' ', '', $img['filename']);
               $images = $request->file($dataon)[$key];
                $related_imgs = [];
                if (isset($images[$keyname])) {
                    foreach ($images[$keyname] as $index => $p) {
                        $newName =  ($index + 1) . '_' .($key).'_'. mt_rand(2000,9000) . '.' . $p->getClientOriginalExtension();
                        $imagePath = $p->move($folderName, $newName);
                        $related_imgs[] = $newName; 
                    }
                }
                
            }
          $data[$keyname] =  implode(',', $related_imgs);
        } 
        return $data;
    }



}