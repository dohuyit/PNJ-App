<section id="container-chatbot">
    <!-- Floating Chat Widget -->
    <div class="chat-widget">
        <!-- Chat Button -->
        <div class="chat-button" id="chatButton">
            <i class="fa-solid fa-comments"></i>
        </div>

        <!-- Chat Window -->
        <div class="chat-window" id="chatWindow">
            <div class="chat-header">
                <div class="bot-info">
                    <span class="bot-status"></span>
                    <div>
                        <h5 class="mb-0">Chatbot PNJ</h5>
                        <div class="small">Trợ lý AI thông minh</div>
                    </div>
                </div>
                <button class="close-button" id="closeButton">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="chat-body" id="chatbox">
                <div class="bot-message message-item">
                    <div>Xin chào! Tôi là Gemini BOT, trợ lý AI của bạn. Tôi có thể tư vấn về các sản phẩm trên
                        trang
                        web. Bạn cần giúp gì?</div>
                    <div class="message-time">
                        <span id="current-time"></span>
                    </div>
                </div>

                <div class="typing-indicator" id="typing-indicator">
                    <span class="typing-bubble"></span>
                    <span class="typing-bubble"></span>
                    <span class="typing-bubble"></span>
                </div>
            </div>

            <div class="chat-footer">
                <div class="input-group">
                    <input type="text" id="message" class="form-control" placeholder="Nhập tin nhắn của bạn..."
                        autocomplete="off">
                    <button class="btn-send ms-2" id="send-button">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const chatButton = document.getElementById('chatButton');
            const chatWindow = document.getElementById('chatWindow');
            const closeButton = document.getElementById('closeButton');
            const messageInput = document.getElementById('message');
            const sendButton = document.getElementById('send-button');
            const chatbox = document.getElementById('chatbox');
            const typingIndicator = document.getElementById('typing-indicator');

            // Set current time on first message
            let now = new Date();
            document.getElementById('current-time').textContent = formatTime(now);

            // Toggle chat window
            chatButton.addEventListener('click', function() {
                chatWindow.style.display = 'flex';
                chatWindow.classList.add('fade-in');
                // Scroll to bottom to show latest messages
                chatbox.scrollTop = chatbox.scrollHeight;
            });

            // Close chat window
            closeButton.addEventListener('click', function() {
                chatWindow.style.display = 'none';
                chatWindow.classList.remove('fade-in');
            });

            // Send message function
            function sendMessage() {
                let message = messageInput.value.trim();
                if (!message) return;

                let now = new Date();
                let formattedTime = formatTime(now);

                // Add user message to chat
                chatbox.innerHTML += `
                <div class="user-message message-item">
                    <div>${message}</div>
                    <div class="message-time">${formattedTime}</div>
                </div>
            `;

                // Clear input
                messageInput.value = '';

                // Scroll to bottom
                chatbox.scrollTop = chatbox.scrollHeight;

                // Show typing indicator
                typingIndicator.style.display = 'block';

                // Send request to server
                fetch('/chatbot/send', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            message: message
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Hide typing indicator
                        typingIndicator.style.display = 'none';

                        // Add bot response
                        chatbox.innerHTML += `
                    <div class="bot-message message-item">
                        <div>${data.reply}</div>
                        <div class="message-time">${formatTime(new Date())}</div>
                    </div>
                `;

                        // Scroll to bottom
                        chatbox.scrollTop = chatbox.scrollHeight;
                    })
                    .catch(error => {
                        // Hide typing indicator
                        typingIndicator.style.display = 'none';

                        // Show error message
                        chatbox.innerHTML += `
                    <div class="bot-message message-item">
                        <div>Xin lỗi, có lỗi xảy ra khi xử lý yêu cầu của bạn.</div>
                        <div class="message-time">${formatTime(new Date())}</div>
                    </div>
                `;

                        // Scroll to bottom
                        chatbox.scrollTop = chatbox.scrollHeight;
                    });
            }

            // Send button click
            sendButton.addEventListener('click', sendMessage);

            // Enter key press
            messageInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });

            // Format time
            function formatTime(date) {
                let hours = date.getHours();
                let minutes = date.getMinutes();
                minutes = minutes < 10 ? '0' + minutes : minutes;
                return hours + ':' + minutes;
            }
        });
    </script>
@endpush
