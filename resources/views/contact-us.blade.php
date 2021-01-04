@extends('layouts.app')

@section('title')
    ارتباط با ما
@endsection

@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">
                            ارتباط با ما
                        </h4>
                    </div>
                    <div class="card-body">
                        <p class="p-2 m-2 text-justify">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">پیشنهاد و یا نظر خود را با ما در میان بگزارید</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('contact.us')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="عنوان انتقاد یا پیشنهاد را واد کنید..." value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label for="description">متن انتقاد یا پیشنهاد</label>
                                <textarea name="description" id="description" class="form-control" placeholder="انتقاد یا پیشنهاد خود را وارد کنید..." cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block">
                                    <i class="fa fa-comment-medical"></i>
                                    ارسال
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
