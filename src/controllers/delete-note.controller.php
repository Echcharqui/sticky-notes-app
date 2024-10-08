<?php

use HotelEcho\Php\Utilities\Utilities;
use HotelEcho\Php\Models\Notes;

$noteId = isset($_GET['id']) ? $_GET['id'] : null;
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$noteId || !$userId) {
    error_log("Invalid request: Missing note ID or user ID.");
    Utilities::abort(404); // Bad request if id or user_id is not set
}

try {
    $note = new Notes();

    // Fetch the note to check if it exists and belongs to the user
    $theNote = $note->getOneNote($noteId);

    if ($theNote) {
        // Delete the note
        $rowsAffected = $note->deleteOneNote($noteId);

        if ($rowsAffected > 0) {
            error_log("Note deleted successfully: ID $noteId by User $userId.");

            // Set success message and redirect
            $_SESSION['success'] = 'Note deleted successfully!';
            header("Location: /");
            exit();
        } else {
            error_log("Failed to delete note: ID $noteId.");
            Utilities::abort(500); // Internal server error if deletion fails
        }
    } else {
        error_log("Note not found or access denied: ID $noteId.");
        Utilities::abort(404); // Note not found or access denied
    }
} catch (PDOException $exception) {
    error_log("Database error: " . $exception->getMessage());
    Utilities::abort(500); // Internal server error on exception
}
