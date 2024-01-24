<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
    <style>
        @media print {
            #back-to-home {
                display: none;
            }
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-blue-100 max-w-full mx-auto rounded-lg shadow-md h-full">
        <div class="p-6">
            <div class="flex justify-between font-bold text-2xl text-black ">
                Genz
            </div>
            <div class="flex justify-between pr-12">
                <div class="transaction-detail">
                    <h1 class="text-2xl font-semibold mb-4 mt-4">Cart Receipt</h1>
                    <h3 class="text-gray-600">Hi <b>{{ Auth::user()->name }}</b>, <br> Terimakasih Telah Berbelanja Di
                        Genz Mart</h3>
                    <p class="font-bold mt-6">Cart Detail:</p>
                    <div class="details-transaction mt-2">
                        <table class="border-2">
                            <tr class="border-2">
                                <th class="border-[1.5px] border-gray-400 p-2">No</th>
                                <th class="border-[1.5px] border-gray-400 p-2">Product Name</th>
                                <th class="border-[1.5px] border-gray-400 p-2">Quantity</th>
                                <th class="border-[1.5px] border-gray-400 p-2">Price</th>
                            </tr>
                            @foreach ($currentTransactions as $transaction)
                                <tr class="p-2">
                                    <td class="border-[1.5px] border-gray-400 p-2">{{ $transaction->id }}</td>
                                    <td class="border-[1.5px] border-gray-400 p-2">{{ $transaction->product->name }}
                                    </td>
                                    <td class="border-[1.5px] border-gray-400 p-2">{{ $transaction->quantity }}</td>
                                    <td class="border-[1.5px] border-gray-400 p-2">Rp {{ $transaction->price }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>


                </div>

            </div>
            <div class="total mt-4">
                <p class="text-xl font-semibold">Total : Rp {{ $currentTransactions->total_prices }}</p>
            </div>
            <div class="back flex justify-center mt-12" id="back-to-home">
                <a href="{{ route('cart.take') }}" class="bg-blue-700 text-white rounded-lg font-semibold px-4 py-2">Back To Home</a>
            </div>
        </div>

    </div>

    <script>
        window.print()

        function backhome() {
            window.location.href = "/"
        }
    </script>
</body>

</html>
