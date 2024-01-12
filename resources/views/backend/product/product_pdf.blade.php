<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Data Produk</title>
  </head>
  <body>
    <h1 class="text-center m-4">Laporan Data Produk</h1>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th width="5%">No. </th>
                <th>Barcode </th>
                <th width="15%">Foto </th>
                <th width="15%">Nama Produk </th>
                <th>Harga </th>
                <th>Diskon </th>
                <th>Stok </th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $item)
            <tr class="text-center">
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->product_code }}</td>
                <td>
                    <img src="{{ asset($item->product_thambnail) }}"
                    style="width: 70px; height: 70px;" alt="">
                </td>
                <td>{{ $item->product_name }}</td>
                <td>Rp{{ number_format($item->product_price,0,'','.') }}</td>
                <td>
                    @if($item->product_discount == NULL)
                    <span class="fs-2">0%</span>

                    @else
                    @php
                    $amount = $item->product_price - $item->product_discount;
                    $discount = ($amount/$item->product_price) * 100;
                    @endphp
                    <span class="fs-2">{{ round($discount)  }} %</span>

                    @endif
                </td>
                <td>{{ $item->product_qty }}</td>
                <td>
                    @if($item->status == 1)
                    <span class="fs-2 text-success"> Aktif </span>
                    @else
                    <span class="fs-2 text-danger"> Tidak Aktif </span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        window.print();
    </script>
  </body>
</html>