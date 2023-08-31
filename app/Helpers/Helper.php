<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use App\Models\UserPanDetail;
use App\Models\UserTanDetail;
use App\Models\UserCompanyDetail;
use App\Models\UserPartnershipDetail;
use App\Models\Instamojo;
use Illuminate\Support\Facades\File;
use App\Models\Documents;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function uploadImages($request, $userId, $gst_type_val, $folderName, $for_multiple = null)
    {
        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $where = [];

        if ($for_multiple != null) {
            $where = ['gst_type_val' => $gst_type_val, 'for_multiple' => $for_multiple];
        } else {
            $where = ['gst_type_val' => $gst_type_val];
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
                    $newName = $imgName . '_' . ($index + 1) . '_' . mt_rand(2000, 9000) . $userId . '.' . $image->getClientOriginalExtension();
                    $path = $image->move($userFolder, $newName);
                    $related_imgs[] = $newName;
                }
                $data[$keyname] = implode(',', $related_imgs);
            }
        }
        return $data;
    }


    public static function uploadImagesNew($request, $userId, $folderName, $for_multiple)
    {
        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $where = [];

        // if($for_multiple!=null){
        $where = ['for_multiple' => $for_multiple];
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
                    //$maxSize = 2 * 1024 * 1024; // 2MB
                    // if ($image && $image->getSize() > $maxSize) {
                    //     // File size exceeds the limit
                    //     return back()->withErrors('The selected file exceeds the maximum allowed size (2MB).');
                    // }

                    $newName = ($index + 1) . '_' . mt_rand(2000, 9000) . $userId . '.' . $image->getClientOriginalExtension();
                    $path = $image->move($userFolder, $newName);
                    $related_imgs[] = $newName;
                }
                $data[$keyname] = implode(',', $related_imgs);
            }
        }
        return $data;
    }

    public static function uploadImagesNormal($request, $userId, $folderName, $name)
    {
        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $keyname = $name;
        $data[$keyname] = "";
        //   if ($request->hasFile($keyname)) {
        if ($request->file($keyname)) {
            $images = $request->file($keyname);
            $related_imgs = [];
            foreach ($images as $index => $image) {
                //     $maxSize = 2 * 1024 * 1024; 
                //     if ($image && $image->getSize() > $maxSize) {
                //     // File size exceeds the limit
                //     return back()->withErrors('The selected file exceeds the maximum allowed size (2MB).');
                // }
                $newName = ($index + 1) . '_' . mt_rand(2000, 9000) . $userId . '.' . $image->getClientOriginalExtension();
                $path = $image->move($userFolder, $newName);
                $related_imgs[] = $newName;
            }
            $data[$keyname] = implode(',', $related_imgs);
        }
        return $data;
    }


    public static function uploadSignatoryImages($request, $key, $userId, $folderName, $dataon, $for_multiple)
    {

        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $allimages = Documents::where(['for_multiple' => $for_multiple])->get();
        $data = [];
        foreach ($allimages as $img) {
            if ($request->file($dataon)) {
                $keyname = $img['doc_key_name'];
                $imgName = str_replace(' ', '', $img['filename']);
                $images = $request->file($dataon)[$key];
                $related_imgs = [];
                if (isset($images[$keyname])) {
                    foreach ($images[$keyname] as $index => $p) {
                        $newName = $imgName . '_' . ($index + 1) . '_' . ($key) . '_' . mt_rand(2000, 9000) . '.' . $p->getClientOriginalExtension();
                        $imagePath = $p->move($folderName, $newName);
                        $related_imgs[] = $newName;
                    }
                }
                $data[$keyname] = implode(',', $related_imgs);
            }
        }
        return $data;
    }



    public static function uploadAddMultipleImages($request, $key, $userId, $folderName, $dataon, $for_multiple)
    {

        $userFolder = $folderName;
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0777, true, true);
        }
        $allimages = Documents::where(['for_multiple' => $for_multiple])->get();
        $data = [];

        foreach ($allimages as $img) {
            if ($request->file($dataon)) {
                $keyname = $img['doc_key_name'];
                // $imgName = str_replace(' ', '', $img['filename']);
                $images = $request->file($dataon)[$key];
                $related_imgs = [];
                if (isset($images[$keyname])) {
                    foreach ($images[$keyname] as $index => $p) {
                        $newName = ($index + 1) . '_' . ($key) . '_' . mt_rand(2000, 9000) . '.' . $p->getClientOriginalExtension();
                        $imagePath = $p->move($folderName, $newName);
                        $related_imgs[] = $newName;
                    }
                }
                $data[$keyname] = implode(',', $related_imgs);
            }
        }
        return $data;
    }


    public static function getBaseUrl($request)
    {
        $url = $request->url();
        $parsedUrl = parse_url($url);
        $baseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];

        if (isset($parsedUrl['port'])) {
            $baseUrl .= ':' . $parsedUrl['port'];
        }
        $pathSegments = explode('/', trim($parsedUrl['path'], '/'));
        if ($parsedUrl['host'] == 'localhost') {
            $baseSegment = implode('/', array_slice($pathSegments, 0, 1));
        } else {
            $baseSegment = implode('/', array_slice($pathSegments, 0, 2));
        }

        return $baseURL = $baseUrl . '/' . $baseSegment;




    }

    public static function createInstaMojoOrder($data)
    {

        $api = new \Instamojo\Instamojo(
            env('INSTAMOJO_TEST_API_KEY'),
            env('INSTAMOJO_TEST_AUTH_TOKEN'),
            env('INSTAMOJO_TEST_URL'),
        );

        $response = $api->paymentRequestCreate([
            "purpose" => $data["payment_purpose"],
            "amount" => $data["payment_amount"],
            "buyer_name" => $data["name_of_pan"],
            "email" => $data["email_id"],
            "phone" => $data["mobile_number"],
            "redirect_url" => route($data['route']),
        ]);

 
        if(isset($response['id']) && !empty($response['id'])){
            if($data["type"] == 'TAN'){
                UserTanDetail::where('id', '=', $data["insert_id"])->update(array('payment_unique_id' => $response['id']));
            }
            else if($data["type"] == 'PAN'){
                UserPanDetail::where('id', '=', $data["insert_id"])->update(array('payment_unique_id' => $response['id']));
            }
            else if($data["type"] == 'Partnership'){
                UserPartnershipDetail::where('id', '=', $data["insert_id"])->update(array('payment_unique_id' => $response['id']));
            }
            else if($data["type"] == 'Company'){
                UserCompanyDetail::where('id', '=', $data["insert_id"])->update(array('payment_unique_id' => $response['id']));
            }
            
        }

        header('Location: ' . $response['longurl']);
        exit();
    }

    public static function storePaymentResponse($data){

        $data['staus'] = $data['payment_status'];
        $data['user_id'] = $data['userid'];
        $data['type'] = $data['type'];
        $data['payment_id'] = $data['payment_id'];
        $data['payment_request_id'] = $data['payment_request_id'];
        Instamojo::Create($data);
    }
}