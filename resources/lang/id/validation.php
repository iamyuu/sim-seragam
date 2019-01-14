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

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'Field :attribute hanya menerima huruf atau angka.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'Field :attribute must be between :min and :max.',
        'file'    => 'Field :attribute must be between :min and :max kilobytes.',
        'string'  => 'Field :attribute must be between :min and :max characters.',
        'array'   => 'Field :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'Field :attribute harus berupa alamat email.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'Field :attribute harus berupa file.',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'Field :attribute harus berupa gambar.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'Field :attribute harus berupa angka.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'Field :attribute tidak boleh lebih besar dari :max.',
        'file'    => 'Field :attribute tidak boleh lebih besar dari :max kilobytes.',
        'string'  => 'Field :attribute tidak boleh lebih besar dari :max karakter.',
    ],
    'mimes'                => 'Field :attribute harus file dan bertipe: :values.',
    'mimetypes'            => 'Field :attribute harus file dan bertipe: :values.',
    'min'                  => [
        'numeric' => 'Field :attribute harus setidaknya :min.',
        'file'    => 'Field :attribute harus setidaknya :min kilobytes.',
        'string'  => 'Field :attribute harus setidaknya :min karakter.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'Field :attribute harus berupa angka.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'Field :attribute tidak boleh kosong.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'Field :attribute harus :size.',
        'file'    => 'Field :attribute harus :size kilobytes.',
        'string'  => 'Field :attribute harus :size karakter.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'Field :attribute harus berupa string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'Field :attribute tidak boleh sama atau sudah ada.',
    'uploaded'             => 'Field :attribute gagal upload.',
    'url'                  => 'The :attribute format is invalid.',

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
