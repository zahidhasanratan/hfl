@extends('frontend.app')

@section('title','DMC Alumni')


@section('main')

    <!-- Inner Page Header Serction Start Here -->
    <div class="inner-page-header">
        <div class="banner">
            <img src="{{asset('front') }}/images/banner/3.jpg" alt="Banner">
        </div>
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-page-locator">
                            <ul>
                                <li><a href="{{ asset('/') }}">Home <i class="fa fa-compress" aria-hidden="true"></i> </a> Registration</li>
                            </ul>
                        </div>
                        <div class="header-page-title">
                            <h1> 78 <sup style="text-transform: lowercase;">th</sup>  DMC Day Registration</h1>
                            <h4 style="color: #eb5f0c;">10 July 2023</h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Page Header serction end here -->

    <style type="text/css">
        body{
            /*    background: #84889c;*/
        }

        .wrapper{
            /*    min-height: 100vh;*/
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .registration_form{
            background: #545871;
            padding: 25px;
            border-radius: 5px;
            width: 400px;
        }

        .registration_form .title{
            text-align: center;
            font-size: 20px;
            text-transform: uppercase;
            color: #ebd0ce;
            letter-spacing: 5px;
            font-weight: 700;
        }

        .form_wrap{
            margin-top: 35px;
        }

        .form_wrap .input_wrap{
            margin-bottom: 15px;
        }

        .form_wrap .input_wrap:last-child{
            margin-bottom: 0;
        }

        .form_wrap .input_wrap label{
            display: block;
            margin-bottom: 3px;
            color: #9597a6;
        }

        .form_wrap .input_grp{
            display: flex;
            justify-content: space-between;
        }

        .form_wrap .input_grp  input[type="text"]{
            width: 165px;
        }

        .form_wrap  input[type="text"]{
            width: 100%;
            border-radius: 3px;
            border: 1px solid #9597a6;
            padding: 10px;
            outline: none;
        }

        .form_wrap  input[type="text"]:focus{
            border-color: #ebd0ce;
        }

        .form_wrap ul{
            background: #fff;
            padding: 8px 10px;
            border-radius: 3px;
            display: flex;
            justify-content: center;
        }

        .form_wrap ul li:first-child{
            margin-right: 15px;
        }

        .form_wrap ul .radio_wrap{
            position: relative;
            margin-bottom: 0;
        }

        .form_wrap ul .radio_wrap .input_radio{
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0;
        }

        .form_wrap ul .radio_wrap span{
            display: inline-block;
            font-size: 14px;
            padding: 3px 20px;
            border-radius: 3px;
            color: #545871;
        }

        .form_wrap .input_radio:checked ~ span{
            background: #ebd0ce;
        }

        .form_wrap .submit_btn{
            width: 100%;
            background: #ebd0ce;
            padding: 10px;
            border: 0;
            border-radius: 3px;
            text-transform: uppercase;
            letter-spacing: 3px;
            cursor: pointer;
        }

        .form_wrap .submit_btn:hover{
            background: #ffd5d2;
        }

        .label-customs {
            display: flex;
            min-width: 100px;
            font-weight: normal;
            /* padding-top: 10px; */
        }
        ..label-customs2{
            display: flex;
            min-width: 300px;
            /* padding-top: 10px; */
        }
        .chk-input-custom {
            margin-right: 10px !important;
            margin-top: 0px !important;
        }
        .gender-all{
            display: flex;
            justify-content: space-between;
            /* border: 1px solid; */
            /* width: 50%; */
            width: calc(100% / 2 - 20px);
        }

        .input_radio {
            margin-top: 10px;
            display: inline-grid;
            width: 47%;
        }
        span.gender_title {
            font-weight: 500;
        }
        .pay-box{
            display: flex;
        }

        label.form-check-label.label-customs2 {
            min-width: 200px;
            display: flex;
            font-weight: normal;
        }
        .free-lab{
            margin-right: 10px !important;
            margin-top: 0px !important;
        }
    </style>


    <!-- https://codepen.io/alshaercode/pen/yLxXgLv -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="container-custom">
                    <div class="title">DMC Day Registration</div>
                    <form id="contact-form" method="post" action="{{ route('dmc.day') }}" >
                        @csrf
                        <div class="user_details">
                            <div class="input_pox">
                                <span class="datails">Name</span>
                                <input type="text" name="name" placeholder="enter your name" required>
                            </div>
                            <div class="input_pox">
                                <span class="datails">Mobile Number</span>
                                <input type="text" name="mobile" placeholder="enter your Mobile" required>
                            </div>

                            <div class="input_pox">
                                <span class="datails">Email</span>
                                <input type="text" name="email" placeholder="enter your Email" required>
                            </div>

                            <div class="input_radio">
                                <span class="gender_title"> Gender</span>

                                <div class="gender-all">
                                    <div class="form-check-inline">
                                        <label class="form-check-label label-customs" for="radio1">
                                            <input type="radio" class="form-check-input chk-input-custom" id="radio1" name="gender" value="Male" checked>Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label label-customs" for="radio2">
                                            <input type="radio" class="form-check-input chk-input-custom" id="radio2" name="gender" value="Female">Female
                                        </label>
                                    </div>
                                </div>
                            </div>


                           <div class="input_pox select-box">
                              <label for="sel1">Select your DMC Batch No.</label>
                              <select name="batch" class="form-control form-control-custom-3" id="firstDropdown" onchange="selectSecondValue()">
                                <option value="">Select Option</option>

                                <option value="K-5">K-5</option>
                                <option value="K-6">K-6</option>
                                <option value="K-7">K-7</option>
                                <option value="K-8">K-8</option>
                                <option value="K-9">K-9</option>
                                <option value="K-10">K-10</option>
                                <option value="K-11">K-11</option>
                                <option value="K-12">K-12</option>
                                <option value="K-13">K-13</option>
                                <option value="K-14">K-14</option>
                                <option value="K-15">K-15</option>
                                <option value="K-16">K-16</option>
                                <option value="K-17">K-17</option>
                                <option value="K-18">K-18</option>
                                <option value="K-19">K-19</option>
                                <option value="K-20">K-20</option>

                                <option value="K-21">K-21</option>
                                <option value="K-22">K-22</option>
                                <option value="K-23">K-23</option>
                                <option value="K-24">K-24</option>
                                <option value="K-25">K-25</option>
                                <option value="K-26">K-26</option>
                                <option value="K-27">K-27</option>
                                <option value="K-28">K-28</option>
                                <option value="K-29">K-29</option>
                                <option value="K-30">K-30</option>
                                <option value="K-31">K-31</option>
                                <option value="K-32">K-32</option>
                                <option value="K-33">K-33</option>
                                <option value="K-34">K-34</option>
                                <option value="K-35">K-35</option>
                                <option value="K-36">K-36</option>
                                <option value="K-37">K-37</option>
                                <option value="K-38">K-38</option>
                                <option value="K-39">K-39</option>
                                <option value="K-40">K-40</option>
                                <option value="K-41">K-41</option>
                                <option value="K-42">K-42</option>
                                <option value="K-43">K-43</option>
                                <option value="K-44">K-44</option>
                                <option value="K-45">K-45</option>
                                <option value="K-46">K-46</option>
                                <option value="K-47">K-47</option>
                                <option value="K-48">K-48</option>
                                <option value="K-49">K-49</option>
                                <option value="K-50">K-50</option>
                                <option value="K-51">K-51</option>
                                <option value="K-52">K-52</option>
                                <option value="K-53">K-53</option>
                                <option value="K-54">K-54</option>
                                <option value="K-55">K-55</option>
                                <option value="K-56">K-56</option>
                                <option value="K-57">K-57</option>
                                <option value="K-58">K-58</option>
                                <option value="K-59">K-59</option>
                                <option value="K-60">K-60</option>
                                <option value="K-61">K-61</option>
                                <option value="K-62">K-62</option>
                                <option value="K-63">K-63</option>
                                <option value="K-64">K-64</option>
                                <option value="K-65">K-65</option>
                                <option value="K-66">K-66</option>
                                <option value="K-67">K-67</option>
                                <option value="K-68">K-68</option>
                                <option value="K-69">K-69</option>
                                <option value="K-70">K-70</option>
                                <option value="K-71">K-71</option>
                                <option value="K-72">K-72</option>
                                <option value="K-73">K-73</option>
                                <option value="K-74">K-74</option>
                                <option value="K-75">K-75</option>
                                <option value="K-76">K-76</option>
                                <option value="K-77">K-77</option>
                                <option value="K-78">K-78</option>
                                <option value="K-79">K-79</option>
                                </select>
</div>

                            <div class="input_pox">
                                <label for="sel1">Show Amount</label>
                                <select name="btprice" class="form-control form-control-custom-3" id="secondDropdown">
                                    <option value="">Select Option</option>
                                </select>
                            </div>

                            <div class="input_pox form-full">
                                <span class="datails">Current Designation & Working Place</span>
                                <input name="currentdesignation" type="text" placeholder="Enter current designation & working place" required>
                            </div>



                            <div class="input_pox text-area">
                                <span style="font-weight: 500;" class="datails">Full Address</span>
                                <div class="form-outline">
                                    <textarea name="address" class="form-control" id="textAreaExample3" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="input_pox select-box form-group">
                                <label for="sel1">T - Shirt Size</label>
                                <select name="size" class="form-control form-control-custom" id="sel1" style="width: 100%;">
                                    <option>S -   (36-38) inches</option>
                                    <option>M -  (38-40) inches</option>
                                    <option>L -  (40-42) inches</option>
                                    <option>XL -  (42-44) inches</option>
                                    <option>XXL -  (46-48) inches</option>
                                    <option>XXXL -  (48-50) inches</option>
                                    <option>XXXXL -  (50-52) inches</option>
                                </select>
                            </div>


                            <!--  -->

                            <div class="input_pox select-box form-group ">
                                <label style="font-size:12px" for="sel1">Select game (One) you want to participate in DMC day</label>
                                <select name="game" class="form-control form-control-custom" style="width: 100%;">
                                    <option>Table Tennis</option>
                                    <option>Mini Basketball</option>
                                    <option>Carrom Board </option>
                                    <option>Snacks Ludo</option>
                                    <option>Throw Darts</option>
                                </select>
                            </div>

                            <div class="input_radio text-area radio-full">
                                <span class="gender_title"> Are you life member?</span>
                                <div class="member-all">
                                    <div class="form-check-inline">
                                        <label class="form-check-label label-customs" for="radio3">
                                            <input type="radio" class="form-check-input chk-input-custom"  id="chkPassport5"  name="lifemember" value="Yes">Yes
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label label-customs" for="radio4">
                                            <input type="radio" class="form-check-input chk-input-custom" id="chkPassport6" name="lifemember" value="No">No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="dvPassportMember" class="myDivjkj" style="display: none">
                                <div class="select-box gender_details">
                                    <div class="myDivjkj">
                                        <div class="input_pox input_pox_2">
                                            <span  class="datails">Please enter your life member Reg. Number </span>
                                            <input type="text" placeholder="Enter life member Reg. Number" name="lifeno">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="input_radio radio-full">
                                <span class="gender_title"> Accompany Person</span>
                                <div class="member-all">
                                    <div class="form-check-inline">
                                        <label class="form-check-label label-customs" for="radio5">
                                            <input type="radio" class="form-check-input chk-input-custom"  id="chkPassport"  name="acoompany" value="Yes">Yes
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label label-customs" for="radio6">
                                            <input type="radio" class="form-check-input chk-input-custom" id="chkPassport11" name="acoompany" value="No">No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="dvPassport" class="myDivjkj" style="display: none">
                                <div class="select-box gender_details">
                                    <div class="myDivjkj">
                                        <div class="pay-box member-all" style="margin-top:15px">
                                            <div class="form-check-inline">
                                                <label class="form-check-label label-customs2">
                                                    <input id="chkPassport-1" type="radio" class="form-check-input free-lab" name="spouse" value="Spouse1">Spouse
                                                </label>
                                            </div>

                                            <div class="form-check-inline">
                                                <label class="form-check-label label-customs2">
                                                    <input id="chkPassport-2" type="radio" class="form-check-input free-lab" name="spouse" value="Spouse2">Spouse with Kids
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div id="dvPassport2" class="myDivjkj" style="display: none">
                                <div class="pay-box">
                                    <div class="form-check-inline">
                                        <label class="form-check-label label-customs2">
                                            Below 10 Years Kids (Free)
                                        </label>

                                        <div class="myDiv2">
                                            <div class="select-box form-group">
                                                <select name="free" class="form-control form-control-custom-2" id="sel1">
                                                    <option value="">Select</option>
                                                    <option>0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check-inline">
                                        <label class="form-check-label label-customs2">
                                            Above 10 Years Per Person (1500 TK)
                                        </label>
                                        <div class="myDiv2">
                                            <div class="select-box form-group">
                                                <select name="plus10" class="form-control form-control-custom-2" id="sel1">
                                                    <option value="">Select</option>
                                                    <option>0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>









                            <style>
                                .myDiv{
                                    display:none;
                                }



                                #showOne{

                                }
                                #showTwo{
                                    border:1px solid green;
                                }
                                #showThree{
                                    border:1px solid blue;
                                }
                            </style>

                        </div>

                        <div class="button">
                            <input type="submit" value="Next">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






    <style type="text/css">


        .container-custom{
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px 30px;
            border-radius: 5px;
        }
        .container-custom .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
            margin-bottom: 40px;
        }
        .container-custom .title::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            height: 3px;
            width: 55px;
            background: linear-gradient(123deg, #71b8e7,#9b59b6);
        }
        .container-custom form .user_details{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .input_pox.form-full{
            width: calc(100% / 1) !important;
            margin: 10px 0 1px 0;
        }

        .input_radio.text-area.radi-full {
            width: 100%;
            display: grid;
        }

        .radio-full{
            width: 100%;
            display: grid;
        }
        .member-all {
            display: flex;
            justify-content: space-between;
            /* border: 1px solid; */
            /* width: 50%; */
            width: calc(10% / 2 - 20px);
        }
        div#dvPassportMember {
            width: 50%;
        }

        .form-control-custom{
            height: 45px;
            width: 40%;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }
        .form-control-custom-2{
            height: 45px;
            max-width: 120px;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }
        .input_pox.text-area {
            margin-bottom: 15px;
            margin: 10px 0 1px 0;
            width: calc(100% / 1) !important;
        }

        form .user_details .input_pox_2 {
            margin-bottom: 15px;
            margin: 10px 0 1px 0;
            width: calc(100% / 1 - 20px) !important;
        }

        select#firstDropdown {
            height: 45px;
        }
        select#secondDropdown {
            height: 45px;
        }

        .hide {
            display: none;
        }
        form .user_details .select-box {
            margin-bottom: 15px;
            margin: 10px 0 1px 0;
            width: calc(100% / 1 - 0px);
        }

        form .user_details .input_pox {
            margin-bottom: 15px;
            margin: 10px 0 1px 0;
            width: calc(100% / 2 - 20px);
        }
        form .user_details .input_pox-text{
            margin-bottom: 15px;
            margin: 20px 0 12px 0;
            width: calc(100%  - 0px);
        }
        .checkbox label input[type="checkbox"], .radio label input[type="radio"] {
            display: block;
        }
        .checkbox label {
            font-size: 15px;
            font-weight: 500;
        }
        span.gender {
            font-weight: normal;
        }
        .user_details .input_pox .datails{
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }
        .user_details .input_pox input{
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;

        }
        .user_details .input_pox input:focus,
        .user_details .input_pox input:valid{
            border-color: #9b59b6;
        }
        form .gender_details .gender_title {
            font-size: 15px;
            font-weight: 500;
        }
        form .gender_details .category {
            display: flex;
            width: 80%;
            margin: 5px 0;
            justify-content: start;
        }
        .gender_details .category label {
            display: flex;
            padding-left: 10px;
        }
        .gender_details .category .dot{
            height: 18px;
            width: 18px;
            background: #d9d9d9;
            border-radius: 50%;
            margin-right: 10px;
            border: 5px solid transparent;
        }
        #dot-1:checked ~ .category label .one,
        #dot-2:checked ~ .category label .two,
        #dot-3:checked ~ .category label .three,
        #dot-4:checked ~ .category label .four,
        #dot-5:checked ~ .category label .five,
        #dot-6:checked ~ .category label .six{
            border-color: #d9d9d9;
            background-color: #9b59b6;
        }
        form input[type="radio"]{
            /*    display: none;*/
            display: block;
        }
        form .button{
            height: 45px;
            margin: 45px 0;
        }
        form .button input{
            height: 100%;
            width: 100%;
            outline: none;
            color: #fff;
            border: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 5px;
            letter-spacing: 1px;
            background: linear-gradient(123deg, #71b8e7,#9b59b6);

        }
        form .button input :hover{
            background: linear-gradient(-123deg, #71b8e7,#9b59b6);
        }
        @media (max-width: 584px){
            .container-custom{
                max-width: 100%;
            }
            form .user_details .input_pox{
                margin-bottom: 0px;
                width:100%;
            }
            form .gender_details .category{
                width: 100%;
            }
            .container-custom form .user_details{
                /*max-height: 300px;*/
                /*overflow: scroll;*/
            }
            .user_details::-webkit-scrollber{
                width: 0;
            }

            .container-custom {
                padding: 25px 10px;
            }
            .form-control-custom {
                width: 100%;
            }

            .container-custom .title {
                margin-bottom: 10px;
                margin-top: 40px;
            }
            .form-control-custom-3{
                width: 100%;
            }

            div#dvPassport {
                display: contents;
            }
            form .user_details .select-box {
                width: 100%;
            }
            .pay-box {
                display: block;
            }
            .form-control-custom-2 {
                width: 100% !important;
                max-width: initial;
            }

            div#dvPassportMember {
                width: 100%;
            }
            form .user_details .input_pox_2 {
                width: calc(100% / 1 - 0px) !important;
            }

            .pay-box.member-all {
                margin-top: 0px !important;

            }



        }
    </style>




@endsection