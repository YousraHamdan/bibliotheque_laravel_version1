@extends('layouts.app')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: 'Georgia', serif;
            background-color: #f5f5dc; /* Parchment-like background */
            color: #3e2723; /* Dark brown for text */
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fffaf0; /* Light, creamy background */
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .title {
            text-align: center;
            color: #8b7355; /* Warm, earthy brown */
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #8b7355; /* Warm, earthy brown */
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #8b7355; /* Warm, earthy brown */
            outline: none;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #8b7355; /* Warm, earthy brown */
            color: white;
        }

        .btn-primary:hover {
            background-color: #6d4c41; /* Darker brown */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .title {
                font-size: 2rem;
            }
        }
    </style>

    <div class="container">
        <h1 class="title">Modifier un Emprunt</h1>

        <form action="{{ route('emprunts.update', $emprunt->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="livre_id">Livre</label>
                <select name="livre_id" id="livre_id">
                    @foreach($livres as $livre)
                        <option value="{{ $livre->id }}" {{ $livre->id == $emprunt->livre_id ? 'selected' : '' }}>{{ $livre->titre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date_emprunt">Date d'emprunt</label>
                <input type="date" name="date_emprunt" id="date_emprunt" value="{{ $emprunt->date_emprunt }}">
            </div>

            <div class="form-group">
                <label for="date_retour">Date de retour</label>
                <input type="date" name="date_retour" id="date_retour" value="{{ $emprunt->date_retour }}">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection