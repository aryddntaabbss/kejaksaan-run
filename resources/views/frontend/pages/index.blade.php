@extends('frontend.layouts.main')

@section('body')
@include('frontend.layouts.header')
@include('frontend.layouts.hero')
@php
$tanggalEvent = \Carbon\Carbon::parse($settings['tanggal_event']);
@endphp
<!-- Pricing Section -->
<section id="pendaftaran" class="mx-auto pb-12 px-4 max-w-5xl">
    <h2 class="font-sans text-3xl font-bold text-green-400 text-center pt-16" data-aos="fade-up">PENDAFTARAN</h2>
    <p class="font-sans text-sm text-center md:text-xl lg:text-xl text-gray-500 lg:my-5 my-2" data-aos="fade-up">
        MULAI DARI 23 DESEMBER 2024 - 16 JANUARI 2025
    </p>
    <div class=" grid grid-cols-1 md:grid-cols-2 gap-6 md:mx-40">
        @foreach ($road_race as $road_races)
        @if ($road_races->paling_laris == 1)
        <!-- Card dengan Border Kuning -->
        <div class="border-2 border-green-400 rounded-lg text-center shadow-xl" data-aos="fade-up">
            <h3 class="text-md w-36 rounded-b-md lg:ml-20 ml-28  font-bold bg-green-400 text-white">PALING LARIS
            </h3>
            <div class="p-6">
                <h3 class="text-5xl font-bold text-gray-600 mb-2">{{ $road_races->nama }} <span
                        class="text-base">KM</span>
                </h3>
                <div class="text-2xl font-bold text-green-400 mb-2">Rp. {{ $road_races->biaya }}</div>
                @if (!$tanggalEvent->isPast())
                <a href="{{ route('daftar', $road_races->id) }}"
                    class="block py-2 px-4 mt-9 bg-green-400 text-white rounded-lg hover:bg-green-500 mb-4">
                    Pilih Paket
                </a>
                @endif
                <ul class="text-sm text-gray-400 space-y-2 mb-4 text-left">
                    <li>🟢 Jersey Running</li>
                    <li>🟢 Medali</li>
                    <li>🟢 BIB</li>
                    @if ($road_races->nama == 21)
                    <li>🟢 Jersey Finisher</li>
                    @endif
                </ul>
            </div>
        </div>
        @else
        <!-- Card tanpa Border -->
        <div class="rounded-lg my-6 p-6 text-center shadow-xl" data-aos="fade-up">
            <h3 class="font-sans text-5xl font-bold text-gray-600 mb-2">{{ $road_races->nama }} <span
                    class="text-base">KM</span>
            </h3>
            <div class="font-sans text-2xl font-bold text-green-400 mb-2">Rp. {{ $road_races->biaya }}</div>
            @if (!$tanggalEvent->isPast())
            <a href="{{ route('daftar', $road_races->id) }}"
                class="block py-2 px-4 mt-9 bg-green-400 text-white rounded-lg hover:bg-green-500 mb-4">
                Pilih Paket
            </a>
            @endif
            <ul class="text-sm text-gray-400 space-y-2 mb-4 text-left">
                <li>🟢 Jersey Running</li>
                <li>🟢 Medali</li>
                <li>🟢 BIB</li>
                @if ($road_races->nama == 21)
                <li>🟢 Jersey Finisher</li>
                @endif
            </ul>
        </div>
        @endif
        @endforeach
    </div>
</section>

