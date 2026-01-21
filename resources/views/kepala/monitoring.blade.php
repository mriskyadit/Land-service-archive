<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Monitoring Kepala Kantor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
        }

        .dashboard-image img {
            object-fit: cover;
        }

        /* INFO PANEL */
        .info-panel {
            border-radius: 14px;
            background: #ffffff;
            transition: all .25s ease;
            position: relative;
            overflow: hidden;
        }

        .info-panel:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
        }

        .info-title {
            font-size: .85rem;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
        }

        .info-value {
            font-size: 2rem;
            font-weight: 700;
            color: #0f172a;
        }

        .info-desc {
            font-size: .8rem;
            color: #64748b;
        }

        .info-icon {
            font-size: 2.6rem;
            opacity: .15;
            position: absolute;
            top: 12px;
            right: 16px;
        }

        /* ACTION CARD */
        .action-card {
            border-radius: 14px;
            padding: 22px;
            background: linear-gradient(135deg, #1e293b, #0f172a);
            color: #fff;
            transition: all .25s ease;

        }

        .action-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 36px rgba(0, 0, 0, .25);
        }

        .action-title {
            font-weight: 700;
            font-size: 1rem;
        }

        .action-desc {
            font-size: .8rem;
            opacity: .85;
        }

        .schedule-card {
            border-radius: 14px;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-4">

        {{-- HERO --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="dashboard-image">
                <img src="{{ asset('images/bpn-mojokerto.png') }}" class="img-fluid w-100 rounded-top">
            </div>

            <div class="p-4">
                <h4 class="fw-bold mb-2">
                    Sistem Informasi Layanan & Arsip Pertanahan
                </h4>

                <p class="text-muted">
                    Loket Pelayanan Tanah Akhir Pekan merupakan inovasi layanan Kementerian
                    ATR/BPN untuk memberikan pelayanan maksimal kepada masyarakat tanpa perantara.
                </p>

                <h5 class="fw-semibold">
                    Dashboard Monitoring Kepala Kantor Pertanahan Kota Mojokerto
                </h5>
            </div>
        </div>

        {{-- PANEL ANGKA --}}
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="info-panel p-4">
                    <div class="info-icon">👥</div>
                    <div class="info-title">Petugas Aktif</div>
                    <div class="info-value">12</div>
                    <div class="info-desc">Bertugas hari ini</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-panel p-4">
                    <div class="info-icon">📄</div>
                    <div class="info-title">Permohonan Masuk</div>
                    <div class="info-value">37</div>
                    <div class="info-desc">Hari ini</div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-panel p-4">
                    <div class="info-icon">✅</div>
                    <div class="info-title">Berkas Selesai</div>
                    <div class="info-value">29</div>
                    <div class="info-desc">Telah dilayani</div>
                </div>
            </div>
        </div>

        {{-- ACTION --}}
        <div class="row g-4 mb-4">

            {{-- KINERJA KARYAWAN --}}
            <div class="col-md-4">
                <a href="{{ route('kepala.kinerja') }}" class="text-decoration-none">
                    <div class="action-card">
                        <div class="action-title">👥 Kinerja Karyawan</div>
                        <div class="action-desc">Monitoring aktivitas & produktivitas petugas</div>
                    </div>
                </a>

            </div>

            {{-- HISTORY PELAYANAN --}}
            <a href="{{ route('kepala.history') }}" class="text-decoration-none col-md-4">
                <div class="action-card">
                    <div class="action-title">📊 History Pelayanan</div>
                    <div class="action-desc">
                        Riwayat dan status berkas yang telah selesai
                    </div>
                </div>
            </a>

            {{-- PRINT LAPORAN --}}
            <div class="col-md-4">
                <a href="{{ route('kepala.print') }}" target="_blank" class="text-decoration-none">
                    <div class="action-card">
                        <div class="action-title">🖨 Print Laporan</div>
                        <div class="action-desc">
                            Cetak laporan rekap pelayanan
                        </div>
                    </div>
                </a>

            </div>

        </div>
        {{-- JADWAL --}}
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm schedule-card h-100">
                    <div class="card-header bg-white fw-semibold">Jadwal Kerja Petugas</div>
                    <div class="card-body">
                        <ul class="mb-0 text-muted">
                            <li>Senin – Jumat</li>
                            <li>Jam Kerja: <strong>08.00 – 16.00 WIB</strong></li>
                            <li>Istirahat: <strong>12.00 – 12.30 WIB</strong></li>
                            <li>Sabtu & Minggu Libur</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-0 shadow-sm schedule-card h-100">
                    <div class="card-header bg-white fw-semibold">Jadwal Pelayanan</div>
                    <div class="card-body">
                        <ul class="mb-0 text-muted">
                            <li>Senin – Jumat</li>
                            <li>Pelayanan: <strong>08.00 – 15.00 WIB</strong></li>
                            <li>Istirahat: <strong>12.00 – 12.30 WIB</strong></li>
                            <li>Libur Nasional: Tidak Melayani</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- STRUKTUR ORGANISASI --}}
        <div class="card border-0 shadow-sm schedule-card mb-4">
            <div class="card-header bg-white fw-semibold">
                Struktur Organisasi Kantor Pertanahan Kota Mojokerto
            </div>
            <div class="text-center p-4">
                <img src="{{ asset('images/struktur.png') }}"
                    class="img-fluid rounded shadow-sm"
                    style="max-width:900px;">
            </div>
        </div>

        {{-- VISI & MISI --}}
        <div class="card border-0 shadow-sm schedule-card mb-4">
            <div class="card-header bg-white fw-semibold">
                Visi & Misi
            </div>

            <div class="card-body text-center">

                {{-- GAMBAR --}}
                <img src="{{ asset('images/visimisi.png') }}"
                    class="img-fluid rounded shadow-sm mb-4"
                    style="max-width:900px;">

                {{-- VISI --}}
                <h6 class="fw-bold text-uppercase mb-2">Visi</h6>
                <p class="text-muted px-md-5">
                    Terwujudnya Penataan Ruang dan Pengelolaan Pertanahan yang
                    Terpercaya dan Berstandar Dunia dalam Melayani Masyarakat
                    untuk Mendukung Tercapainya:
                    <br><br>
                    <strong>
                        “Indonesia Maju yang Berdaulat, Mandiri, dan Berkepribadian
                        Berlandaskan Gotong Royong”
                    </strong>
                </p>

                <hr class="my-4">

                {{-- MISI --}}
                <h6 class="fw-bold text-uppercase mb-3">Misi</h6>

                <ol class="text-muted text-start px-md-5">
                    <li class="mb-2">
                        Menyelenggarakan Penataan Ruang dan Pengelolaan Pertanahan
                        yang Produktif, Berkelanjutan, dan Berkeadilan.
                    </li>
                    <li>
                        Menyelenggarakan Pelayanan Pertanahan dan Penataan Ruang
                        yang Berstandar Dunia.
                    </li>
                </ol>

            </div>
        </div>


        {{-- FOOTER --}}
        <div class="text-center mb-4">
            <img src="{{ asset('images/futer.png') }}"
                class="img-fluid rounded"
                style="max-width:900px;">
        </div>

    </div>
</body>

</html>