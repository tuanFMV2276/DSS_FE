<?php
return [
    // ...
    'default_font' => 'DejaVu Sans',

    'font_dir' => base_path('storage/fonts/'), // Chỉ định thư mục chứa font

    'font_cache' => storage_path('fonts/'), // Chỉ định thư mục cache font

    'font_height_ratio' => 1.1,

    'fonts' => [
        'DejaVu Sans' => [
            'R' => 'DejaVuSans.ttf',
            'B' => 'DejaVuSans-Bold.ttf',
            'I' => 'DejaVuSans-Oblique.ttf',
            'BI' => 'DejaVuSans-BoldOblique.ttf',
        ],
        'Roboto' => [
            'R' => 'Roboto-Regular.ttf',
            'B' => 'Roboto-Bold.ttf',
            'I' => 'Roboto-Italic.ttf',
            'BI' => 'Roboto-BoldItalic.ttf',
        ],
    ],
];
