@extends('backend.layouts.main', ['title' => 'Edit Peserta'])
@section('main')
    <div class="pagetitle">
        <h1>Edit Peserta</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Peserta</li>
                <li class="breadcrumb-item active">Edit Peserta {{ $peserta->nama_lengkap }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('peserta.update', $peserta->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" required
                                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    value="{{ old('nama_lengkap', $peserta->nama_lengkap) }}">
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" name="nik" id="nik" required
                                    class="form-control @error('nik') is-invalid @enderror"
                                    value="{{ old('nik', $peserta->nik) }}">
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="id_road_race" class="form-label">Road Race</label>
                                <select name="id_road_race" id="id_road_race" required
                                    class="form-select @error('id_road_race') is-invalid @enderror">
                                    <option value="">-- Pilih Road Race --</option>
                                    @foreach ($roadRaces as $roadRace)
                                        <option value="{{ $roadRace->id }}"
                                            {{ old('id_road_race', $peserta->id_road_race) == $roadRace->id ? 'selected' : '' }}>
                                            {{ $roadRace->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_road_race')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" required
                                    class="form-control @error('pekerjaan') is-invalid @enderror"
                                    value="{{ old('pekerjaan', $peserta->pekerjaan) }}">
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_tlp" class="form-label">Nomor Telepon</label>
                                <input type="number" name="no_tlp" id="no_tlp" required
                                    class="form-control @error('no_tlp') is-invalid @enderror"
                                    value="{{ old('no_tlp', $peserta->no_tlp) }}">
                                @error('no_tlp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" required
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    value="{{ old('alamat', $peserta->alamat) }}">
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="komunitas" class="form-label">Komunitas</label>
                                <input type="text" name="komunitas" id="komunitas" required
                                    class="form-control @error('komunitas') is-invalid @enderror"
                                    value="{{ old('komunitas', $peserta->komunitas) }}">
                                @error('komunitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
                                <input type="text" name="riwayat_penyakit" id="riwayat_penyakit" required
                                    class="form-control @error('riwayat_penyakit') is-invalid @enderror"
                                    value="{{ old('riwayat_penyakit', $peserta->riwayat_penyakit) }}">
                                @error('riwayat_penyakit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kontak_darurat" class="form-label">Kontak Darurat</label>
                                <input type="text" name="kontak_darurat" id="kontak_darurat" required
                                    class="form-control @error('kontak_darurat') is-invalid @enderror"
                                    value="{{ old('kontak_darurat', $peserta->kontak_darurat) }}">
                                @error('kontak_darurat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="golongan_darah" class="form-label">Golongan Darah</label>
                                <select name="golongan_darah" id="golongan_darah" required
                                    class="form-select @error('golongan_darah') is-invalid @enderror">
                                    <option value="">-- Pilih Golongan Darah --</option>
                                    <option value="A"
                                        {{ old('golongan_darah', $peserta->golongan_darah) == 'A' ? 'selected' : '' }}>A
                                    </option>
                                    <option value="B"
                                        {{ old('golongan_darah', $peserta->golongan_darah) == 'B' ? 'selected' : '' }}>B
                                    </option>
                                    <option value="AB"
                                        {{ old('golongan_darah', $peserta->golongan_darah) == 'AB' ? 'selected' : '' }}>AB
                                    </option>
                                    <option value="O"
                                        {{ old('golongan_darah', $peserta->golongan_darah) == 'O' ? 'selected' : '' }}>O
                                    </option>
                                </select>
                                @error('golongan_darah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kategori_usia" class="form-label">Kategori Usia</label>
                                <select name="id_kategori" id="kategori_usia" required
                                    class="form-select @error('id_kategori') is-invalid @enderror">
                                    <option value="">-- Pilih Kategori Usia --</option>
                                    @foreach ($kategori as $ku)
                                        <option value="{{ $ku->id }}"
                                            {{ old('id_kategori', $peserta->id_kategori) == $ku->id ? 'selected' : '' }}>
                                            {{ $ku->name }} ({{ $ku->umur }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="size_jersey" class="form-label">Size Jersey</label>
                                <select name="size_jersey" id="size_jersey" required
                                    class="form-select @error('size_jersey') is-invalid @enderror">
                                    <option value="">-- Pilih Size Jersey --</option>
                                    <option value="S"
                                        {{ old('size_jersey', $peserta->size_jersey) == 'S' ? 'selected' : '' }}>S</option>
                                    <option value="M"
                                        {{ old('size_jersey', $peserta->size_jersey) == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="L"
                                        {{ old('size_jersey', $peserta->size_jersey) == 'L' ? 'selected' : '' }}>L</option>
                                    <option value="XL"
                                        {{ old('size_jersey', $peserta->size_jersey) == 'XL' ? 'selected' : '' }}>XL
                                    </option>
                                    <option value="XXL"
                                        {{ old('size_jersey', $peserta->size_jersey) == 'XXL' ? 'selected' : '' }}>XXL
                                    </option>
                                    <option value="3XL"
                                        {{ old('size_jersey', $peserta->size_jersey) == '3XL' ? 'selected' : '' }}>3XL
                                    </option>
                                    <option value="4XL"
                                        {{ old('size_jersey', $peserta->size_jersey) == '4XL' ? 'selected' : '' }}>4XL
                                    </option>
                                </select>
                                @error('size_jersey')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            value="Pria"
                                            {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Pria' ? 'checked' : '' }}
                                            required>
                                        <label class="form-check-label">Pria</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            value="Wanita"
                                            {{ old('jenis_kelamin', $peserta->jenis_kelamin) == 'Wanita' ? 'checked' : '' }}
                                            required>
                                        <label class="form-check-label">Wanita</label>
                                    </div>
                                </div>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="bukti_bayar" class="form-label">Bukti Bayar (Upload Gambar)</label>
                                <input type="file" name="bukti_bayar" id="bukti_bayar" accept="image/*"
                                    class="form-control @error('bukti_bayar') is-invalid @enderror">
                                @error('bukti_bayar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-outline-primary w-100">Perbarui</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
