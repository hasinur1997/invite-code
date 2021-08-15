<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InviteCodeNotApproed implements Rule
{
    /**
     * Store invite code object
     *
     * @var object
     */
    protected $inviteCode;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($inviteCode)
    {
        $this->inviteCode = $inviteCode;
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
        return !optional($this->inviteCode)->approved();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'That code is invalid';
    }
}
