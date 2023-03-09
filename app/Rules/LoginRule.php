<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LoginRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //run at first of all
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
        // if (is_numeric(substr($value, -1))) {
        //     return true;
        // } else {
        //     return false;
        // }

        // return is_numeric(substr($value, -1));

        if (!ctype_upper(substr($value, 0, 1))) {
            $this->message = "First character must be  Capital letter!";
            return false;
        } else if (!is_numeric(substr($value, -4, 4))) {
            $this->message = "last four chars must be four digits!";
            return false;
        } else if (!preg_match('/[a-z0-9]+/i', $value)) {
            $this->message = "Username must be include special character!";
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
