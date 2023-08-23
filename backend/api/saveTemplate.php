<?php
require_once '../config.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->template) && isset($data->templateName)) {
    $template = $data->template;
    $templateName = $data->templateName;  // Extrahieren Sie den templateName
    
    // Generieren Sie den Zeitstempel
    $timestamp = time();
    
    // Erstellen Sie die neue TemplateID
    $templateId = $templateName . '_' . $timestamp;
    
    // Konvertieren Sie das Template-Array in einen String
    $templateString = json_encode($template);
    
    // Speichern Sie den Template-String, den templateName und die neue TemplateID in Ihrer Datenbank
    $stmt = $pdo->prepare("INSERT INTO templates (content, templateName, templateId) VALUES (?, ?, ?)");
    if ($stmt->execute([$templateString, $templateName, $templateId])) {
        echo json_encode(['status' => 'success', 'templateId' => $templateId]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Fehler: ' . implode(", ", $stmt->errorInfo())]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data.']);
}
?>
