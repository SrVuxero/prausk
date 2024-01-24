@extends('layouts.master')
@section('content')
    <div class="h-[100vh]">
    <a href="{{ route('home') }}" class="back flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
        <p>Kembali</p>
    </a>
    <div class="title">
        <h1 class="text-2xl font-semibold">Top Up Saldo</h1>
    </div>
    <div class="flex gap-8">
        <div class="top-up-container w-3/4">
            <form action="{{ route('topup.proceed')}}" method="POST">
                @csrf
                <div class="nominals flex mt-4 flex-col">
                    <label for="">Nominal</label>
                    <input name="saldo" class="py-3 px-4 rounded-md  mt-2" type="text" placeholder="Masukan Jumlah Nominal">
                </div>
                <button type="submit" class="mt-4 bg-blue-500 w-full py-3 px-2 font-bold text-white rounded-md">
                    Top Up
                </button>
            </form>
        </div>
        <div class="hint w-1/3 bg-blue-500 text-white font-bold p-4 shadow-md rounded-md">
            <p>Jangan Lupa Untuk Menukarkan Kode TopUp Ke Teller Bank Tenizen</p>
        </div>
    </div>
</div>
@endsection
