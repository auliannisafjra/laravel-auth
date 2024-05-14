@extends('layouts.master')
@section('title', 'Products')
@section('content')
    <div class="container p-3 my-5 bg-info text-dark rounded-3">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <div class="text-center">
                    <h2>PRODUCTS</h2>
                    <div class="border border-top border-dark mx-auto mt-3" style="width: 100px"></div>
                </div>
            </div>
        </div>

        <div class="row align-items-center" style="margin-top: 20px">
            @foreach ($products as $product)
                <div class="col-3">
                    <div class="card bg-white w-100" style=" margin-bottom: 10px; gap: 10px">
                        @if ($product->foto)
                            <img class="card-img-top" src="{{ Storage::url($product->foto) }}" width="100px" height="250px"
                                alt="Display Product">
                        @endif
                        <div class="card-body">
                            <div class="d-flex justify-content-between my-2">
                                <p class="card-title fw-bold my-auto" style="font-size: 20px">
                                    {{ $product->nama }}
                                </p>
                                @if ($product->kondisi == 'Baru')
                                    <p class="my-auto rounded py-1 bg-success px-2 fw-semibold" style="font-weight: bold">
                                        {{ $product->kondisi }}</p>
                                @else
                                    <p class="my-auto rounded py-1 bg-warning px-2 fw-semibold" style="font-weight: bold">
                                        {{ $product->kondisi }}</p>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between my-2">
                                <p class="my-auto rounded py-1 bg-success px-2 fw-semibold text-light"
                                    style="font-weight: bold">
                                    {{ $product->stok }}</p>
                                <p class="my-auto rounded py-1 bg-info px-2 fw-semibold" style="font-weight: bold">
                                    Rp.
                                    {{ number_format($product->harga, 0, ',', '.') }}</p>
                                <p class="my-auto rounded py-1 bg-secondary px-2 fw-semibold text-light"
                                    style="font-weight: bold">
                                    {{ $product->berat }} gr</p>
                            </div>
                            <p class=""
                                style="overflow: hidden;max-width: 400px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; margin: 10px auto;">
                                {{ $product->deskripsi }}
                            </p>
                            <button class="btn btn-primary w-100">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
