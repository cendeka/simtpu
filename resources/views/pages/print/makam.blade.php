<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMTPU - Data Makam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-4" style="border:#000; border-width: 1px;">
            <img style="height: 64px;"
                src="https://1.bp.blogspot.com/-j__HA8Uzl-U/YFbp0QmW7GI/AAAAAAAACCs/cE3ZXkgfGoMbWdPPcbySi8en3EJ1sAFRQCNcBGAsYHQ/s2048/Kabupaten%2BCianjur.png"
                alt="">
        </div>
        <div class="col">
            <p class="text-center">Dinas Perumahan dan Kawasan Permukiman Kabupaten Cianjur</p>
        </div>
        <div class="col">
            <p class="text-center" style="padding-left: 200px;">Data Makam</p>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>TPU</th>
                        <th>Tanggal Dimakamkan</th>
                        <th>Ahli Waris</th>
                        <th>Alamat Ahli Waris</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->registrasi->nama_meninggal }}</td>
                            <td>{{ $item->nama_tpu }} {{ $item->blok_tpu }} - {{ $item->nomor_tpu }}</td>
                            <td>{{ $item->tanggal_dimakamkan }}</td>
                            <td>{{ $item->registrasi->ahliwaris->nama }}</td>
                            <td>{{ $item->registrasi->ahliwaris->alamat1 }}</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
