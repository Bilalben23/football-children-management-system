<?php

return [
    'attributes' => [
        'first_name' => 'Prénom',
        'last_name' => 'Nom de famille',
        'birth_date' => 'Date de naissance',
        'parent_phone' => 'Téléphone des parents',
        'image' => 'Image',
    ],

    'custom' => [
        'first_name' => [
            'required' => 'Le :attribute est obligatoire.',
            'string' => 'Le :attribute doit être une chaîne de caractères.',
            'min' => 'Le :attribute doit être d\'au moins :min caractères.',
            'max' => 'Le :attribute ne doit pas dépasser :max caractères.',
        ],
        'last_name' => [
            'required' => 'Le :attribute est obligatoire.',
            'string' => 'Le :attribute doit être une chaîne de caractères.',
            'min' => 'Le :attribute doit être d\'au moins :min caractères.',
            'max' => 'Le :attribute ne doit pas dépasser :max caractères.',
        ],
        'birth_date' => [
            'required' => 'La :attribute est obligatoire.',
            'date' => 'La :attribute n\'est pas une date valide.',
            'date_format' => 'Le champ :attribute doit respecter le format :format.',
        ],
        'parent_phone' => [
            'nullable' => 'Le :attribute doit être un numéro de téléphone valide au Maroc.',
            'string' => 'Le :attribute doit être une chaîne de caractères.',
            'regex' => 'Le :attribute doit être un numéro de téléphone valide au Maroc.',
        ],
        'image' => [
            'nullable' => 'Le :attribute doit être une image.',
            'image' => 'Le :attribute doit être une image.',
            'max' => 'Le :attribute ne peut pas dépasser :max kilo-octets.',
        ],
    ],

    'required' => 'Le champ :attribute est obligatoire.',
    'string' => 'Le :attribute doit être une chaîne de caractères.',
    'min' => [
        'string' => 'Le :attribute doit être d\'au moins :min caractères.',
    ],
    'max' => [
        'string' => 'Le :attribute ne doit pas dépasser :max caractères.',
        'file' => 'Le :attribute ne peut pas dépasser :max kilo-octets.',
    ],
    'date' => 'Le :attribute n\'est pas une date valide.',
    'regex' => 'Le format du :attribute est invalide.',
    'image' => 'Le :attribute doit être une image.',
    'accepted' => 'Le :attribute doit être accepté.',
    'active_url' => 'Le :attribute n\'est pas une URL valide.',
    'uploaded' => 'Le :attribute n\'a pas pu être téléchargé. Essayez une autre image',
];