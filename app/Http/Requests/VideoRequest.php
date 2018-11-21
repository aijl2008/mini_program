<?php

namespace App\Http\Requests;

use App\Helper;
use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title:required",
        ];
    }

    public function all($keys = NULL)
    {
        $data = [];
        foreach ([
                     "user_id" => "int",
                     "title" => "string",
                     "url" => "string",
                     "uploaded_at" => "int",
                     "played_number" => "int",
                     "liked_number" => "int",
                     "shared_wechat_number" => "int",
                     "shared_moment_number" => "int",
                     "visibility" => "int",
                     "status" => "int"
                 ] as $field => $type) {
            $value = $this->input($field);
            if (is_null($value)) {
                continue;
            }
            $data[$field] = call_user_func(function ($value, $type) {
                switch ($type) {
                    case "int":
                        return (int)$value;
                        break;
                    case "string":
                        return (string)$value;
                        break;
                    case "boolean":
                        return (boolean)$value;
                        break;
                    default:
                        return $value;
                        break;
                }
            }, $value, $type);
        }

        foreach ([
                     "user_id" => Helper::uid(),
                     "uploaded_at" => date("Y-m-d H:i:s"),
                     "played_number" => 0,
                     "liked_number" =>0,
                     "shared_wechat_number" => 0,
                     "shared_moment_number" => 0,
                     "visibility" => 1,
                     "status" => 1
                 ] as $field => $value) {
            if (!key_exists($field, $data)) {
                $data[$field] = $value;
            }
        }
        return $data;
    }
}
