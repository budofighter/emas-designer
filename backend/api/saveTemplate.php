<?php
require_once '../config.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->template)) {
    $template = $data->template;
    
    // Konvertieren Sie das Template-Array in einen String
    $templateString = json_encode($template);
    
    // Speichern Sie den Template-String in Ihrer Datenbank
    $stmt = $pdo->prepare("INSERT INTO templates (content) VALUES (?)");
    $stmt->execute([$templateString]);
    
    $templateId = $pdo->lastInsertId();
    
    echo json_encode(['status' => 'success', 'templateId' => $templateId]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data.']);
}
?>
