<!doctype html>
<html dir="rtl" lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Edokio | Program</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T54Y1DPZ01"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-T54Y1DPZ01');
    </script>
</head>

<body>

    <?php
    include('header.php');
    include('Admin/connect.php');
    $conx = new Service;
    $conx->connect();
    $trainingId = $_GET['Id'];
    $exists = $conx->dbh->prepare("SELECT COUNT(*) FROM trainings WHERE Id = '$trainingId'");
    $exists->execute();
    $counter = $exists->fetchColumn();
    if ($counter == 0) {
        header("Location: trainings.php");
    } else {
        $getTraining = $conx->dbh->prepare("SELECT * FROM trainings WHERE Id = '$trainingId'");
        $getTraining->execute();
        $getRes = $getTraining->fetchAll();
        $stmt = $conx->dbh->prepare("SELECT * FROM feedback WHERE Training_Id = '$trainingId' ORDER BY Id");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt1 = $conx->dbh->prepare("SELECT * FROM testimonials WHERE isPublished = 1 AND Training_Id = $trainingId");
        $stmt1->execute();
        $result1 = $stmt1->fetchAll();

    ?>
        <?php foreach ($getRes as $r) {
            $title = $r['Title'];
        ?>
            <div class="container pt-5">
                <div class="text-center mb-5">
                    <h3 class="tittle-wthree"><?php echo $r['Title'] ?></h3>
                </div>
                <?php if ($r['File'] != NULL) { ?>

                    <div class="my-5">
                        <?php if (substr($r['File'], -4) != '.mp4') { ?>

                            <img src="Admin/Uploaded Files/<?php echo $r['File'] ?>" width="100%" style="max-height: 500px;">

                        <?php } else { ?>
                            <video width="100%" controls>
                                <source src="Admin/Uploaded Files/<?php echo $r['File'] ?>" type="video/mp4">
                            </video>
                        <?php } ?>
                    </div>

                <?php } ?>
                <div class="row text-center">
                    <div class="col-6 col-sm-6 col-md-3">
                        <i style="color: navy;" class="fas fa-info fa-2x"></i>
                        <p style="color: navy; font-size:20px"><?php echo $r['NumberOfModules'] ?></p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3">
                        <i style="color: navy;" class="far fa-calendar-alt fa-2x"></i>
                        <p style="color: navy; font-size:20px"><?php echo $r['Days'] ?></p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3">
                        <i style="color: navy;" class="fas fa-book-open fa-2x"></i>
                        <p style="color: navy; font-size:20px"><?php echo $r['Level'] ?></p>
                    </div>
                    <div class="col-6 col-sm-6 col-md-3">
                        <i style="color: navy;" class="fas fa-globe fa-2x"></i>
                        <p style="color: navy; font-size: 20px;"><?php echo $r['Language'] ?></p>
                    </div>
                </div>
                <div>
                    <p> <?php echo $r['Overview'] ?></p>
                </div>
            </div>
        <?php } ?>

        <div class="container pb-5">
            <section class="py-5">
                <div class="px-3 py-3 bg-lavender">
                    <!-- <h3>Register for the training to reserve a place for upcoming training sessions</h3> -->
                    <h3 class="mb-3">يتقدم</h3>
                    </br>
                    <form action="mailer.php?id=<?php echo $trainingId ?>&title=<?php echo $title ?>" method="POST">
                        <div class="form-group">
                            <label for="fName" class="required">الاسم الأول</label></br>
                            <input type="text" class="col-12 col-sm-6 form-c" id="fName" name="fName" placeholder="الاسم الأول" aria-required="true" required>
                        </div>
                        <div class="form-group">
                            <label for="lName" class="required">اسم العائلة</label>
                            <input type="text" class="col-12 col-sm-6 form-c" id="lName" name="lName" placeholder="اسم العائلة" aria-required="true" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="required">عنوان البريد الالكترونى</label>
                            <input type="email" class="col-12 col-sm-6 form-c" id="email" name="email" placeholder="بريد الالكتروني" aria-required="true" required>
                        </div>
                        <div class="form-group">
                            <label class="required">عنوان</label>
                            <input type="text" class="col-12 col-sm-6 form-c form-group" id="address" name="address" placeholder="عنوان" aria-required="true" required>
                            <!-- <input type="text" class="col-12 col-sm-6 form-c form-group" id="city" name="city" placeholder="City" aria-required="true" required>
                            <input type="text" class="col-12 col-sm-6 form-c form-group" id="postalCode" name="postalCode" placeholder="Postal Code"> -->
                        </div>
                        <div class="form-group">
                            <label class="required">دولة</label>
                            </br>
                            <select class="col-12 col-sm-6 form-c" name='country' id='country' aria-required='true' required>
                                <option value=''>اختر دولة</option>
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
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
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
                        <div class="form-group">
                            <label for="phone" class="required">رقم الهاتف</label>
                            <input type="text" class="col-12 col-sm-6 form-c" id="phone" name="phone" placeholder="رقم الهاتف" aria-required="true" required>
                        </div>
                        <div class="form-group">
                            <label class="required">حالتك</label></br>
                            <select class="col-12 col-sm-6 form-c" name="situation" id="situation" aria-required="true" required>
                                <option value="">ما هو وضعك</option>
                                <option value="Employee (enterprise of less than 50 employees)">Employee (enterprise of less than 50 employees)</option>
                                <option value="Employee (enterprise of more than 50 employees)">Employee (enterprise of more than 50 employees)</option>
                                <option value="Entrepreneur/Freelance">Entrepreneur/Freelance</option>
                                <option value="Student">Student</option>
                                <option value="Unemployed">Unemployed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">مجال خبرتك</label></br>
                            <select class="col-12 col-sm-6 form-c" name="fieldOfExpertise" id="fieldOfExpertise" aria-required="true" required>
                                <option value="">حدد مجال خبرتك</option>
                                <option value="Fashion and Design">الموضة والتصميم</option>
                                <option value="Beauty services">خدمات التجميل</option>
                                <option value="Crafts">الحرف</option>
                                <option value="Food processing">معالجة الغذاء</option>
                                <option value="Pastry">معجنات</option>
                                <option value="Bakery">مخبز</option>
                                <option value="Cooking (international cuisine)">الطبخ (مطبخ عالمي)</option>
                                <option value="Agri-food">أغذية زراعية</option>
                                <option value="Eco-Tourism">السياحة البيئية</option>
                                <option value="Renewable Energy">طاقة متجددة</option>
                                <option value="General trade">التجارة العامة</option>
                                <option value="Online community management">إدارة المجتمع عبر الإنترنت</option>
                                <option value="Association and social business">الجمعيات والأعمال الاجتماعية</option>
                                <option value="Business administration">إدارة الأعمال</option>
                                <option value="Other">آخر</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label>Do you have a budget on your personal training account (CPF):</label></br>
                            <select class="col-12 col-sm-6 form-c" name="cpf" id="cpf">
                                <option value="">Do you have a CPF budget</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="I don't know">I don't know</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">Select the dates and sessions in which you are interested </label></br>
                            <select class="col-12 col-sm-6 form-c" name="datesSessions" id="datesSessions" aria-required="true" required>
                                <option value="">Select Session</option>
                                <option value="Monday 9:00 AM">Monday 9:00 AM</option>
                            </select>
                        </div> -->
                        <div class="g-recaptcha" data-sitekey="6Ldcm0ocAAAAADjvJ9NooUGYSCvwFjqDVuLwLhsb"></div>
                        <!-- <div class="form-group">
                            <label>Ask for a Quotation</label></br>
                            <label>When you click on ask for a quotation, you will be accepting our </label>
                            <a href="">confidentiality policy</a>
                            <label> describing the way your personal data will be treated</label>
                        </div> -->


                        <button name="submit" type="submit" class="btn btn-primary mt-4">يتقدم</button>

                    </form>
                </div>
            </section>
            <!-- <section class="pb-5">
                <div class="px-3">
                    <h4>Leave a comment</h4>
                    <form action="addTestimonial.php" method="POST" class="pt-3" enctype="multipart/form-data">
                        <input type="hidden" name="Id" value="<?php // echo $trainingId 
                                                                ?>">
                        <div class="form-group">
                            <label class="required" for="Name">Name</label>
                            <input class="form-c" type="text" name="Name" required>
                        </div>
                        <div class="form-group">
                            <label class="required" for="Testimonial">Your Comment</label>
                            <textarea class="col-6 form-c" name="Testimonial" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Image">Upload Your Photo</label></br>
                            <input type="file" name="Image[]">
                        </div>
                        <div class="g-recaptcha" data-sitekey="6Ldcm0ocAAAAADjvJ9NooUGYSCvwFjqDVuLwLhsb"></div>
                        <button name="comment" type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </section> -->
            <?php if ($result1) { ?>
                <section>
                    <h2 style="text-align: center;">Testimonials</h2>

                    <div id="homepage-slider" class="container st-slider py-5 my-5 bg-lightgrey">
                        <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />
                        <?php for ($i = 1; $i <= sizeof($result1); $i++) { ?>
                            <input type="radio" class="cs_anchor radio" name="slider" id="slide<?php echo $i ?>" />
                        <?php } ?>
                        <!-- <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide3" /> -->
                        <div class="images">
                            <div class="images-inner">
                                <?php foreach ($result1 as $rows) { ?>
                                    <div class="image-slide">
                                        <?php if ($rows['Image'] == NULL) { ?>
                                            <div><?php echo $rows['Testimonial'] ?></div>
                                        <?php } else { ?>
                                            <div class="row">
                                                <div class="col-9">
                                                    <?php echo $rows['Testimonial'] ?>
                                                </div>
                                                <div class="col-3">
                                                    <img style="width: 100%; object-fit: scale-down;" src="Uploaded Images/<?php echo $rows['Image'] ?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="pt-4">
                                            <?php echo $rows['Name'] . ', ' . $rows['Date'] ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- <div class="image-slide">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat illo eaque dignissimos obcaecati cum odit alias molestiae rem iste, natus atque inventore ad debitis unde harum saepe sequi laborum optio!
            </div>
            <div class="image-slide">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio quasi autem provident dolorum error ex inventore optio? Impedit vero incidunt perspiciatis assumenda doloremque repellendus, eaque qui dignissimos totam, temporibus nemo!
            </div> -->
                            </div>
                        </div>
                        <div class="labels">
                            <div class="fake-radio">
                                <?php for ($i = 1; $i <= sizeof($result1); $i++) { ?>
                                    <label for="slide<?php echo $i ?>" class="radio-btn"></label>
                                <?php } ?>
                                <!-- <label for="slide2" class="radio-btn"></label>
            <label for="slide3" class="radio-btn"></label> -->
                            </div>
                        </div>
                        <!-- banner-w3ls-info -->



                        <!-- //banner-w3ls-info -->
                    </div>
                </section>
            <?php } ?>
        </div>


        <?php
        include('footer.php');
        ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="js/index.js"></script>

    <?php } ?>
</body>

</html>