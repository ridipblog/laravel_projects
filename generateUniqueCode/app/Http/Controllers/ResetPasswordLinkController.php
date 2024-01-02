<?php

namespace App\Http\Controllers;

use App\Models\StudentsModel;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class ResetPasswordLinkController extends Controller
{
    public function addData()
    {
        DB::beginTransaction();
        for ($i = 1; $i < 5; $i++) {

            try {
                $save_student = StudentsModel::create([
                    'email' => 'coder' . $i . '@gmail.com',
                    'password' => Hash::make('password')
                ]);
                DB::commit();
            } catch (Exception $err) {
                DB::rollBack();
                break;
            }
        }
        dd("Ok");
    }
    // Apply Reset Link
    public function applyLink(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $email = $request->email;
        $check = false;
        $message = "";
        $check_email = 0;
        try {
            $check_email = DB::table('students')
                ->where('email', $email)
                ->count();
            $check = true;
        } catch (Exception $err) {
            $check = false;
        }
        if ($check) {
            if ($check_email == 1) {
                $secure_number = rand(10000, 99999);
                try {
                    $check_email = DB::table('students_password_change_verify')
                        ->where('email', $email)
                        ->count();
                    $check = true;
                } catch (Exception $err) {
                    $check = false;
                }
                if ($check) {
                    DB::beginTransaction();
                    try {
                        if ($check_email == 1) {
                            DB::table('students_password_change_verify')
                                ->where('email', $email)
                                ->update([
                                    'secure_number' => $secure_number,
                                    'hash_url' => Hash::make($email . (string)$secure_number),
                                    'expire_time' => date('Y-m-d H:i:s'),
                                    'active' => 1
                                ]);
                        } else {
                            DB::table('students_password_change_verify')
                                ->insert([
                                    'email' => $email,
                                    'secure_number' => $secure_number,
                                    'hash_url' => Hash::make($email . (string)$secure_number),
                                    'expire_time' => date('Y-m-d H:i:s')
                                ]);
                        }
                        DB::commit();
                        $check = true;
                    } catch (Exception $err) {
                        DB::rollBack();
                        $check = false;
                    }
                    if ($check) {
                        $message = "Reset Link Sent To Your Email";
                    } else {
                        $message = "Server Error";
                    }
                } else {
                    $message = "Server Error";
                }
            } else {
                $message = "Email Not Registered";
            }
        } else {
            $message = "Server Error";
        }
        return response()->json(['message' => $message]);
    }
    // Verify User Submit Link
    public function verifyLink(Request $request)
    {
        // $hash_url = "coder1@gmail.com" . "51348";
        // $url = '$2y$10$4TL3wNxAP10TiAnLhiT4MunQ8ed795Vl4ZEew1aUe0MGd0uHjB5nG';
        // $message = Hash::check($hash_url, $url);
        date_default_timezone_set('Asia/Kolkata');
        $url = $request->url;
        $password = $request->password;
        $url_details = "";
        $check = false;
        try {
            $url_details = DB::table('students_password_change_verify')
                ->where('hash_url', $url)
                ->get();
            $check = true;
        } catch (Exception $err) {
            $check = false;
        }
        if ($check) {
            if (count($url_details) == 1) {
                $new_expire_time = new DateTime($url_details[0]->expire_time);
                $recive_time = date('Y-m-d H:i:s');
                $time_diff = $new_expire_time->diff(new DateTime($recive_time));
                if ($time_diff->y == 0 & $time_diff->m == 0 && $time_diff->d == 0 && $time_diff->h == 0 && $time_diff->i <= 20) {
                    if ($url_details[0]->active == 1) {
                        if (Hash::check($url_details[0]->email . $url_details[0]->secure_number, $url)) {
                            DB::beginTransaction();
                            try {
                                DB::table('students_password_change_verify')
                                    ->where('hash_url', $url)
                                    ->update([
                                        'active' => 2
                                    ]);
                                DB::table('students')
                                    ->where('email', $url_details[0]->email)
                                    ->update([
                                        'password' => Hash::make($password)
                                    ]);
                                DB::commit();
                            } catch (Exception $err) {
                                DB::rollBack();
                                $check = false;
                            }
                            if ($check) {
                                $message = "Password Changed ";
                            } else {
                                $message = "Server Error";
                            }
                        } else {
                            $message = "URL NoT Identify ";
                        }
                    } else {
                        $message = "Url Already Used ";
                    }
                } else {
                    $message = "OTP Is Expired ";
                }
            } else {
                $message = "Url Not Identify";
            }
        } else {
            $message = "Sever Error";
        }
        return response()->json(['message' => $message]);
    }
    public function login(Request $request)
    {
        $message = "";
        $email = $request->email;
        $password = $request->password;
        $student_details = DB::table('students')
            ->where('email', $email)
            ->get();
        if (Hash::check($password, $student_details[0]->password)) {
            $message = "Ok";
        } else {
            $message = "Not Ok";
        }
        return response()->json(['message' => $message]);
    }
}
