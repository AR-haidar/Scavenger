<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>testing</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <style>
        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            display: none;
            /* Sembunyi dulu */
            margin: 10px ;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .result-card {
            display: none;
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            color: white;
            font-weight: bold;
        }

        .bg-organik {
            background-color: #2ecc71;
        }

        .bg-anorganik {
            background-color: #f1c40f;
            color: black;
        }

        .bg-b3 {
            background-color: #e74c3c;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>AI Waste Scanner 🤖</h2>

        <form id="aiForm">
            <div class="form-group">
                <label>Upload Foto Sampah (Prioritas)</label>
                <input type="file" id="imageInput" name="image" accept="image/*">
            </div>

            <p style="text-align: center; font-weight: bold; width: 300px">--- ATAU ---</p>

            <div class="form-group">
                <label>Deskripsikan Sampah</label>
                <br>
                <textarea id="textInput" name="text" rows="3" placeholder="Contoh: Kulit pisang busuk berwarna coklat"></textarea>
            </div>

            <button type="submit" id="btnSubmit">🔍 Analisis Sekarang</button>

            <div id="loadingSpinner" class="loader"></div>
        </form>

        <div id="resultArea" class="result-card">
            <h3>Hasil Analisis:</h3>

            <p><strong>Nama Sampah:</strong> <span id="resName">-</span></p>

            <p><strong>Kategori:</strong>
                <span id="resCategory" class="badge">-</span>
            </p>

            <p><strong>Saran Pengolahan:</strong><br>
                <span id="resSuggestion">-</span>
            </p>

            <p><strong>Dampak Lingkungan:</strong><br>
                <span id="resImpact">-</span>
            </p>
        </div>
    </div>

    <script>
        document.getElementById('aiForm').addEventListener('submit', function(e) {
            e.preventDefault(); // 1. Tahan biar gak reload halaman

            // Ambil elemen
            let formData = new FormData(this);
            let btnSubmit = document.getElementById('btnSubmit');
            let loading = document.getElementById('loadingSpinner');
            let resultArea = document.getElementById('resultArea');

            // Reset Tampilan
            resultArea.style.display = 'none';
            btnSubmit.disabled = true;
            btnSubmit.innerText = 'Sedang Menganalisis...';
            loading.style.display = 'block';

            // 2. Kirim Request via Axios
            axios.post('{{ route('user.eksplorasi.store') }}', formData, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    // 3. SUKSES (HTTP 200)
                    let data = response.data.data; // Masuk ke object 'data' dari Controller

                    // Isi HTML dengan data dari AI
                    document.getElementById('resName').innerText = data.waste_name;
                    document.getElementById('resSuggestion').innerText = data.processing_suggestion;
                    document.getElementById('resImpact').innerText = data.environmental_impact;

                    // Atur warna badge kategori
                    let badge = document.getElementById('resCategory');
                    badge.innerText = data.category.toUpperCase();

                    // Reset class lama & tambah class baru sesuai kategori
                    badge.className = 'badge';
                    if (data.category.toLowerCase().includes('organik')) badge.classList.add('bg-organik');
                    else if (data.category.toLowerCase().includes('b3')) badge.classList.add('bg-b3');
                    else badge.classList.add('bg-anorganik');

                    // Munculkan hasil
                    resultArea.style.display = 'block';
                })
                .catch(function(error) {
                    // 4. ERROR (HTTP 400/500)
                    console.error(error);
                    let msg = "Terjadi kesalahan.";

                    if (error.response && error.response.data && error.response.data.message) {
                        msg = error.response.data.message; // Pesan dari Controller lu
                    }

                    alert("Gagal: " + msg);
                })
                .finally(function() {
                    // 5. FINISHING (Reset Tombol)
                    btnSubmit.disabled = false;
                    btnSubmit.innerText = '🔍 Analisis Sekarang';
                    loading.style.display = 'none';
                });
        });
    </script>
</body>

</html>
