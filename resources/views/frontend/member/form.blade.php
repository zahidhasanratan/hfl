@extends('frontend.app')

@section('title')
    Membership Form | Jatiyo Party
@endsection
@section('about')
    <section class="wpo-page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>সদস্যপদ আবেদন ফর্ম</h2>
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="index.html">হোম
                                </a></li>
                            <li>সদস্যপদ আবেদন ফর্ম</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>

    <section class="wpo-about-section-s2 section-padding">
        <div class="container">
            <h2 class="main-title"> প্রাথমিক সদস্যপদ আবেদন ফর্ম</h2>
            <form class="mb-4" action="{{ route('member.submit') }}" method="post" enctype="multipart/form-data">
                @include('layouts.partial.msg')
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>নাম</label>
                            <input type="text" class="form-control" placeholder="নাম" name="Name" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>পিতা/মাতা/স্বামী</label>
                            <input type="text" class="form-control" placeholder="পিতা/মাতা/স্বামী" name="FatherMotherHusband" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>বয়স</label>
                            <input type="text" class="form-control" placeholder="বয়স" name="Age" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>পেশা</label>
                            <input type="text" class="form-control" placeholder="পেশা" name="Occupation" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>শিক্ষাগত যোগ্যতা</label>
                            <input type="text" class="form-control" placeholder="শিক্ষাগত যোগ্যতা" name="EducationQuali" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>ছবি</label>
                            <input type="file" class="form-control" name="image" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>গ্রাম/বাড়ি</label>
                            <input type="text" class="form-control" placeholder="গ্রাম/বাড়ি" name="VillageHome" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>ইউনিয়ন/পৌরসভা</label>
                            <input type="text" class="form-control" placeholder="ইউনিয়ন/পৌরসভা" name="UnionMunicipality" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>থানা/উপজেলা</label>
                            <input type="text" class="form-control" placeholder="থানা/উপজেলা" name="ThanaUpazila" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>জেলা</label>
                            <select name="districtId" class="form-control" required="">
                                <option value="">জেলা</option>
                                <option>কক্সবাজার</option>
                                <option>কিশোরগঞ্জ</option>
                                <option>কুমিল্লা</option>
                                <option>কুষ্টিয়া</option>
                                <option>কুড়িগ্রাম</option>
                                <option>খাগড়াছড়ি</option>
                                <option>খুলনা</option>
                                <option>গাইবান্ধা</option>
                                <option>গাজীপুর</option>
                                <option>গোপালগঞ্জ</option>
                                <option>চট্টগ্রাম</option>
                                <option>চাঁদপুর</option>
                                <option>চাঁপাইনবাবগঞ্জ</option>
                                <option>চুয়াডাঙ্গা</option>
                                <option>জামালপুর</option>
                                <option>জয়পুরহাট</option>
                                <option>ঝালকাঠি</option>
                                <option>ঝিনাইদহ</option>
                                <option>টাঙ্গাইল</option>
                                <option>ঠাকুরগাঁও</option>
                                <option>ঢাকা</option>
                                <option>দিনাজপুর</option>
                                <option>নওগাঁ</option>
                                <option>নড়াইল</option>
                                <option>নরসিংদী</option>
                                <option>নাটোর</option>
                                <option>নারায়ণগঞ্জ</option>
                                <option>নীলফামারী</option>
                                <option>নেত্রকোণা</option>
                                <option>নোয়াখালী</option>
                                <option>পঞ্চগড়</option>
                                <option>পটুয়াখালী</option>
                                <option>পাবনা</option>
                                <option>পিরোজপুর</option>
                                <option>ফরিদপুর</option>
                                <option>ফেনী</option>
                                <option>বগুড়া</option>
                                <option>বরগুনা</option>
                                <option>বরিশাল</option>
                                <option>বাগেরহাট</option>
                                <option>বান্দরবান</option>
                                <option>ব্রাহ্মণবাড়িয়া</option>
                                <option>ভোলা</option>
                                <option>মাগুরা</option>
                                <option>মাদারীপুর</option>
                                <option>মানিকগঞ্জ</option>
                                <option>মুন্সিগঞ্জ</option>
                                <option>মেহেরপুর</option>
                                <option>মৌলভীবাজার</option>
                                <option>ময়মনসিংহ</option>
                                <option>যশোর</option>
                                <option>রংপুর</option>
                                <option>রাঙ্গামাটি</option>
                                <option>রাজবাড়ী</option>
                                <option>রাজশাহী</option>
                                <option>লক্ষ্মীপুর</option>
                                <option>লালমনিরহাট</option>
                                <option>শরীয়তপুর</option>
                                <option>শেরপুর</option>
                                <option>সাতক্ষীরা</option>
                                <option>সিরাজগঞ্জ</option>
                                <option>সিলেট</option>
                                <option>সুনামগঞ্জ</option>
                                <option>হবিগঞ্জ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>জাতীয় পরিচয়পত্র নম্বর</label>
                            <input type="text" class="form-control" placeholder="জাতীয় পরিচয়পত্র নম্বর" name="NID" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>মোবাইল নাম্বার</label>
                            <input type="text" class="form-control numbersOnly" placeholder="মোবাইল নাম্বার" name="MobileNo" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>ইমেইল</label>
                            <input type="text" class="form-control" placeholder="ইমেইল" name="Email" value="">
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div class="form-group">
                            <label>পূর্বের রাজনীতির (বৃত্তান্ত) পদ পদবী সহ বিস্তারিত</label>
                            <textarea type="text" class="form-control" name="past" ></textarea>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="checkbox" name="Agree" value="Yes" required=""> জাতীয় পার্টির ঘোষণাপত্র, গঠনতন্ত্র ও কর্মসূচির প্রতি আনুগত্য ঘোষণাপূর্বক জাতীয় পার্টির প্রাথমিক সদস্য হওয়ার স্বীকৃতি স্বরূপ ধার্যকৃত ২০ (বিশ) টাকা মাত্র চাঁদা প্রদান করলাম। (অফেরতযোগ্য )
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary" name="submit" value="জমা দিন">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection