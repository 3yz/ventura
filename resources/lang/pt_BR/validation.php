<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O :attribute deve ser aceito.',
    'active_url'           => 'O :attribute não é uma URL válida.',
    'after'                => 'O :attribute deve ser uma data antes de :date.',
    'alpha'                => 'O :attribute pode conter apenas letras.',
    'alpha_dash'           => 'O :attribute pode conter apenas letras, números e traços.',
    'alpha_num'            => 'O :attribute pode conter apenas letras e números.',
    'array'                => 'O :attribute deve ser um array.',
    'before'               => 'O :attribute deve ser uma data anterior a :date.',
    'between'              => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file'    => 'O :attribute deve ser entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve ser entre :min e :max caracteres.',
        'array'   => 'O :attribute deve ter entre :min e :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadeiro ou falseo.',
    'confirmed'            => 'A confirmação de :attribute não combina.',
    'date'                 => 'O :attribute não é uma data válida.',
    'date_format'          => 'O :attribute não combina com o formato :format.',
    'different'            => 'O :attribute e :other devem ser diferentes.',
    'digits'               => 'O :attribute deve ter :digits dígitos.',
    'digits_between'       => 'O :attribute deve ser entre :min e :max digitos.',
    'email'                => 'O :attribute deve ser um endereço de e-mail válido.',
    'exists'               => 'O selecionado :attribute  é inválido.',
    'filled'               => 'O :attribute é requirido.',
    'image'                => 'O :attribute deve ser uma imagem.',
    'in'                   => 'O selecionado :attribute é inválido.',
    'integer'              => 'O :attribute deve ser um inteiro.',
    'ip'                   => 'O :attribute deve ser um IP válido.',
    'json'                 => 'O :attribute deve ser uma JSON válido.',
    'max'                  => [
        'numeric' => 'O :attribute não deve ser maior que :max.',
        'file'    => 'O :attribute não deve ser maior que :max kilobytes.',
        'string'  => 'O :attribute não deve ser maior que :max characters.',
        'array'   => 'O :attribute não deve ter mais que :max itens.',
    ],
    'mimes'                => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O :attribute deve ter no mínimo :min.',
        'file'    => 'O :attribute deve ter no mínimo :min kilobytes.',
        'string'  => 'O :attribute deve ter no mínimo :min caracteres.',
        'array'   => 'O :attribute deve ter ao mínimo :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'numeric'              => 'O :attribute deve ser um número.',
    'regex'                => 'O :attribute tem um formato inválido.',
    'required'             => 'O :attribute é obrigatório.',
    'required_if'          => 'O :attribute campo é obrigatório quando :other é :value.',
    'required_with'        => 'O :attribute campo é obrigatório quando :values está presente.',
    'required_with_all'    => 'O :attribute campo é obrigatório quando :values está presente.',
    'required_without'     => 'O :attribute campo é obrigatório quando :values não está presente.',
    'required_without_all' => 'O :attribute campo é obrigatório quando nenhum dos valores :values está presente.',
    'same'                 => 'O :attribute e :other devem ser iguais.',
    'size'                 => [
        'numeric' => 'O :attribute devem ser :size.',
        'file'    => 'O :attribute devem ser :size kilobytes.',
        'string'  => 'O :attribute devem ser :size characters.',
        'array'   => 'O :attribute devem conter :size itens.',
    ],
    'string'               => 'O :attribute devem ser um texto.',
    'timezone'             => 'O :attribute devem ser uma zona válida.',
    'unique'               => 'O :attribute já está sendo utilizado.',
    'url'                  => 'O :attribute tem um formato inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
