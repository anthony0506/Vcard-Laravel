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

    'accepted' => 'bu :attribute kabul edilmeli.',
    'active_url' => 'bu :attribute geçerli bir URL değil.',
    'after' => 'bu :attribute :date tarihinden sonraki bir tarih olmalıdır.',
    'after_or_equal' => "bu :attribute :date'den sonraki veya buna eşit bir tarih olmalıdır.",
    'alpha' => 'bu :attribute sadece harf içermelidir.',
    'alpha_dash' => 'bu :attribute yalnızca harf, rakam, tire ve alt çizgi içermelidir.',
    'alpha_num' => 'bu :attribute sadece harf ve rakamlardan oluşmalıdır.',
    'array' => 'bu :attribute bir dizi olmalı.',
    'before' => "bu :attribute :date'den önceki bir tarih olmalıdır.",
    'before_or_equal' => 'bu :attribute :date tarihinden önce veya buna eşit bir tarih olmalıdır.',
    'between' => [
        'numeric' => 'bu :attribute :min ve :max arasında olmalıdır.',
        'file' => 'bu :attribute :min ile :max kilobayt arasında olmalıdır.',
        'string' => 'bu :attribute :min ve :max karakterleri arasında olmalıdır.',
        'array' => 'bu :attribute :min ve :max öğeleri arasında olmalıdır.',
    ],
    'boolean' => 'bu :attribute alan doğru veya yanlış olmalıdır.',
    'confirmed' => 'bu :attribute onay eşleşmiyor.',
    'current_password' => 'Şifre yanlış.',
    'date' => 'bu :attribute geçerli bir tarih değil.',
    'date_equals' => 'bu :attribute :date değerine eşit bir tarih olmalıdır.',
    'date_format' => 'bu :attribute biçimle eşleşmiyor :format.',
    'different' => 'bu :attribute ve :diğer farklı olmalı.',
    'digits' => 'bu :attribute olmalıdır :rakamlar rakamlar.',
    'digits_between' => 'bu :attribute :min ve :max basamaklar arasında olmalıdır.',
    'dimensions' => 'bu :attribute geçersiz resim boyutları var.',
    'distinct' => 'bu :attribute alan yinelenen bir değere sahip.',
    'email' => 'bu :attribute Geçerli bir e-posta adresi olmalı.',
    'ends_with' => 'bu :attribute aşağıdakilerden biriyle bitmelidir: :değerler.',
    'exists' => 'bu seçilmiş :attribute geçersizdir.',
    'file' => 'bu :attribute bir dosya olmalı.',
    'filled' => 'bu :attribute alanın bir değeri olmalıdır.',
    'gt' => [
        'numeric' => 'bu :attribute :değerden büyük olmalıdır.',
        'file' => 'bu :attribute :değer kilobayttan büyük olmalıdır.',
        'string' => 'bu :attribute değer karakterlerinden daha büyük olmalıdır.',
        'array' => 'bu :attribute :değer öğelerinden daha fazlasına sahip olmalıdır.',
    ],
    'gte' => [
        'numeric' => 'bu :attribute :değerden büyük veya ona eşit olmalıdır.',
        'file' => 'bu :attribute :değer kilobayttan büyük veya ona eşit olmalıdır.',
        'string' => 'bu :attribute değer karakterlerinden büyük veya eşit olmalıdır.',
        'array' => 'bu :attribute sahip olmalıdır: değer öğeleri veya daha fazlası.',
    ],
    'image' => 'bu :attribute bir resim olmalı.',
    'in' => 'bu seçilmiş :attribute geçersizdir.',
    'in_array' => 'bu :attribute alan şurada yok :diğer.',
    'integer' => 'bu :attribute tam sayı olmak zorunda.',
    'ip' => 'bu :attribute geçerli bir IP adresi olmalıdır.',
    'ipv4' => 'bu :attribute geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => 'bu :attribute geçerli bir IPv6 adresi olmalıdır.',
    'json' => 'bu :attribute geçerli bir JSON dizesi olmalıdır.',
    'lt' => [
        'numeric' => 'bu :attribute :değerden küçük olmalıdır.',
        'file' => 'bu :attribute :değer kilobayttan küçük olmalıdır.',
        'string' => 'bu :attribute :değer karakterlerinden daha az olmalıdır.',
        'array' => 'bu :attribute :değer öğelerinden daha azına sahip olmalıdır.',
    ],
    'lte' => [
        'numeric' => 'bu :attribute :değerden küçük veya eşit olmalıdır.',
        'file' => 'bu :attribute :değer kilobayttan küçük veya ona eşit olmalıdır.',
        'string' => 'bu :attribute :değer karakterlerinden küçük veya eşit olmalıdır.',
        'array' => 'bu :attribute :değer öğelerinden daha fazlasına sahip olmamalıdır.',
    ],
    'max' => [
        'numeric' => 'bu :attribute :max değerinden büyük olmamalıdır.',
        'file' => 'bu :attribute :max kilobayttan büyük olmamalıdır.',
        'string' => 'bu :attribute :max karakterden büyük olmamalıdır.',
        'array' => 'bu :attribute en fazla :max öğeye sahip olmamalıdır.',
    ],
    'mimes' => 'bu :attribute :values türünde bir dosya olmalıdır.',
    'mimetypes' => 'bu :attribute :values türünde bir dosya olmalıdır.',
    'min' => [
        'numeric' => 'bu :attribute en az :dk olmalıdır.',
        'file' => 'bu :attribute en az :min kilobayt olmalıdır.',
        'string' => 'bu :attribute en az :min karakter olmalıdır.',
        'array' => 'bu :attribute en az :min öğelere sahip olmalıdır.',
    ],
    'multiple_of' => 'bu :attribute :değerin katı olmalıdır.',
    'not_in' => 'bu seçilmiş :attribute geçersizdir.',
    'not_regex' => 'bu :attribute biçim geçersiz.',
    'numeric' => 'bu :attribute bir sayı olmalı.',
    'password' => 'Şifre yanlış.',
    'present' => 'bu :attribute alan mevcut olmalıdır.',
    'regex' => 'bu :attribute biçim geçersiz.',
    'required' => 'bu :attribute alan gereklidir.',
    'required_if' => 'bu :attribute alan :other :value olduğunda gereklidir.',
    'required_unless' => 'bu :attribute :other :values içinde olmadıkça alan gereklidir.',
    'required_with' => 'bu :attribute :values mevcut olduğunda bu alan gereklidir.',
    'required_with_all' => 'bu :attribute alan :değerler mevcut olduğunda gereklidir.',
    'required_without' => 'bu :attribute alan :değerler olmadığında gereklidir.',
    'required_without_all' => 'bu :attribute :değerlerinden hiçbiri mevcut olmadığında alan gereklidir.',
    'prohibited' => 'bu :attribute alan yasaktır.',
    'prohibited_if' => 'bu :attribute :other :value olduğunda alan yasaktır.',
    'prohibited_unless' => 'bu :attribute :other :values ​​içinde olmadıkça alan yasaktır.',
    'same' => 'bu :attribute ve :diğer eşleşmelidir.',
    'size' => [
        'numeric' => 'bu :attribute olmalıdır:boyut.',
        'file' => 'bu :attribute olmalıdır: boyut kilobayt.',
        'string' => 'bu :attribute olmalıdır :boyut karakterleri.',
        'array' => 'bu :attribute şunları içermelidir: boyut öğeleri.',
    ],
    'starts_with' => 'bu :attribute aşağıdakilerden biriyle başlamalıdır: :değerler.',
    'string' => 'bu :attribute bir dize olmalı.',
    'timezone' => 'bu :attribute geçerli bir saat dilimi olmalıdıre.',
    'unique' => 'bu :attribute çoktan alındı.',
    'uploaded' => 'bu :attribute yüklenemedi.',
    'url' => 'bu :attribute geçerli bir URL olmalıdır.',
    'uuid' => 'bu :attribute geçerli bir UUID olmalıdır.',

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
            'rule-name' => 'özel mesaj',
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
