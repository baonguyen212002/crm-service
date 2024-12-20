<?php declare(strict_types=1);

namespace App\GraphQL\Validators;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

final class ProductCreateInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        $args = $this->args->toArray();

        return [
            'titleEn' => 'required',
            'titleVi' => 'required',
            'slugEn' => [
                'nullable',
                Rule::unique(Product::class, 'slug')->where(function ($query) use ($args) {
                    return $query->where('service_id', $args['serviceId']);
                })
            ],
            'descriptionEn' => 'required',
            'descriptionVi' => 'required',
            'contentEn' => 'required',
            'contentVi' => 'required',
            'price' => 'required',
        ];
    }
}
