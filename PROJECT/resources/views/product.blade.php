<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}

/* general styling */
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
	</style>
</head>
<body>
<table>
  <caption>product</caption>
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Type</th>
      <th scope="col">Item</th>
      <th scope="col">sku</th>
      <th scope="col">name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach ($product as $Product)
      <td data-label="Account">{{ $Product->product_name}}</td>
      <td data-label="Due Date">{{ $Product->type}}</td>
      <td data-label="Amount">{{ $Product->item}}</td>
      <td data-label="Period">{{ $Product->sku}}</td>
      @foreach ($productCategory as $Product_category)
      <td data-label="Period">{{ $Product_category->name}}</td>
      @endforeach
    </tr>
  </tbody>
  @endforeach
</table>
</body>
</html>