<!-- Tentang Section -->
<section id="about" class="mx-auto bg-yellow-500 px-2 py-5 flex flex-col md:flex-row gap-2 justify-center items-center">

    <!-- Image -->
    {{-- <div class="lg:flex lg:col-span-5 justify-end items-center" data-aos="fade-right">
        <img src="{{ asset('storage/' . ($tentang->gambar_tentang ?? 'tentang.png')) }}" alt="Tentang Image"
    class="h-auto max-h-[300px] object-contain rounded-lg shadow-lg">
    </div> --}}

    <!-- Galeri -->
    <div class="grid grid-cols-3 md:grid-cols-3 px-2 gap-2">
        <!-- Gambar 1 -->
        <div class="row-span-2" data-aos="fade-up">
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0040.jpg') }}" alt="Gambar 1"
                class="w-32 h-auto object-cover shadow cursor-pointer" onclick="openModal('modal1')">
        </div>
        <!-- Gambar 2 -->
        <div class="row-span-2" data-aos="fade-up">
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0043.jpg') }}" alt="Gambar 2"
                class="w-32 h-auto object-cover shadow cursor-pointer" onclick="openModal('modal2')">
        </div>
        <!-- Gambar 3 -->
        <div class="row-span-2" data-aos="fade-up">
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0034.jpg') }}" alt="Gambar 3"
                class="w-32 h-auto object-cover shadow cursor-pointer" onclick="openModal('modal3')">
        </div>
        <!-- Gambar 4 -->
        <div class="row-span-2" data-aos="fade-up">
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0036.jpg') }}" alt="Gambar 4"
                class="w-32 h-auto object-cover shadow cursor-pointer" onclick="openModal('modal4')">
        </div>
        <!-- Gambar 5 -->
        <div class="row-span-2" data-aos="fade-up">
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0035.jpg') }}" alt="Gambar 5"
                class="w-32 h-auto object-cover shadow cursor-pointer" onclick="openModal('modal5')">
        </div>
        <!-- Gambar 6 -->
        <div class="row-span-2" data-aos="fade-up">
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0039.jpg') }}" alt="Gambar 6"
                class="w-32 h-auto object-cover shadow cursor-pointer" onclick="openModal('modal6')">
        </div>
    </div>

    <!-- Modal Popup -->
    <div id="modal1" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center z-50">
        <div class="relative">
            <button class="absolute top-0 right-3 text-white p-auto rounded-full text-3xl"
                onclick="closeModal('modal1')">&times;</button>
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0040.jpg') }}"
                class="max-w-full max-h-screen object-contain">
        </div>
    </div>

    <div id="modal2" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center z-50">
        <div class="relative">
            <button class="absolute top-0 right-3 text-white m-2 rounded-full text-3xl p-2"
                onclick="closeModal('modal2')">&times;</button>
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0043.jpg') }}"
                class="max-w-full max-h-screen object-contain">
        </div>
    </div>

    <div id="modal3" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center z-50">
        <div class="relative">
            <button class="absolute top-0 right-3 text-white m-2 rounded-full text-3xl p-2"
                onclick="closeModal('modal3')">&times;</button>
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0034.jpg') }}"
                class="max-w-full max-h-screen object-contain">
        </div>
    </div>

    <div id="modal4" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center z-50">
        <div class="relative">
            <button class="absolute top-0 right-3 text-white m-2 rounded-full text-3xl p-2"
                onclick="closeModal('modal4')">&times;</button>
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0036.jpg') }}"
                class="max-w-full max-h-screen object-contain">
        </div>
    </div>

    <div id="modal5" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center z-50">
        <div class="relative">
            <button class="absolute top-0 right-3 text-white m-2 rounded-full text-3xl p-2"
                onclick="closeModal('modal5')">&times;</button>
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0035.jpg') }}"
                class="max-w-full max-h-screen object-contain">
        </div>
    </div>

    <div id="modal6" class="hidden fixed inset-0 bg-gray-900 bg-opacity-75 flex justify-center items-center z-50">
        <div class="relative">
            <button class="absolute top-0 right-3 text-white m-2 rounded-full text-3xl p-2"
                onclick="closeModal('modal6')">&times;</button>
            <img src="{{ asset('assets/img/funrun/IMG-20241221-WA0039.jpg') }}"
                class="max-w-full max-h-screen object-contain">
        </div>
    </div>

    <!-- Text -->
    <div class="w-full md:w-1/2 md:pl-8 text-gray-100 px-2" data-aos="fade-up">
        <h2 class="font-sans text-3xl font-bold my-4">TENTANG KAMI</h2>
        <p class="text-justify">
            {!! $tentang->deskripsi_tentang ?? 'Tentang kami tidak ditemukan.' !!}
        </p>

    </div>

