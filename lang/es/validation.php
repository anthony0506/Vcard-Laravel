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

    'accepted' => 'El :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha posterior o igual a :fecha.',
    'alpha' => 'El :attribute solo debe contener letras.',
    'alpha_dash' => 'El :attribute solo debe contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute solo debe contener letras y números.',
    'array' => 'El :attribute debe ser una matriz.',
    'before' => 'El :attribute debe ser una fecha anterior a :fecha.',
    'before_or_equal' => 'El :attribute debe ser una fecha anterior o igual a :fecha.',
    'between' => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El :attribute debe estar entre :min y :max caracteres.',
        'array' => 'El :attribute debe tener entre :min y :max elementos.',
    ],
    'boolean' => 'El :attribute el campo debe ser verdadero o falso.',
    'confirmed' => 'El :attribute la confirmación no coincide.',
    'current_password' => 'El contraseña es incorrecta.',
    'date' => 'El :attribute no es una fecha válida.',
    'date_equals' => 'El :attribute debe ser una fecha igual a :fecha.',
    'date_format' => 'El :attribute no coincide con el formato :formato.',
    'different' => 'El :attribute y :otro debe ser diferente.',
    'digits' => 'El :attribute debe ser :dígitos dígitos.',
    'digits_between' => 'El :attribute debe estar entre :min y :max dígitos.',
    'dimensions' => 'El :attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El :attribute el campo tiene un valor duplicado.',
    'email' => 'El :attribute Debe ser una dirección de correo electrónico válida.',
    'ends_with' => 'El :attribute debe terminar con uno de los siguientes: :valores.',
    'exists' => 'El seleccionado :attribute Es invalido.',
    'file' => 'El :attribute debe ser un archivo.',
    'filled' => 'El :attribute el campo debe tener un valor.',
    'gt' => [
        'numeric' => 'El :attribute debe ser mayor que :valor.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El :attribute must be greater than :value characters.',
        'array' => 'El :attribute debe tener más de :elementos de valor.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe ser mayor o igual que :valor.',
        'file' => 'El :attribute debe ser mayor o igual que :value kilobytes.',
        'string' => 'El :attribute debe ser mayor o igual que :value caracteres.',
        'array' => 'El :attribute debe tener: elementos de valor o más.',
    ],
    'image' => 'El :attribute debe ser una imagen.',
    'in' => 'El seleccionado :attribute Es invalido.',
    'in_array' => 'El :attribute el campo no existe en: otro.',
    'integer' => 'El :attribute debe ser un entero.',
    'ip' => 'El :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El :attribute debe ser menor que :valor.',
        'file' => 'El :attribute debe ser menor que :valor kilobytes.',
        'string' => 'El :attribute debe ser menor que :valor caracteres.',
        'array' => 'El :attribute debe tener menos de :elementos de valor.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor o igual que: valor.',
        'file' => 'El :attribute must be less than or equal :value kilobytes.',
        'string' => 'El :attribute debe ser menor o igual que :value caracteres.',
        'array' => 'El :attribute no debe tener más de :elementos de valor.',
    ],
    'max' => [
        'numeric' => 'El :attribute must not be greater than :max.',
        'file' => 'El :attribute no debe ser mayor que :max kilobytes.',
        'string' => 'El :attribute no debe ser mayor que :max caracteres.',
        'array' => 'El :attribute no debe tener más de: elementos máximos.',
    ],
    'mimes' => 'El :attribute debe ser un archivo de tipo: :valores.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo: :valores.',
    'min' => [
        'numeric' => 'El :attribute debe ser al menos :min.',
        'file' => 'El :attribute debe tener al menos :min kilobytes.',
        'string' => 'El :attribute debe tener al menos :min caracteres.',
        'array' => 'El :attribute debe tener al menos :min elementos.',
    ],
    'multiple_of' => 'El :attribute debe ser un múltiplo de: valor.',
    'not_in' => 'El seleccionado :attribute Es invalido.',
    'not_regex' => 'El :attribute el formato no es válido.',
    'numeric' => 'El :attribute Tiene que ser un número.',
    'password' => 'El contraseña es incorrecta.',
    'present' => 'El :attribute el campo debe estar presente.',
    'regex' => 'El :attribute el formato no es válido.',
    'required' => 'El :attribute Se requiere campo.',
    'required_if' => 'El :attribute el campo es obligatorio cuando :otro es :valor.',
    'required_unless' => 'El :attribute el campo es obligatorio a menos que :otro esté en :valores.',
    'required_with' => 'El :attribute el campo es obligatorio cuando :valores está presente.',
    'required_with_all' => 'El :attribute el campo es obligatorio cuando :values ​​están presentes.',
    'required_without' => 'El :attribute El campo es obligatorio cuando :valores no está presente.',
    'required_without_all' => 'El :attribute el campo es obligatorio cuando ninguno de los valores está presente.',
    'prohibited' => 'El :attribute el campo está prohibido.',
    'prohibited_if' => 'El :attribute el campo está prohibido cuando :otro es :valor.',
    'prohibited_unless' => 'El :attribute el campo está prohibido a menos que :otro esté en :valores.',
    'same' => 'El :attribute Y: otro debe coincidir.',
    'size' => [
        'numeric' => 'El :attribute debe ser: tamaño.',
        'file' => 'El :attribute debe ser :tamaño kilobytes.',
        'string' => 'El :attribute debe ser :caracteres de tamaño.',
        'array' => 'El :attribute debe contener: elementos de tamaño.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los siguientes: :valores.',
    'string' => 'El :attribute debe ser una cadena.',
    'timezone' => 'El :attribute debe ser una zona horaria válida.',
    'unique' => 'El :attribute ya se ha tomado.',
    'uploaded' => 'El :attribute no se pudo cargar.',
    'url' => 'El :attribute debe ser una URL válida.',
    'uuid' => 'El :attribute debe ser un UUID válido.',

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
            'rule-name' => 'mensaje personalizado',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => array('service_url' => 'Service URL'),

];
