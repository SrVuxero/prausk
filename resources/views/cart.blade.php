@extends('layouts.master')
@section('content')
    <a href="{{ route('home') }}" class="back flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
        <p>Kembali</p>
    </a>
    <div class="title">
        <h1 class="text-2xl font-semibold">Keranjangku</h1>
    </div>
    @if (Session::has('message'))
        <div class="alert alert-error mt-4">
            <ul class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <li>{{ Session::get('message') }}</li>
            </ul>
        </div>
    @endif
    <div class="container-cart flex flex-col gap-4">
        <div class="cart-list w-full p-2 ">
            @foreach ($carts as $cart)
                @if ($cart->product->deleted_at != '')
                    <div class="card-cart my-3 bg-white shadow-lg relative p-4 rounded-lg flex gap-3 items-center">
                        <div class="product-img h-16 w-28 rounded-lg overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="https://images.pexels.com/photos/1099680/pexels-photo-1099680.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="mart-group">
                        </div>
                        <div class="description">
                            <p class="line-through">{{ $cart->product->name }}</p>

                            <p class="font-semibold price-products line-through" data-price="{{ $cart->product->price }}">
                                Rp
                                {{ $cart->product->price }}</p>
                            <span class="text-red-600">Product Not Available</span>
                        </div>
                        <div class="action absolute right-4 bottom-4">
                            <div class="flex items-center gap-2">
                                <form action="{{ route('cart.delete') }}" method="POST" class="flex items-center group">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $cart->id }}">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-trash3 group-hover:fill-red-500"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                    </button>
                                </form>
                           </div>

                        </div>
                    </div>
                @else
                    <div class="card-cart my-3 bg-blue-100 shadow-lg relative p-4 rounded-lg flex gap-3 items-center">
                        <div class="product-img h-16 w-28 rounded-lg overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="https://images.pexels.com/photos/1099680/pexels-photo-1099680.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="mart-group">
                        </div>
                        <div class="description">
                            <p>{{ $cart->product->name }}</p>
                            <p class="font-semibold">Rp.{{ $cart->product->price }}</p>
                        </div>
                        <div class="action absolute right-4 bottom-4">
                            <div class="flex items-center gap-2">
                                <form action="{{ route('cart.delete') }}" method="POST" class="flex items-center group">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{ $cart->product->id }}">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-trash3 group-hover:fill-red-500"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                    </button>
                                </form>

                                <input name="quantity" class="w-14 py-1 px-2 mt-2 bg-gray-100 shadow-lg border-2"
                                    type="number" min="1" value="{{ $cart->quantity }}">
                            </div>

                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="w-full h-1 bg-slate-400">

        </div>
        <div class="price-list bg-blue-100 rounded-md w-1/2 py-6 px-10 self-end">
            <p class="text-xl font-semibold">Ringkasan Belanja</p>
            <div class="shopping-data flex items-center mt-4 text-gray-500 justify-between">
                <p>Total Harga {{ $product_count }} Product</p>
                <p>Rp.{{ $total_prices }}</p>
            </div>
            <hr class="mt-2">
            <div class="shoping-total font-semibold text-xl mt-4 flex items-center justify-between">
                <p>Total Harga</p>
                <p>Rp.{{ $total_prices }}</p>
            </div>
            <form action="{{ route('cart.pay') }}" method="post">
                @method('PUT')
                @csrf
                <input type="hidden" name="transaction_id">
                <button
                    class="button bg-blue-400 text-white w-full p-4 rounded-lg mt-8 font-bold flex items-center justify-center gap-2">Bayar
                    Sekarang</button>
            </form>

        </div>
    </div>
@endsection
