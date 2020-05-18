<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
    <style>
        th{
            text-align: left;
            margin: 5px;
        }

        td{
            margin: 5px;
        }
    </style>
</head>
<body>


            <h2>Command</h2>

            <div style="font-weight: bold">Name : {{ $order->userName }}</div>
            <div style="font-weight: bold">Email : {{ $order->userEmail }}</div>
            <div style="font-weight: bold">Address : {{ $order->userAddress }}</div>
            <div style="font-weight: bold">Total : {{ $order->total }} €</div>


            <table>
                <thead>
                <tr>
                    <th >Product</th>

                    <th >Color</th>

                    <th >Size</th>

                    <th >Quantity</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($order->orderProducts as $odr)
                        <tr>
                            <td>
                                {{ $odr->productsInOrder->name }}
                            </td>
                            <td>
                                {{ $odr->color }}
                            </td>
                            <td>
                                {{ $odr->size}}
                            </td>

                            <td>
                                {{ $odr->quantity}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

</body>
</html>