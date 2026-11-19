@extends('layouts.app')
@section('title', 'Daftar')

@section('content')
    <div class="card auth-card">
        <span class="eyebrow">BUAT AKUN BARU</span>
        <h1>Daftar akun</h1>
        <p class="muted" style="text-align:left">Lengkapi data di bawah untuk mulai berbelanja.</p>

        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <label>
                Nama Lengkap
                <input type="text" name="name" value="{{ old('name') }}" autocomplete="name" required autofocus>
            </label>
            <label>
                Email
                <input type="email" name="email" value="{{ old('email') }}" autocomplete="username" required>
            </label>
            <label>
                Password
                <input type="password" name="password" autocomplete="new-password" required>
            </label>
            <label>
                Konfirmasi Password
                <input type="password" name="password_confirmation" autocomplete="new-password" required>
            </label>
            <button class="btn">Daftar</button>
        </form>

        <p class="muted" style="margin-top:20px">
            Sudah punya akun? <a href="{{ route('login') }}"><strong>Masuk di sini</strong></a>
        </p>
    </div>
@endsection