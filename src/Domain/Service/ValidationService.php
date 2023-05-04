<?php

namespace Linkedcode\ADR\Domain\Service;

abstract class ValidationService
{
    protected $rules = [];

    protected function getRules()
    {
        return $this->rules;
    }

    public function validateCreate(array $data)
    {
        $rules = $this->getRules();
        return $this->validate($data, $rules);
    }

    public function validateUpdate(array $data)
    {
        $rules = $this->getRules();
        foreach ($rules as $r => $rule) {
            if (!in_array($r, $data)) {
                unset($rules[$r]);
            }
        }

        return $this->validate($data, $rules);
    }

    abstract protected function validate(array $data, array $rules);
}