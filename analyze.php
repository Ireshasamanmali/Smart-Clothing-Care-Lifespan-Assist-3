<?php
require_once '../config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response('error', 'Invalid request method');
}

$category = sanitize_input($_POST['category'] ?? 'Garment');
$fabric = sanitize_input($_POST['fabric'] ?? 'Cotton');
$color = sanitize_input($_POST['color'] ?? 'Standard');
$details = sanitize_input($_POST['details'] ?? '');

// Handle optional file upload
$uploaded_file_path = null;
if (isset($_FILES['clothing_photo']) && $_FILES['clothing_photo']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $fileTmpPath = $_FILES['clothing_photo']['tmp_name'];
    $fileName = time() . '_' . basename($_FILES['clothing_photo']['name']);
    $destPath = $uploadDir . $fileName;
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        $uploaded_file_path = 'uploads/' . $fileName;
    }
}

// Generate grounded recommendation rules
$recommendation = [
    'category' => $category,
    'fabric' => $fabric,
    'color' => $color,
    'image' => $uploaded_file_path,
    'washing' => 'Machine wash inside out or hand wash in cold water.',
    'water_temp' => 'Cold water (30°C) to prevent dye hydrolysis and fiber weakening in tropical humidity.',
    'detergent' => 'Mild liquid detergent (avoid excess powder detergent to prevent stiff mineral residue).',
    'drying' => 'Line dry inside out in shaded area with high cross-ventilation.',
    'ironing' => 'Medium heat setting with steam press.',
    'storage' => 'Store in breathable garment bags with 2 inches space between hangers.',
    'humidity_tip' => 'Ensure 100% complete dryness at thick seams before closet storage to avoid mold spores.'
];

if ($fabric === 'Silk') {
    $recommendation['washing'] = 'Cold hand wash with pH-neutral silk liquid detergent only.';
    $recommendation['ironing'] = 'Low heat (110°C) without steam on the reverse side.';
    $recommendation['humidity_tip'] = 'Critical humidity risk: Air silk garments regularly to prevent moisture-induced color bleeding and fiber degradation.';
} elseif ($fabric === 'Denim') {
    $recommendation['washing'] = 'Cold water wash inside out to preserve indigo dye molecules.';
    $recommendation['drying'] = 'Hang upside down by hem in shaded outdoors or airy indoor rack.';
} elseif ($fabric === 'Wool') {
    $recommendation['washing'] = 'Delicate cold hand wash with specialized wool detergent.';
    $recommendation['drying'] = 'Dry flat on a dry towel away from direct sunlight or heat.';
}

// Save to Database if PDO is connected
if ($pdo) {
    try {
        $stmt = $pdo->prepare("INSERT INTO wardrobe_items (category_id, fabric_id, color, item_name, details, image_path) VALUES (1, 1, :color, :item_name, :details, :image_path)");
        $stmt->execute([
            ':color' => $color,
            ':item_name' => "$color $fabric $category",
            ':details' => $details,
            ':image_path' => $uploaded_file_path ?? ''
        ]);
    } catch (Exception $e) {
        // Silently capture DB log if operating in standalone preview mode
    }
}

json_response('success', 'Analysis complete', $recommendation);
?>
