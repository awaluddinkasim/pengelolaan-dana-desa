<?php

return [
  [
    'active' => 'dashboard',
    'label' => 'Dashboard',
    'icon' => 'layout-dashboard',
    'route-name' => 'dashboard',
    'admin-only' => false,
  ],
  [
    'active' => 'keuangan',
    'label' => 'Keuangan',
    'icon' => 'banknote',
    'submenu' => [
      [
        'active' => 'apbd',
        'label' => 'APBD',
        'route-name' => 'apbd.index'
      ],
      [
        'active' => 'penerimaan-dana',
        'label' => 'Penerimaan Dana',
        'route-name' => 'penerimaan-dana.index'
      ],
      [
        'active' => 'pengeluaran',
        'label' => 'Pengeluaran',
        'route-name' => 'pengeluaran.index'
      ]
    ],
    'admin-only' => false,
  ],
  [
    'active' => 'publikasi',
    'label' => 'Publikasi',
    'icon' => 'file-up',
    'route-name' => 'publikasi.index',
    'admin-only' => false,
  ],
  [
    'active' => 'pengguna',
    'label' => 'Pengguna',
    'icon' => 'users',
    'route-name' => 'pengguna.index',
    'admin-only' => true,
  ]
];
