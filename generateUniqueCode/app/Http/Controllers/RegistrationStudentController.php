<?php

namespace App\Http\Controllers;

use App\Models\StudentBankModel;
use App\Models\StudentEducationModel;
use App\Models\StudentModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RegistrationStudentController extends Controller
{
    public function addStudent(Request $request)
    {
        $message = [];
        $emp_code = "coder";
        $files = [
            "file_1" => $request->file('file_1'),
            "file_2" => $request->file('file_2'),
            "file_3" => $request->file('file_3')
        ];
        try {
            $saveStudent = StudentModel::create([
                'student_code' => $emp_code . (DB::select('select id from student') == null ? 0 : DB::select('select id from student order by id desc limit 1')[0]->id),
                'student_name' => "name",
                'email' => "email1",
                'file_1' => "default",
                'file_2' => "default",
                'file_3' => 'default'
            ]);
            $check = true;
        } catch (Exception $err) {
            $check = false;
        }
        if ($check) {
            $check = $this->mainFileUpload($files);
            if ($check[0]) {
                if ($this->uploadFileDatabase($check[1], $saveStudent->id)) {
                    $check_second_step = true;
                    try {
                        $saveBank = StudentBankModel::create([
                            'student_id' => $saveStudent->id,
                            'bank_name' => "bank Name",
                            'account_number' => "sssd"
                        ]);
                        $check_second_step = true;
                    } catch (Exception $err) {
                        $check_second_step = false;
                    }
                    if ($check_second_step) {
                        $check_thrid_step = true;
                        try {
                            $saveEducation = StudentEducationModel::create([
                                'student_id' => $saveStudent->id,
                                'board_name' => 'board Name',
                                'pass_year' => "2023"
                            ]);
                            $check_thrid_step = true;
                        } catch (Exception $err) {
                            $check_thrid_step = false;
                        }
                        if ($check_thrid_step) {
                            array_push($message, 'Done ');
                        } else {
                            if ($this->revertStudentData('bank_details', 'student_id', $saveStudent->id)) {
                                if ($this->revertStudentData('student', 'id', $saveStudent->id)) {
                                    $this->revertStudentFile($check[1]);
                                    array_push($message, 'Error Throw While Add Education Data');
                                } else {
                                    array_push($message, 'Server  Error Plaese Ask Developers !');
                                }
                            } else {
                                array_push($message, 'Server  Error Plaese Ask Developers !');
                            }
                        }
                    } else {
                        if ($this->revertStudentData('student', 'id', $saveStudent->id)) {
                            array_push($message, 'Error Throw While Add Bank Data');
                            $this->revertStudentFile($check[1]);
                        } else {
                            array_push($message, 'Server  Error Plaese Ask Developers !');
                        }
                    }
                } else {
                    if ($this->revertStudentData('student', 'id', $saveStudent->id)) {
                        array_push($message, 'Error Throw While Upload File In Database ');
                        $this->revertStudentFile($check[1]);
                    } else {
                        array_push($message, 'Server  Error Plaese Ask Developers !');
                    }
                }
            } else {
                if ($this->revertStudentData('student', 'id', $saveStudent->id)) {
                    array_push($message, 'Error Throw While Upload Files');
                } else {
                    array_push($message, 'Server  Error Plaese Ask Developers !');
                }
            }
        } else {
            array_push($message, 'Personal Database Error !');
        }
        return response()->json(['message' => [$message]]);
    }
    public function revertStudentFile($files)
    {
        foreach ($files as $file_key => $file_value) {
            $this->deleteFile($file_value);
        }
    }
    public function revertStudentData($table, $column_name, $id)
    {
        try {
            DB::table($table)
                ->where($column_name, $id)
                ->delete();
            return true;
        } catch (Exception $err) {
            return false;
        }
    }
    public function uploadFileDatabase($files, $id)
    {
        try {
            DB::table('student')
                ->where('id', $id)
                ->update([
                    'file_1' => $files['file_1'],
                    'file_2' => $files['file_2'],
                    'file_3' => $files['file_3']
                ]);
            return true;
        } catch (Exception $err) {
            return false;
        }
    }
    public function mainFileUpload($files)
    {
        $check = true;
        $count = 0;
        $url = "";
        foreach ($files as $file_key => $file_value) {
            $count++;
            if ($count != 5) {
                $url = $this->fileUpload($file_value);
            } else {
                $url = NULL;
            }

            if ($url == NULL) {
                foreach ($files as $del_key => $del_value) {
                    $this->deleteFile($del_value);
                }
                $check = false;
                break;
            } else {
                $files[$file_key] = $url;
            }
        }
        return [$check, $files];
    }
    public function fileUpload($file)
    {
        try {
            $url = $file->store('public/image/');
            return $url;
        } catch (Exception $err) {
            return NULL;
        }
    }
    public function deleteFile($url)
    {
        try {
            if (Storage::exists($url)) {
                Storage::delete($url);
            }
        } catch (Exception $err) {
        }
    }
}
