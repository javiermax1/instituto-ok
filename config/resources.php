<?php
// recursos. Admin no es una entidad gestionable.
return [
    "teachers" =>[
        "role" => "teacher",
    ],
    "students" =>[
        "role" => "student",
    ],
    "users" =>[
        "fields" =>[

                'name',
                'email',
                'dni',
                'sphone',
                'password',
                'department'
            ]
        ],
    "projects"=>[
        "fields" =>[
            'name',
            'description',
            'priority',
            'status'
        ]
],
    "tasks" =>[
        "fields" =>[
            'name',
            'description',
            'priority',
            'status'
        ]
    ],
    "guests " =>[
        "role" => "guest",
    ]
];


