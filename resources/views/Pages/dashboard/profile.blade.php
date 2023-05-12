@extends('Layout.dashboard')
@section('title', 'My Profile')
@section('content')
    {{-- Profile editor --}}
    <h5 id="page-is" class="bi bi-person p-2"> Profile</h5>
    <div class="m-3 rounded section-two">
        <div class="dash-pro px-4">
            <form id="updateForm" action="/star/dashboard/update" method="POST" class="w-100 py-5">
                @csrf
                {{-- @if (session('status'))
                    <p class="text-danger text-center">{{ session('status') }}</p>
                @endif --}}
                <div class="row justify-content-center">
                    <div class="col-6">
                        <h5 class="mb-2">Edit your Profile</h5>
                    </div>
                    <div class="col-6">
                        <span>
                            <a href="#" id="edit-btn" class="cursor fs-4 bi bi-pencil-square"></a>
                            <a href="#" id="cancel-btn" class="hidden fs-4 cursor bi-x-square text-danger ms-3"></a>
                        </span>
                    </div>
                </div>

                <fieldset id="fieldset" class="small" disabled>
                    @if (session('successMsg'))
                        <p class="alert alert-success p-2"> {{ session('successMsg') }}</p>
                    @endif

                    @if (session('errorMsg'))
                        <p class="alert alert-danger p-2"> {{ session('errorMsg') }}</p>
                    @endif

                    <div class="row">
                        <div class="col-6">

                            <label for="username" class="my-3">Username <span class="text-danger">*</span></label>
                            <input type="text" name="username"
                                class="form-control mb-4 @error('username') border-error
                                @enderror"
                                value="{{ old('username') }}">

                            <label for="currentPassword" class="my-3">Current Password <span
                                    class="text-danger">*</span></label>
                            <input type="password" name="currentPassword"
                                class="form-control mb-4 @error('currentPassword')border-error
                                @enderror">
                            <label for="city" class="my-3">City <span class="text-danger">*</span></label>
                            <input type="text" name="city"
                                class="form-control mb-4 @error('city')border-error
                                @enderror">

                            {{-- <label for="tel" class="my-3">Tel</label>
                            <input type="tel" name="newTel"
                                class="form-control mb-4 @error('newTel') border-error @enderror"
                                value="{{ old('newTel') }}"> --}}
                        </div>

                        <div class="col-6">
                            <label for="email" class="my-3">Email
                                <span class="text-danger">*</span></label>
                            <input type="email" name="userEmail"
                                class="form-control mb-4 @error('userEmail')border-error
                                @enderror">

                            <label for="address" class="my-3">Country <span class="text-danger">*</span></label>
                            <select name="country"
                                class="form-control mb-4 @error('country')
                                        border-error
                                    @enderror"
                                value="{{ old('country') }}">
                                <option hidden value=""></option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas (the)</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia (Plurinational State of)</option>
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory (the)</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="CV">Cabo Verde</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="KY">Cayman Islands (the)</option>
                                <option value="CF">Central African Republic (the)</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands (the)</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros (the)</option>
                                <option value="CD">Congo (the Democratic Republic of the)</option>
                                <option value="CG">Congo (the)</option>
                                <option value="CK">Cook Islands (the)</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czechia</option>
                                <option value="CI">Côte d'Ivoire</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic (the)</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="SZ">Eswatini</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (the) [Malvinas]</option>
                                <option value="FO">Faroe Islands (the)</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories (the)</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia (the)</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="VA">Holy See (the)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran (Islamic Republic of)</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea (the Democratic People's Republic of)</option>
                                <option value="KR">Korea (the Republic of)</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic (the)</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands (the)</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia (Federated States of)</option>
                                <option value="MD">Moldova (the Republic of)</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands (the)</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger (the)</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands (the)</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestine, State of</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines (the)</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="MK">Republic of North Macedonia</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation (the)</option>
                                <option value="RW">Rwanda</option>
                                <option value="RE">Réunion</option>
                                <option value="BL">Saint Barthélemy</option>
                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten (Dutch part)</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan (the)</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan (Province of China)</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands (the)</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates (the)</option>
                                <option value="GB">United Kingdom of Great Britain and Northern Ireland
                                    (the)
                                </option>
                                <option value="UM">United States Minor Outlying Islands (the)</option>
                                <option value="US">United States of America (the)</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela (Bolivarian Republic of)</option>
                                <option value="VN">Viet Nam</option>
                                <option value="VG">Virgin Islands (British)</option>
                                <option value="VI">Virgin Islands (U.S.)</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>

                            <label for="address" class="my-3">Address <span class="text-danger">*</span></label>
                            <input type="text" name="newAddress"
                                class="form-control mb-4 @error('newAddress')border-error
                                @enderror"
                                value="{{ old('newAddress') }}">

                        </div>

                        <button class="btn btn-success p-3 mt-2 w-100">Update</button>
                    </div>

                </fieldset>
            </form>
        </div>
        <form action="/star/dashboard/update" method="POST" class="px-5">
            @csrf
            <p id="new-password" class="small text-primary cursor p-3">Do you want also change your
                Password??</a></p>
            <div id="new-password-container" class="hidden px-5 pb-5">
                <label for="currentPassword" class="my-3">Current Password <span class="text-danger">*</span></label>
                <input type="password" name="currentPassword"
                    class="form-control mb-4 @error('currentPassword')border-error
                @enderror">

                <label for="new-password" class="mb-2">New Password <span class="text-danger">*</span></label>
                <input type="password" name="newPassword"
                    class="form-control mb-3 @error('newPassword')border-error
                    @enderror"
                    value="{{ old('newPassword') }}">
                @error('newPassword')
                    <p id="errorMessage" class="small text-danger">{{ $message }}</p>
                @enderror
                <button name="done" class="btn btn-success w-50 p-2">Done</button>
            </div>
        </form>
    </div>
@endsection
