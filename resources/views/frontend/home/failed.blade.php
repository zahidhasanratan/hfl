@extends('frontend.app')

@section('title','DMC Alumni')


@section('main')


    <div class="card-box">
        <div class="card">
            <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                <p class="closeee">x</p>
            </div>
            <h1 style="color:#d75a4a">Not Success</h1>
            <p>Your payement process has been failed<br/> Please Re-Try!</p>
        </div>
    </div>

    <style type="text/css">
        .card-box{
            margin: 30px 0px;
        }
        i {
            color: #4BB543 ;
            font-size: 100px;
            line-height: 200px;
            margin-left:-15px;
        }
        .closeee{
            color: #d75a4a ;
            font-size: 100px;
            line-height: 200px;
            margin-left:-15px;
        }

        h1 {
            color: #4BB543 ;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }

        .card {
            background: white;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: table;
            margin: 0 auto !important;
            text-align: center;

        }
    </style>

@endsection