<?php

namespace App\Http\Controllers;

use App\Models\StduentBankModel;
use App\Models\StduentEducationModel;
use App\Models\StduentTopicModel;
use App\Models\StudentModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function addStudent(Request $request)
    {
        $message = [];
        $stduent_data = [
            [
                "name" => $request->name
            ]
        ];
        $student_bank_data = [
            [
                'student_id' => null,
                'account_number' => $request->account_number
            ]
        ];
        $student_education_data = [
            [
                'student_id' => null,
                'board_name' => $request->board_name
            ]
        ];
        $student_topic_data = [
            [
                'student_id' => null,
                'topic' => $request->topic_1
            ],
            [
                'student_id' => null,
                'topic' => $request->topic_2
            ],
            [
                'student_id' => null,
                'topic' => $request->topic_3
            ],
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
        $topic_filter = [
            true,
            true
        ];
        foreach ($models as $model_key => $model_value) {
            $model_key = unserialize($model_key);
            $count_data = 0;
            foreach ($model_key as $model_data) {
                $check_input = true;
                try {
                    if ($count_model != 0) {
                        $model_data['student_id'] = $save_student['id'];
                    } else {
                        $model_data['name'] = $model_data['name'] . strval(DB::select('select id from student') == null ? 0 : DB::select('select id from student order by id desc limit 1')[0]->id);
                    }
                    if ($count_data == 1 || $count_data == 2) {
                        $check_input = $topic_filter[$count_data - 1];
                    }
                    if ($check_input) {
                        $save_data = $model_value::create(
                            $model_data
                        );
                    }
                    if ($count_model == 0) {
                        $save_student = $save_data;
                    }
                    $check = true;
                    $count_data++;
                } catch (Exception $err) {
                    $check = false;
                    if ($count_model != 0) {
                        $this->deleteStudent($save_student['id']);
                    }
                    break;
                }
            }
            if ($check) {
                $count_model++;
            } else {
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