</section>

<!-- Kategori Section -->
<section id="kategori" class="mx-auto px-4 text-center py-8">
    <h2 class="font-sans text-3xl font-bold text-green-400 mb-4" data-aos="fade-up">KATEGORI PELARI</h2>
    <div class="sm:mt-8 bg-cover bg-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6 py-8 md:px-8 justify-items-center"
        data-aos="zoom-out">
        @if ($kategori->isEmpty())
        <p class="text-gray-600 text-lg" data-aos="fade-up">Tidak ada kategori pelari</p>
        @else
        @foreach ($kategori as $ktgpeserta)
        @if ($ktgpeserta->id != 1)
        <div class="bg-yellow-500 bg-opacity-95 p-6 rounded-lg shadow-md transition duration-300 text-center w-full sm:w-48"
            data-aos="fade-up">
            <h3 class="text-md font-extrabold text-white">{{ $ktgpeserta->name }}
            </h3>
            <p class="mt-2 text-white">{{ $ktgpeserta->umur }} Tahun</p>
        </div>
        @endif
        @endforeach
        @endif
    </div>
</section>

<!-- Shirt Size -->
<section id="jersey" class="mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Header -->
    <h2 class="font-sans col-span-1 md:col-span-2 text-3xl font-bold text-green-400 mb-6 text-center"
        data-aos="fade-up">
        UKURAN
        JERSEY</h2>

    <!-- Column 1: Pria -->
    <div data-aos="fade-right">
        <h2 class="font-sans text-2xl font-bold text-gray-800 mb-4 text-center">Ukuran Jersey Pria</h2>
        <div class="flex justify-center items-center mb-6">
            <img src="{{ asset('assets/img/man.png') }}" alt="Men's Shirt" class="w-full max-w-xs rounded-lg">
        </div>
        <div class="overflow-x-auto">
            <table class="w-full max-w-sm mx-auto border-collapse border border-gray-300 text-center">
                <thead>
                    <tr>
                        <th class="border py-1 px-2 bg-gray-200 text-sm">Ukuran</th>
                        <th class="border py-1 px-2 bg-gray-200 text-sm">Lebar Dada (cm)</th>
                        <th class="border py-1 px-2 bg-gray-200 text-sm">Panjang Jersey (cm)</th>
                        <th class="border py-1 px-2 bg-gray-200 text-sm">Panjang Lengan (cm)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border py-1 px-2 text-sm">S</td>
                        <td class="border py-1 px-2 text-sm">48</td>
                        <td class="border py-1 px-2 text-sm">68</td>
                        <td class="border py-1 px-2 text-sm">21</td>
                    </tr>
                    <tr>
                        <td class="border py-1 px-2 text-sm">M</td>
                        <td class="border py-1 px-2 text-sm">50</td>
                        <td class="border py-1 px-2 text-sm">70</td>
                        <td class="border py-1 px-2 text-sm">22</td>
                    </tr>
                    <tr>
                        <td class="border py-1 px-2 text-sm">L</td>
                        <td class="border py-1 px-2 text-sm">52</td>
                        <td class="border py-1 px-2 text-sm">72</td>
                        <td class="border py-1 px-2 text-sm">23</td>
                    </tr>
                    <tr>
                        <td class="border py-1 px-2 text-sm">XL</td>
                        <td class="border py-1 px-2 text-sm">54</td>
                        <td class="border py-1 px-2 text-sm">74</td>
                        <td class="border py-1 px-2 text-sm">24</td>
                    </tr>
                    <tr>
                        <td class="border py-1 px-2 text-sm">3XL</td>
                        <td class="border py-1 px-2 text-sm">56</td>
                        <td class="border py-1 px-2 text-sm">76</td>
                        <td class="border py-1 px-2 text-sm">25</td>
                    </tr>
                    <tr>
                        <td class="border py-1 px-2 text-sm">4XL</td>
                        <td class="border py-1 px-2 text-sm">58</td>
                        <td class="border py-1 px-2 text-sm">78</td>
                        <td class="border py-1 px-2 text-sm">26</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Column 2: Wanita -->
    <div data-aos="fade-left">
        <h2 class="font-sans text-2xl font-bold text-gray-800 mb-4 text-center">Ukuran Jersey Wanita</h2>
        <div class="flex justify-center items-center mb-6">
            <img src="{{ asset('assets/img/woman.png') }}" alt="Women's Shirt" class="w-full max-w-xs rounded-lg">
        </div>
        <div class="overflow-x-auto">
            <table class="w-full max-w-sm mx-auto border-collapse border border-gray-300 text-center">
                <thead>
                    <tr>
                        <th class="border py-1 px-2 bg-gray-200 text-sm">Ukuran</th>
                        <th class="border py-1 px-2 bg-gray-200 text-sm">Lebar Dada (cm)</th>
                        <th class="border py-1 px-2 bg-gray-200 text-sm">Panjang Jersey (cm)</th>
                        <th class="border py-1 px-2 bg-gray-200 text-sm">Panjang Lengan (cm)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border py-1 px-2 text-sm">S</td>
                        <td class="border py-1 px-2 text-sm">44</td>
                        <td class="border py-1 px-2 text-sm">64</td>
                        <td class="border py-1 px-2 text-sm">19</td>
                    </tr>
                    <tr>
                        <td class="border py-1 px-2 text-sm">M</td>
                        <td class="border py-1 px-2 text-sm">46</td>
                        <td class="border py-1 px-2 text-sm">66</td>
                        <td class="border py-1 px-2 text-sm">20</td>
                    </tr>
                    <tr>
                        <td class="border py-1 px-2 text-sm">L</td>
                        <td class="border py-1 px-2 text-sm">48</td>
                        <td class="border py-1 px-2 text-sm">68</td>
                        <td class="border py-1 px-2 text-sm">21</td>
                    </tr>
                    <tr>
                        <td class="border py-1 px-2 text-sm">XL</td>
                        <td class="border py-1 px-2 text-sm">50</td>
                        <td class="border py-1 px-2 text-sm">70</td>
                        <td class="border py-1 px-2 text-sm">22</td>
                    </tr>
                    <tr>
                        <td class="border py-1 px-2 text-sm">3XL</td>
                        <td class="border py-1 px-2 text-sm">52</td>
                        <td class="border py-1 px-2 text-sm">72</td>
                        <td class="border py-1 px-2 text-sm">23</td>
                    </tr>
                    <tr>
                        <td class="border py-1 px-2 text-sm">4XL</td>
                        <td class="border py-1 px-2 text-sm">54</td>
                        <td class="border py-1 px-2 text-sm">74</td>
                        <td class="border py-1 px-2 text-sm">24</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Sponsor Section -->
{{-- <section id="sponsors" class="mx-auto px-4 py-12">
    <!-- Header -->
    <h2 class="font-sans text-3xl font-bold text-green-400 mb-12 text-center" data-aos="fade-up">
        SPONSOR
    </h2>

    <!-- Grid Sponsor -->
    <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 bg-gray-200 p-6 rounded-md shadow-md"
        data-aos="fade-up">

        <!-- Sponsor 1 -->
        <div class="flex justify-center items-center h-full w-full">
            <img src="{{ asset('assets/img/ternate-berlari.png') }}" alt="Sponsor 1"
class="w-auto h-auto object-contain">
</div>

<!-- Sponsor 2 -->
<div class="flex justify-center items-center h-full w-full">
    <img src="{{ asset('assets/img/ternatesport.png') }}" alt="Sponsor 2" class="w-auto h-auto object-contain">
</div>

<!-- Sponsor 3 -->
<div class="flex justify-center items-center h-full w-full">
    <img src="{{ asset('assets/img/antam-logo.png') }}" alt="Sponsor 3" class="w-auto h-auto object-contain">
</div>

</div>
</section> --}}

<!-- Scroll to Top Button -->
@include('frontend.components.to-top')

<!-- JavaScript untuk membuka dan menutup Modal -->
<script>
    function openModal(modalId) {
                document.getElementById(modalId).classList.remove('hidden');
            }
        
            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            }
</script>
@endsection