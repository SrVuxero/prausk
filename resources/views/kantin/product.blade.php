@extends('layouts.admin')
@section('content')
<div class="min-h-screen">
    <div class="addgoodmodal hidden fixed w-3/5 h-3/4 bg-white -translate-x-1/2 left-1/2 shadow-lg overflow-hidden rounded-lg">
        <div class="wrappers flex h-full w-full">
            <div class="modal-input-group relative w-full px-4 py-8">
                <div class="flex justify-between pr-5">
                    <p class="font-bold px-6"><span id="user-name-modal">Add New Baru</span></p>
                    <button id="closegoodmodal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                          </svg>
                    </button>
                </div>
                <form class=" mt-4 px-6" action="{{ route('kantin.addproduct.post')}}" method="POST">
                    @csrf
                    <div class="username">
                        <label for="username">
                            Name
                        </label>
                        <input data-userid="" id="username-input" class="w-full rounded-md bg-gray-100 my-2 p-2" type="text" name="name" id="goods" placeholder="Type A Goods Name Here">
                    </div>

                    <div class="grid grid-cols-3 gap-2">
                        <div class="py-1" id="price-input">
                            <label for="price">
                                Price
                            </label>
                            <input  class="w-full rounded-md focus:outline-none  bg-gray-100 my-2 p-2" type="text" name="price" id="price" placeholder="Type A Price Here">

                        </div>
                        <div class="py-1">
                            <label for="category">
                               Category
                            </label>
                            <select id="category-input" class="category-select-goods w-full rounded-md focus:outline-none  bg-gray-100 my-2 p-2" name="category_id">
                                  <option value="goods-category">Select Goods Category</option>
                                @foreach($productcategories as $productcategory)
                                  <option value="{{ $productcategory->id  }}">{{ ucfirst($productcategory->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="py-1">
                            <label for="role">
                                Stock
                            </label>
                            <input min="0"  class="w-full rounded-md focus:outline-none bg-gray-100 my-2 p-2" type="number" name="stock" id="password" placeholder="Type A Stock Here">
                        </div>
                    </div>
                    <div class="w-full">
                        <label for="role">
                            Description
                        </label>
                        <textarea name="description" id="" class="w-full rounded-md focus:outline-none bg-gray-100 my-2 p-2" placeholder="Type A Goods Description"></textarea>
                    </div>
                    <button type="submit" id="add-btn-goods" class="submit-btn bg-blue-300 font-bold py-2 text-white px-4 rounded-md mt-4 w-full">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="updategoodsmodal hidden fixed z-50 w-3/5 h-3/4 bg-white -translate-x-1/2 left-1/2 shadow-lg overflow-hidden rounded-lg">
        <div class="wrappers flex h-full w-full">
            <div class="modal-input-group relative w-full px-4 py-8">
                <div class="flex justify-between pr-5">
                    <p class="font-bold px-6"><span id="user-name-modal">Update Product</span></p>
                    <button id="closemodalgoodsupdate">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                          </svg>
                    </button>
                </div>
                <form method="POST" class="input mt-4 px-6">
                    <div class="username py-1">
                        <label for="goodsname">

                            Goods Name
                    </label>
                        <input data-goodsname="" id="goods-input" class="w-full rounded-md focus:outline-none focus:ring-2 ring-[#003034] bg-gray-100 my-2 p-2" type="text" name="name" id="goods" placeholder="Type An Goods Name Here">
                    </div>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="py-1" id="price-input">
                            <label for="price">
                                Price
                            </label>
                            <input  class="w-full rounded-md focus:outline-none focus:ring-2 ring-[#003034] bg-gray-100 my-2 p-2" type="text" name="price" id="goods-price" placeholder="Type A Price Here">

                        </div>
                        <div class="py-1">
                            <label for="category">
                               Category
                            </label>
                            <select id="category-input-update" class="category-select-goods w-full rounded-md focus:outline-none focus:ring-2 ring-[#003034] bg-gray-100 my-2 p-2" name="category_id">
                                  <option value="goods-category">Select Goods Category</option>
                                @foreach($productcategories as $productcategory)
                                  <option value="{{ $productcategory->id }}">{{ ucfirst($productcategory->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="py-1">
                            <label for="role">
                                Stock
                            </label>
                            <input min="0"  class="w-full rounded-md focus:outline-none focus:ring-2 ring-[#003034] bg-gray-100 my-2 p-2" type="number" name="stock" id="goods-stock" placeholder="Type A Stock Here">
                        </div>
                    </div>
                    <div class="w-full">
                        <label for="role">
                            Description
                        </label>
                        <textarea name="description" id="goods-description" class="w-full rounded-md focus:outline-none focus:ring-2 ring-[#003034] bg-gray-100 my-2 p-2" placeholder="Type A Goods Description"></textarea>
                    </div>
                    <button id="update-btn-goods" class="bg-blue-300 py-2 font-bold text-white px-4 rounded-md mt-4 w-full">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="flex justify-between my-4 items-center">
        <div class="title font-semibold text-xl">
            <h1>Tambah Product</h1>
        </div>
        <div class="btn-tambah cursor-pointer flex items-center gap-2 bg-blue-500 text-white px-3 py-1 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
              </svg>
            Product
        </div>
    </div>
    <table class="w-full">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Stand</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
         @foreach ( $products as $key => $product )
         <tr>
            <td data-id={{ $product->id }}>{{ $key + 1 }}</td>
            <td>{{ $product->name }}</td>
            <td class="price-td" data-price="{{ $product->price }}">Rp {{ $product->price  }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->photo }}</td>
            <td>{{ $product->desc }}</td>
            <td data-categoryid="{{$product->category_id}}">{{ $product->category->name }}</td>
            <td>{{ $product->stand }}</td>
            <td>{{ $product->created_at }}</td>
            <td>
                <button id="{{ $product->id }}" data-id="{{ $product->name }}" class="edit-goods-update-btn bg-gradient-to-r from-yellow-600 to-yellow-400 p-2 text-white rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                    </svg>
                </button>
                <button id="{{ $product->id }}" class="delete-btn-product bg-gradient-to-r from-red-600 to-red-400 p-2 text-white rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                </button>
            </td>

        </tr>
         @endforeach
        </tbody>
      </table>
</div>

@endsection
