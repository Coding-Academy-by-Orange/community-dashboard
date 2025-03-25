@extends('layouts.app')
@section('title')
    Fiber Academy Registration
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

                @if(session('success'))
                <div class="alert alert-success" id="success-message">
                    {{ session('success') }}
                </div>
                @endif


               
                <form class="p-4 p-md-5 rounded-3" action="{{ route('fiberacademy.store') }}" method="POST">
                    @csrf
                    <h1 style="text-align : left">Fiber Academy Registration</h1>

                    <!-- Full Name -->
                    <div class="form-group">
                        <label for="name" class="is-required">الاسم الكامل<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="name" placeholder="Enter your full name" value="{{ old('full_name') }}" required>
                        </div>
                        @if ($errors->has('full_name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('full_name') }}
                            </div>
                        @endif
                    </div>

                    <!-- Age -->
                    <div class="form-group">
                        <label for="age" class="is-required">العمر<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <select name="age" class="form-control email @error('age') is-invalid @enderror" required id="age">
                                <option value="" selected>-- Please Select --</option>
                                @foreach (range(18, 30) as $age)
                                    <option value="{{ $age }}" @if (old('age') == $age) selected @endif>{{ $age }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('age'))
                            <div class="alert alert-danger">
                                {{ $errors->first('age') }}
                            </div>
                        @endif
                    </div>

                    <!-- Gender -->
                    <div class="form-group">
                        <label for="gender" class="is-required">الجنس<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" required id="gender">
                                <option value="" selected>-- Please Select --</option>
                                <option value="male" @if (old('gender') == 'Male') selected @endif>ذكر</option>
                                <option value="female" @if (old('gender') == 'Female') selected @endif>أنثى</option>
                            </select>
                        </div>
                        @if ($errors->has('gender'))
                            <div class="alert alert-danger">
                                {{ $errors->first('gender') }}
                            </div>
                        @endif
                    </div>

                    <!-- Education Level -->
                    <div class="form-group">
                        <label for="education" class="is-required">المستوى التعليمي<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <select name="education" class="form-control @error('education') is-invalid @enderror" required id="education">
                                <option value="" selected>-- Please Select --</option>
                                <option value="tawjihi" @if (old('education') == 'tawjihi') selected @endif>توجيهي</option>
                                <option value="Diploma (Non-Engineering Specializations)" @if (old('education') == 'Diploma (Non-Engineering Specializations)') selected @endif>دبلوم (تخصصات غير هندسية)</option>
                                <option value="Diploma (Engineering Specializations)" @if (old('education') == 'Diploma (Engineering Specializations)') selected @endif>دبلوم (تخصصات هندسية)</option>
                                <option value="Bachelor (Non-Engineering Specializations)" @if (old('education') == 'Bachelor (Non-Engineering Specializations)') selected @endif>بكالوريوس (تخصصات غير هندسية)</option>
                                <option value="Bachelor (Engineering Specializations)" @if (old('education') == 'Bachelor (Engineering Specializations)') selected @endif>بكالوريوس (تخصصات هندسية)</option>
                                <option value="Master" @if (old('education') == 'Master') selected @endif>ماجستير</option>
                                <option value="PhD" @if (old('education') == 'PhD') selected @endif>دكتوراه</option>
                            </select>
                        </div>
                        @if ($errors->has('education'))
                            <div class="alert alert-danger">
                                {{ $errors->first('education') }}
                            </div>
                        @endif
                    </div>

                    <!-- Specialization -->
                    <div class="form-group">
                        <label for="specialization" class="is-required">التخصص<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <input type="text" name="specialization" class="form-control @error('specialization') is-invalid @enderror" id="specialization" required value="{{ old('specialization') }}" placeholder="أدخل تخصصك">
                        </div>
                        @if ($errors->has('specialization'))
                            <div class="alert alert-danger">
                                {{ $errors->first('specialization') }}
                            </div>
                        @endif
                    </div>

                    <!-- Experience in Marketing -->
                    <div class="form-group">
                        <label for="experience_in_marketing" class="is-required">هل لديك خبرة في التسويق؟<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <select name="experience_in_marketing" class="form-control @error('experience_in_marketing') is-invalid @enderror" required id="experience_in_marketing">
                                <option value="" selected>-- Please Select --</option>
                                <option value="1" @if (old('experience_in_marketing') == '1') selected @endif>نعم</option>
                                <option value="0" @if (old('experience_in_marketing') == '0') selected @endif>لا</option>
                            </select>
                        </div>
                        @if ($errors->has('experience_in_marketing'))
                            <div class="alert alert-danger">
                                {{ $errors->first('experience_in_marketing') }}
                            </div>
                        @endif
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <label for="phone_number" class="is-required">رقم الهاتف<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <input name="phone_number" type="text" class="form-control mobile @error('phone_number') is-invalid @enderror" id="mobile" value="{{ old('phone_number') }}" required>
                        </div>
                        @if ($errors->has('phone_number'))
                            <div class="alert alert-danger">
                                {{ $errors->first('phone_number') }}
                            </div>
                        @endif
                       
                        <small>eg: 077********</small>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="is-required">البريد الالكتروني<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <input name="email" type="text" class="form-control email @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required>
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
                        <small>eg: username@domain.com</small>
                    </div>

                    <!-- Residence -->
                    <div class="form-group">
                        <label for="residence" class="is-required">محافظة السكن<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <select name="residence" class="form-control email @error('residence') is-invalid @enderror" id="residence" required>
                                <option value="" selected>-- Please Select --</option>
                                <option value="Amman" @if (old('residence') == 'Amman') selected @endif>عمان</option>
                                <option value="Irbid" @if (old('residence') == 'Irbid') selected @endif>اربد</option>
                                <option value="Ajloun" @if (old('residence') == 'Ajloun') selected @endif>عجلون</option>
                                <option value="Zarqa" @if (old('residence') == 'Zarqa') selected @endif>الزرقاء</option>
                                <option value="Madaba" @if (old('residence') == 'Madaba') selected @endif>مادبا</option>
                                <option value="Balqa" @if (old('residence') == 'Balqa') selected @endif>البلقاء</option>
                                <option value="Mafraq" @if (old('residence') == 'Mafraq') selected @endif>المفرق</option>
                                <option value="Jerash" @if (old('residence') == 'Jerash') selected @endif>جرش</option>
                                <option value="Karak" @if (old('residence') == 'Karak') selected @endif>الكرك</option>
                                <option value="Tafilah" @if (old('residence') == 'Tafilah') selected @endif>الطفيلة</option>
                                <option value="Ma'an" @if (old('residence') == "Ma'an") selected @endif>معان</option>
                                <option value="Aqaba" @if (old('residence') == 'Aqaba') selected @endif>العقبة</option>
                            </select>
                        </div>
                        @if ($errors->has('residence'))
                            <div class="alert alert-danger">
                                {{ $errors->first('residence') }}
                            </div>
                        @endif
                    </div>

                    <!-- Join Motivation -->
                    <div class="form-group" style="margin-top:3vw">
                        <label for="join_motivation" class="is-required">لماذا ترغب في الإنضمام إلى هذا البرنامج؟<span class="sr-only"> (required)</span></label>
                        <div style="text-align: right; direction: rtl; margin: 1vw">
                            <input name="join_motivation" value="I want to learn and develop my skills because this field is my passion" required type="radio"
                                class="@error('join_motivation') is-invalid @enderror"
                                @if (old('join_motivation') == 'I want to learn and develop my skills because this field is my passion') checked @endif>
                            <span style="margin-top: 1vw">أريد أن أتعلم وأطور مهاراتي لأن هذا المجال هو شغفي.</span>
                            <br>
                            <input style="margin-top: 15px" name="join_motivation" value="I think it might be useful for me in the future, but Im not sure" required type="radio"
                                class="@error('join_motivation') is-invalid @enderror"
                                @if (old('join_motivation') == "I think it might be useful for me in the future, but Im not sure") checked @endif>
                            <span style="margin-top: 1vw">أعتقد أنه قد يكون مفيدًا لي مستقبلاً، لكنني لست متأكدًا.</span>
                            <br>
                            <input style="margin-top: 15px" name="join_motivation" value="I registered based on a friends advice, but I dont know much about the program" required type="radio"
                                class="@error('join_motivation') is-invalid @enderror"
                                @if (old('join_motivation') == "I registered based on a friends advice, but I dont know much about the program") checked @endif>
                            <span style="margin-top: 1vw">سجلت بناءً على نصيحة أحد الأصدقاء، لكن لا أعرف الكثير عن البرنامج.</span>
                            <br>
                            <input style="margin-top: 15px" name="join_motivation" value="I dont have a clear reason, but I want to try" required type="radio"
                                class="@error('join_motivation') is-invalid @enderror"
                                @if (old('join_motivation') == "I dont have a clear reason, but I want to try") checked @endif>
                            <span style="margin-top: 1vw">لا أملك سببًا واضحًا، ولكنني أرغب في التجربة.</span>
                            <br>
                        </div>
                        @if ($errors->has('join_motivation'))
                            <div class="alert alert-danger">
                                {{ $errors->first('join_motivation') }}
                            </div>
                        @endif
                    </div>

                    <!-- Challenge Handling -->
                    <div class="form-group" style="margin-top: 3vw">
                        <label for="challenge_handling" class="is-required">كيف تتعامل مع التحديات والصعوبات أثناء التعلم؟<span class="sr-only"> (required)</span></label>
                        <div style="text-align: right; direction: rtl; margin: 1vw">
                            <input name="challenge_handling" value="I look for solutions and challenge myself to continue until I overcome the problem" required type="radio"
                                class="@error('challenge_handling') is-invalid @enderror"
                                @if (old('challenge_handling') == 'I look for solutions and challenge myself to continue until I overcome the problem') checked @endif>
                            <span style="margin-top: 1vw">أبحث عن حلول وأتحدى نفسي للاستمرار حتى أتغلب على المشكلة.</span>
                            <br>
                            <input style="margin-top: 15px" name="challenge_handling" value="I try for a while, but if its too difficult, I might consider stopping" required type="radio"
                                class="@error('challenge_handling') is-invalid @enderror"
                                @if (old('challenge_handling') == "I try for a while, but if its too difficult, I might consider stopping") checked @endif>
                            <span style="margin-top: 1vw">أحاول بعض الوقت، ولكن إذا كان الأمر صعبًا جدًا، قد أفكر في التوقف.</span>
                            <br>
                            <input style="margin-top: 15px" name="challenge_handling" value="I prefer to avoid challenges and look for easier ways to complete tasks" required type="radio"
                                class="@error('challenge_handling') is-invalid @enderror"
                                @if (old('challenge_handling') == 'I prefer to avoid challenges and look for easier ways to complete tasks') checked @endif>
                            <span style="margin-top: 1vw">أفضل تجنب التحديات والبحث عن طرق أسهل لإنجاز المهام.</span>
                            <br>
                            <input style="margin-top: 15px" name="challenge_handling" value="I ask for help directly without trying to find the solution myself" required type="radio"
                                class="@error('challenge_handling') is-invalid @enderror"
                                @if (old('challenge_handling') == 'I ask for help directly without trying to find the solution myself') checked @endif>
                            <span style="margin-top: 1vw">أطلب المساعدة مباشرة دون محاولة إيجاد الحل بنفسي.</span>
                            <br>
                        </div>
                        @if ($errors->has('challenge_handling'))
                            <div class="alert alert-danger">
                                {{ $errors->first('challenge_handling') }}
                            </div>
                        @endif
                    </div>

                    <!-- Program Benefit -->
                    <div class="form-group" style="margin-top: 3vw">
                        <label for="program_benefit" class="is-required">كيف تخطط للإستفادة من هذا البرنامج مستقبلا؟<span class="sr-only"> (required)</span></label>
                        <div style="text-align: right; direction: rtl; margin: 1vw">
                            <input name="program_benefit" value="I have a clear vision of how to apply what I will learn in my professional or personal life" required type="radio"
                                class="@error('program_benefit') is-invalid @enderror"
                                @if (old('program_benefit') == 'I have a clear vision of how to apply what I will learn in my professional or personal life') checked @endif>
                            <span style="margin-top: 1vw">لدي رؤية واضحة لكيفية تطبيق ما سأتعلمه في حياتي المهنية أو الشخصية.</span>
                            <br>
                            <input style="margin-top: 15px" name="program_benefit" value="I think I might benefit from it, but I havent made a clear plan yet" required type="radio"
                                class="@error('program_benefit') is-invalid @enderror"
                                @if (old('program_benefit') == "I think I might benefit from it, but I havent made a clear plan yet") checked @endif>
                            <span style="margin-top: 1vw">أعتقد أنني قد أستفيد منه، لكنني لم أضع خطة واضحة بعد.</span>
                            <br>
                            <input style="margin-top: 15px" name="program_benefit" value="I dont know how I will use this knowledge in the future, but I might find it useful later" required type="radio"
                                class="@error('program_benefit') is-invalid @enderror"
                                @if (old('program_benefit') == "I dont know how I will use this knowledge in the future, but I might find it useful later") checked @endif>
                            <span style="margin-top: 1vw">لا أعلم كيف سأستخدم هذه المعرفة مستقبلاً، لكنني قد أجد لها فائدة لاحقًا.</span>
                            <br>
                            <input style="margin-top: 15px" name="program_benefit" value="I dont think I will use it later, but I enjoyed the experience" required type="radio"
                                class="@error('program_benefit') is-invalid @enderror"
                                @if (old('program_benefit') == "I dont think I will use it later, but I enjoyed the experience") checked @endif>
                            <span style="margin-top: 1vw">لا أظن أنني سأستخدمه لاحقًا، لكني أحببت التجربة.</span>
                            <br>
                        </div>
                        @if ($errors->has('program_benefit'))
                            <div class="alert alert-danger">
                                {{ $errors->first('program_benefit') }}
                            </div>
                        @endif
                    </div>

                    <!-- Commitment Question -->
                    <div class="form-group" style="margin-top: 3vw">
                        <label for="commitment_question" class="is-required">إذا كنت مشغولًا بمهام أخرى، كيف ستضمن التزامك بحضور البرنامج؟<span class="sr-only"> (required)</span></label>
                        <div style="text-align: right; direction: rtl; margin: 1vw">
                            <input name="commitment_question" value="I will set an organized schedule and stick to it because I see great value in this program" required type="radio"
                                class="@error('commitment_question') is-invalid @enderror"
                                @if (old('commitment_question') == 'I will set an organized schedule and stick to it because I see great value in this program') checked @endif>
                            <span style="margin-top: 1vw">سأضع جدولًا منظمًا وألتزم به لأنني أرى قيمة كبيرة في هذا البرنامج.</span>
                            <br>
                            <input style="margin-top: 15px" name="commitment_question" value="I will try to balance tasks, but I might miss some sessions" required type="radio"
                                class="@error('commitment_question') is-invalid @enderror"
                                @if (old('commitment_question') == 'I will try to balance tasks, but I might miss some sessions') checked @endif>
                            <span style="margin-top: 1vw">سأحاول التوفيق بين المهام، لكن قد أضطر لتفويت بعض الجلسات.</span>
                            <br>
                            <input style="margin-top: 15px" name="commitment_question" value="If my commitments increase, I might leave the program" required type="radio"
                                class="@error('commitment_question') is-invalid @enderror"
                                @if (old('commitment_question') == 'If my commitments increase, I might leave the program') checked @endif>
                            <span style="margin-top: 1vw">إذا ازدادت انشغالاتي، فمن المحتمل أن أترك البرنامج.</span>
                            <br>
                            <input style="margin-top: 15px" name="commitment_question" value="I dont know, I will try but without guarantees" required type="radio"
                                class="@error('commitment_question') is-invalid @enderror"
                                @if (old('commitment_question') == "I dont know, I will try but without guarantees") checked @endif>
                            <span style="margin-top: 1vw">لا أعرف، سأحاول ولكن بدون ضمانات.</span>
                            <br>
                        </div>
                        @if ($errors->has('commitment_question'))
                            <div class="alert alert-danger">
                                {{ $errors->first('commitment_question') }}
                            </div>
                        @endif
                    </div>

                    <!-- Similar Courses Question -->
                    <div class="form-group" style="margin-top:3vw">
                        <label for="take_similar_courses" class="is-required">هل شاركت في أي دورات مشابهة سابقا؟<span class="sr-only"> (required)</span></label>
                        <div style="text-align: right; direction: rtl; margin: 1vw">
                            <input name="take_similar_courses" value="1" required type="radio"
                                class="@error('take_similar_courses') is-invalid @enderror"
                                id="previous_courses_yes"
                                @if (old('take_similar_courses') == '1') checked @endif>
                            <span style="margin-top: 1vw">نعم</span>
                            <br>
                            <input style="margin-top: 15px" name="take_similar_courses" value="0" required type="radio"
                                class="@error('take_similar_courses') is-invalid @enderror"
                                id="previous_courses_no"
                                @if (old('take_similar_courses') == '0') checked @endif>
                            <span style="margin-top: 1vw">لا</span>
                            <br>
                        </div>
                        @if ($errors->has('take_similar_courses'))
                            <div class="alert alert-danger">
                                {{ $errors->first('take_similar_courses') }}
                            </div>
                        @endif
                    </div>

                    <!-- Conditional Input Field for Similar Courses -->
                    <div class="form-group" id="course_details_field" style="display: none;">
                        <label for="course_details" class="is-required">يرجى ذكر الدورات التي شاركت فيها<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <textarea name="course_details" class="form-control @error('course_details') is-invalid @enderror"  id="course_details" placeholder="أدخل الدورات التي شاركت فيها">{{ old('course_details') }}</textarea>
                        </div>
                        @if ($errors->has('course_details'))
                            <div class="alert alert-danger">
                                {{ $errors->first('course_details') }}
                            </div>
                        @endif
                    </div>

                    <!-- Disability Question -->
                    <div class="form-group" style="margin-top: 3vw;">
                        <label for="have_disability" class="is-required">هل انت من ذوي الإعاقة؟<span class="sr-only"> (required)</span></label>
                        <div style="text-align: right; direction: rtl; margin: 1vw">
                            <input name="have_disability" value="1" required type="radio"
                                class="@error('have_disability') is-invalid @enderror"
                                id="have_disability_yes"
                                @if (old('have_disability') == '1') checked @endif>
                            <span style="margin-top: 1vw">نعم</span>
                            <br>
                            <input style="margin-top: 15px" name="have_disability" value="0" required type="radio"
                                class="@error('have_disability') is-invalid @enderror"
                                id="have_disability_no"
                                @if (old('have_disability') == '0') checked @endif>
                            <span style="margin-top: 1vw">لا</span>
                            <br>
                        </div>
                        @if ($errors->has('have_disability'))
                            <div class="alert alert-danger">
                                {{ $errors->first('have_disability') }}
                            </div>
                        @endif
                    </div>

                    <!-- Conditional Dropdown for Disability Type -->
                    <div class="form-group" id="disability_type_field" style="display: none;">
                        <label for="disability_type" class="is-required">ماهي نوع الإعاقة؟<span class="sr-only"> (required)</span></label>
                        <div class="input-group">
                            <select name="disability_type" class="form-control @error('disability_type') is-invalid @enderror" id="disability_type" >
                                <option value="" selected>-- اختر نوع الإعاقة --</option>
                                <option value="mobility" @if (old('disability_type') == 'mobility') selected @endif>حركية</option>
                                <option value="visual" @if (old('disability_type') == 'visual') selected @endif>بصرية</option>
                                <option value="hearing" @if (old('disability_type') == 'hearing') selected @endif>سمعية</option>
                            </select>
                        </div>
                        @if ($errors->has('disability_type'))
                            <div class="alert alert-danger ">
                                {{ $errors->first('disability_type') }}
                            </div>
                        @endif
                    </div>

                    <!-- checkbox -->
                   <div class="form-group" style="margin-top:3vw ;">
                       <label for="">بإستكمالي لنموذج التسجيل فإني أقر بأنني قرأت جميع الشروط و الأحكام المذكورة و أوافق عليها بالكامل</label>
                       <input type="checkbox" required name="terms" value="agree">
                            @if ($errors->has('terms'))
                            <div class="alert alert-danger">
                                {{ $errors->first('terms') }}
                            </div>
                            @endif
                   </div>



                    <!-- Submit Button -->
                    <div class="form-group" style="margin-top: 3vw;">
                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                    </div>
                </form>
             </div>
        </div>
    </div>
   
   <script>
// *******************************************
// Previous Courses 
document.addEventListener('DOMContentLoaded', function () {
    // Elements for Similar Courses Question
    const yesCoursesRadio = document.getElementById('previous_courses_yes');
    const noCoursesRadio = document.getElementById('previous_courses_no');
    const courseDetailsField = document.getElementById('course_details_field');
    const courseDetailsInput = document.getElementById('course_details');

    // Elements for Disability Question
    const yesDisabilityRadio = document.getElementById('have_disability_yes');
    const noDisabilityRadio = document.getElementById('have_disability_no');
    const disabilityTypeField = document.getElementById('disability_type_field');
    const disabilityTypeSelect = document.getElementById('disability_type');

    // Form element
    const form = document.querySelector('form');

    // Function to toggle course details field
    function toggleCourseDetailsField() {
        if (yesCoursesRadio.checked) {
            courseDetailsField.style.display = 'block';
            courseDetailsInput.setAttribute('required', 'required');
        } else {
            courseDetailsField.style.display = 'none';
            courseDetailsInput.removeAttribute('required');
            courseDetailsInput.value = ''; // Clear input when hidden
        }
    }

    // Function to toggle disability type field
    function toggleDisabilityTypeField() {
        if (yesDisabilityRadio.checked) {
            disabilityTypeField.style.display = 'block';
            disabilityTypeSelect.setAttribute('required', 'required');
        } else {
            disabilityTypeField.style.display = 'none';
            disabilityTypeSelect.removeAttribute('required');
            disabilityTypeSelect.value = ''; // Clear selection when hidden
        }
    }

    // Add event listeners
    yesCoursesRadio.addEventListener('change', toggleCourseDetailsField);
    noCoursesRadio.addEventListener('change', toggleCourseDetailsField);
    yesDisabilityRadio.addEventListener('change', toggleDisabilityTypeField);
    noDisabilityRadio.addEventListener('change', toggleDisabilityTypeField);

    // Ensure the correct fields are visible on page load
    toggleCourseDetailsField();
    toggleDisabilityTypeField();

    // Form submission validation
    form.addEventListener('submit', function (event) {
        let isValid = true;

        // Check if the user selected "Yes" for courses but didn't fill in the details
        if (yesCoursesRadio.checked && courseDetailsInput.value.trim() === '') {
            alert('يرجى إدخال تفاصيل الدورات السابقة.'); // Alert the user
            isValid = false;
        }

        // Check if the user selected "Yes" for disability but didn't choose a type
        if (yesDisabilityRadio.checked && disabilityTypeSelect.value.trim() === '') {
            alert('يرجى اختيار نوع الإعاقة.'); // Alert the user
            isValid = false;
        }

        // If validation fails, prevent form submission
        if (!isValid) {
            event.preventDefault();
        }
    });
});

setTimeout(function() {
            let successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.transition = "opacity 0.5s ease";
                successMessage.style.opacity = "0";
                setTimeout(() => successMessage.style.display = "none", 500); // Ensures complete removal
            }
        }, 3000); 
              
   </script>
@endsection


