<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
	 
	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
</head>
<body>

	<form method="PUT" action="{{ url('laporan')}}">
		<label for="birthday">total order</label>
		<input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
		<input type="submit">
	</form>
	@forelse ($order as $Order)
	<li>{{ $Order->name }}</li>
	@empty
	<p>No Details</p>
	@endforelse
		<form method="PUT" action="{{ url('laporan')}}">
		<label for="birthday">total item</label>
		<input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
		<input type="submit">
	</form>
		<form method="PUT" action="{{ url('laporan')}}">
		<label for="birthday">total ongkir</label>
		<input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
		<input type="submit">
	</form>
		<form method="PUT" action="{{ url('laporan')}}">
		<label for="birthday">total discount</label>
		<input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
		<input type="submit">
	</form>
		<form method="PUT" action="{{ url('laporan')}}">
		<label for="birthday">total pembayaran</label>
		<input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
		<input type="submit">
	</form>
	<br>
		<form method="PUT" action="{{ url('laporan/show')}}">
		<label for="birthday">total order jumlah order masing masing custemer</label>
		<input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
		<input type="submit">
	</form>

		<br>
		<form method="PUT" action="{{ url('laporan/show')}}">
		<label for="birthday">jumlah order ke agent</label>
		<input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
		<input type="submit">
			@foreach ($order as $Order)
	<li>{{ $Order->qty }}</li>
	@endforeach
	</form>

	<div>jumlah keuntungan :</div>

			<br>
		<form method="PUT" action="{{ url('laporan/show')}}">
		<label for="birthday">jumlah penjualan masing masing item</label>
		<input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
		<input type="submit">

				<br>
		<form method="PUT" action="{{ url('laporan/show')}}">
		<label for="birthday">category produk</label>
		<input type="text" name="daterange" value="01/01/2015 - 01/31/2015" />
		<input type="submit">

		<ol>
			List 10 produk paling laris
		</ol>
			<ul>
			</ul>

					<ol>
			List 10 custemer paling banyak membeli
		</ol>
			<ul>
			</ul>

					<ol>
			List 10 agent paling banyak dapat costemer
		</ol>
			<ul>
			</ul>


	<script type="text/javascript">
	$(function() {
	    $('input[name="daterange"]').daterangepicker();
	});
	</script>

</body>
</html>