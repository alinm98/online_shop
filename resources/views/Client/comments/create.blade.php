@extends('Client.layout.master')
@section('content')
    <!-- Start main-content -->
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start Product -->
            <div class="dt-sn mb-5 dt-sl">
                <form action="{{route('home.comment.store',$product)}}" method="post">
                    @csrf
                    <div class="row">
                        <!-- Product Thumbnail-->
                        <div class="col-lg-4 col-md-6 pb-5">
                            <div class="product-thumbnail text-center">
                                <a href="#">
                                    <img src="{{str_replace('public','/storage',$product->image)}}"
                                         class="img-fluid" alt="{{$product->name}}">
                                </a>
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class="col-lg-8 col-md-6 pb-5">
                            <div class="product-info dt-sl">
                                <div class="product-title dt-sl">
                                    <h1>
                                        {{$product->name}}
                                    </h1>
                                </div>
                                <div class="comments-product-attributes px-3 dt-sl">
                                    <div class="row">
                                        <div class="col-sm-6 col-12 mb-3">
                                            <div class="comments-product-attributes-title">کیفیت ساخت</div>
                                            <input id="ex19" type="text" data-provide="slider" name="quality"
                                                   data-slider-ticks="[1, 2, 3, 4, 5]"
                                                   data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                   data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                   data-slider-value="4" data-slider-tooltip="hide"/>
                                        </div>
                                        <div class="col-sm-6 col-12 mb-3">
                                            <div class="comments-product-attributes-title">ارزش خرید به نسبت قیمت
                                            </div>
                                            <input id="ex19" type="text" data-provide="slider" name="worth"
                                                   data-slider-ticks="[1, 2, 3, 4, 5]"
                                                   data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                   data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                   data-slider-value="4" data-slider-tooltip="hide"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-12 mb-3">
                                            <div class="comments-product-attributes-title">طراحی و ظاهر</div>
                                            <input id="ex19" type="text" data-provide="slider" name="design"
                                                   data-slider-ticks="[1, 2, 3, 4, 5]"
                                                   data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                   data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                   data-slider-value="4" data-slider-tooltip="hide"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row comments-add-col--content">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-ui">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-row-title mb-2">عنوان نظر شما (اجباری)</div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2" type="text" name="title"
                                                   placeholder="عنوان نظر خود را بنویسید" required>
                                        </div>
                                    </div>
                                    <div class="col-12 form-comment-title--positive mt-2">
                                        <div class="form-row-title mb-2 pr-2">
                                            نقطه قوت
                                        </div>
                                        <div id="advantages" class="form-row">
                                            <div class="ui-input--add-point">
                                                <input class="input-ui pr-2 ui-input-field" type="text"
                                                       name="good_points"
                                                       id="advantage-input" autocomplete="off" value="" required>
                                            </div>
                                            <div class="form-comment-dynamic-labels js-advantages-list"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 form-comment-title--negative mt-2">
                                        <div class="form-row-title mb-2 pr-2">
                                            نقطه ضعف
                                        </div>
                                        <div id="disadvantages" class="form-row">
                                            <div class="ui-input--add-point">
                                                <input class="input-ui pr-2 ui-input-field" type="text"
                                                       name="bad_points"
                                                       id="disadvantage-input" autocomplete="off" value="" required>
                                            </div>
                                            <div class="form-comment-dynamic-labels js-disadvantages-list"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-5">
                                        <div class="form-row-title mb-2">متن نظر شما (اجباری)</div>
                                        <div class="form-row">
                                                <textarea class="input-ui pr-2 pt-2" rows="5" name="description"
                                                          placeholder="متن خود را بنویسید" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2 mb-2 px-0">
                                        <div class="product-offer-question">
                                            <div
                                                class="section-title text-sm-title title-wide mb-1 no-after-title-wide">
                                                <h2 class="font-weight-bold">آیا خرید این محصول را به دوستانتان
                                                    پیشنهاد می کنید؟</h2>
                                            </div>
                                            <div class="product-offer-question-option">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="proposal"
                                                           class="custom-control-input" value="0" required>
                                                    <label class="custom-control-label" for="customRadio1">پیشنهاد
                                                        می کنم</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="proposal"
                                                           class="custom-control-input" value="1" required>
                                                    <label class="custom-control-label"
                                                           for="customRadio2">خیر،پیشنهاد نمی کنم</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio3" name="proposal"
                                                           class="custom-control-input" value="2" required>
                                                    <label class="custom-control-label" for="customRadio3">نظری
                                                        ندارم</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 px-0">
                                        <p class="d-block">با “ثبت نظر” موافقت خود را با <a href="#"
                                                                                            class="border-bottom-dt"
                                                                                            target="_blank">قوانین
                                                انتشار محتوا</a> در کرون اعلام می‌کنم.</p>
                                        <button class="btn btn btn-primary px-3" type="submit">
                                            ثبت نظر
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <h3>دیگران را با نوشتن نظرات خود، برای انتخاب این محصول راهنمایی کنید.</h3>
                            <div class="desc-comment">
                                <p>لطفا پیش از ارسال نظر، خلاصه قوانین زیر را مطالعه کنید:</p>
                                <p>فارسی بنویسید و از کیبورد فارسی استفاده کنید. بهتر است از فضای خالی (Space)
                                    بیش‌از‌حدِ معمول، شکلک یا ایموجی استفاده نکنید و از کشیدن حروف یا کلمات با
                                    صفحه‌کلید بپرهیزید.</p>
                                <p>نظرات خود را براساس تجربه و استفاده‌ی عملی و با دقت به نکات فنی ارسال کنید؛
                                    بدون
                                    تعصب به محصول خاص، مزایا و معایب را بازگو کنید و بهتر است از ارسال نظرات
                                    چندکلمه‌‌ای خودداری کنید.</p>
                                <p>بهتر است در نظرات خود از تمرکز روی عناصر متغیر مثل قیمت، پرهیز کنید.</p>
                                <p>به کاربران و سایر اشخاص احترام بگذارید. پیام‌هایی که شامل محتوای توهین‌آمیز و
                                    کلمات نامناسب باشند، حذف می‌شوند.</p>
                                <p>از ارسال لینک‌های سایت‌های دیگر و ارایه‌ی اطلاعات شخصی خودتان مثل شماره تماس،
                                    ایمیل و آی‌دی شبکه‌های اجتماعی پرهیز کنید.</p>
                                <p>با توجه به ساختار بخش نظرات، از پرسیدن سوال یا درخواست راهنمایی در این بخش
                                    خودداری کنید.</p>
                                <p>هرگونه نقد و نظر در خصوص سایت کرون، خدمات و درخواست کالا را با ایمیل
                                    <a href="mailto:info@digikala.com">
                                        info@digikala.com
                                    </a>
                                    یا با شماره‌ی

                                    <a href="tel: +982161930000">
                                        ۶۱۹۳۰۰۰۰ - ۰۲۱
                                    </a>
                                    در میان بگذارید و از نوشتن آن‌ها در بخش نظرات خودداری کنید.</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Product -->
        </div>
    </main>
    <!-- End main-content -->

@endsection
