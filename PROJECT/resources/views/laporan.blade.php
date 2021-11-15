<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<div>total order {{ $total }}</div>
	<br>
	<div>total item {{ $total2 }}</div>
	<br>
	<div>total qty {{ $total3 }}</div>
	<br>
	<div>total total ongkir {{ $total4 }}</div>
	<br>
	<div>total diskon {{ $total5 }}</div>
	<br>
	<div>total pembayaran {{ $total6 }}</div>
	<br>
	<div>jumlah order custemer dari awal hingga akhir</div>
    @foreach ($order as $Order)
    	{{ $Order->name }}
  <br>
   @endforeach

   <div>LIst 10 product paling banyak {{ $top10 }}</div>
</body>
</html>