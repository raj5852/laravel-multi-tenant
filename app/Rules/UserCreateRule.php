<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UserCreateRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $requestDate = request()->all();

        if(is_array($requestDate) && isset($requestDate['email'])){
          $data =   DB::table('tenants')->where('data->email',$requestDate['email'])->exists();
            if($data){
                $fail('The email in the tenant data is already taken');
            }
        }
    }
}
