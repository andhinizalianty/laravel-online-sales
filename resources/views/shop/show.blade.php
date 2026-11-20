@extends('layouts.app')
@section('title', $product->name)

@section('content')
    <div class="card">
        <div class="checkout-layout">
            @if ($product->image && file_exists(public_path('storage/' . $product->image)))
                <img class="thumb" style="height:340px; object-fit:cover;" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <img class="thumb" style="height:340px; object-fit:cover;" src="{{ asset('images/placeholder.svg') }}" alt="{{ $product->name }}">
            @endif

            <div>
                <div class="muted">{{ $product->category->name }} | {{ $product->sku }}</div>
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <p class="price">Rp{{ number_format($product->price, 2, ',', '.') }}</p>
                <p>Stok tersedia: {{ $product->stock }}</p>

                @auth
                    @if (auth()->user()->role === 'customer' && $product->stock > 0 && Route::has('cart.store'))
                        <form method="POST" action="{{ route('cart.store', $product) }}">
                            @csrf
                            <label>
                                Jumlah
                                <input class="input" style="max-width:120px" type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1">
                            </label>
                            <button class="btn">Tambah ke Keranjang</button>
                        </form>
                    @elseif ($product->stock === 0)
                        <p class="badge cancelled">Stok habis. Cek kembali nanti.</p>
                    @endif
                @else
                    <p><a href="{{ route('login') }}">Login</a> untuk berbelanja.</p>
                @endauth
            </div>
        </div>
    </div>
@endsection