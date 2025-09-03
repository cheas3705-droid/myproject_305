<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'required' => 'វាល :attribute គឺត្រូវការបំពេញ។',
    'unique' => 'វាល :attribute នេះមានរួចហើយ។',
    'max' => [
        'string' => 'វាល :attribute មិនអាចលើស :max តួអក្សរ។',
    ],

    // Custom message for specific field
    'custom' => [
        'category_name' => [
            'required' => 'សូមបញ្ចូលឈ្មោះប្រភេទផលិតផល។',
            'unique' => 'ឈ្មោះប្រភេទផលិតផលនេះមានរួចហើយ។',
        ],
    ],

    // Optional: Replace attribute names with Khmer labels
    'attributes' => [
        'category_name' => 'ឈ្មោះប្រភេទផលិតផល',
        'note' => 'ចំណាំ',
    ],
];
