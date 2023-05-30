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

    'accepted' => 'ال :attribute يجب قبوله.',
    'active_url' => 'The :attribute ليس عنوان URL صالحًا.',
    'after' => 'ال :attribute يجب أن يكون تاريخًا بعد: التاريخ.',
    'after_or_equal' => 'ال :attribute يجب أن يكون تاريخًا بعد: التاريخ أو مساويًا له.',
    'alpha' => 'ال :attribute يجب أن يحتوي على أحرف فقط.',
    'alpha_dash' => 'ال :attribute يجب أن تحتوي فقط على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => 'ال :attribute يجب أن يحتوي على أحرف وأرقام فقط.',
    'array' => 'ال :attribute يجب أن يكون مصفوفة.',
    'before' => 'ال :attribute يجب أن يكون تاريخًا قبل: التاريخ.',
    'before_or_equal' => 'ال :attribute يجب أن يكون تاريخًا يسبق أو يساوي: التاريخ.',
    'between' => [
        'numeric' => 'ال :attribute يجب أن يكون بين: min و: max.',
        'file' => 'ال :attribute يجب أن يكون بين: min و: max كيلوبايت.',
        'string' => 'ال :attribute يجب أن يكون بين: min و: max من الأحرف.',
        'array' => 'ال :attribute يجب أن يكون بين: min و: max من العناصر.',
    ],
    'boolean' => 'ال :attribute يجب أن يكون الحقل صحيحًا أو خطأ.',
    'confirmed' => 'ال :attribute التأكيد غير متطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'ال :attribute هذا ليس تاريخ صحيح.',
    'date_equals' => 'ال :attribute يجب أن يكون تاريخًا مساويًا لـ: التاريخ.',
    'date_format' => 'ال :attribute لا يتطابق مع التنسيق: format.',
    'different' => 'ال :attribute و: يجب أن يكون الآخر مختلفًا.',
    'digits' => 'ال :attribute يجب أن يكون: أرقام.',
    'digits_between' => 'ال :attribute يجب أن يكون بين: min و: max أرقام.',
    'dimensions' => 'ال :attribute أبعاد الصورة غير صالحة.',
    'distinct' => 'ال :attribute الحقل له قيمة مكررة.',
    'email' => 'ال :attribute يجب أن يكون عنوان بريد إلكتروني صالح.',
    'ends_with' => 'ال :attribute يجب أن ينتهي بواحد مما يلي: القيم.',
    'exists' => 'ال المحدد :attribute غير صالح.',
    'file' => 'ال :attribute يجب أن يكون ملفًا.',
    'filled' => 'ال :attribute يجب أن يكون للحقل قيمة.',
    'gt' => [
        'numeric' => 'ال :attribute يجب أن يكون أكبر من: value.',
        'file' => 'ال :attribute يجب أن يكون أكبر من: القيمة كيلوبايت.',
        'string' => 'ال :attribute يجب أن يكون أكبر من: أحرف القيمة.',
        'array' => 'ال :attribute يجب أن يحتوي على أكثر من: عناصر قيمة.',
    ],
    'gte' => [
        'numeric' => 'ال :attribute يجب أن تكون أكبر من أو تساوي: value.',
        'file' => 'ال :attribute يجب أن يكون أكبر من أو يساوي: القيمة كيلوبايت.',
        'string' => 'ال :attribute يجب أن يكون أكبر من أو يساوي: أحرف القيمة.',
        'array' => 'ال :attribute يجب أن يكون: عناصر قيمة أو أكثر.',
    ],
    'image' => 'ال :attribute يجب أن تكون صورة.',
    'in' => 'ال المحدد :attribute غير صالح.',
    'in_array' => 'ال :attribute لا يوجد مجال في: أخرى.',
    'integer' => 'ال :attribute يجب أن يكون صحيحا.',
    'ip' => 'ال :attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => 'ال :attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => 'ال :attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => 'ال :attribute يجب أن تكون سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => 'ال :attribute يجب أن يكون أقل من: value.',
        'file' => 'ال :attributeيجب أن يكون أقل من: value كيلوبايت.',
        'string' => 'ال :attribute يجب أن يكون أقل من: أحرف القيمة.',
        'array' => 'ال :attribute يجب أن يحتوي على أقل من: قيمة العناصر.',
    ],
    'lte' => [
        'numeric' => 'ال :attribute يجب أن يكون أصغر من أو يساوي: value.',
        'file' => 'ال :attribute يجب أن يكون أقل من أو يساوي: القيمة كيلوبايت.',
        'string' => 'ال :attribute يجب أن يكون أقل من أو يساوي: أحرف القيمة.',
        'array' => 'ال :attribute يجب ألا يحتوي على أكثر من: عناصر قيمة.',
    ],
    'max' => [
        'numeric' => 'ال :attribute يجب ألا يكون أكبر من: max.',
        'file' => 'ال :attribute يجب ألا يكون أكبر من: كيلوبايت كحد أقصى.',
        'string' => 'ال :attribute يجب ألا يكون أكبر من: الحد الأقصى من الأحرف.',
        'array' => 'ال :attribute يجب ألا يحتوي على أكثر من: كحد أقصى من العناصر.',
    ],
    'mimes' => 'ال :attribute يجب أن يكون ملفًا من النوع: القيم.',
    'mimetypes' => 'ال :attribute يجب أن يكون ملفًا من النوع: القيم.',
    'min' => [
        'numeric' => 'ال :attribute يجب أن يكون على الأقل: min.',
        'file' => 'ال :attribute يجب أن يكون على الأقل: دقيقة كيلوبايت.',
        'string' => 'ال :attribute يجب أن يكون على الأقل: الحد الأدنى من الأحرف.',
        'array' => 'ال :attribute يجب أن يحتوي على الأقل على: min من العناصر.',
    ],
    'multiple_of' => 'ال :attribute يجب أن يكون من مضاعفات: القيمة.',
    'not_in' => 'ال المحدد :attribute غير صالح.',
    'not_regex' => 'ال :attribute التنسيق غير صالح.',
    'numeric' => 'ال :attribute يجب أن يكون رقما.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'ال :attribute يجب أن يكون الحقل موجودًا.',
    'regex' => 'ال :attribute التنسيق غير صالح.',
    'required' => 'ال :attribute الحقل مطلوب.',
    'required_if' => 'ال :attribute الحقل مطلوب عندما: الآخر هو: القيمة.',
    'required_unless' => 'ال :attribute مطلوب الحقل ما لم: الآخر في: القيم.',
    'required_with' => 'ال :attribute الحقل مطلوب عندما: القيم موجودة.',
    'required_with_all' => 'ال :attribute الحقل مطلوب عندما: القيم موجودة.',
    'required_without' => 'ال :attribute الحقل مطلوب عندما: القيم غير موجودة.',
    'required_without_all' => 'ال :attribute يكون الحقل مطلوبًا في حالة عدم وجود أي من: القيم.',
    'prohibited' => 'ال :attribute المجال محظور.',
    'prohibited_if' => 'ال :attribute الحقل محظور عندما: الآخر هو: القيمة.',
    'prohibited_unless' => 'ال :attribute الحقل محظور ما لم: الآخر في: القيم.',
    'same' => 'ال :attribute و :other يجب أن تتطابق.',
    'size' => [
        'numeric' => 'ال :attribute يجب أن يكون: الحجم.',
        'file' => 'ال :attribute لا بد وأن :size كيلوبايت.',
        'string' => 'ال :attribute يجب أن يكون: أحرف الحجم.',
        'array' => 'ال :attribute يجب أن تحتوي على: عناصر الحجم.',
    ],
    'starts_with' => 'ال :attribute يجب أن يبدأ بواحد مما يلي: القيم.',
    'string' => 'ال :attribute يجب أن يكون سلسلة.',
    'timezone' => 'ال :attribute يجب أن تكون منطقة زمنية صالحة.',
    'unique' => 'ال :attribute لقد اتخذت بالفعل.',
    'uploaded' => 'ال :attribute فشل التحميل.',
    'url' => 'ال :attribute يجب أن يكون عنوان URL صالحًا.',
    'uuid' => 'ال :attribute يجب أن يكون UUID صالحًا.',

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
            'rule-name' => 'رسالة مخصصة',
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
