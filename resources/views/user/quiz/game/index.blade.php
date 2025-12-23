@extends('user.layouts.app')

@section('content')
    <section class="py-8 bg-gradient-to-br from-blue-50 via-green-50 to-teal-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Game Header --}}
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2">🎮 Pilah Sampah</h1>
                <p class="text-gray-600">Seret sampah ke keranjang yang tepat!</p>
            </div>

            {{-- Game Stats --}}
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                <div class="bg-white rounded-xl shadow-sm p-4 text-center">
                    <div class="text-3xl font-bold text-blue-600" id="score">0</div>
                    <div class="text-sm text-gray-600">Skor</div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-4 text-center">
                    <div class="text-3xl font-bold text-green-600" id="timer">60</div>
                    <div class="text-sm text-gray-600">Waktu (detik)</div>
                </div>
                <div class="hidden md:block bg-white rounded-xl shadow-sm p-4 text-center">
                    <div class="text-3xl font-bold text-purple-600" id="correct">0</div>
                    <div class="text-sm text-gray-600">Benar</div>
                </div>
            </div>

            {{-- Game Board --}}
            <div id="gameBoard" class="space-y-8">

                {{-- Waste Item (Draggable) --}}
                <div class="flex justify-center">
                    <div id="wasteItem" draggable="true"
                        class="bg-white rounded-2xl shadow-lg p-8 cursor-move hover:shadow-xl transition-shadow border-4 border-transparent hover:border-blue-300 active:scale-95">
                        <div class="text-center">
                            <div class="text-6xl mb-4" id="wasteIcon">🍌</div>
                            <div class="text-xl font-bold text-gray-900" id="wasteName">Kulit Pisang</div>
                            <div class="text-sm text-gray-500 mt-2">Seret ke keranjang yang tepat</div>
                        </div>
                    </div>
                </div>

                {{-- Bins (Drop Zones) --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    {{-- Organic Bin --}}
                    <div data-category="organik"
                        class="bin drop-zone bg-gradient-to-br from-green-400 to-green-600 rounded-2xl p-8 text-center text-white shadow-lg transition-all hover:scale-105 border-4 border-transparent">
                        <div class="text-5xl mb-3">🌿</div>
                        <div class="text-2xl font-bold mb-2">Organik</div>
                        <div class="text-sm opacity-90">Sisa makanan, daun, dll</div>
                    </div>

                    {{-- Inorganic Bin --}}
                    <div data-category="anorganik"
                        class="bin drop-zone bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl p-8 text-center text-white shadow-lg transition-all hover:scale-105 border-4 border-transparent">
                        <div class="text-5xl mb-3">♻️</div>
                        <div class="text-2xl font-bold mb-2">Anorganik</div>
                        <div class="text-sm opacity-90">Plastik, kaleng, kertas</div>
                    </div>

                    {{-- B3 Bin --}}
                    <div data-category="b3"
                        class="bin drop-zone bg-gradient-to-br from-red-400 to-red-600 rounded-2xl p-8 text-center text-white shadow-lg transition-all hover:scale-105 border-4 border-transparent">
                        <div class="text-5xl mb-3">⚠️</div>
                        <div class="text-2xl font-bold mb-2">B3</div>
                        <div class="text-sm opacity-90">Baterai, lampu, limbah</div>
                    </div>

                </div>
            </div>

            {{-- Game Over Modal --}}
            <div id="gameOverModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
                <div class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full text-center">
                    <div class="text-6xl mb-4">🎉</div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Waktu Habis!</h2>
                    <div class="text-5xl font-extrabold text-green-600 mb-6" id="finalScore">0</div>
                    <div class="space-y-2 mb-6 text-gray-600">
                        <p>Jawaban Benar: <span class="font-bold text-green-600" id="finalCorrect">0</span></p>
                        <p>Jawaban Salah: <span class="font-bold text-red-600" id="finalWrong">0</span></p>
                    </div>
                    <div class="flex gap-3">
                        <button onclick="restartGame()"
                            class="flex-1 px-6 py-3 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 transition-colors">
                            Main Lagi
                        </button>
                        <a href="{{ route('user.game.index') }}"
                            class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 font-bold rounded-xl hover:bg-gray-300 transition-colors">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Game State
        let gameState = {
            score: 0,
            timeLeft: 60,
            correctAnswers: 0,
            wrongAnswers: 0,
            currentWaste: null,
            isPlaying: false,
            timerInterval: null
        };

        // Waste Data
        const wasteData = [{
                name: 'Kulit Pisang',
                icon: '🍌',
                category: 'organik'
            },
            {
                name: 'Sisa Nasi',
                icon: '🍚',
                category: 'organik'
            },
            {
                name: 'Daun Kering',
                icon: '🍂',
                category: 'organik'
            },
            {
                name: 'Kulit Telur',
                icon: '🥚',
                category: 'organik'
            },
            {
                name: 'Sisa Sayuran',
                icon: '🥬',
                category: 'organik'
            },

            {
                name: 'Botol Plastik',
                icon: '🧴',
                category: 'anorganik'
            },
            {
                name: 'Kaleng Minuman',
                icon: '🥫',
                category: 'anorganik'
            },
            {
                name: 'Kertas Bekas',
                icon: '📄',
                category: 'anorganik'
            },
            {
                name: 'Kardus',
                icon: '📦',
                category: 'anorganik'
            },
            {
                name: 'Botol Kaca',
                icon: '🍾',
                category: 'anorganik'
            },

            {
                name: 'Baterai Bekas',
                icon: '🔋',
                category: 'b3'
            },
            {
                name: 'Lampu Neon',
                icon: '💡',
                category: 'b3'
            },
            {
                name: 'Obat Kadaluarsa',
                icon: '💊',
                category: 'b3'
            },
            {
                name: 'Cat Bekas',
                icon: '🎨',
                category: 'b3'
            },
            {
                name: 'Limbah Elektronik',
                icon: '📱',
                category: 'b3'
            }
        ];

        // DOM Elements
        const wasteItem = document.getElementById('wasteItem');
        const wasteIcon = document.getElementById('wasteIcon');
        const wasteName = document.getElementById('wasteName');
        const scoreDisplay = document.getElementById('score');
        const timerDisplay = document.getElementById('timer');
        const correctDisplay = document.getElementById('correct');
        const gameOverModal = document.getElementById('gameOverModal');
        const bins = document.querySelectorAll('.bin');

        // Initialize Game
        function initGame() {
            gameState.isPlaying = true;
            generateWaste();
            startTimer();
        }

        // Generate Random Waste
        function generateWaste() {
            const randomWaste = wasteData[Math.floor(Math.random() * wasteData.length)];
            gameState.currentWaste = randomWaste;

            wasteIcon.textContent = randomWaste.icon;
            wasteName.textContent = randomWaste.name;

            // Reset item position & visibility
            wasteItem.style.opacity = '1';
            wasteItem.style.transform = 'scale(1)';
        }

        // Timer
        function startTimer() {
            gameState.timerInterval = setInterval(() => {
                gameState.timeLeft--;
                timerDisplay.textContent = gameState.timeLeft;

                // Timer color change
                if (gameState.timeLeft <= 10) {
                    timerDisplay.classList.add('text-red-600');
                }

                if (gameState.timeLeft <= 0) {
                    endGame();
                }
            }, 1000);
        }

        // Drag & Drop Events
        wasteItem.addEventListener('dragstart', (e) => {
            if (!gameState.isPlaying) return;
            e.dataTransfer.effectAllowed = 'move';
            wasteItem.style.opacity = '0.5';
        });

        wasteItem.addEventListener('dragend', () => {
            wasteItem.style.opacity = '1';
        });

        bins.forEach(bin => {
            bin.addEventListener('dragover', (e) => {
                e.preventDefault();
                if (!gameState.isPlaying) return;
                bin.classList.add('border-white', 'scale-105');
            });

            bin.addEventListener('dragleave', () => {
                bin.classList.remove('border-white', 'scale-105');
            });

            bin.addEventListener('drop', (e) => {
                e.preventDefault();
                if (!gameState.isPlaying) return;

                bin.classList.remove('border-white', 'scale-105');

                const droppedCategory = bin.dataset.category;
                checkAnswer(droppedCategory, bin);
            });
        });

        // Check Answer
        function checkAnswer(droppedCategory, bin) {
            const isCorrect = droppedCategory === gameState.currentWaste.category;

            if (isCorrect) {
                // Correct Answer
                gameState.score += 100;
                gameState.correctAnswers++;
                showFeedback(bin, true);
            } else {
                // Wrong Answer
                gameState.wrongAnswers++;
                showFeedback(bin, false);
            }

            // Update UI
            scoreDisplay.textContent = gameState.score;
            correctDisplay.textContent = gameState.correctAnswers;

            // Generate next waste
            setTimeout(() => {
                generateWaste();
            }, 500);
        }

        // Visual Feedback
        function showFeedback(bin, isCorrect) {
            // Animate waste item
            wasteItem.style.transform = 'scale(0)';

            // Show text feedback
            const feedback = document.createElement('div');
            feedback.className =
                `absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-4xl font-bold ${isCorrect ? 'text-green-500' : 'text-red-500'} pointer-events-none`;
            feedback.textContent = isCorrect ? '+100 ✓' : 'Salah ✗';
            bin.appendChild(feedback);

            setTimeout(() => {
                feedback.remove();
            }, 800);
        }

        // End Game
        function endGame() {
            gameState.isPlaying = false;
            clearInterval(gameState.timerInterval);

            // Show modal
            document.getElementById('finalScore').textContent = gameState.score;
            document.getElementById('finalCorrect').textContent = gameState.correctAnswers;
            document.getElementById('finalWrong').textContent = gameState.wrongAnswers;
            gameOverModal.classList.remove('hidden');

            // Save score to backend
            saveScore();
        }

        // Save Score via AJAX
        function saveScore() {
            axios.post('{{ route('user.game.save-score') }}', {
                    score: gameState.score,
                    correct_answers: gameState.correctAnswers,
                    wrong_answers: gameState.wrongAnswers
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    console.log('Score saved:', response.data);
                })
                .catch(error => {
                    console.error('Failed to save score:', error);
                });
        }

        // Restart Game
        function restartGame() {
            // Reset state
            gameState = {
                score: 0,
                timeLeft: 60,
                correctAnswers: 0,
                wrongAnswers: 0,
                currentWaste: null,
                isPlaying: false,
                timerInterval: null
            };

            // Reset UI
            scoreDisplay.textContent = '0';
            timerDisplay.textContent = '60';
            correctDisplay.textContent = '0';
            timerDisplay.classList.remove('text-red-600');
            gameOverModal.classList.add('hidden');

            // Start new game
            initGame();
        }

        // Start game on page load
        initGame();
    </script>
@endsection
