<?php

namespace App\Http\Controllers;

use App\Models\StduentBankModel;
use App\Models\StduentEducationModel;
use App\Models\StduentTopicModel;
use App\Models\StudentModel;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addStudent(Request $request)
    {
        $message = [];
        $stduent_data = [
            "name" => $request->name
        ];
        $student_bank_data = [
            'student_id' => null,
            'account_number' => $request->account_number
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
            serialize($stduent_data) => new StudentModel(),
            serialize($student_bank_data) => new StduentBankModel(),
            serialize($student_education_data) => new StduentEducationModel(),
            serialize($student_topic_data) => new StduentTopicModel()
        ];
        $count_model = 0;
        $check = false;
        $save_student = null;
        foreach ($models as $model_key => $model_value) {
            $model_key = unserialize($model_key);
            try {
                if ($count_model != 0) {
                    $model_key['student_id'] = $save_student['id'];
                }
                $save_data = $model_value::create(
                    $model_key
                );
                if ($count_model == 0) {
                    $save_student = $save_data;
                }
                $count_model++;
                $check = true;
            } catch (Exception $err) {
                $check = false;
                if ($count_model != 0) {
                    $this->deleteStudent($save_student['id']);
                }
                break;
            }
        }
        if ($check) {
            array_push($message, ['Done']);
        } else {
            array_push($message, ['Error']);
        }
        return response()->json(['message' => $message]);
    }
    public function deleteStudent($id)
    {
        try {
            $deleteID = StudentModel::find($id);
            if ($deleteID) {
                $deleteID->delete();
            }
            return false;
        } catch (Exception $err) {
            return false;
        }
    }
}
