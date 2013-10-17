<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gavster
 * Date: 16/10/13
 * Time: 06:25
 * To change this template use File | Settings | File Templates.
 */

class ValidEloquent extends Eloquent
{
    protected $rules = array();

    protected $errors;

    public function validate($data)
    {
        $v = Validator::make($data, $this->rules);
        if ($v->fails()){
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
}