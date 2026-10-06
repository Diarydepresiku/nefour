<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin - SMKN 4 Bogor</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;

            background-image:
                linear-gradient(
                    rgba(5, 31, 91, 0.35),
                    rgba(8, 49, 132, 0.40)
                ),
                url("{{ asset('images/admin/background.jpg') }}");

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            display: flex;
            justify-content: center;
            align-items: center;

            position: relative;
            overflow: hidden;
        }

        /* =========================
           DEKORASI BACKGROUND
        ========================= */

        body::before {
            content: "";
            position: absolute;

            width: 420px;
            height: 420px;

            background: rgba(0, 119, 255, 0.22);

            border-radius: 50%;

            top: -220px;
            left: -150px;

            filter: blur(2px);
        }

        body::after {
            content: "";
            position: absolute;

            width: 500px;
            height: 500px;

            background: rgba(0, 136, 255, 0.20);

            border-radius: 50%;

            bottom: -300px;
            right: -180px;

            filter: blur(2px);
        }

        /* =========================
           LOGIN WRAPPER
        ========================= */

        .login-wrapper {
            width: 100%;
            max-width: 390px;
            padding: 25px 20px;
            position: relative;
            z-index: 2;
            text-align: center;
        }
        /* =========================
           LOGO
        ========================= */

        .logo-wrapper {
            width: 125px;
            height: 125px;

            margin: 0 auto 18px;

            padding: 8px;

            background: white;

            border-radius: 50%;

            box-shadow:
                0 0 0 10px rgba(20, 120, 255, 0.25),
                0 15px 35px rgba(0, 0, 0, 0.25);

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-wrapper img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            border-radius: 50%;
        }

        /* =========================
           JUDUL
        ========================= */

        .login-title {
            color: white;

            font-size: 42px;

            font-weight: 700;

            letter-spacing: 1px;

            margin-bottom: 3px;
        }

        .school-name {
            color: rgba(255, 255, 255, 0.92);

            font-size: 20px;

            font-weight: 500;

            margin-bottom: 10px;
        }

        .login-description {
            color: rgba(255, 255, 255, 0.78);

            font-size: 14px;

            margin-bottom: 28px;
        }

        /* =========================
           FORM
        ========================= */

        .login-form {
            width: 100%;
        }

        .input-group {
            position: relative;
            margin-bottom: 11px;
        }

        .input-icon {
            position: absolute;

            left: 20px;
            top: 50%;

            transform: translateY(-50%);

            font-size: 18px;

            color: #5873a5;

            z-index: 2;
        }

        .input-group input {
        width: 100%;
        height: 45px;

        border: none;
        outline: none;

        border-radius: 10px;

        padding: 0 15px ;

        font-size: 11px;

        color: #263b62;

        background: rgba(255, 255, 255, 0.97);

        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.10);

        transition: 0.25s ease;
    }

        .input-group input::placeholder {
            color: #7c8dab;
        }

        .input-group input:focus {
            box-shadow:
                0 0 0 3px rgba(73, 157, 255, 0.35),
                0 8px 25px rgba(0, 0, 0, 0.15);
        }

        /* =========================
           OPTIONS
        ========================= */

        .form-options {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin: 6px 3px 22px;

            color: white;

            font-size: 13px;
        }

        .remember {
            display: flex;

            align-items: center;

            gap: 8px;

            cursor: pointer;
        }

        .remember input {
            width: 17px;
            height: 17px;

            accent-color: #2584ff;

            cursor: pointer;
        }

        .forgot-password {
            color: #9bcaff;

            text-decoration: none;

            transition: 0.2s;
        }

        .forgot-password:hover {
            color: white;
        }

        /* =========================
           LOGIN BUTTON
        ========================= */

        .login-button {
    width: 100%;
    height: 44px;

    border: none;
    border-radius: 10px;

    background: #0b2852;

    color: white;

    font-size: 13px;
    font-weight: 600;

    cursor: pointer;

    box-shadow: 0 7px 18px rgba(0, 0, 0, 0.20);

    transition: 0.25s ease;
}

.login-button:hover {
    background: #123b73;
    transform: translateY(-2px);
}

        .login-button:active {
            transform: translateY(0);
        }

        .arrow {
            margin-left: 8px;

            font-size: 20px;

            vertical-align: -1px;
        }

        /* =========================
           BACK TO WEBSITE
        ========================= */

        .back-link {
            display: inline-block;

            margin-top: 27px;

            color: #9bcaff;

            text-decoration: none;

            font-size: 14px;

            transition: 0.2s;
        }

        .back-link:hover {
            color: white;

            transform: translateX(-2px);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 600px) {

            .login-wrapper {
                max-width: 400px;

                padding: 25px 22px;
            }

            .logo-wrapper {
                width: 105px;
                height: 105px;
            }

            .login-title {
                font-size: 34px;
            }

            .school-name {
                font-size: 17px;
            }

            .login-description {
                font-size: 13px;
            }

            .input-group input {
                height: 56px;

                border-radius: 15px;
            }

            .login-button {
                height: 56px;

                border-radius: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        {{-- LOGO SEKOLAH --}}
        <div class="logo-wrapper">
            <img
                src="{{ asset('images/admin/logo.png') }}"
                alt="Logo SMKN 4 Bogor"
            >
        </div>

        {{-- JUDUL --}}
        <h1 class="login-title">
            Admin
        </h1>

        <div class="school-name">
            SMKN 4 Bogor
        </div>

        <p class="login-description">
            Silakan login untuk mengakses panel admin
        </p>

        {{-- FORM LOGIN --}}
        <form
            action="{{ route('admin.login.submit') }}"
            method="POST"
            class="login-form"
        >

            @csrf

            {{-- EMAIL / USERNAME --}}
            <div class="input-group">


                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    autocomplete="username"
                    required
                >
                @error('email')
                    <div style="color: #ffd5d5; font-size: 12px; margin-top: 6px;">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- PASSWORD --}}
            <div class="input-group">

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    autocomplete="current-password"
                    required
                >

            </div>

            {{-- OPTIONS --}}
            <div class="form-options">

                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                    >

                    <span>
                        Ingat saya
                    </span>

                </label>

                <a
                    href="#"
                    class="forgot-password"
                >
                    Lupa password?
                </a>

            </div>

            {{-- LOGIN --}}
            <button
                type="submit"
                class="login-button"
            >
                Login

                <span class="arrow">
                    →
                </span>
            </button>

        </form>

        {{-- KEMBALI KE WEBSITE --}}
        <a
            href="{{ route('home') }}"
            class="back-link"
        >
            ← &nbsp; Kembali ke Website
        </a>

    </div>

</body>
</html>