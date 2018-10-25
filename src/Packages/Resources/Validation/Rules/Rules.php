<?php declare(strict_types=1);

namespace App\Packages\Resources\Validation\Rules;

final class Rules
{
    private $rules;

    /** @param $rules Rule[] */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    /** @return Rule[] */
    public function toCollection(): array
    {
        return $this->rules;
    }
}