<?php

return [
    'signal_config' => [
        'types' => [
            'strict',
            'full'
        ],
        'type' => 'full',
        'value' => 100,
    ],
    'signal_types' => [
        'Cheque' => ['name' => 'Cheque', 'active' => false, 'native' => true],
        'Crédito' => ['name' => 'Crédito', 'active' => false, 'native' => true],
        'Boleto' => ['name' => 'Boleto', 'active' => false, 'native' => true],
        'Dinheiro' => ['name' => 'Dinheiro', 'active' => true, 'native' => true],
        'Débito' => ['name' => 'Débito', 'active' => false, 'native' => true],
        'Pix' => ['name' => 'Pix', 'active' => true, 'native' => true],
        'Depósito/Transferência' => ['name' => 'Depósito/Transferência', 'active' => false, 'native' => true],
    ],

    'payments_config' => [
        'limit_days_before_event' => 15,
    ],

    'payments_types' => [
        'Cheque' => ['name' => 'Cheque', 'active' => false, 'native' => true],
        'Crédito' => ['name' => 'Crédito', 'active' => false, 'native' => true],
        'Boleto' => ['name' => 'Boleto', 'active' => false, 'native' => true],
        'Dinheiro' => ['name' => 'Dinheiro', 'active' => true, 'native' => true],
        'Débito' => ['name' => 'Débito', 'active' => false, 'native' => true],
        'Pix' => ['name' => 'Pix', 'active' => true, 'native' => true],
        'Depósito/Transferência' => ['name' => 'Depósito/Transferência', 'active' => false, 'native' => true],
    ],
];
