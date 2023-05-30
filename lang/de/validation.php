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

    'accepted' => 'Der :attribute must be accepted.',
    'active_url' => 'Der :attribute ist keine gültige URL.',
    'after' => 'Der :attribute muss ein Datum nach :date sein.',
    'after_or_equal' => 'Der :attribute muss ein Datum nach oder gleich :date sein.',
    'alpha' => 'Der :attributedarf nur Buchstaben enthalten.',
    'alpha_dash' => 'Der :attribute dürfen nur Buchstaben, Ziffern, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => 'Der :attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => 'Der :attribute muss ein Array sein.',
    'before' => 'Der :attribute muss ein Datum vor :date sein.',
    'before_or_equal' => 'Der :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'Der :attribute muss zwischen :min und :max liegen.',
        'file' => 'Der :attribute muss zwischen :min und :max Kilobyte liegen.',
        'string' => 'Der :attribute muss zwischen :min und :max Zeichen liegen.',
        'array' => 'Der :attribute muss zwischen :min und :max Elemente enthalten.',
    ],
    'boolean' => 'Der :attribute Feld muss wahr oder falsch sein.',
    'confirmed' => 'Der :attribute Bestätigung stimmt nicht überein.',
    'current_password' => 'Das Passwort ist inkorrekt.',
    'date' => 'Der :attribute ist kein gültiges Datum.',
    'date_equals' => 'Der :attribute muss ein Datum gleich :date sein.',
    'date_format' => 'Der :attribute passt nicht zum Format :format.',
    'different' => 'Der :attribute und :other muss anders sein.',
    'digits' => 'Der :attribute muss sein: Ziffern Ziffern.',
    'digits_between' => 'Der :attribute muss zwischen :min und :max Ziffern liegen.',
    'dimensions' => 'Der :attribute has invalid image dimensions.',
    'distinct' => 'Der :attribute Feld hat einen doppelten Wert.',
    'email' => 'Der :attribute muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => 'Der :attribute muss mit einem der folgenden enden: :values.',
    'exists' => 'Der ausgewählt :attribute ist ungültig.',
    'file' => 'Der :attribute muss eine Datei sein.',
    'filled' => 'Der :attribute Feld muss einen Wert haben.',
    'gt' => [
        'numeric' => 'Der :attribute muss größer als :value sein.',
        'file' => 'Der :attribute muss größer als :value Kilobyte sein.',
        'string' => 'Der :attribute muss größer als :value Zeichen sein.',
        'array' => 'Der :attribute muss mehr als :value-Elemente haben.',
    ],
    'gte' => [
        'numeric' => 'Der :attribute muss größer oder gleich :value sein.',
        'file' => 'Der :attribute muss größer oder gleich :value Kilobyte sein.',
        'string' => 'Der :attribute muss größer oder gleich :value Zeichen sein.',
        'array' => 'Der :attribute Muss haben: Wertgegenstände oder mehr.',
    ],
    'image' => 'Der :attribute muss ein Bild sein.',
    'in' => 'Der ausgewählt :attribute ist ungültig.',
    'in_array' => 'Der :attribute Feld existiert nicht in :other.',
    'integer' => 'Der :attribute muss eine ganze Zahl sein.',
    'ip' => 'Der :attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => 'Der :attribute muss eine gültige IPv4-Adresse sein.',
    'ipv6' => 'Der :attribute muss eine gültige IPv6-Adresse sein.',
    'json' => 'Der :attribute muss eine gültige JSON-Zeichenfolge sein.',
    'lt' => [
        'numeric' => 'Der :attribute muss kleiner als :value sein.',
        'file' => 'Der :attribute muss kleiner als :value Kilobyte sein.',
        'string' => 'Der :attribute muss weniger als :value Zeichen sein.',
        'array' => 'Der :attribute muss weniger als :value Elemente haben.',
    ],
    'lte' => [
        'numeric' => 'Der :attribute muss kleiner oder gleich :value sein.',
        'file' => 'Der :attribute muss kleiner oder gleich :value Kilobyte sein.',
        'string' => 'Der :attribute muss kleiner oder gleich :value Zeichen sein.',
        'array' => 'Der :attribute darf nicht mehr als :value-Elemente haben.',
    ],
    'max' => [
        'numeric' => 'Der :attribute darf nicht größer als :max sein.',
        'file' => 'Der :attribute darf nicht größer als :max Kilobyte sein.',
        'string' => 'Der :attribute darf nicht größer als :max Zeichen sein.',
        'array' => 'Der :attribute darf nicht mehr als :max Elemente enthalten.',
    ],
    'mimes' => 'Der :attribute muss eine Datei vom Typ sein: :Werte.',
    'mimetypes' => 'Der :attribute muss eine Datei vom Typ sein: :Werte.',
    'min' => [
        'numeric' => 'Der :attribute muss mindestens :min.',
        'file' => 'Der :attribute muss mindestens :min Kilobyte sein.',
        'string' => 'Der :attribute muss mindestens :min Zeichen lang sein.',
        'array' => 'Der :attribute muss mindestens :min Elemente haben.',
    ],
    'multiple_of' => 'Der :attribute muss ein Vielfaches von :value sein.',
    'not_in' => 'Der ausgewählt :attribute ist ungültig.',
    'not_regex' => 'Der :attribute Format ist ungültig.',
    'numeric' => 'Der :attribute muss eine Nummer sein.',
    'password' => 'Das Passwort ist inkorrekt.',
    'present' => 'Der :attribute Feld muss vorhanden sein.',
    'regex' => 'Der :attribute Format ist ungültig.',
    'required' => 'Der :attribute Feld ist erforderlich.',
    'required_if' => 'Der :attribute Feld ist erforderlich, wenn :other :value ist.',
    'required_unless' => 'Der :attribute Feld ist erforderlich, es sei denn :other steht in :values.',
    'required_with' => 'Der :attribute Feld ist erforderlich, wenn :values vorhanden ist.',
    'required_with_all' => 'Der :attribute Feld ist erforderlich, wenn :values vorhanden sind.',
    'required_without' => 'Der :attribute Feld ist erforderlich, wenn :values nicht vorhanden ist.',
    'required_without_all' => 'Der :attribute Das Feld ist erforderlich, wenn keiner der :Werte vorhanden ist.',
    'prohibited' => 'Der :attribute Feld ist verboten.',
    'prohibited_if' => 'Der :attribute Feld ist verboten, wenn :other :value ist.',
    'prohibited_unless' => 'Der :attribute -Feld ist verboten, es sei denn, :other ist in :values enthalten.',
    'same' => 'Der :attribute und :other müssen übereinstimmen.',
    'size' => [
        'numeric' => 'Der :attribute muss sein: größe.',
        'file' => 'Der :attribute muss :size Kilobyte sein.',
        'string' => 'Der :attribute muss :size Zeichen sein.',
        'array' => 'Der :attribute muss enthalten: Größe Artikel.',
    ],
    'starts_with' => 'Der :attribute muss mit einem der folgenden Werte beginnen: :values.',
    'string' => 'Der :attribute muss eine Zeichenfolge sein.',
    'timezone' => 'Der :attribute muss eine gültige Zeitzone seine.',
    'unique' => 'Der :attribute wurde bereits übernommen.',
    'uploaded' => 'Der :attribute konnte nicht hochgeladen werden.',
    'url' => 'Der :attribute muss eine gültige URL sein.',
    'uuid' => 'Der :attribute muss eine gültige UUID sein.',

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
            'rule-name' => 'benutzerdefinierte Nachrichte',
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
