<?php
namespace App\helper;
use Illuminate\Http\Request;
use App\Models\ContactsCountryEnum;
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
    public static function ContactCountryAll()
    {
        return ContactsCountryEnum::all();
    }
}

?>
