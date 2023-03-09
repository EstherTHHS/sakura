<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $num = "";
        for ($i = 0; $i < strlen($value); $i++) {
            if (ctype_digit($value[$i])) {
                $num .= $value[$i];
            }
        }
        if (strlen($num) < 2) {

            $this->message = "Pwd must include two digits";
            return  false;
        } else if (!ctype_lower(preg_replace("/[^a-zA-Z]+/", "", $value))) {
            $this->message = "must be lower case!";
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
