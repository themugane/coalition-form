<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coalition Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <form action="{{ route('coalition_form') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="ProductName">
            </div>
            <div class="mb-3">
                <label for="quantity_in_stock" class="form-label">Quantity in stock</label>
                <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" aria-describedby="QuantityInStock">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price per Item(USD)</label>
                <input type="number" class="form-control" id="price" name="price" aria-describedby="PricePerItem">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form><br>

        @if (true)
            <h3>Recorded Items</h3>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity In Stock</th>
                    <th scope="col">Price per item</th>
                    <th scope="col">DateTime Submited</th>
                    <th scope="col">Total Value</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $count => $data_item)
                        <tr>
                            <th scope="row">{{ $count += 1 }}</th>
                            <td>{{ $data_item->product_name ?? '' }}</td>
                            <td>{{ $data_item->quantity_in_stock ?? '' }}</td>
                            <td>${{ $data_item->price ?? '' }}</td>
                            <td>{{ date('d-M-Y H:i:a', strtotime($data_item->date_submited)) ?? '' }}</td>
                            <td>${{ number_format($data_item->total_value, 2) ?? '' }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    </div>
    
</body>
</html>