<?php
require_once '../config.php';

// Hier können Sie den Template-String aus Ihrer Datenbank abrufen.
// Zum Beispiel:
$stmt = $pdo->prepare("SELECT content FROM templates WHERE id = ?");
$stmt->execute([$_GET['id']]);
$template = $stmt->fetch();

if($template) {
    echo json_encode(['status' => 'success', 'template' => $template['content']]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Template not found.']);
}
?>
