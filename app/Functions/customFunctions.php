<?php
/**
 * Created by Pigeon Soft.
 * User: Ariful Islam
 * Date: 06-Sep-18
 * Time: 9:34 AM
 */

if (!function_exists('image_upload')) {
    function image_upload($file)
    {
        $fileType=$file->getClientOriginalExtension();
        $fileName=rand(1,1000).date('dmyhis').".".$fileType;
        $file->move('uploads',$fileName);
        return $fileName;
    }

}

if (!function_exists('get_serial')) {
    function get_serial($date)
    {
        $last=\App\PatientSerial::where('date', '=', $date)->orderBy('id', 'desc')->pluck('serial')->first();
        $lastSerial=(int)$last;
        if($lastSerial<0)
            $serial=1;
        else
            $serial=$lastSerial+1;
        return $serial;
    }

}

if (!function_exists('get_doctor')) {
    function get_doctor($id)
    {
        $doctor=\App\Doctor::where('id', $id)->value('name');
        return $doctor;
    }

}







if (!function_exists('send_sms')) {
    function send_sms($phone, $msg)
    {
        $auth = 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM4Mzk1MTNiOGFlZTRiMzRhM2VlMDAwMTdmM2EzOWM4YzY2ZTEwMzM2ODdmN2RkNTM4ZjExNTc0NGZkMjcwZmI3NjdiMmFlNmY3ZDMxZGNhIn0.eyJhdWQiOiIxIiwianRpIjoiMzgzOTUxM2I4YWVlNGIzNGEzZWUwMDAxN2YzYTM5YzhjNjZlMTAzMzY4N2Y3ZGQ1MzhmMTE1NzQ0ZmQyNzBmYjc2N2IyYWU2ZjdkMzFkY2EiLCJpYXQiOjE1MzczMTE1MjIsIm5iZiI6MTUzNzMxMTUyMiwiZXhwIjoxNTY4ODQ3NTIyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.LZSiRwrw90mrswBdUg00PAmvId34Za1LYhdxis5KUQgrgRNZVP8UMX7de2TZ4I0eJtNrLQ5lClVJhJlfGksSNzYY4J20ZJA9-wAfQns35Xa4tpIrgwEW2fn_WN2tq1fd_kTz8tRgH_uEPZJXtGMxPkZ5bWYzZ52-Ai3K-sd3FBLqHIyRnt0wSfCOxzV86F5E54RJvB_L8sPh6YU_D0JtNuYlQb_19-TmFhOqEhLHiBLaDnOqgX5I4fgD0R0lO2RWkm4NC9E1HWK3EneFUsZ7BWIR6cQALK2r_oqbPHOaJc1a0QBJU76O6q5wQg0MDdjhYRo5IGVqMZp5UKU4d-kpb7XYVHGYrkCy9r5yG7Q_ciospaHbXBPr2Q1e7iQf8j9CUZDnIrMUnhJs-fSzEftLpw4fEleoed0d0AcUzSkyrLvsndAEyMpO1p0mdj_F66hg0mBdpdIHDTpQs6BSgzWc2dWD1YXK9CpelH9iLf7H48qOl_zy5VTKD6RSUQ6ki8T57HfmZYLhTz7dmYK_ofXS4_3NYh5IlEBUYbeJHHMc2GflXthlg1gneJ-7t1bedFZnQcdfhFht-hb6wCq45f-SmWCZ1gZ5-2a3ju7PkdlbpxQTQfqqflOyYE3j0_0CK8hdBc2MJxiRrGQs0UsqqlWH6rrkD_pw69mYOs7CVTSziO4';

        $response = \Ixudra\Curl\Facades\Curl::to('https://sms.shefasmarthospital.com/public/api/newsms')
            ->withHeader($auth)
//            ->withHeader('Accept: application/json')
            ->withData(array('mobile' => $phone, 'message' => $msg, 'from' => '1', 'status' => '0'))
            ->asJson(true)
            ->post();
    }

}


