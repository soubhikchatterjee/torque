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

    'accepted'             => 'Le :attribute doit être accepté.',
    'active_url'           => 'Le :attribute n\'est pas une URL valide.',
    'after'                => 'Le :attribute doit être une date après: date.',
    'alpha'                => 'Le :attribute ne peut contenir que des lettres.',
    'alpha_dash'           => 'Le :attribute ne peut contenir que des lettres, des chiffres et des tirets.',
    'alpha_num'            => 'Le :attribute ne peut contenir que des lettres et des chiffres.',
    'array'                => 'Le :attribute doit être un tableau.',
    'before'               => 'Le :attribute doit être une date avant :date.',
    'between'              => [
        'numeric' => 'Le :attribute doit être compris entre :min et :max.',
        'file'    => 'Le :attribute doit être compris entre :min et :max kilobytes.',
        'string'  => 'Le :attribute doit être compris entre :min et :max caractères.',
        'array'   => 'Le :attribute doit avoir entre :min et :max items.',
    ],
    'boolean'              => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed'            => 'La confirmation :attribute ne correspond pas.',
    'date'                 => 'Le :attribute n\'est pas une date valide.',
    'date_format'          => 'Le :attribute ne correspond pas au format :format.',
    'different'            => 'Le :attribute et :other doit être différent.',
    'digits'               => 'Le :attribute doit être :digits digits.',
    'digits_between'       => 'Le :attribute doit être entre :min et chiffres :max.',
    'distinct'             => 'Le champ :attribute a une valeur en double.',
    'email'                => 'Le :attribute doit être une adresse e-mail valide.',
    'exists'               => 'Le :attribute sélectionné n\'est pas valide.',
    'filled'               => 'Le champ :attribute est requis.',
    'image'                => 'Le :attribute doit être une image.',
    'in'                   => 'Le :attribute sélectionné n\'est pas valide.',
    'in_array'             => 'Le champ :attribute n\'existe pas dans :other.',
    'integer'              => 'Le :attribute doit être un entier.',
    'ip'                   => 'Le :attribute doit être une adresse IP valide.',
    'json'                 => 'Le :attribute doit être une chaîne JSON valide.',
    'max'                  => [
        'numeric' => 'Le :attribute ne doit pas être supérieur à :max.',
        'file'    => 'Le :attribute ne doit pas être supérieur à :max kilobytes.',
        'string'  => 'Le :attribute ne doit pas être supérieur à caractères :max.',
        'array'   => 'Le :attribute peut ne pas avoir plus de :max items.',
    ],
    'mimes'                => 'Le :attribute doit être un fichier de type :values.',
    'min'                  => [
        'numeric' => 'Le :attribute doit être au moins :min.',
        'file'    => 'Le :attribute doit être au moins :min kilobytes.',
        'string'  => 'Le :attribute doit avoir au moins :min caractères.',
        'array'   => 'Le :attribute doit avoir au moins :min items.',
    ],
    'not_in'               => 'Le :attribute sélectionné n\'est pas valide.',
    'numeric'              => 'Le :attribute doit être un nombre.',
    'present'              => 'Le champ :attribute doit être présent.',
    'regex'                => 'Le format :attribute n\'est pas valide.',
    'required'             => 'Le champ :attribute est requis.',
    'required_if'          => 'Le champ :attribute est obligatoire lorsque :other is :value.',
    'required_unless'      => 'Le champ :attribute est requis sauf si :other est dans :values.',
    'required_with'        => 'Le champ :attribute est requis lorsque :values ​​sont présentes.',
    'required_with_all'    => 'Le champ :attribute est requis lorsque :values ​​sont présentes.',
    'required_without'     => 'Le champ :attribute est requis lorsque :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est requis lorsque aucun de :values n\'est présent.',
    'same'                 => 'Les :attribute et :other doivent correspondre.',
    'size'                 => [
        'numeric' => 'Le :attribute doit être :size.',
        'file'    => 'Le :attribute doit être :size kilobytes.',
        'string'  => 'Le :attribute doit être :size characters.',
        'array'   => 'Le :attribute doit contenir :size items.',
    ],
    'string'               => 'Le :attribute doit être une chaîne.',
    'timezone'             => 'Le :attribute doit être une zone valide.',
    'unique'               => 'Le :attribute a déjà été pris.',
    'url'                  => 'Le format :attribute n\'est pas valide.',

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
