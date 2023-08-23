<?php
require_once '../config.php';

// Überprüfen, ob die TemplateID im GET-Parameter vorhanden ist
if(isset($_GET['id'])) {
    $templateId = $_GET['id'];  // Die neue TemplateID aus dem GET-Parameter holen

    // Hier können Sie den Template-String und den templateName aus Ihrer Datenbank abrufen.
    $stmt = $pdo->prepare("SELECT content, templateName FROM templates WHERE templateId = ?");
    $stmt->execute([$templateId]);
    $template = $stmt->fetch();

    if($template) {
        echo json_encode([
            'status' => 'success', 
            'template' => $template['content'],
            'templateName' => $template['templateName']  // Fügen Sie den templateName hinzu
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Template not found.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid or missing TemplateID.']);
}
?>