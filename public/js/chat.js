// chat.js

const socket = new WebSocket('ws://localhost:8081/chat'); // Replace with your WebSocket server address

socket.onmessage = function (event) {
    const message = JSON.parse(event.data);
    displayMessage(message);
};

document.getElementById('message-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const messageInput = document.getElementById('message-input');
    const message = {
        sender_id: 1,  // Replace with actual sender ID
        receiver_id: 2, // Replace with actual receiver ID
        message: messageInput.value
    };

    // Send message through WebSocket
    socket.send(JSON.stringify(message));

    // Display the sent message
    displayMessage({
        sender_id: message.sender_id,
        receiver_id: message.receiver_id,
        message: message.message,
        isSent: true
    });

    // Clear the input field
    messageInput.value = '';
});

// Function to display message in chat
function displayMessage(message) {
    const messagesContainer = document.getElementById('messages-container');
    const newMessage = document.createElement('div');
    
    newMessage.classList.add('message');
    
    if (message.isSent) {
        newMessage.classList.add('sent');
    } else {
        newMessage.classList.add('received');
    }
    
    newMessage.textContent = message.message;
    messagesContainer.appendChild(newMessage);
    
    // Scroll to bottom of chat
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}
