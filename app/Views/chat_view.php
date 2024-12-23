<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="<?= base_url('css/chat.css') ?>">
</head>

<body>
    <div id="chat-window">
        <div id="messages-container">
            <!-- Messages will appear here -->
        </div>
        <form id="message-form">
            <input type="text" id="message-input" placeholder="Tulis pesan..." required>
            <button type="submit" id="send-button">Kirim</button>
        </form>
    </div>

    <script src="<?= base_url('js/chat.js') ?>"></script>
</body>

</html>