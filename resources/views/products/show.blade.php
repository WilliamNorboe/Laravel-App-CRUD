<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$product->name}}</title>
</head>
<body>
    {{-- just product information --}}
    <div>{{$product->name}}</div>
    <div>{{$product->description}}</div>
    <div>{{$product->qty}}</div>
    <div>{{$product->price}}</div>
    {{-- <script>
    let test = @json($product); // prints product in json object
    console.log(test)
    </script> --}}
</body>
</html>