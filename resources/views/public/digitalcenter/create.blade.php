@extends('layouts.app')
@section('title')
    Digital Center Registration
@endsection
@section('main')
    <div class="container">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-8 mx-auto" style="text-align : right">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                            onclick="clearFlashSession()"></button>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                            onclick="clearFlashSession()"></button>
                    </div>
                @endif

                <form class="p-4 p-md-5 rounded-3" action="{{ route('ODC.store') }}" method="POST">
                    @csrf
                    <h1 style="text-align : right">تسجيل المراكز الرقمية</h1>
                    <div class="form-group">
                        <label for="" class="is-required">الاسم الرباعي<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group ">

                            <input style="margin-left : 10px ; margin-bottom : 10px" name="father_name"
                                placeholder="اسم الأب" type="text"
                                class="form-control email @error('father_name') is-invalid @enderror " id="father_name"
                                value="{{ old('father_name') }}" required>

                            <input style="margin-left : 10px ; margin-bottom : 10px" name="first_name"
                                placeholder="الاسم الأول" type="text"
                                class="form-control email @error('first_name') is-invalid @enderror " id="first_name"
                                value="{{ old('first_name') }}" required>

                        </div>
                        <div class="input-group ">
                            <input style="margin-left : 10px ; margin-bottom : 10px" name="last_name"
                                placeholder="اسم العائلة" type="text"
                                class="form-control email @error('last_name') is-invalid @enderror " id="last_name"
                                value="{{ old('last_name') }}" required>

                            <input style="margin-left : 10px ; margin-bottom : 10px" name="grandfather_name"
                                placeholder="اسم الجد" type="text"
                                class="form-control email @error('grandfather_name') is-invalid @enderror "
                                id="grandfather_name" value="{{ old('grandfather_name') }}" required>

                        </div>
                        @if ($errors->has('first_name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                        @if ($errors->has('father_name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('father_name') }}
                            </div>
                        @endif
                        @if ($errors->has('grandfather_name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('grandfather_name') }}
                            </div>
                        @endif
                        @if ($errors->has('last_name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('last_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nationality" class="is-required">الجنسية<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group ">
                            <select name="nationality"
                                class="form-control email @error('nationality') is-invalid @enderror "
                                value="{{ old('nationality') }}" required id="nationality" onchange="showIdentification()">
                                <option value="" selected>-- Please Select --</option>
                                <option value="Jordanian" @if (old('nationality') == 'Jordanian') selected @endif>أردنية
                                </option>
                                <option value="NoneJordanian" @if (old('nationality') == 'NoneJordanian') selected @endif>غير
                                    أردنية</option>
                            </select>
                        </div>
                        @if ($errors->has('nationality'))
                            <div class="alert alert-danger">
                                {{ $errors->first('nationality') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group National_ID" style="display:none">
                        <label for="national_id" class="is-required National_ID" style="display:none">الرقم
                            الوطني<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <input name="national_id" type="text"
                                class="form-control email National_ID @error('national_id') is-invalid @enderror "
                                id="national_id" value="{{ old('national_id') }}" style="display:none">
                        </div>
                        @if ($errors->has('national_id'))
                            <div class="alert alert-danger">
                                {{ $errors->first('national_id') }}
                            </div>
                        @endif
                        @if (session('national_id'))
                            <div class="alert alert-danger">
                                {{ session('national_id') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group Passport_No" style="display:none">
                        <label for="passport_number" class="is-required Passport_No">رقم اللجوء أو رقم جواز
                            السفر<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <input name="passport_number" type="text"
                                class="form-control email Passport_No @error('passport_number') is-invalid @enderror "
                                id="passport_number" value="{{ old('passport_number') }}">
                            @error('passport_number')
                                <span class="invalid-feedback Passport_No" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if ($errors->has('passport_number'))
                            <div class="alert alert-danger">
                                {{ $errors->first('passport_number') }}
                            </div>
                        @endif
                        @if (session('passport_number'))
                            <div class="alert alert-danger">
                                {{ session('passport_number') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group" id="Other_Nationality" style="display:none">
                        <label for="other_nationalty" class="Passport_No">الجنسية (اختياري)</label>
                        <div class="input-group">
                            <input name="other_nationalty" type="text" class="form-control email Passport_No "
                                id="other_nationalty" value="{{ old('other_nationalty') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birthdate" class="is-required">العمر<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group ">
                            <input name="birthdate" required type="date"
                                class="form-control email @error('birthdate') is-invalid @enderror " id="birthdate"
                                value="{{ old('birthdate') }}">
                        </div>
                        @if ($errors->has('birthdate'))
                            <div class="alert alert-danger">
                                {{ $errors->first('birthdate') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="gender" class="is-required">الجنس<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group " style="text-align : right ; direction : rtl">
                            <div style="text-align : right ; direction : rtl ;">
                                <input style=" height:20px; width:20px;" name="gender" value="Male" required
                                    type="radio" class=" @error('gender') is-invalid @enderror " id="genderMale"
                                    @if (old('gender') == 'Male') checked @endif>
                                <label style="padding-right: 8px">ذكر</label>
                            </div>
                            <div style="text-align : right ; direction : rtl ; margin-right : 3vw;">
                                <input style=" height:20px; width:20px;" name="gender" value="Female" required
                                    type="radio" class="email @error('gender') is-invalid @enderror "
                                    id="genderFemale" @if (old('gender') == 'Female') checked @endif>
                                <label style="padding-right: 8px">أنثى</label>
                            </div>
                        </div>
                        @if ($errors->has('gender'))
                            <div class="alert alert-danger">
                                {{ $errors->first('gender') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email" class="is-required">البريد الالكتروني<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group ">
                            <input name="email" type="text"
                                class="form-control email @error('email') is-invalid @enderror " id="email"
                                value="{{ old('email') }}" required>
                        </div>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        @if (session('email'))
                            <div class="alert alert-danger">
                                {{ session('email') }}
                            </div>
                        @endif
                        <small>eg: username@domain.com </small>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="is-required">رقم الهاتف<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group ">
                            <input name="mobile" type="text"
                                class="form-control mobile @error('mobile') is-invalid @enderror " id="mobile"
                                value="{{ old('mobile') }}" required>
                        </div>
                        @if ($errors->has('mobile'))
                            <div class="alert alert-danger">
                                {{ $errors->first('mobile') }}
                            </div>
                        @endif
                        @if (session('mobile'))
                            <div class="alert alert-danger">
                                {{ session('mobile') }}
                            </div>
                        @endif
                        <small>eg: 077********</small>
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">رقم الواتساب (اختياري)</label>
                        <div class="input-group ">
                            <input name="whatsapp" type="text" class="form-control mobile" id="whatsapp"
                                value="{{ old('whatsapp') }}">
                        </div>
                        <small>eg: 077********</small>
                    </div>
                    <div class="form-group">
                        <label for="residence" class="is-required">محافظة السكن<span class="sr-only">
                                (required)</span></label>
                        <div class="input-group">
                            <select name="residence" class="form-control email @error('residence') is-invalid @enderror "
                                id="residence" required>
                                <option value="" selected>-- Please Select --</option>
                                <option value="Irbid" @if (old('residence') == 'Irbid') selected @endif>اربد
                                </option>
                                <option value="Ajloun" @if (old('residence') == 'Ajloun') selected @endif>عجلون
                                </option>
                                <option value="Jerash" @if (old('residence') == 'Jerash') selected @endif>جرش
                                </option>
                                <option value="Mafraq" @if (old('residence') == 'Mafraq') selected @endif>المفرق
                                </option>
                                <option value="Balqa" @if (old('residence') == 'Balqa') selected @endif>البلقاء
                                </option>
                                <option value="Amman" @if (old('residence') == 'Amman') selected @endif>عمان
                                </option>
                                <option value="Zarqa" @if (old('residence') == 'Zarqa') selected @endif>الزرقاء
                                </option>
                                <option value="Madaba" @if (old('residence') == 'Madaba') selected @endif>مادبا
                                </option>
                                <option value="Karak" @if (old('residence') == 'Karak') selected @endif>الكرك
                                </option>
                                <option value="Tafilah" @if (old('residence') == 'Tafilah') selected @endif>الطفيلة
                                </option>
                                <option value="Ma'an" @if (old('residence') == "Ma'an") selected @endif>معان
                                </option>
                                <option value="Aqaba" @if (old('residence') == 'Aqaba') selected @endif>العقبة
                                </option>
                            </select>
                        </div>
                        @if ($errors->has('residence'))
                            <div class="alert alert-danger">
                                {{ $errors->first('residence') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group" style="margin-top: 3vw">
                        <label for="education" class="is-required">المستوى التعليمي<span class="sr-only">
                                (required)</span></label>
                        <div style="text-align : right ; direction : rtl ; margin : 1vw">

                            <input name="education" value="Below Tawjihi" required type="radio"
                                class=" @error('education') is-invalid @enderror "
                                @if (old('education') == 'Below Tawjihi') checked @endif>
                            <span style="margin-top: 1vw">أقل من توجيهي</span>
                            <br>

                            <input style="margin-top: 15px" name="education" value="Tawjihi" required type="radio"
                                class=" @error('education') is-invalid @enderror "
                                @if (old('education') == 'Tawjihi') checked @endif>
                            <span style="margin-top: 1vw">توجيهي-شهادة ثانوية عامة</span>
                            <br>

                            <input style="margin-top: 15px" name="education" value="Diploma" required type="radio"
                                class=" @error('education') is-invalid @enderror "
                                @if (old('education') == 'Diploma') checked @endif>
                            <span style="margin-top: 1vw">دبلوم</span>
                            <br>

                            <input style="margin-top: 15px" name="education" value="Undergraduate" required
                                type="radio" class="@error('education') is-invalid @enderror "
                                @if (old('education') == 'Undergraduate') checked @endif>
                            <span style="margin-top: 1vw">باكلوريوس</span>
                            <br>

                            <input style="margin-top: 15px" name="education" value="Graduate" required type="radio"
                                class="@error('education') is-invalid @enderror "
                                @if (old('education') == 'Graduate') checked @endif>
                            <span style="margin-top: 1vw">ماجستير أو أعلى</span>
                            <br>

                        </div>
                        @if ($errors->has('education'))
                            <div class="alert alert-danger">
                                {{ $errors->first('education') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group" style="margin-top: 3vw">
                        <label for="employment" class="is-required">الحالة الوظيفية<span class="sr-only">
                                (required)</span></label>
                        <div style="text-align : right ; direction : rtl ; margin : 1vw">

                            <input name="employment" value="Part-Time" required type="radio"
                                class=" @error('employment') is-invalid @enderror "
                                @if (old('employment') == 'Part-Time') checked @endif>
                            <span style="margin-top: 1vw">دوام جزئي</span>
                            <br>

                            <input style="margin-top: 15px" name="employment" value="Full-Time" required type="radio"
                                class=" @error('employment') is-invalid @enderror "
                                @if (old('employment') == 'Full-time') checked @endif>
                            <span style="margin-top: 1vw">دوام كامل</span>
                            <br>

                            <input style="margin-top: 15px" name="employment" value="Self-Employed" required
                                type="radio" class=" @error('employment') is-invalid @enderror "
                                @if (old('employment') == 'Self-Employed') checked @endif>
                            <span style="margin-top: 1vw">توظيف ذاتي</span>
                            <br>

                            <input style="margin-top: 15px" name="employment" value="Unemployed" required type="radio"
                                class="@error('employment') is-invalid @enderror "
                                @if (old('employment') == 'Unemployed') checked @endif>
                            <span style="margin-top: 1vw">عاطل عن العمل</span>
                            <br>

                        </div>
                        @if ($errors->has('employment'))
                            <div class="alert alert-danger">
                                {{ $errors->first('employment') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group" style="margin-top: 3vw">
                        <label for="center" class="is-required">الرجاء اختيار المراكز الرقمية<span class="sr-only">
                                (required)</span></label>
                        <div>
                            <select name="center" class="form-control email @error('center') is-invalid @enderror "
                                id="" required>
                                <option value="" selected>-- Please Select --</option>
                                <option value="Amman markah" class="female" style="display: none"
                                    @if (old('center') == 'Amman markah') selected @endif>
                                    عمان – مؤسسة الملكه زين الشرف للتطوير / ماركا </option>
                                <option value="Amman alhashmi" class="female" style="display: none"
                                    @if (old('center') == 'Amman alhashmi') selected @endif>
                                    عمان – مركز الاميرة بسمة / الهاشمي</option>
                                <option value="Irbid abi-saaed" @if (old('center') == 'Irbid') selected @endif>اربد -
                                    مركز شباب دير ابي سعيد</option>
                                <option value="Irbid alhosn" @if (old('center') == 'Irbid') selected @endif>
                                    اربد –
                                    محطة معرفة الحصن</option>
                                <option value="Irbid princess-basma/sheikh-hosain" class="female" style="display: none"
                                    @if (old('center') == 'Irbid') selected @endif>اربد
                                    – مركز الاميرة بسمة /
                                    الشيخ حسين</option>
                                <option value="Mafraq wast-almadinah" @if (old('center') == 'Mafraq wast-almadinah') selected @endif>
                                    المفرق – محطة معرفة وسط
                                    المدينه</option>
                                <option value="Mafraq princess-basma" class="female" style="display: none"
                                    @if (old('center') == 'Mafraq princess-basma') selected @endif> المفرق – مركز الاميرة بسمة
                                    /رحاب</option>
                                <option value="As-salt" class="female"
                                    @if (old('center') == 'As-salt') selected @endif>السلط –
                                    مركز شابات العارضه</option>
                                <option value="Ajlon" class="female" style="display: none"
                                    @if (old('center') == 'Ajlon') selected @endif>عجلون –
                                    مركز شابات كفرنجه</option>
                                <option value="Jerash" @if (old('center') == 'Jerash') selected @endif>جرش -
                                    محطة معرفة الكتة</option>
                                <option value="Zarqa alhashmiah-uni" @if (old('center') == 'Zarqa alhashmiah-uni') selected @endif>
                                    الزرقاء
                                    - الجامعة الهاشمية</option>


                                <option value="Zarqa youth-center" @if (old('center') == 'Zarqa youth-center') selected @endif>
                                    الزرقاء – مركز شباب الزرقاء
                                </option>
                                <option value="Karak - Moutah University" @if (old('center') == 'Madaba altheeban') selected @endif>الكرك - جامعة مؤتة</option>
                                <option value="Madaba maaen" @if (old('center') == 'Madaba maaen') selected @endif>
                                    مادبا – محطة معرفة ماعين</option>
                                <option value="Madaba mleeh" @if (old('center') == 'Madaba mleeh') selected @endif>
                                    مادبا – محطة معرفة مليح</option>
                                <option value="Madaba princess-basma/wast almadinah" class="female" style="display: none"
                                    @if (old('center') == 'Madaba mleeh') selected @endif>
                                    مادبا – مركز الاميرة بسمة / وسط المدينه</option>
                                <option value="Madaba orange-club-german-uni"
                                    @if (old('center') == 'Madaba orange-club-german-uni') selected @endif>
                                    مادبا – نادي اورنج الجامعه الالمانيه</option>
                                <option value="Shoubak" @if (old('center') == 'Shoubak') selected @endif>معان -
                                    مركز شباب الشوبك</option>
                                <option value="Ma'an" @if (old('center') == "Ma'an") selected @endif>معان -
                                    مركز شباب معان</option>
                                <option value="Ma'an alhousaniah" class="female" style="display: none"
                                    @if (old('center') == "Ma'an alhousaniah") selected @endif>معان – مركز الاميره بسمه /
                                    الحسينيه</option>
                                <option value="Tafelah" @if (old('center') == 'Tafelah') selected @endif>الطفيله
                                    –محطة معرفة اعمار الطفيله</option>
                                <option value="Karak" @if (old('center') == 'Karak') selected @endif>
                                    الكرك – نادي ابداع الكرك</option>
                                <option value="Karak princess-basma/moata" class="female" style="display: none"
                                    @if (old('center') == 'Karak princess-basma/moata') selected @endif>
                                    الكرك – مركز الاميره بسمة / مؤته</option>
                                <option value="Al-aqaba youth-center" @if (old('center') == 'Al-aqaba youth-center') selected @endif>
                                    العقبه – مركز شباب العقبه </option>
                                <option value="Al-aqaba princess-basma" class="female" style="display: none"
                                    @if (old('center') == 'Al-aqaba princess-basma') selected @endif>
                                    العقبه- مركز الاميره بسمة</option>
                            </select>
                        </div>
                        @if ($errors->has('center'))
                            <div class="alert alert-danger">
                                {{ $errors->first('center') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group" style="margin-top: 3vw">
                        <label for="obstacles" class="is-required">هل لديك أي صعوبات يمكن أن تحد من مشاركتك في
                            التدريب؟<span class="sr-only"> (required)</span></label>
                        <div style="text-align : right ; direction : rtl ; margin : 1vw">

                            <input name="obstacles" value="Yes" required type="radio" id="IHaveObstacles"
                                onchange="showObstacles()" @if (old('obstacles') == 'Yes') checked @endif>
                            <span style="margin-top: 1vw">نعم</span>
                            <br>

                            <input style="margin-top: 15px" name="obstacles" value="No" required type="radio"
                                onchange="showObstacles()" @if (old('obstacles') == 'No') checked @endif>
                            <span style="margin-top: 1vw">لا</span>
                            <br>

                        </div>
                        @if ($errors->has('obstacles'))
                            <div class="alert alert-danger">
                                {{ $errors->first('obstacles') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group" id="obstacles" style="display: none ; margin-top: 3vw">
                        <label for="type_of_obstacles" class="is-required">يرجى اختيار الأقرب وصفاً الى ما تعاني
                            منه<span class="sr-only"> (required)</span></label>
                        <div style="text-align : right ; direction : rtl ; margin : 1vw">

                            <input class="@error('type_of_obstacles') is-invalid @enderror" name="type_of_obstacles[]"
                                value="صعوبات في النظر, حتى مع ارتداء النظارة؟" type="checkbox"
                                @if (is_array(old('type_of_obstacles')) && in_array('صعوبات في النظر, حتى مع ارتداء النظارة؟', old('type_of_obstacles'))) checked @endif>
                            <span style="margin-top: 1vw">صعوبات في النظر, حتى مع ارتداء النظارة؟</span>
                            <br>

                            <input style="margin-top: 15px" class="@error('type_of_obstacles') is-invalid @enderror"
                                name="type_of_obstacles[]" value="صعوبات في السمع, حتى مع وجود جهاز السمع المساعد؟"
                                type="checkbox" @if (is_array(old('type_of_obstacles')) &&
                                        in_array('صعوبات في السمع, حتى مع وجود جهاز السمع المساعد؟', old('type_of_obstacles'))) checked @endif>
                            <span style="margin-top: 1vw">صعوبات في السمع, حتى مع وجود جهاز السمع المساعد؟</span>
                            <br>

                            <input style="margin-top: 15px" class="@error('type_of_obstacles') is-invalid @enderror"
                                name="type_of_obstacles[]" value="صعوبات في المشي أو صعود الدرج؟" type="checkbox"
                                @if (is_array(old('type_of_obstacles')) && in_array('صعوبات في المشي أو صعود الدرج؟', old('type_of_obstacles'))) checked @endif>
                            <span style="margin-top: 1vw">صعوبات في المشي أو صعود الدرج؟</span>
                            <br>
                            <input style="margin-top: 15px" class="@error('type_of_obstacles') is-invalid @enderror"
                                name="type_of_obstacles[]" value="مشاكل في الذاكرة أو التركيز؟" type="checkbox"
                                @if (is_array(old('type_of_obstacles')) && in_array('مشاكل في الذاكرة أو التركيز؟', old('type_of_obstacles'))) checked @endif>
                            <span style="margin-top: 1vw">مشاكل في الذاكرة أو التركيز؟</span>
                            <br>
                            <input style="margin-top: 15px" class="@error('type_of_obstacles') is-invalid @enderror"
                                name="type_of_obstacles[]"
                                value="صعوبات في العناية الشخصية مثل غسل الملابس وارتداء الملابس؟" type="checkbox"
                                @if (is_array(old('type_of_obstacles')) &&
                                        in_array('صعوبات في العناية الشخصية مثل غسل الملابس وارتداء الملابس؟', old('type_of_obstacles'))) checked @endif>
                            <span style="margin-top: 1vw">صعوبات في العناية الشخصية مثل غسل الملابس وارتداء
                                الملابس؟</span>
                            <br>
                            <input style="margin-top: 15px" class="@error('type_of_obstacles') is-invalid @enderror"
                                name="type_of_obstacles[]"
                                value="صعوبات في التواصل, مثلاً أن تفهم الآخرين, أو فهم الآخرين لك؟" type="checkbox"
                                @if (is_array(old('type_of_obstacles')) &&
                                        in_array('صعوبات في التواصل, مثلاً أن تفهم الآخرين, أو فهم الآخرين لك؟', old('type_of_obstacles'))) checked @endif>
                            <span style="margin-top: 1vw">صعوبات في التواصل, مثلاً أن تفهم الآخرين, أو فهم الآخرين
                                لك؟</span>
                            <br>
                        </div>
                        @if ($errors->has('type_of_obstacles'))
                            <div class="alert alert-danger">
                                {{ $errors->first('type_of_obstacles') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group" style="margin-top: 3vw">
                        <label for="programming" class="is-required">تسجيل البرنامج<span class="sr-only">
                                (required)</span></label>
                        <div style="text-align : right ; direction : rtl ; margin : 1vw">
                            <input onchange="showChossenProgramming()" name="programming[]"
                                value="Career planning and development programme" type="checkbox"
                                @if (is_array(old('programming')) && in_array('Career planning and development programme', old('programming'))) checked @endif>
                            <span style="margin-top: 1vw">برنامج التخطيط والتطوير الوظيفي</span>
                            <br>
                            <input style="margin-top: 15px" onchange="showChossenProgramming()" name="programming[]"
                                value="digital culture" type="checkbox"
                                @if (is_array(old('programming')) && in_array('digital culture', old('programming'))) checked @endif>
                            <span style="margin-top: 1vw">الثقافة الرقمية</span>
                            <br>
                            <input style="margin-top: 15px" onchange="showChossenProgramming()" name="programming[]"
                                value="Life Skills" type="checkbox" @if (is_array(old('programming')) && in_array('Life Skills', old('programming'))) checked @endif>
                            <span style="margin-top: 1vw">المهارات الحياتية</span>
                            <br>
                            <input style="margin-top: 15px" onchange="showChossenProgramming()" name="programming[]"
                                value="Leadership and innovation skills" type="checkbox"
                                @if (is_array(old('programming')) && in_array('Leadership and innovation skills', old('programming'))) checked @endif>

                            <span style="margin-top: 1vw">مهارات الريادة والابتكار</span>
                            <br>
                            <input style="margin-top: 15px" onchange="showChossenProgramming()" name="programming[]"
                                value="Functional skills" type="checkbox"
                                @if (is_array(old('programming')) && in_array('Functional skills', old('programming'))) checked @endif>
                            <span style="margin-top: 1vw">المهارات الوظيفية</span>
                            <br>
                            <input style="margin-top: 15px" onchange="showChossenProgramming()" name="programming[]"
                                class="@error('programming') is-invalid @enderror " value="Other exercises"
                                type="checkbox" @if (is_array(old('programming')) && in_array('Other exercises', old('programming'))) checked @endif>
                            <span style="margin-top: 1vw">تدر يبات أخرى</span>
                            <br>
                        </div>
                        @if ($errors->has('programming'))
                            <div class="alert alert-danger">
                                {{ $errors->first('programming') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <div id="programming_plannung" style="display: none">
                            <hr>
                            <h4>
                                لقد تم اختيار برنامج التخطيط والتطوير الوظيفي
                            </h4>
                            <p>
                                ملاحظة: يتضمن هذا البرنامج الجلسات التالية
                                <br>
                                الوعي الذاتي
                                <br>
                                اكتشف الخيارات
                                <br>
                                التركيز والتخطيط
                                <br>
                                اتخاذ الاجراءات
                                <br>
                                الحفاظ على الوظيفة المهنية
                                <br>
                            </p>
                        </div>
                        <div id="programming_digitalCulture" style="display: none">
                            <hr>
                            <h4>
                                لقد تم اختيارالثقافة الرقمية
                            </h4>
                            <p>
                                مملاحظة: يتضمن هذا البرنامج الجلسات التالية
                                <br>
                                التحول الرقمي
                                <br>
                                الذكاء الاصطناعي
                                <br>
                                سلسلة الكتل
                                <br>
                                الحوسبة السحابية
                                <br>
                                إنترنت الأشياء
                                <br>
                                البيانات الضخمة
                                <br>
                                التجارة الإلكترونية
                                <br>
                                التسويق الرقمي
                                <br>
                                المنصات الاجتماعية
                                <br>
                                اللغة الإنجليزية واستخداماتها في الثقافة الرقمية
                                <br>
                            </p>
                        </div>
                        <div id="programming_lifeSkills" style="display: none">
                            <hr>
                            <h4>
                                لقد تم اختيارالمهارات الحياتية
                            </h4>
                            <p>
                                ملاحظة:يتضمن هذا البرنامج الجلسات التالية
                                <br>
                                إدارة التغيير
                                <br>
                                التفكير الإبداعي و مهارات حل المشكلات
                                <br>
                                مهارات القيادة والتخطيط والإدارة
                                <br>
                                مهارات التواصل
                                <br>
                                مهارات العرض التقديمي الفعال و نصب الافكار
                                <br>
                                مهارات الكتابة التقنية
                                <br>
                                التفكير التصميمي و مهارات السرد القصصي
                                <br>
                                مهارات التطوير والتمكين الذاتي
                                <br>
                                الذكاء العاطفي والتعامل مع الضغوط
                                <br>
                                قانون العمل الأردني و الإجراءات الخاصة بغرفة الصناعة والتجارة
                                <br>
                            </p>
                        </div>
                        <div id="programming_innovation" style="display: none">
                            <hr>
                            <h4>
                                لقد تم اختيار مهارات الريادة والابتكار
                            </h4>
                            <p>
                                ملاحظة: يتضمن هذا البرنامج الجلسات التالية
                                <br>
                                أساسيات ريادة الأعمال
                                <br>
                                أساسيات ريادة الأعمال متقدمة
                                <br>
                                الابتكار
                                <br>
                            </p>
                        </div>
                        <div id="programming_workSkills" style="display: none">
                            <hr>
                            <h4>
                                لقد تم اختيار المهارات الوظيفية
                            </h4>
                            <p>
                                ملاحظة: يتضمن هذا البرنامج الجلسات التالية
                                <br>
                                الجلسة الاولى: الوعي بالذات وفعالية الذات
                                <br>
                                الجلسة الثانية: مهارات إدارة الوقت و وضع الأهداف
                                <br>
                                الجلسة الثالثة: بناء فرق العمل و العمل الجماعي
                                <br>
                                الجلسة الرابعة: إعداد السيرة الذاتية و مهارات مقابلات التوظيف
                                <br>
                            </p>
                        </div>
                        <div id="programming_otherTraining" style="display: none">
                            <hr>
                            <h4>
                                لقد تم اختيار تدريبات اخرى
                            </h4>
                            <p>
                                ملاحظة: يتضمن هذا البرنامج الجلسات التالية
                                <br>
                                العمل الحر – Giglancing
                                <br>
                            </p>
                        </div>
                        <hr id="lastHR" style="display : none">
                    </div>
                    <p style="text-align : right ; margin-top: 3vw">البيانات التي تم جمعها من هذه الاستبانة سيتم
                        استخدام النتائج لتتبع مشاركتك في البرنامج و تقييم أداء البرنامج. سيتم التعامل مع إجاباتك
                        بسرية تامة، وما كتبته لن يتم كشفه للآخرين عدا الاشخاص المختصين برصد وتقييم البرنامج. سوف يتم
                        التعامل مع بيانات دراستك بسرية قدر الإمكان ، وجميع الإجراءات متوافقة مع قوانين الخصوصية
                        الأردنية. إذا تم نشر نتائج هذه الدراسة أو تقديمها ،الاسماء الشخصية والفردية سوف تعامل بكامل
                        السري

                        نشكر لكم إهتمامكم بالدورات المقدمة من مراكز أورنج المجتمعية الرقمية الهادفة الى تعزيز
                        مهاراتكم اللي بتحتاجوها لتزيدو فرصكم في سوق العمل
                        للتسجيل، يرجى تعبئة النموذج التالي</p>


                    <div class="form-group" style="text-align : right ; direction : rtl">
                        <div style="text-align : right ; direction :rtl" class="custom-control custom-checkbox">
                            <input class="custom-control-input @error('news') is-invalid @enderror" id="news"
                                name="news" type="checkbox" @if (old('news')) checked @endif>
                            <label class="custom-control-label " for="news">النشرة الاخبارية / أنا أوافق على
                                استلام رسائل الكترونية من شركة اورانج بانتظام (اختياري)</label>
                        </div>
                    </div>
                    <div class="form-group" style="text-align : right ; direction : rtl">
                        <div style="text-align : right ; direction :rtl" class="custom-control custom-checkbox">
                            <input class="custom-control-input @error('chAgree') is-invalid @enderror" id="chAgree"
                                name="chAgree" value="yes" type="checkbox"
                                @if (old('chAgree')) checked @endif required>
                            <label class="custom-control-label " for="chAgree">أوافق على استخدام بياناتي لأغراض
                                التتبع والتقييم<span class="mandatory-txt">*</span></label>

                            @error('chAgree')
                                <span class="invalid-feedback" role="alert">
                                    <strong> The Terms & Conditions Not Checked </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var $genderMale = $('#genderMale');
            var $genderFemale = $('#genderFemale');
            var $centerSelect = $('#center');
            var $femaleOptions = $('.female');

            $genderMale.add($genderFemale).change(function() {
                var gender = $('input[name="gender"]:checked').val();
                $femaleOptions.toggle(gender === 'Female');
            });
        });
        if (document.getElementById('nationality').value != "") {
            showIdentification()
        }
        if (document.getElementById('IHaveObstacles') != '') {
            showObstacles()
        }

        function showIdentification() {

            var input_national_id = document.querySelectorAll('input[name="national_id"]');
            var input_passport_number = document.querySelectorAll('input[name="passport_number"]');

            var National_ID = document.getElementsByClassName('National_ID');
            var Passport_No = document.getElementsByClassName('Passport_No');
            var Other_Nationality = document.getElementById('Other_Nationality');
            if (document.getElementById('nationality').value == 'Jordanian') {
                for (var i = 0; i < National_ID.length; i++) {
                    National_ID[i].style.display = 'block';
                    Passport_No[i].style.display = 'none';
                    Other_Nationality.style.display = 'none';
                    input_national_id.required = true;
                    input_passport_number.required = false;
                }
            } else if (document.getElementById('nationality').value == 'NoneJordanian') {
                for (var i = 0; i < Passport_No.length; i++) {
                    Passport_No[i].style.display = 'block';
                    Other_Nationality.style.display = 'block';
                    National_ID[i].style.display = 'none';
                    input_passport_number.required = true;
                    input_national_id.required = false;
                }
            } else {
                for (var i = 0; i < Passport_No.length; i++) {
                    National_ID[i].style.display = 'none';
                    Other_Nationality.style.display = 'none';
                    Passport_No[i].style.display = 'none';
                    input_passport_number.required = false;
                    input_national_id.required = false;
                }
            }
        }


        var educationRadios = document.querySelectorAll('input[name="education"]');
        var majorEducationElements = document.getElementsByClassName('major_education');

        for (var i = 0; i < educationRadios.length; i++) {
            educationRadios[i].addEventListener('change', function() {
                if (this.value === 'Undergraduate' || this.value === 'Graduate') {
                    for (var j = 0; j < majorEducationElements.length; j++) {
                        majorEducationElements[j].style.display = 'block';
                        majorEducationElements[j].setAttribute('required', '');
                    }
                } else {
                    for (var j = 0; j < majorEducationElements.length; j++) {
                        majorEducationElements[j].style.display = 'none';
                        majorEducationElements[j].removeAttribute('required');
                    }
                }
            });
        }

        function showObstacles() {
            var have_obsatacles = document.getElementById('IHaveObstacles');
            if (have_obsatacles.checked) {
                document.getElementById('obstacles').style.display = 'block'
            } else {
                document.getElementById('obstacles').style.display = 'none'
            }
        }

        function showChossenProgramming() {
            var choosen_programming = document.querySelectorAll('input[name="programming[]"]');

            for (i = 0; i < choosen_programming.length; i++) {
                if (choosen_programming[i].checked) {
                    document.getElementById('lastHR').style.display = 'block'
                    switch (choosen_programming[i].value) {
                        case 'Career planning and development programme':
                            document.getElementById('programming_plannung').style.display = 'block';
                            break;

                        case 'digital culture':
                            document.getElementById('programming_digitalCulture').style.display = 'block';
                            break;

                        case 'Life Skills':
                            document.getElementById('programming_lifeSkills').style.display = 'block';
                            break;

                        case 'Leadership and innovation skills':
                            document.getElementById('programming_innovation').style.display = 'block';
                            break;

                        case 'Functional skills':
                            document.getElementById('programming_workSkills').style.display = 'block';
                            break;

                        case 'Other exercises':
                            document.getElementById('programming_otherTraining').style.display = 'block';
                            break;
                    }

                } else {
                    switch (choosen_programming[i].value) {
                        case 'Career planning and development programme':
                            document.getElementById('programming_plannung').style.display = 'none';
                            break;

                        case 'digital culture':
                            document.getElementById('programming_digitalCulture').style.display = 'none';
                            break;

                        case 'Life Skills':
                            document.getElementById('programming_lifeSkills').style.display = 'none';
                            break;

                        case 'Leadership and innovation skills':
                            document.getElementById('programming_innovation').style.display = 'none';
                            break;

                        case 'Functional skills':
                            document.getElementById('programming_workSkills').style.display = 'none';
                            break;

                        case 'Other exercises':
                            document.getElementById('programming_otherTraining').style.display = 'none';
                            break;
                    }
                }
            }
        }
    </script>
@endsection
