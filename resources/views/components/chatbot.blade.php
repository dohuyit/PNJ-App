@push('link')
    <style>
        /* Floating Chat Widget */
        .chat-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }

        /* Chat Button (Circle) */
        .chat-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #4361ee;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .chat-button:hover {
            background-color: #3a56e4;
            transform: scale(1.05);
        }

        .chat-button i {
            font-size: 24px;
        }

        /* Chat Window */
        .chat-window {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 350px;
            height: 450px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: none;
            flex-direction: column;
            overflow: hidden;
            transition: all 0.3s ease;
            z-index: 9998;
        }

        /* Chat Header */
        .chat-header {
            background-color: #4361ee;
            color: white;
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-header .bot-info {
            display: flex;
            align-items: center;
        }

        .chat-header .bot-status {
            width: 12px;
            height: 12px;
            background-color: #4ade80;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .chat-header .close-button {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            padding: 0;
            margin-left: 10px;
        }

        /* Chat Body */
        .chat-body {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .message-item {
            max-width: 75%;
            margin-bottom: 15px;
            padding: 12px 15px;
            border-radius: 15px;
            position: relative;
            word-wrap: break-word;
        }

        .user-message {
            align-self: flex-end;
            background-color: #4361ee;
            color: white;
            border-bottom-right-radius: 5px;
        }

        .bot-message {
            align-self: flex-start;
            background-color: #f0f2f5;
            color: #333;
            border-bottom-left-radius: 5px;
        }

        .message-time {
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.7);
            text-align: right;
            margin-top: 5px;
        }

        .bot-message .message-time {
            color: rgba(0, 0, 0, 0.5);
        }

        /* Typing Indicator */
        .typing-indicator {
            display: none;
            align-self: flex-start;
            background-color: #f0f2f5;
            padding: 8px 15px;
            border-radius: 15px;
            margin-bottom: 15px;
            border-bottom-left-radius: 5px;
        }

        .typing-bubble {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #999;
            margin-right: 4px;
            animation: typing 1s infinite ease-in-out;
        }

        .typing-bubble:nth-child(1) {
            animation-delay: 0s;
        }

        .typing-bubble:nth-child(2) {
            animation-delay: 0.3s;
        }

        .typing-bubble:nth-child(3) {
            animation-delay: 0.6s;
        }

        @keyframes typing {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* Chat Footer */
        .chat-footer {
            padding: 15px;
            background-color: #fff;
            border-top: 1px solid #e6e6e6;
        }

        .input-group {
            background-color: #f0f2f5;
            border-radius: 30px;
            padding: 5px;
        }

        .form-control {
            border: none;
            background-color: transparent;
            padding-left: 15px;
        }

        .form-control:focus {
            outline: none;
            box-shadow: none;
        }

        .btn-send {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #4361ee;
            color: white;
            border: none;
            padding: 0;
        }

        .btn-send i {
            font-size: 1.2rem;
        }

        .btn-send:hover {
            background-color: #3a56e4;
        }

        .form-control:focus {
            background-color: transparent !important;
            outline: 0;
        }

        /* Show animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.3s ease forwards;
        }
    </style>
@endpush

<section id="container-chatbot">
    <!-- Floating Chat Widget -->
    <div class="chat-widget">
        <!-- Chat Button -->
        <div class="chat-button" id="chatButton">
            <i class="bi bi-chat-dots-fill"></i>
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
