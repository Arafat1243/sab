<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Length implements Rule
{
    private int $min = 0;
    private int $max = 0;
    private string $message = '';
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($min = 2, $max = 2)
    {
        //
        $this->max = $max;
        $this->min = $min;
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
        //
        if(strlen((string)$value) < $this->min){
            $this->message = 'The '. $attribute . ' must be at least '. $this->min.' digits.';
            return false;
        }else if(strlen((string)$value) > $this->max){
            $this->message = 'The ' . $attribute . ' may not be greater than '. $this->max.' digits.';
            return false;
        }
        return true;
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
