<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

/* Header */
h1 {
    font-size: 2rem;
    color: #444;
    margin-bottom: 20px;
}

/* Links */
a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

/* Success Message */
div > div:first-of-type {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px 15px;
    text-align: left;
}

th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
}

td {
    border: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Buttons */
button {
    padding: 5px 10px;
    background-color: #dc3545;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.9rem;
}

button:hover {
    background-color: #c82333;
}

/* Form Links */
td a {
    background-color: #007bff;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    text-align: center;
    display: inline-block;
}

td a:hover {
    background-color: #0056b3;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    body {
        padding: 10px;
    }

    table {
        font-size: 0.9rem;
    }

    th, td {
        padding: 8px;
    }
}

    </style>
</head>
<body>
    <x-test> 5445</x-test>
    <h1>Product</h1>
    <a href="{{route('product.create')}}">Create Product</a>
    <div>
        @if (session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td><a href="{{route('product.edit', ['product' => $product])}}">Edit</a></td>
                    <td>
                        <form method = "POST" action="{{route('product.destroy', ['product' => $product])}}">
                        @csrf
                        @method("DELETE")
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>