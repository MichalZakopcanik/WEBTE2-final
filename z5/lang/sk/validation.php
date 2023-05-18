<?php

return [


  'accepted' => 'Pole :attribute musí byť akceptované.',
    'accepted_if' => 'Pole :attribute musí byť akceptované, keď :other je :value.',
    'active_url' => 'Pole :attribute musí byť platná URL adresa.',
    'after' => 'Pole :attribute musí byť dátum po :date.',
    'after_or_equal' => 'Pole :attribute musí byť dátum po alebo rovný :date.',
    'alpha' => 'Pole :attribute musí obsahovať iba písmená.',
    'alpha_dash' => 'Pole :attribute musí obsahovať iba písmená, číslice, pomlčky a podčiarkovníky.',
    'alpha_num' => 'Pole :attribute musí obsahovať iba písmená a číslice.',
    'array' => 'Pole :attribute musí byť pole.',
    'ascii' => 'Pole :attribute musí obsahovať iba jednobajtové alfanumerické znaky a symboly.',
    'before' => 'Pole :attribute musí byť dátum pred :date.',
    'before_or_equal' => 'Pole :attribute musí byť dátum pred alebo rovný :date.',
    'between' => [
        'array' => 'Pole :attribute musí obsahovať medzi :min a :max prvkami.',
        'file' => 'Pole :attribute musí mať veľkosť medzi :min a :max kilobajtmi.',
        'numeric' => 'Pole :attribute musí byť medzi :min a :max.',
        'string' => 'Pole :attribute musí mať medzi :min a :max znakmi.',
    ],
    'boolean' => 'Pole :attribute musí byť true alebo false.',
    'confirmed' => 'Potvrdenie :attribute sa nezhoduje.',
    'current_password' => 'Heslo je nesprávne.',
    'date' => 'Pole :attribute musí byť platný dátum.',
    'date_equals' => 'Pole :attribute musí byť dátum rovný :date.',
    'date_format' => 'Pole :attribute sa nezhoduje s formátom :format.',
    'decimal' => 'Pole :attribute musí mať :decimal desatinných miest.',
    'declined' => 'Pole :attribute musí byť odmietnuté.',
    'declined_if' => 'Pole :attribute musí byť odmietnuté, keď :other je :value.',
    'different' => 'Pole :attribute a :other sa musia líšiť.',
    'digits' => 'Pole :attribute musí mať :digits číslic.',
    'digits_between' => 'Pole :attribute musí mať medzi :min a :max číslicami.',
    'dimensions' => 'Pole :attribute má neplatné rozmery obrázka.',
    'distinct' => 'Pole :attribute má duplicitnú hodnotu.',
    'doesnt_end_with' => 'Pole :attribute nesmie končiť jedným z týchto: :values.',
    'doesnt_start_with' => 'Pole :attribute nesmie začínať jedným z týchto: :values.',
    'email' => 'Pole :attribute musí byť platná e-mailová adresa.',
    'ends_with' => 'Pole :attribute musí končiť jedným z týchto: :values.',
    'enum' => 'Vybraný :attribute je neplatný.',
    'exists' => 'Vybraný :attribute je neplatný.',
    'file' => 'Pole :attribute musí byť súbor.',
    'filled' => 'Pole :attribute musí obsahovať hodnotu.',
    'gt' => [
        'array' => 'Pole :attribute musí mať viac ako :value prvkov.',
        'file' => 'Pole :attribute musí mať viac ako :value kilobajtov.',
        'numeric' => 'Pole :attribute musí byť väčšie ako :value.',
        'string' => 'Pole :attribute musí mať viac ako :value znakov.',
    ],
    'gte' => [
        'array' => 'Pole :attribute musí mať :value prvkov alebo viac.',
        'file' => 'Pole :attribute musí byť väčšie alebo rovné :value kilobajtom.',
        'numeric' => 'Pole :attribute musí byť väčšie alebo rovné :value.',
        'string' => 'Pole :attribute musí byť väčšie alebo rovné :value znakov.',
    ],
    'image' => 'Pole :attribute musí byť obrázok.',
    'in' => 'Vybraný :attribute je neplatný.',
    'in_array' => 'Pole :attribute musí existovať v :other.',
    'integer' => 'Pole :attribute musí byť celé číslo.',
    'ip' => 'Pole :attribute musí byť platná IP adresa.',
    'ipv4' => 'Pole :attribute musí byť platná IPv4 adresa.',
    'ipv6' => 'Pole :attribute musí byť platná IPv6 adresa.',
    'json' => 'Pole :attribute musí byť platný JSON reťazec.',
    'lowercase' => 'Pole :attribute musí byť malými písmenami.',
    'lt' => [
        'array' => 'Pole :attribute musí mať menej ako :value prvkov.',
        'file' => 'Pole :attribute musí byť menšie ako :value kilobajtov.',
        'numeric' => 'Pole :attribute musí byť menšie ako :value.',
        'string' => 'Pole :attribute musí mať menej ako :value znakov.',
    ],
    'lte' => [
        'array' => 'Pole :attribute nesmie mať viac ako :value prvkov.',
        'file' => 'Pole :attribute musí byť menšie alebo rovné :value
        kilobajtom.',
        'numeric' => 'Pole :attribute musí byť menšie alebo rovné :value.',
        'string' => 'Pole :attribute musí byť menšie alebo rovné :value znakov.',
    ],
    'mac_address' => 'Pole :attribute musí byť platná MAC adresa.',
    'max' => [
        'array' => 'Pole :attribute nesmie obsahovať viac ako :max prvkov.',
        'file' => 'Pole :attribute nesmie byť väčšie ako :max kilobajtov.',
        'numeric' => 'Pole :attribute nesmie byť väčšie ako :max.',
        'string' => 'Pole :attribute nesmie byť väčšie ako :max znakov.',
    ],
    'max_digits' => 'Pole :attribute nesmie obsahovať viac ako :max číslic.',
    'mimes' => 'Pole :attribute musí byť súbor typu: :values.',
    'mimetypes' => 'Pole :attribute musí byť súbor typu: :values.',
    'min' => [
        'array' => 'Pole :attribute musí obsahovať aspoň :min prvkov.',
        'file' => 'Pole :attribute musí mať aspoň :min kilobajtov.',
        'numeric' => 'Pole :attribute musí byť aspoň :min.',
        'string' => 'Pole :attribute musí mať aspoň :min znakov.',
    ],
    'min_digits' => 'Pole :attribute musí obsahovať aspoň :min číslic.',
    'missing' => 'Pole :attribute musí chýbať.',
    'missing_if' => 'Pole :attribute musí chýbať, keď :other je :value.',
    'missing_unless' => 'Pole :attribute musí chýbať, pokiaľ :other nie je :value.',
    'missing_with' => 'Pole :attribute musí chýbať, keď :values je prítomné.',
    'missing_with_all' => 'Pole :attribute musí chýbať, keď :values sú prítomné.',
    'multiple_of' => 'Pole :attribute musí byť násobkom :value.',
    'not_in' => 'Vybraný :attribute je neplatný.',
    'not_regex' => 'Formát poľa :attribute je neplatný.',
    'numeric' => 'Pole :attribute musí byť číslo.',
    'password' => [
        'letters' => 'Pole :attribute musí obsahovať aspoň jedno písmeno.',
        'mixed' => 'Pole :attribute musí obsahovať aspoň jedno veľké a jedno malé písmeno.',
        'numbers' => 'Pole :attribute musí obsahovať aspoň jedno číslo.',
        'symbols' => 'Pole :attribute musí obsahovať aspoň jeden symbol.',
        'uncompromised' => 'Zadaný :attribute sa objavil v úniku dát. Prosím, vyberte iný :attribute.',
        'uncompromised' => 'Zadaný :attribute sa objavil v úniku dát. Prosím, vyberte iný :attribute.',
    ],
    'present' => 'Pole :attribute musí byť prítomné.',
    'prohibited' => 'Pole :attribute je zakázané.',
    'prohibited_if' => 'Pole :attribute je zakázané, keď :other je :value.',
    'prohibited_unless' => 'Pole :attribute je zakázané, pokiaľ :other nie je v :values.',
    'prohibits' => 'Pole :attribute zakazuje prítomnosť :other.',
    'regex' => 'Formát poľa :attribute je neplatný.',
    'required' => 'Pole :attribute je povinné.',
    'required_array_keys' => 'Pole :attribute musí obsahovať položky pre: :values.',
    'required_if' => 'Pole :attribute je povinné, keď :other je :value.',
    'required_if_accepted' => 'Pole :attribute je povinné, keď :other je akceptované.',
    'required_unless' => 'Pole :attribute je povinné, pokiaľ :other nie je v :values.',
    'required_with' => 'Pole :attribute je povinné, keď je prítomné :values.',
    'required_with_all' => 'Pole :attribute je povinné, keď sú prítomné :values.',
    'required_without' => 'Pole :attribute je povinné, keď nie je prítomné :values.',
    'required_without_all' => 'Pole :attribute je povinné, keď nie je prítomné žiadne z :values.',
    'same' => 'Pole :attribute musí byť rovnaké ako :other.',
    'size' => [
        'array' => 'Pole :attribute musí obsahovať :size prvkov.',
        'file' => 'Pole :attribute musí mať veľkosť :size kilobajtov.',
        'numeric' => 'Pole :attribute musí mať veľkosť :size.',
        'string' => 'Pole :attribute musí mať veľkosť :size znakov.',
    ],
    'starts_with' => 'Pole :attribute musí začínať jednou z nasledujúcich hodnôt: :values.',
    'string' => 'Pole :attribute musí byť reťazec.',
    'timezone' => 'Pole :attribute musí byť platná časová zóna.',
    'unique' => ':Attribute je už obsadené.',
    'uploaded' => 'Nahrávanie poľa :attribute zlyhalo.',
    'uppercase' => 'Pole :attribute musí byť veľkými písmenami.',
    'url' => 'Pole :attribute musí byť platná URL adresa.',
    'ulid' => 'Pole :attribute musí byť platné ULID.',
    'uuid' => 'Pole :attribute musí byť platný UUID.',
    
   
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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],


    'attributes' => [],

];
