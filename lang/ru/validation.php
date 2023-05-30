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

    'accepted' => 'То :attribute должны быть приняты.',
    'active_url' => 'То :attribute недействительный URL-адрес.',
    'after' => 'То :attribute должна быть дата после :date.',
    'after_or_equal' => 'То :attribute должна быть датой после или равной :date.',
    'alpha' => 'То :attribute должен содержать только буквы.',
    'alpha_dash' => 'То :attribute должен содержать только буквы, цифры, дефисы и символы подчеркивания.',
    'alpha_num' => 'То :attribute должен содержать только буквы и цифры.',
    'array' => 'То :attribute должен быть массив.',
    'before' => 'То :attribute должна быть дата до :date.',
    'before_or_equal' => 'То :attribute должна быть датой до или равной :date.',
    'between' => [
        'numeric' => 'То :attribute должно быть между :min и :max.',
        'file' => 'То :attribute должен быть между :min и :max килобайтами.',
        'string' => 'То :attribute должно быть между символами :min и :max.',
        'array' => 'То :attribute должно быть между :min и :max элементами.',
    ],
    'boolean' => 'То :attribute field must be true or false.',
    'confirmed' => 'То :attribute подтверждение не совпадает.',
    'current_password' => 'Пароль неверен.',
    'date' => 'То :attribute не верная дата.',
    'date_equals' => 'То :attribute должна быть дата, равная :date.',
    'date_format' => 'То :attribute не соответствует формату :format.',
    'different' => 'То :attribute и :other должен быть другим.',
    'digits' => 'То :attribute должно быть :цифры цифры.',
    'digits_between' => 'То :attribute должно быть между цифрами :min и :max.',
    'dimensions' => 'То :attribute имеет недопустимые размеры изображения.',
    'distinct' => 'То :attribute поле имеет повторяющееся значение.',
    'email' => 'То :attribute must be a valid email address.',
    'ends_with' => 'То :attribute должен заканчиваться одним из следующих символов: :values.',
    'exists' => 'Выбранный :attribute является недействительным.',
    'file' => 'То :attribute должен быть файл.',
    'filled' => 'То :attribute field must have a value.',
    'gt' => [
        'numeric' => 'То :attribute должно быть больше :value.',
        'file' => 'То :attribute должно быть больше :value килобайт.',
        'string' => 'То :attribute должно быть больше, чем :value символов.',
        'array' => 'То :attribute должно быть больше, чем :value элементов.',
    ],
    'gte' => [
        'numeric' => 'То :attribute должно быть больше или равно :value.',
        'file' => 'То :attribute должен быть больше или равен :value килобайт.',
        'string' => 'То :attribute должно быть больше или равно :value символов.',
        'array' => 'То :attribute должны иметь элементы :value или более.',
    ],
    'image' => 'То :attribute must be an image.',
    'in' => 'То выбран :attribute является недействительным.',
    'in_array' => 'То :attribute поле не существует в :other.',
    'integer' => 'То :attribute должно быть целым числом.',
    'ip' => 'То :attribute должен быть действительным IP-адресом.',
    'ipv4' => 'То :attribute должен быть действительным адресом IPv4.',
    'ipv6' => 'То :attribute должен быть действительным адресом IPv6.',
    'json' => 'То :attribute должна быть допустимой строкой JSON.',
    'lt' => [
        'numeric' => 'То :attribute должно быть меньше :value.',
        'file' => 'То :attribute должно быть меньше :value килобайт.',
        'string' => 'То :attribute должно быть меньше символов :value.',
        'array' => 'То :attribute должно быть меньше чем :value элементов.',
    ],
    'lte' => [
        'numeric' => 'То :attribute должно быть меньше или равно :value.',
        'file' => 'То :attribute must be less than or equal :value kilobytes.',
        'string' => 'То :attribute должно быть меньше или равно :value символов.',
        'array' => 'То :attribute не должно быть более :value элементов.',
    ],
    'max' => [
        'numeric' => 'То :attribute не должен быть больше :max.',
        'file' => 'То :attribute не должен превышать :max килобайт.',
        'string' => 'То :attribute не должен превышать :max символов.',
        'array' => 'То :attribute не должно быть более :max элементов.',
    ],
    'mimes' => 'То :attribute должен быть файлом типа: :values.',
    'mimetypes' => 'То :attribute должен быть файлом типа: :values.',
    'min' => [
        'numeric' => 'То :attribute должно быть не менее :min.',
        'file' => 'То :attribute должно быть не менее :min килобайт.',
        'string' => 'То :attribute должно быть не менее :min символов.',
        'array' => 'То :attribute должно быть не менее :min элементов.',
    ],
    'multiple_of' => 'То :attribute должно быть кратно :value.',
    'not_in' => 'То выбран :attribute является недействительным.',
    'not_regex' => 'То :attribute формат недействителен.',
    'numeric' => 'То :attribute должно быть числом.',
    'password' => 'Пароль неверен.',
    'present' => 'То :attribute поле должно присутствовать.',
    'regex' => 'То :attribute формат недействителен.',
    'required' => 'То :attribute Поле, обязательное для заполнения.',
    'required_if' => 'То :attribute поле обязательно, когда :other равно :value.',
    'required_unless' => 'То :attribute field is required unless :other is in :values.',
    'required_with' => 'То :attribute Поле обязательно, когда присутствует :values.',
    'required_with_all' => 'То :attribute Поле обязательно, когда присутствуют :values.',
    'required_without' => 'То :attribute поле обязательно, когда :values ​​нет.',
    'required_without_all' => 'То :attribute Поле является обязательным, если ни одно из значений :value отсутствует.',
    'prohibited' => 'То :attribute поле запрещено.',
    'prohibited_if' => 'То :attribute поле запрещено, когда :other равно :value.',
    'prohibited_unless' => 'То :attribute поле запрещено, если только :other не находится в :values.',
    'same' => 'То :attribute и :other должны совпадать.',
    'size' => [
        'numeric' => 'То :attribute должно быть: размер.',
        'file' => 'То :attribute должно быть :size килобайт.',
        'string' => 'То :attribute должно быть :size символов.',
        'array' => 'То :attribute должен содержать элементы :size.',
    ],
    'starts_with' => 'То :attribute должен начинаться с одного из следующих: :values.',
    'string' => 'То :attribute должна быть строка.',
    'timezone' => 'То :attribute должен быть допустимым часовым поясом.',
    'unique' => 'То :attribute уже использовано.',
    'uploaded' => 'То :attribute не удалось загрузить.',
    'url' => 'То :attribute должен быть действительным URL.',
    'uuid' => 'То :attribute должен быть допустимым UUID.',

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
            'rule-name' => 'пользовательское сообщение',
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
