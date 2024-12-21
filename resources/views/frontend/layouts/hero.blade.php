<!-- Hero Section -->
<section class="bg-cover bg-center" style="background-image: url('{{ asset('assets/img/herobg.jpg') }}');">
    <div
        class="min-h-screen flex items-center bg-gradient-to-t from-yellow-500/80 to-green-500/80 justify-center px-16 md:px-8 lg:px-16">
        <div class="mx-auto md:gap-8 lg:py-16 lg:px-16 ">
            <!-- Teks Hero -->
            <div class="place-self-center col-span-2 lg:text-left">
                <div>
                    <img src="{{ asset('assets/img/fgng.png') }}" alt="fgng-logo"
                        class="w-52 lg:w-60 justify-self-center pb-2 lg:pb-10">
                    <p class="font-sans text-sm font-semibold md:text-xl lg:text-2xl text-white lg:mb-5">
                        Senin, 20 Januari 2025 | 9:00AM WIT
                    </p>
                    <h1
                        class="font-sans text-4xl md:text-4xl lg:text-5xl font-extrabold tracking-tight leading-none text-white mb-4">
                        {{ $websiteTitle }}
                    </h1>

                </div>

                <!-- Waktu Hitung Mundur -->
                <div class="mb-6">
                    <div id="countdown"
                        class="text-xl md:text-2xl flex justify-center lg:justify-center gap-2 font-semibold text-green-400 font-shadow-xl">
                        <div class="block w-16 md:w-20 bg-white p-2 rounded text-center shadow-lg">
                            <span class="font-sans font-bold" id="days">00</span>
                            <div class="text-xs md:text-sm text-green-400 mt-1 font-bold">Hari</div>
                        </div>
                        <div class="block w-16 md:w-20 bg-white p-2 rounded text-center shadow-lg">
                            <span class="font-sans font-bold" id="hours">00</span>
                            <div class="text-xs md:text-sm text-green-400 mt-1 font-bold">Jam</div>
                        </div>
                        <div class="block w-16 md:w-20 bg-white p-2 rounded text-center shadow-lg">
                            <span class="font-sans font-bold" id="minutes">00</span>
                            <div class="text-xs md:text-sm text-green-400 mt-1 font-bold">Menit</div>
                        </div>
                        <div class="block w-16 md:w-20 bg-white p-2 rounded text-center shadow-lg">
                            <span class="font-sans font-bold" id="seconds">00</span>
                            <div class="text-xs md:text-sm text-green-400 mt-1 font-bold">Detik</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Script Hitung Mundur -->
<script>
    // Mendefinisikan waktu target acara dari Blade
    var eventDate = new Date("{{ $settings['tanggal_event'] }}").getTime();

    // Fungsi untuk update hitungan mundur setiap detik
    var countdownTimer = setInterval(function() {
        // Mendapatkan waktu saat ini
        var now = new Date().getTime();

        // Jarak antara waktu sekarang dan event
        var distance = eventDate - now;

        // Kalkulasi hari, jam, menit, detik
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Menampilkan hasil dalam elemen dengan id="countdown"
        document.getElementById("days").textContent = days < 10 ? "0" + days : days;
        document.getElementById("hours").textContent = hours < 10 ? "0" + hours : hours;
        document.getElementById("minutes").textContent = minutes < 10 ? "0" + minutes : minutes;
        document.getElementById("seconds").textContent = seconds < 10 ? "0" + seconds : seconds;

        // Jika hitungan mundur selesai
        if (distance < 0) {
            clearInterval(countdownTimer);
            document.getElementById("countdown").innerHTML = "";
        }
    }, 1000);
</script>