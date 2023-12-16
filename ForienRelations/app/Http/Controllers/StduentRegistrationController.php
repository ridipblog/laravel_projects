<?php

namespace App\Http\Controllers;

use App\Models\StduentEducationModel;
use App\Models\StudentBankModel;
use App\Models\StudentModel;
use App\Models\StudentTopicModel;
use Exception;
use Illuminate\Http\Request;

class StduentRegistrationController extends Controller
{
    public function addStudent(Request $request)
    {
        $message = [];
        $student_data = [
            'name' => $request->name,
        ];
        $student_bank_data = [
            'student_id' => null,
            'account_number' => $request->account_number,
        ];
        $student_education_data = [
            'student_id' => null,
            'board_name' => $request->board_name
        ];
        $student_topic_data = [
            'student_id' => null,
            'topic' => $request->topic
        ];
        $models = [
            serialize($student_data) => new StudentModel(),
            serialize($student_bank_data) => new StudentBankModel()
            // 'StudentBankModel',
            // 'StduentEducationModel',
            // 'StudentTopicModel'
        ];
        $check = false;
        $error_model = '';
        $save_stduent = '';
        $count_model = 0;

        foreach ($models as $model_key => $model_value) {
            try {
                if ($count_model != 0) {
                    $model_key = unserialize($model_key);
                    $model_key['student_id'] = $save_stduent['id'];
                    $model_key = serialize($model_key);
                }
                $stduents_data = $model_value::create(
                    unserialize($model_key)
                );
                $check = true;
                if ($count_model == 0) {
                    $save_stduent =  $stduents_data;
                } else {
                    // $model_key['student_id'] = $save_stduent['id'];
                    // $model_key = unserialize($model_key);
                    // $model_key['student_id'] = 1;
                }
                $count_model++;
            } catch (Exception $err) {
                $check = false;
                break;
            }
        }
        if ($check) {
            array_push($message, ['Done', $save_stduent]);
        } else {
            array_push($message, ['Error In ']);
        }
        return response()->json(['message' => $message]);
    }
    public function deleteStudent($id)
    {
        try {
            $student_delete = StudentModel::find($id);
            if ($student_delete) {
                $student_delete->delete();
                return true;
            }
            return false;
        } catch (Exception $err) {
            return false;
        }
    }
}
