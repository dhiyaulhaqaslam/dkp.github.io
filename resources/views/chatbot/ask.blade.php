@extends('layouts.main2')

@section('content')
    <div class="container max-w-4xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md max-w-4xl mx-auto">
            <!-- Chat Container -->
            <div id="chat-container" class="space-y-4 h-96 overflow-y-auto border border-gray-300 dark:border-gray-600 p-2">
                <!-- Placeholder awal chatbot -->
                <div class="chat-message bot-message flex items-start">
                    <div
                        class="bot-avatar bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center text-xs">
                        B</div>
                    <div
                        class="message bg-blue-100 dark:bg-gray-700 p-2 rounded-lg max-w-xs ml-2 text-black dark:text-gray-300">
                        <p class="text-sm">Hello! How can I assist you today?</p>
                    </div>
                </div>
            </div>

            <!-- Input form -->
            <form id="chat-form" class="mt-4 flex items-center">
                <input type="text" id="user-message"
                    class="form-input p-2 w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800"
                    placeholder="Type your message..." required>
                <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg">Send</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('chat-form').addEventListener('submit', function(e) {
            e.preventDefault();

            var message = document.getElementById('user-message').value;
            if (message) {
                var chatContainer = document.getElementById('chat-container');

                // Tambahkan pesan pengguna
                var userMessageDiv = document.createElement('div');
                userMessageDiv.classList.add('chat-message', 'user-message', 'flex', 'items-start', 'justify-end');
                userMessageDiv.innerHTML = `
                    <div class="message bg-indigo-100 dark:bg-indigo-600 text-black dark:text-white p-2 rounded-lg max-w-xs mr-2">
                        <p class="text-sm">${message}</p>
                    </div>
                    <div class="user-avatar bg-indigo-600 dark:bg-indigo-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-xs">U</div>
                `;
                chatContainer.appendChild(userMessageDiv);

                // Tambahkan indikator mengetik
                var typingIndicator = document.createElement('div');
                typingIndicator.id = 'typing-indicator';
                typingIndicator.classList.add('chat-message', 'bot-message', 'flex', 'items-start');
                typingIndicator.innerHTML = `
                    <div class="bot-avatar bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center text-xs">B</div>
                    <div class="message bg-blue-100 dark:bg-gray-700 text-black dark:text-gray-300 p-2 rounded-lg max-w-xs ml-2">
                        <p class="text-sm">Typing...</p>
                    </div>
                `;
                chatContainer.appendChild(typingIndicator);

                // Scroll ke bawah untuk melihat indikator mengetik
                chatContainer.scrollTop = chatContainer.scrollHeight;

                // Kirim pertanyaan ke backend
                fetch('/chatbot/chat', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content'),
                        },
                        body: JSON.stringify({
                            pertanyaan: message
                        }),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        // Tambahkan delay sebelum menghapus indikator dan menampilkan jawaban
                        setTimeout(() => {
                            // Hapus indikator mengetik
                            document.getElementById('typing-indicator').remove();

                            // Tampilkan jawaban dari chatbot huruf demi huruf
                            var botMessageDiv = document.createElement('div');
                            botMessageDiv.classList.add('chat-message', 'bot-message', 'flex',
                                'items-start');
                            botMessageDiv.innerHTML = `
                                <div class="bot-avatar bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center text-xs">B</div>
                                <div class="message bg-blue-100 dark:bg-gray-700 text-black dark:text-gray-300 p-2 rounded-lg max-w-xs ml-2">
                                    <p class="text-sm"></p>
                                </div>
                            `;
                            chatContainer.appendChild(botMessageDiv);

                            var messageContainer = botMessageDiv.querySelector('.message p');
                            var answerText = data.jawaban;
                            var currentCharIndex = 0;

                            function typeNextChar() {
                                if (currentCharIndex < answerText.length) {
                                    messageContainer.textContent += answerText[currentCharIndex];
                                    currentCharIndex++;
                                    setTimeout(typeNextChar,
                                    10); // Kecepatan pengetikan (50ms per huruf)
                                }
                            }
                            typeNextChar();

                            // Scroll ke pesan terbaru
                            chatContainer.scrollTop = chatContainer.scrollHeight;
                        }, 600); // Penundaan sebelum jawaban muncul
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });

                // Kosongkan input
                document.getElementById('user-message').value = '';
            }
        });
    </script>
@endsection
