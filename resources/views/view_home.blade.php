@extends('index')
@section('title', 'Home')

@section('isihalaman')
    <style>
        .italic {
            font-style: italic;
        }

        .centered-text {
            text-align: center;
        }

        .content {
            max-width: 800px; /* Atur lebar maksimum sesuai kebutuhan Anda */
            margin: 0 auto; /* Ini akan memusatkan elemen */
            padding: 10px; /* Tambahkan jarak antara konten dan tepi layar sesuai kebutuhan */
        }
    </style>

    <div class="content">
        <h2 class="centered-text italic">Welcome to</h2>
        <h1 class="centered-text">WORK WISE SEARCH</h1>

        <br><h4 class="centered-text">A b o u t</h4>
        <p class="centered-text"> 
            Work Wise Search is the latest source of information for everything related to the world of work, careers, and job searches. 
            We are committed to providing guidance, tips, advice, and the latest news about finding the right job, developing your career, 
            and achieving success in the world of work.
        </p>
    </div>
@endsection