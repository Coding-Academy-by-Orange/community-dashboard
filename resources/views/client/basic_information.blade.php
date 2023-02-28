@extends('layouts.auth')
@section('title') Basic Information @endsection
@section('links')
@endsection
@section('main')
    <section class="wizard-section">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-wizard">
            <div class="d-flex align-items-center flex-column ">
                <div class="col-md-10  mt-4">
                    <h3> Welcome! {{auth()->user()->email}} </h3>
                    <h4>Almost <span class="orange-color">Done!</span></h4>
                    <div class="card orange-border-color">
                        <div class="card-body">
                            <h5 class=""><span class="border mr-2 p-1"> step <span
                                        class="orange-color">3</span>/3 </span> Identification
                                Information </h5>
                            <hr class="col-sm-11"/>
                            <form class=" step1 " method="post" action="{{route('basic.info.step1.submit')}}"
                                                          enctype="multipart/form-data">
                            <div class="row">

                                    @csrf
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12  mb-lg-0 pr-lg-1">
                                        <label for="nationality" class="is-required">Nationality</label>
                                        <select name="nationality"
                                                class="custom-select @error('nationality') is-invalid @enderror"
                                                id="nationality" required>
                                            <option value="" @if (old('nationality') == null) selected @endif>
                                                Select..
                                            </option>
                                            <option value="1" @if (old('nationality') == '1') selected @endif >
                                                Jordanian
                                            </option>
                                            <option value="0" @if (old('nationality') == '0') selected @endif >
                                                Non-Jordanian
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12 country  mb-lg-0 pl-lg-1 ">
                                        <label for="country" class="is-required">Country</label>
                                        <select name="country"
                                                class="custom-select @error('country') is-invalid @enderror"
                                                id="country">
                                            <option value="">Select..</option>
                                            <option value="Afganistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bonaire">Bonaire</option>
                                            <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Canary Islands">Canary Islands</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Channel Islands">Channel Islands</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos Island">Cocos Island</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote DIvoire">Cote DIvoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curaco">Curacao</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands">Falkland Islands</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Ter">French Southern Ter</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Great Britain">Great Britain</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Hawaii">Hawaii</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="India">India</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            {{--   <option value="Jordan">Jordan</option>--}}
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea North">Korea North</option>
                                            <option value="Korea Sout">Korea South</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Midway Islands">Midway Islands</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Nambia">Nambia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherland Antilles">Netherland Antilles</option>
                                            <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                            <option value="Nevis">Nevis</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau Island">Palau Island</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Phillipines">Philippines</option>
                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                                            <option value="Republic of Serbia">Republic of Serbia</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="St Barthelemy">St Barthelemy</option>
                                            <option value="St Eustatius">St Eustatius</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                            <option value="St Lucia">St Lucia</option>
                                            <option value="St Maarten">St Maarten</option>
                                            <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                            <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                            <option value="Saipan">Saipan</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Samoa American">Samoa American</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Tahiti">Tahiti</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Erimates">United Arab Emirates</option>
                                            <option value="United States of America">United States of America</option>
                                            <option value="Uraguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican City State">Vatican City State</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                            <option value="Wake Island">Wake Island</option>
                                            <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zaire">Zaire</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12 ">
                                        <label class=" is-required " for="ar_first_name">Date Of Birth</label>
                                        <div class="flexDirection d-flex justify-content-between bod-error-msg">
                                            <select
                                                class="px-0 form-control mr-1 year @error('year') is-invalid @enderror"
                                                name="year" oninput="validateForm()"
                                                id="year" required>
                                                <option value="">Year</option>
                                                @for($year= 1950 ; $year <= 2021 ; $year++)
                                                    <option value="{{$year}}"
                                                            @if (old('year') == $year) selected @endif >{{$year}}
                                                    </option>
                                                @endfor
                                            </select>
                                            <select
                                                class="px-0  form-control mr-1 month @error('month') is-invalid @enderror"
                                                name="month" id="month" required>
                                                <option value="">Month</option>
                                                <option value="january"
                                                        @if (old('month') == 'january') selected @endif >January
                                                </option>
                                                <option value="february"
                                                        @if (old('month') == 'february') selected @endif >
                                                    February
                                                </option>
                                                <option value="march"
                                                        @if (old('month') == 'march' ) selected @endif >March
                                                </option>
                                                <option value="april"
                                                        @if (old('month') == 'april') selected @endif>April
                                                </option>
                                                <option value="may"
                                                        @if (old('month') == 'may') selected @endif >May
                                                </option>
                                                <option value="june"
                                                        @if (old('month') == 'june') selected @endif>June
                                                </option>
                                                <option value="july"
                                                        @if (old('month') == 'july') selected @endif>July
                                                </option>
                                                <option value="august"
                                                        @if (old('month') == 'august' ) selected @endif >August
                                                </option>
                                                <option value="september"
                                                        @if (old('month') == 'september') selected @endif >
                                                    September
                                                </option>
                                                <option value="october"
                                                        @if (old('month') == 'october') selected @endif >October
                                                </option>
                                                <option value="november"
                                                        @if (old('month') == 'november') selected @endif >
                                                    November
                                                </option>
                                                <option value="december"
                                                        @if (old('month') == 'december') selected @endif >
                                                    December
                                                </option>
                                            </select>
                                            <select class="px-0  form-control day  @error('day') is-invalid @enderror"
                                                    name="day" id="day" required>
                                                <option value="">Day</option>
                                                <option value="01" @if (old('day') == '01') selected @endif >1
                                                </option>
                                                <option value="02" @if (old('day') == '02') selected @endif >
                                                    2
                                                </option>
                                                <option value="03" @if (old('day') == '03') selected @endif >
                                                    3
                                                </option>
                                                <option value="04" @if (old('day') == '04') selected @endif >
                                                    4
                                                </option>
                                                <option value="05" @if (old('day') == '05') selected @endif >
                                                    5
                                                </option>
                                                <option value="06" @if (old('day') == '06') selected @endif >
                                                    6
                                                </option>
                                                <option value="07" @if (old('day') == '07') selected @endif >
                                                    7
                                                </option>
                                                <option value="08" @if (old('day') == '08') selected @endif >
                                                    8
                                                </option>
                                                <option value="09" @if (old('day') == '09') selected @endif >
                                                    9
                                                </option>
                                                <option value="10" @if (old('day') == '10') selected @endif >
                                                    10
                                                </option>
                                                <option value="11" @if (old('day') == '11') selected @endif >
                                                    11
                                                </option>
                                                <option value="12" @if (old('day') == '12') selected @endif >
                                                    12
                                                </option>
                                                <option value="13" @if (old('day') == '13') selected @endif >
                                                    13
                                                </option>
                                                <option value="14" @if (old('day') == '14') selected @endif >
                                                    14
                                                </option>
                                                <option value="15" @if (old('day') == '15') selected @endif >
                                                    15
                                                </option>
                                                <option value="16" @if (old('day') == '16') selected @endif >
                                                    16
                                                </option>
                                                <option value="17" @if (old('day') == '17') selected @endif >
                                                    17
                                                </option>
                                                <option value="18" @if (old('day') == '18') selected @endif >
                                                    18
                                                </option>
                                                <option value="19" @if (old('day') == '19') selected @endif >
                                                    19
                                                </option>
                                                <option value="20" @if (old('day') == '20') selected @endif >
                                                    20
                                                </option>
                                                <option value="21" @if (old('day') == '21') selected @endif >
                                                    21
                                                </option>
                                                <option value="22" @if (old('day') == '22') selected @endif >
                                                    22
                                                </option>
                                                <option value="23" @if (old('day') == '23') selected @endif >
                                                    23
                                                </option>
                                                <option value="24" @if (old('day') == '24') selected @endif >
                                                    24
                                                </option>
                                                <option value="25" @if (old('day') == '25') selected @endif >
                                                    25
                                                </option>
                                                <option value="26" @if (old('day') == '26') selected @endif >
                                                    26
                                                </option>
                                                <option value="27" @if (old('day') == '27') selected @endif >
                                                    27
                                                </option>
                                                <option value="28" @if (old('day') == '28') selected @endif >
                                                    28
                                                </option>
                                                <option value="29" @if (old('day') == '29') selected @endif >
                                                    29
                                                </option>
                                                <option value="30" @if (old('day') == '30') selected @endif >
                                                    30
                                                </option>
                                                <option value="31" @if (old('day') == '31') selected @endif >
                                                    31
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="">
                                        <div class="form-group col-lg-12 mb-1" id="en-name">
                                            <div class="row">
                                                <label class="col-md-12 is-required" for="en_first_name">Name in
                                                    English</label>
                                                <div
                                                    class="flexDirection col-md-12 d-flex justify-content-between">
                                                    <input name="en_first_name" type="text"
                                                           class="form-control mr-2 en_name1  @error('en_first_name') is-invalid @enderror "
                                                           placeholder="First name" id="en_first_name"
                                                           required
                                                           value="{{old('en_first_name')}}">
                                                    <input name="en_second_name" type="text"
                                                           class="form-control mr-2 en_name2 @error('en_second_name') is-invalid @enderror "
                                                           placeholder="Second name" id="en_second_name"
                                                           required
                                                           value="{{old('en_second_name')}}">
                                                    <input name="en_third_name" type="text"
                                                           class="form-control  mr-2 en_name3  @error('en_third_name') is-invalid @enderror "
                                                           placeholder="Third name" id="en_third_name"
                                                           required
                                                           value="{{old('en_third_name')}}">
                                                    <input name="en_last_name" type="text"
                                                           class="form-control mr-2  en_name4  @error('en_last_name') is-invalid @enderror "
                                                           placeholder="Last name" id="en_family_name"
                                                           required
                                                           value="{{old('en_last_name')}}">
                                                </div>
                                            </div>
                                            <small class=" my-2">
                                                The name must be the same as written in the
                                                Id Card\ Document, and in case it is accepted, we
                                                will certify it with the graduation certificate
                                            </small>
                                        </div>
                                        <div class="form-group col-lg-12  " id="ar-name">
                                            <div class="row ">
                                                <label class="col-md-12  is-required text-right"
                                                       for="ar_first_name">الاسم باللغة العربية</label>
                                                <div
                                                    class="flexDirectionArabic col-md-12  d-flex justify-content-between">
                                                    <input name="ar_first_name" type="text"
                                                           class="form-control mr-2 text-right ar_name1  @error('ar_first_name') is-invalid @enderror "
                                                           placeholder=" الاسم الأول " id="ar_first_name"
                                                           required
                                                           title="الرجاء ادخال الإسم باللغة العربية"
                                                           value="{{old('ar_first_name')}}"/>
                                                    <p class="d-none emsg">Test</p>
                                                    <input name="ar_second_name" type="text"
                                                           class="form-control mr-2 text-right ar_name2  @error('ar_second_name') is-invalid @enderror "
                                                           placeholder="اسم الأب" id="ar_second_name"
                                                           required
                                                           title="الرجاء ادخال الإسم باللغة العربية"
                                                           value="{{old('ar_second_name')}}"/>
                                                    <input name="ar_third_name" type="text"
                                                           class="form-control mr-2 text-right ar_name3  @error('ar_third_name') is-invalid @enderror "
                                                           placeholder="اسم الجد" id="ar_third_name"
                                                           title="الرجاء ادخال الإسم باللغة العربية"
                                                           value="{{old('ar_third_name')}}"/>
                                                    <input name="ar_last_name" type="text"
                                                           class="form-control mr-2  text-right ar_name4  @error('ar_last_name') is-invalid @enderror "
                                                           placeholder="العائلة" id="ar_family_name"
                                                           required
                                                           title="الرجاء ادخال الإسم باللغة العربية"
                                                           value="{{old('ar_last_name')}}"/>


                                                </div>
                                            </div>
                                            <small class="my-2 text-right">
                                                الاسم المدخل يجب ان يكون كما هو مكتوب في بطاقة الأحوال المدنية/
                                                الوثيقة وفي حالة القبول, سوف يتم توثيقه في شهادة التخرج
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 mb-lg-3 ">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="gender" class="is-required">Gender</label>
                                                <select name="gender"
                                                        class="custom-select @error('gender') is-invalid @enderror"
                                                        id="gender"
                                                        required>
                                                    <option value="" @if (old('gender') == null) selected @endif >
                                                        Select..
                                                    </option>
                                                    <option value="1" @if (old('gender') == '1') selected @endif >
                                                        Male
                                                    </option>
                                                    <option value="0" @if (old('gender') == '0') selected @endif >
                                                        Female
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="gender" class="is-required">Martial Status</label>
                                                <select name="martial_status"
                                                        class="custom-select @error('martial_status') is-invalid @enderror"
                                                        id="martial_status" required>
                                                    <option value=""
                                                            @if (old('martial_status') == null) selected @endif >
                                                        Select..
                                                    </option>
                                                    <option value="single"
                                                            @if (old('martial_status') == 'single') selected @endif >
                                                        Single
                                                    </option>
                                                    <option value="married"
                                                            @if (old('martial_status') == 'married') selected @endif >
                                                        Married
                                                    </option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>


                                    <!--                                    <div class="form-group">
                                                                            <label class="is_required">Academy Location</label>
                                                                            <select name="academy_location" class="custom-select" required>
                                                                                <option value="">Select..</option>
                                                                                <option value="zarqa">Zarqa</option>
                                                                                <option value="balqa">Balqa</option>
                                                                            </select>


                                                                        </div>-->
                                    <div class="row px-3">
                                        <div class="col-12 ">
                                            <div class="form-group">
                                                <div class="custom-file" style="margin-bottom: 50px !important;">
                                                    <input type="file"
                                                           class="custom-file-input @error('personal_img') is-invalid @enderror"
                                                           id="exampleInputFile" aria-describedby="helpTextFile"
                                                           name="personal_img"
                                                           value="{{old('personal_img')}}"
                                                           onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                                    @error('id_img')
                                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                                    @enderror
                                                    <label class="custom-file-label is-required" for="exampleInputFile">Upload
                                                        your personal image</label>
                                                    <span class="form-text small text-muted" id="helpTextFile">(.jpg , .jpeg , .png )**Make sure image size less than 2MB  </span>
                                                </div>
                                                <div class="custom-file" style="margin-bottom: 50px !important;">
                                                    <input type="file"
                                                           class="custom-file-input @error('id_img') is-invalid @enderror"
                                                           id="exampleInputFile" aria-describedby="helpTextFile"
                                                           name="id_img"
                                                           value="{{old('id_img')}}"
                                                           onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                                    @error('id_img')
                                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                                    @enderror
                                                    <label class="custom-file-label is-required" for="exampleInputFile">Upload
                                                        image for your identification card (front-side) </label>
                                                    <span class="form-text small text-muted" id="helpTextFile">(.jpg , .jpeg , .png ) *Make sure image size less than 2MB  </span>
                                                </div>
                                                <div class="custom-file pb-3" style="margin-bottom: 50px !important;">
                                                    <input type="file"
                                                           class="custom-file-input @error('vaccination_img') is-invalid @enderror"
                                                           id="exampleInputFile" aria-describedby="helpTextFile"
                                                           name="vaccination_img" value="{{old('vaccination_img')}}"
                                                           onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                                                    @error('vaccination_img')
                                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                                    @enderror
                                                    <label class="custom-file-label is-required" for="exampleInputFile">Upload
                                                        the vaccination certificate</label>
                                                    <span class="form-text small text-muted" id="helpTextFile">(.jpg , .jpeg , .png ) **Make sure image size less than 2MB  </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div role="navigation" aria-label="Pagination example">
                                        <ul class="pagination float-right mb-0">
                                            <li class="page-item "><a class="btn btn-secondary "
                                                                      href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cancel</a>
                                            </li>
                                            <li class="page-item ">
                                                <button class="basic-info-save1 btn btn-primary ml-3 validate-regex">
                                                    Save &
                                                    Continue
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      class="d-none">
                    @csrf
                </form>
            </div>
    </section>
@endsection
@section('script')
    <script>

        $('.country').hide();
        $('#nationality').change(function () {
            let nationality = $(this).val();
            if (nationality == '0') {
                $('.country').show();
            } else {
                $('.country').hide();
            }
        });
        @if( old('nationality') == '0')
        $('.country').show();
        @endif
    </script>
@endsection
