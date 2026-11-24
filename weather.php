<?php
require_once '../config.php';

header('Content-Type: application/json');

$condition = sanitize_input($_GET['condition'] ?? 'Rainy');

$weather_rules = [
    'Rainy' => [
        'condition' => 'Monsoon / Continuous Heavy Rain',
        'drying_strategy' => 'Use indoor drying racks paired with an electric fan or dehumidifier. Run an extra spin cycle in your washing machine.',
        'storage_strategy' => 'Maintain 2 to 3 inches of space between closet hangers. Use breathable cotton garment bags.',
        'mold_tip' => 'Ensure 100% complete dryness at thick seams before storage. Use silica gel packets in wardrobe corners.'
    ],
    'High Humidity' => [
        'condition' => 'High Ambient Humidity',
        'drying_strategy' => 'Shade drying with active cross-ventilation. Avoid hanging damp clothes directly against walls.',
        'storage_strategy' => 'Open wardrobe doors during sunny mornings to allow fresh air circulation.',
        'mold_tip' => 'Wipe wardrobe shelves with diluted vinegar solution to neutralize fungal spores.'
    ],
    'Sunny' => [
        'condition' => 'Hot & Sunny Weather',
        'drying_strategy' => 'Wash colored clothes inside out and dry in covered shade to protect dyes from strong UV degradation.',
        'storage_strategy' => 'Store in cool, dark closets away from direct window sunlight.',
        'mold_tip' => 'Sunlight is natural disinfectant, but excessive UV exposure weakens cotton fibers.'
    ],
    'Indoor Drying' => [
        'condition' => 'Indoor Drying Difficulties',
        'drying_strategy' => 'Spread clothes evenly across indoor airers. Place smaller items near fan airflow.',
        'storage_strategy' => 'Do not stack damp garments in laundry baskets; air them out immediately.',
        'mold_tip' => 'Airflow is key to preventing damp, musty bacterial odors during indoor drying.'
    ]
];

$data = $weather_rules[$condition] ?? $weather_rules['Rainy'];

json_response('success', 'Weather guidance retrieved', $data);
?>
