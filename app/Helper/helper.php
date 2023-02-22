<?php
namespace App\helper;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Validator;
class helper
{
    public static function dateFormatForView($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
    public static function sysState()
    {
        return [
            '0' => 'active',
            '1' => 'inactive',
            '-1' => 'deleted'
        ];
    }
    public static function sysDelete($model,$id)
    {
        $model->where('id',$id)->update(['sys_state' => '-1']);
    }
}

?>
