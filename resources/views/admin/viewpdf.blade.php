<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Report PDF</title>
    <style>
        /* Sesuaikan gaya CSS sesuai kebutuhan Anda */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Hasil Akhir Perankingan Coffe Shop dengan metode MABAC </h2>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">Kode Alternatif</th>
                        <th class="bg-primary text-white">Nama Alternatif</th>
                        <th class="bg-primary text-white">Nilai</th>
                        <th class="bg-primary text-white">Ranking</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                    // Membuat array untuk menyimpan total nilai 'C' untuk setiap alternatif
                    $totalAlternatifC = [];
                    @endphp

                    @foreach ($alternatiflist as $itema)
                    @php
                    $totalC = 0;

                    // Menghitung total nilai 'C' untuk setiap alternatif
                    foreach ($kriterialist as $itemk) {
                    $totalC = collect($matrixsTambah)
                    ->where('id_alternatif', $itema->id)
                    ->where('id_kriteria', $itemk->id)
                    ->first()['C'] ?? 0;
                    }

                    // Menambahkan total nilai 'C' ke dalam array
                    $totalAlternatifC[$itema->id] = $totalC;
                    @endphp
                    @endforeach

                    {{-- Mengurutkan alternatif berdasarkan total nilai 'C' --}}
                    @foreach ($alternatiflist->sortByDesc(function ($itema) use ($totalAlternatifC) {
                    return $totalAlternatifC[$itema->id] ?? 0;
                    }) as $itema)
                    <tr>
                        <td>{{ $itema->kode_alternatif }}</td>
                        <td>{{ $itema->nama_alternatif }}</td>
                        <td>
                            {{ $totalAlternatifC[$itema->id] ?? '-' }}
                        </td>
                        <td>{{ $loop->iteration }}</td>
                    </tr>
                    @endforeach

                </tbody>


            </table>
        </div>
    </div>

</body>

</html>