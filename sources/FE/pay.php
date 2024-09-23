
<style>
    body, .content, .content .wrap, .main, .main__content, .step, .content>form {
    display: flex;
    flex: 1 0 auto;
    flex-direction: column;
}
</style>


<form id="checkoutForm" method="post" data-define="{
				loadingShippingErrorMessage: 'Không thể load phí vận chuyển. Vui lòng thử lại',
				loadingReductionCodeErrorMessage: 'Có lỗi xảy ra khi áp dụng khuyến mãi. Vui lòng thử lại',
				submitingCheckoutErrorMessage: 'Có lỗi xảy ra khi xử lý. Vui lòng thử lại',
				requireShipping: true,
				requireDistrict: false,
				requireWard: false,
				shouldSaveCheckoutAbandon: true}" action="/checkout/d7d15597a018437cb2833c3dac06adc8" data-bind-event-submit="handleCheckoutSubmit(event)" data-bind-event-keypress="handleCheckoutKeyPress(event)" data-bind-event-change="handleCheckoutChange(event)" data-select2-id="select2-data-checkoutForm">
			<input type="hidden" name="_method" value="patch">
			<div class="wrap" data-select2-id="select2-data-215-b87v">
				<main class="main">
					<header class="main__header">
						<div class="logo logo--center">
	
		<a href="/">
			<img class="logo__image  logo__image--medium " alt="Template Stationery" src="//bizweb.dktcdn.net/100/434/558/themes/894884/assets/logo.png?1676278234490">
		</a>
	
</div>
					</header>
					<div class="main__content" data-select2-id="select2-data-214-4l7e">
						<article class="animate-floating-labels row">
							<div class="col col--two">
								<section class="section" data-select2-id="select2-data-213-ckif">
									<div class="section__header">
										<div class="layout-flex">
											<h2 class="section__title layout-flex__item layout-flex__item--stretch">
												<i class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop"></i>
												
												Thông tin nhận hàng
												
											</h2>
											
												
													<a href="/account/login?returnUrl=/checkout/d7d15597a018437cb2833c3dac06adc8">
														<i class="fa fa-user-circle-o fa-lg"></i>
														<span>Đăng nhập </span>
													</a>
												
											
										</div>
									</div>
									<div class="section__content" data-select2-id="select2-data-212-s30z">
										<div class="fieldset">
											

											
												
													<div class="field " data-bind-class="{'field--show-floating-label': email}">
														<div class="field__input-wrapper">
															<label for="email" class="field__label">
																Email
															</label>
															<input name="email" id="email" type="email" class="field__input" data-bind="email" value="">
														</div>
														
													</div>
												
											

											<div class="field " data-bind-class="{'field--show-floating-label': billing.name}">
												<div class="field__input-wrapper">
													<label for="billingName" class="field__label">Họ và tên</label>
													<input name="billingName" id="billingName" type="text" class="field__input" data-bind="billing.name" value="">
												</div>
												
											</div>
											
											<div class="field " data-bind-class="{'field--show-floating-label': billing.phone}">
												<div class="field__input-wrapper field__input-wrapper--connected" data-define="{phoneInput: new InputPhone(this)}">
													<label for="billingPhone" class="field__label">
														Số điện thoại (tùy chọn)
													</label>
													<input name="billingPhone" id="billingPhone" type="tel" class="field__input" data-bind="billing.phone" value="">
													<div class="field__input-phone-region-wrapper">
														<select class="field__input select-phone-region select2-hidden-accessible" name="billingPhoneRegion" data-init-value="VN" data-select2-id="select2-data-4-yw2n" tabindex="-1" aria-hidden="true"><option value="AF" data-select2-id="select2-data-6-zhnt">Afghanistan (+93)</option><option value="AL" data-select2-id="select2-data-7-0zzw">Albania (+355)</option><option value="DZ" data-select2-id="select2-data-8-41iw">Algeria (+213)</option><option value="AD" data-select2-id="select2-data-9-nizl">Andorra (+376)</option><option value="AO" data-select2-id="select2-data-10-337e">Angola (+244)</option><option value="AG" data-select2-id="select2-data-11-bodb">Antigua and Barbuda (+1)</option><option value="AR" data-select2-id="select2-data-12-fb8j">Argentina (+54)</option><option value="AM" data-select2-id="select2-data-13-x5qe">Armenia (+374)</option><option value="AU" data-select2-id="select2-data-14-qfew">Australia (+61)</option><option value="AT" data-select2-id="select2-data-15-jnw7">Austria (+43)</option><option value="AZ" data-select2-id="select2-data-16-68g1">Azerbaijan (+994)</option><option value="BS" data-select2-id="select2-data-17-h3pk">Bahamas (+1)</option><option value="BH" data-select2-id="select2-data-18-ul5c">Bahrain (+973)</option><option value="BD" data-select2-id="select2-data-19-koy6">Bangladesh (+880)</option><option value="BB" data-select2-id="select2-data-20-32vw">Barbados (+1)</option><option value="BY" data-select2-id="select2-data-21-9iey">Belarus (+375)</option><option value="BE" data-select2-id="select2-data-22-o738">Belgium (+32)</option><option value="BZ" data-select2-id="select2-data-23-8d31">Belize (+501)</option><option value="BJ" data-select2-id="select2-data-24-88nf">Benin (+229)</option><option value="BT" data-select2-id="select2-data-25-j9s8">Bhutan (+975)</option><option value="BO" data-select2-id="select2-data-26-ggz3">Bolivia (+591)</option><option value="BA" data-select2-id="select2-data-27-6ngv">Bosnia and Herzegovina (+387)</option><option value="BW" data-select2-id="select2-data-28-tsdj">Botswana (+267)</option><option value="BR" data-select2-id="select2-data-29-1ruy">Brazil (+55)</option><option value="BN" data-select2-id="select2-data-30-qzwm">Brunei (+673)</option><option value="BG" data-select2-id="select2-data-31-9phh">Bulgaria (+359)</option><option value="BF" data-select2-id="select2-data-32-meiq">Burkina Faso (+226)</option><option value="BI" data-select2-id="select2-data-33-0n2r">Burundi (+257)</option><option value="KH" data-select2-id="select2-data-34-g2c2">Cambodia (+855)</option><option value="CM" data-select2-id="select2-data-35-yca2">Cameroon (+237)</option><option value="CA" data-select2-id="select2-data-36-7hw1">Canada (+1)</option><option value="CV" data-select2-id="select2-data-37-gate">Cape Verde (+238)</option><option value="CF" data-select2-id="select2-data-38-wbf0">Central African Republic (+236)</option><option value="TD" data-select2-id="select2-data-39-s0q8">Chad (+235)</option><option value="CL" data-select2-id="select2-data-40-dsgf">Chile (+56)</option><option value="CO" data-select2-id="select2-data-41-iclx">Colombia (+57)</option><option value="KM" data-select2-id="select2-data-42-tukb">Comoros (+269)</option><option value="CG" data-select2-id="select2-data-43-pure">Congo-Brazzaville (+242)</option><option value="CK" data-select2-id="select2-data-44-oxg3">Congo-Kinshasa (+682)</option><option value="CR" data-select2-id="select2-data-45-isb4">Costa Rica (+506)</option><option value="CD" data-select2-id="select2-data-46-bbi7">Côte d'Ivoire (+243)</option><option value="HR" data-select2-id="select2-data-47-kcyv">Croatia (+385)</option><option value="CU" data-select2-id="select2-data-48-v1uc">Cuba (+53)</option><option value="CY" data-select2-id="select2-data-49-bseh">Cyprus (+357)</option><option value="CZ" data-select2-id="select2-data-50-ifv7">Czech Republic (+420)</option><option value="DK" data-select2-id="select2-data-51-04dj">Denmark (+45)</option><option value="DJ" data-select2-id="select2-data-52-z08d">Djibouti (+253)</option><option value="DM" data-select2-id="select2-data-53-zm9c">Dominica (+1)</option><option value="DO" data-select2-id="select2-data-54-4sby">Dominican Republic (+1)</option><option value="TL" data-select2-id="select2-data-55-sy3a">East Timor (+670)</option><option value="EC" data-select2-id="select2-data-56-scj7">Ecuador (+593)</option><option value="EG" data-select2-id="select2-data-57-vd9w">Egypt (+20)</option><option value="SV" data-select2-id="select2-data-58-j3j8">El Salvador (+503)</option><option value="GQ" data-select2-id="select2-data-59-juoz">Equatorial Guinea (+240)</option><option value="ER" data-select2-id="select2-data-60-90di">Eritrea (+291)</option><option value="EE" data-select2-id="select2-data-61-aas8">Estonia (+372)</option><option value="ET" data-select2-id="select2-data-62-e6eb">Ethiopia (+251)</option><option value="FJ" data-select2-id="select2-data-63-lggl">Fiji (+679)</option><option value="FI" data-select2-id="select2-data-64-vf09">Finland (+358)</option><option value="FR" data-select2-id="select2-data-65-ojbe">France (+33)</option><option value="GA" data-select2-id="select2-data-66-81hu">Gabon (+241)</option><option value="GM" data-select2-id="select2-data-67-jcq7">Gambia (+220)</option><option value="GE" data-select2-id="select2-data-68-4cpc">Georgia (+995)</option><option value="DE" data-select2-id="select2-data-69-o7nz">Germany (+49)</option><option value="GH" data-select2-id="select2-data-70-6zmd">Ghana (+233)</option><option value="GR" data-select2-id="select2-data-71-4vkj">Greece (+30)</option><option value="GD" data-select2-id="select2-data-72-pon0">Grenada (+1)</option><option value="GT" data-select2-id="select2-data-73-ac5o">Guatemala (+502)</option><option value="GN" data-select2-id="select2-data-74-7xp9">Guinea (+224)</option><option value="GW" data-select2-id="select2-data-75-3v8e">Guinea-Bissau (+245)</option><option value="GY" data-select2-id="select2-data-76-lii8">Guyana (+592)</option><option value="HT" data-select2-id="select2-data-77-6m6w">Haiti (+509)</option><option value="HN" data-select2-id="select2-data-78-adqc">Honduras (+504)</option><option value="HK" data-select2-id="select2-data-79-r0te">Hong Kong (+852)</option><option value="HU" data-select2-id="select2-data-80-ole9">Hungary (+36)</option><option value="IS" data-select2-id="select2-data-81-9oh5">Iceland (+354)</option><option value="IN" data-select2-id="select2-data-82-hso3">India (+91)</option><option value="ID" data-select2-id="select2-data-83-57fj">Indonesia (+62)</option><option value="IR" data-select2-id="select2-data-84-bxrt">Iran (+98)</option><option value="IQ" data-select2-id="select2-data-85-9dno">Iraq (+964)</option><option value="IE" data-select2-id="select2-data-86-nda5">Ireland (+353)</option><option value="IL" data-select2-id="select2-data-87-tj6q">Israel (+972)</option><option value="IT" data-select2-id="select2-data-88-7avo">Italy (+39)</option><option value="JM" data-select2-id="select2-data-89-epec">Jamaica (+1)</option><option value="JP" data-select2-id="select2-data-90-4h2k">Japan (Nippon) (+81)</option><option value="JO" data-select2-id="select2-data-91-dno5">Jordan (+962)</option><option value="KZ" data-select2-id="select2-data-92-75gf">Kazakhstan (+7)</option><option value="KE" data-select2-id="select2-data-93-2vmu">Kenya (+254)</option><option value="KI" data-select2-id="select2-data-94-lpc5">Kiribati (+686)</option><option value="KP" data-select2-id="select2-data-95-595r">North Korea (+850)</option><option value="XK" data-select2-id="select2-data-96-7ofw">Kosovo (+383)</option><option value="KW" data-select2-id="select2-data-97-hpj9">Kuwait (+965)</option><option value="KG" data-select2-id="select2-data-98-wkfa">Kyrgyzstan (+996)</option><option value="LA" data-select2-id="select2-data-99-1mf3">Laos (+856)</option><option value="LV" data-select2-id="select2-data-100-widb">Latvia (+371)</option><option value="LB" data-select2-id="select2-data-101-8sur">Lebanon (+961)</option><option value="LS" data-select2-id="select2-data-102-hl72">Lesotho (+266)</option><option value="LR" data-select2-id="select2-data-103-q5gh">Liberia (+231)</option><option value="LY" data-select2-id="select2-data-104-end6">Libya (+218)</option><option value="LI" data-select2-id="select2-data-105-h062">Liechtenstein (+423)</option><option value="LT" data-select2-id="select2-data-106-fqac">Lithuania (+370)</option><option value="LU" data-select2-id="select2-data-107-xpyn">Luxembourg (+352)</option><option value="MK" data-select2-id="select2-data-108-npqn">Macedonia (FYROM) (+389)</option><option value="MG" data-select2-id="select2-data-109-rvns">Madagascar (+261)</option><option value="MW" data-select2-id="select2-data-110-55fa">Malawi (+265)</option><option value="MY" data-select2-id="select2-data-111-tojx">Malaysia (+60)</option><option value="MV" data-select2-id="select2-data-112-135s">Maldives (+960)</option><option value="ML" data-select2-id="select2-data-113-i71q">Mali (+223)</option><option value="MT" data-select2-id="select2-data-114-34uz">Malta (+356)</option><option value="MH" data-select2-id="select2-data-115-u3p2">Marshall Islands (+692)</option><option value="MR" data-select2-id="select2-data-116-yqs1">Mauritania (+222)</option><option value="MU" data-select2-id="select2-data-117-yo15">Mauritius (+230)</option><option value="MX" data-select2-id="select2-data-118-hqsz">Mexico (+52)</option><option value="FM" data-select2-id="select2-data-119-u0aj">Micronesia (+691)</option><option value="MD" data-select2-id="select2-data-120-42z1">Moldova (+373)</option><option value="MC" data-select2-id="select2-data-121-hs1h">Monaco (+377)</option><option value="MN" data-select2-id="select2-data-122-sswd">Mongolia (+976)</option><option value="ME" data-select2-id="select2-data-123-h5pu">Montenegro (+382)</option><option value="MA" data-select2-id="select2-data-124-xnu5">Morocco (+212)</option><option value="MZ" data-select2-id="select2-data-125-na52">Mozambique (+258)</option><option value="MM" data-select2-id="select2-data-126-f0au">Myanmar (+95)</option><option value="NA" data-select2-id="select2-data-127-eaxa">Namibia (+264)</option><option value="NR" data-select2-id="select2-data-128-71ke">Nauru (+674)</option><option value="NP" data-select2-id="select2-data-129-3w12">Nepal (+977)</option><option value="NL" data-select2-id="select2-data-130-d1iq">Netherlands (+31)</option><option value="NZ" data-select2-id="select2-data-131-oyg9">New Zealand (+64)</option><option value="NI" data-select2-id="select2-data-132-ukju">Nicaragua (+505)</option><option value="NE" data-select2-id="select2-data-133-9f13">Niger (+227)</option><option value="NG" data-select2-id="select2-data-134-9gk0">Nigeria (+234)</option><option value="KR" data-select2-id="select2-data-135-028e">South Korea (+82)</option><option value="NC" data-select2-id="select2-data-136-dill">New Caledonia (+687)</option><option value="NO" data-select2-id="select2-data-137-q9hf">Norway (+47)</option><option value="OM" data-select2-id="select2-data-138-kxsl">Oman (+968)</option><option value="PK" data-select2-id="select2-data-139-mxe2">Pakistan (+92)</option><option value="PW" data-select2-id="select2-data-140-srvy">Palau (+680)</option><option value="PS" data-select2-id="select2-data-141-qbq7">Palestine (+970)</option><option value="PA" data-select2-id="select2-data-142-mi6s">Panama (+507)</option><option value="PG" data-select2-id="select2-data-143-bekp">Papua New Guinea (+675)</option><option value="PY" data-select2-id="select2-data-144-mrmi">Paraguay (+595)</option><option value="PE" data-select2-id="select2-data-145-sibv">Peru (+51)</option><option value="PH" data-select2-id="select2-data-146-64yd">Philippines (+63)</option><option value="PL" data-select2-id="select2-data-147-us6f">Poland (+48)</option><option value="PT" data-select2-id="select2-data-148-kz83">Portugal (+351)</option><option value="QA" data-select2-id="select2-data-149-8cah">Qatar (+974)</option><option value="RO" data-select2-id="select2-data-150-lp4f">Romania (+40)</option><option value="RU" data-select2-id="select2-data-151-cujj">Russia (+7)</option><option value="RW" data-select2-id="select2-data-152-uv0h">Rwanda (+250)</option><option value="KN" data-select2-id="select2-data-153-lsre">Saint Kitts and Nevis (+1)</option><option value="LC" data-select2-id="select2-data-154-hqhl">Saint Lucia (+1)</option><option value="VC" data-select2-id="select2-data-155-bhgf">Saint Vincent and the Grenadines (+1)</option><option value="WS" data-select2-id="select2-data-156-2726">Samoa (+685)</option><option value="SM" data-select2-id="select2-data-157-ixh1">San Marino (+378)</option><option value="ST" data-select2-id="select2-data-158-xtnf">Sao Tome and Principe (+239)</option><option value="SA" data-select2-id="select2-data-159-7z1q">Saudi Arabia (+966)</option><option value="SS" data-select2-id="select2-data-160-7060">South Sudan (+211)</option><option value="SN" data-select2-id="select2-data-161-yb7v">Senegal (+221)</option><option value="RS" data-select2-id="select2-data-162-830w">Serbia (+381)</option><option value="SC" data-select2-id="select2-data-163-xnil">Seychelles (+248)</option><option value="SL" data-select2-id="select2-data-164-nfu3">Sierra Leone (+232)</option><option value="SG" data-select2-id="select2-data-165-2nct">Singapore (+65)</option><option value="SH" data-select2-id="select2-data-166-m918">Saint Helena (+290)</option><option value="SK" data-select2-id="select2-data-167-imt9">Slovakia (+421)</option><option value="SI" data-select2-id="select2-data-168-dar7">Slovenia (+386)</option><option value="SB" data-select2-id="select2-data-169-wjaz">Solomon Islands (+677)</option><option value="SO" data-select2-id="select2-data-170-b2l1">Somalia (+252)</option><option value="SJ" data-select2-id="select2-data-171-1xx5">Svalbard and Jan Mayen (+47)</option><option value="ZA" data-select2-id="select2-data-172-wg01">South Africa (+27)</option><option value="ES" data-select2-id="select2-data-173-5b57">Spain (+34)</option><option value="LK" data-select2-id="select2-data-174-eryu">Sri Lanka (+94)</option><option value="SD" data-select2-id="select2-data-175-9aog">Sudan (+249)</option><option value="SR" data-select2-id="select2-data-176-m4gv">Suriname (+597)</option><option value="SZ" data-select2-id="select2-data-177-8h85">Swaziland (+268)</option><option value="SE" data-select2-id="select2-data-178-0p7y">Sweden (+46)</option><option value="CH" data-select2-id="select2-data-179-7nla">Switzerland (+41)</option><option value="SY" data-select2-id="select2-data-180-af0w">Syria (+963)</option><option value="TJ" data-select2-id="select2-data-181-kac4">Tajikistan (+992)</option><option value="TZ" data-select2-id="select2-data-182-pmhl">Tanzania (+255)</option><option value="TH" data-select2-id="select2-data-183-8qp7">Thailand (+66)</option><option value="TG" data-select2-id="select2-data-184-02wm">Togo (+228)</option><option value="TO" data-select2-id="select2-data-185-zxi6">Tonga (+676)</option><option value="TK" data-select2-id="select2-data-186-fusl">Tokelau (+690)</option><option value="TT" data-select2-id="select2-data-187-wde3">Trinidad and Tobago (+1)</option><option value="TN" data-select2-id="select2-data-188-xz68">Tunisia (+216)</option><option value="TR" data-select2-id="select2-data-189-fihm">Turkey (+90)</option><option value="CN" data-select2-id="select2-data-190-r7ay">China (+86)</option><option value="TM" data-select2-id="select2-data-191-o4gp">Turkmenistan (+993)</option><option value="TV" data-select2-id="select2-data-192-lr9d">Tuvalu (+688)</option><option value="UG" data-select2-id="select2-data-193-0wut">Uganda (+256)</option><option value="UA" data-select2-id="select2-data-194-mank">Ukraine (+380)</option><option value="AE" data-select2-id="select2-data-195-f08w">United Arab Emirates (+971)</option><option value="GB" data-select2-id="select2-data-196-r8tx">United Kingdom (+44)</option><option value="US" data-select2-id="select2-data-197-a5zr">United States (+1)</option><option value="UY" data-select2-id="select2-data-198-vyr1">Uruguay (+598)</option><option value="UZ" data-select2-id="select2-data-199-4sl8">Uzbekistan (+998)</option><option value="VU" data-select2-id="select2-data-200-2u4n">Vanuatu (+678)</option><option value="VA" data-select2-id="select2-data-201-eash">Vatican (+39)</option><option value="VE" data-select2-id="select2-data-202-c4kt">Venezuela (+58)</option><option value="VN" data-select2-id="select2-data-203-pq3l">Vietnam (+84)</option><option value="EH" data-select2-id="select2-data-204-u8a8">Western Sahara (+212)</option><option value="YE" data-select2-id="select2-data-205-nvdo">Yemen (+967)</option><option value="ZM" data-select2-id="select2-data-206-l3pt">Zambia (+260)</option><option value="ZW" data-select2-id="select2-data-207-tatz">Zimbabwe (+263)</option><option value="TW" data-select2-id="select2-data-208-2d94">Taiwan (+886)</option></select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-5-6sds" style="width: 56px;"><span class="selection"><span class="select2-selection select2-selection--single select2-phone-region" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-billingPhoneRegion-gh-container"><span class="select2-selection__rendered" id="select2-billingPhoneRegion-gh-container" role="textbox" aria-readonly="true" title="Vietnam (+84)"><span class="fi fi-vn"></span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
													</div>
												</div>
												
											</div>
											
											
											<div class="field " data-bind-class="{'field--show-floating-label': billing.address}">
												<div class="field__input-wrapper">
													<label for="billingAddress" class="field__label">
														Địa chỉ (tùy chọn)
													</label>
													<input name="billingAddress" id="billingAddress" type="text" class="field__input" data-bind="billing.address" value="">
												</div>
												
											</div>
											
											
											<div class="field field--show-floating-label ">
												<div class="field__input-wrapper field__input-wrapper--select2" data-select2-id="select2-data-211-7g86">
													<label for="billingProvince" class="field__label">Tỉnh thành</label>
													<select name="billingProvince" id="billingProvince" size="1" class="field__input field__input--select select2-hidden-accessible" data-bind="billing.province" value="" data-address-type="province" data-address-zone="billing" data-select2-id="select2-data-billingProvince" tabindex="-1" aria-hidden="true"><option value="" hidden="" data-select2-id="select2-data-209-lcjx">---</option><option value="1" data-select2-id="select2-data-216-qigg">Hà Nội</option><option value="2" data-select2-id="select2-data-217-a8ml">TP Hồ Chí Minh</option><option value="3" data-select2-id="select2-data-218-hrti">An Giang</option><option value="4" data-select2-id="select2-data-219-o5vo">Bà Rịa-Vũng Tàu</option><option value="5" data-select2-id="select2-data-220-v9bs">Bắc Giang</option><option value="6" data-select2-id="select2-data-221-i8bd">Bắc Kạn</option><option value="7" data-select2-id="select2-data-222-1r5n">Bạc Liêu</option><option value="8" data-select2-id="select2-data-223-dojm">Bắc Ninh</option><option value="9" data-select2-id="select2-data-224-vu9h">Bến Tre</option><option value="10" data-select2-id="select2-data-225-c9t6">Bình Dương</option><option value="11" data-select2-id="select2-data-226-h8cb">Bình Định</option><option value="12" data-select2-id="select2-data-227-wq22">Bình Phước</option><option value="13" data-select2-id="select2-data-228-s6ce">Bình Thuận</option><option value="14" data-select2-id="select2-data-229-rj0t">Cà Mau</option><option value="15" data-select2-id="select2-data-230-8zhn">Cao Bằng</option><option value="16" data-select2-id="select2-data-231-97sk">Cần Thơ</option><option value="17" data-select2-id="select2-data-232-8ty6">Đà Nẵng</option><option value="18" data-select2-id="select2-data-233-stpp">Đắk Lắk</option><option value="19" data-select2-id="select2-data-234-zxpy">Đắk Nông</option><option value="20" data-select2-id="select2-data-235-l7ib">Điện Biên</option><option value="21" data-select2-id="select2-data-236-9cbu">Đồng Nai</option><option value="22" data-select2-id="select2-data-237-ov7j">Đồng Tháp</option><option value="23" data-select2-id="select2-data-238-bvgo">Gia Lai</option><option value="24" data-select2-id="select2-data-239-h355">Hà Giang</option><option value="25" data-select2-id="select2-data-240-i14g">Hà Nam</option><option value="26" data-select2-id="select2-data-241-l3sz">Hà Tĩnh</option><option value="27" data-select2-id="select2-data-242-rdfo">Hải Dương</option><option value="28" data-select2-id="select2-data-243-wocb">Hải Phòng</option><option value="29" data-select2-id="select2-data-244-7rwb">Hậu Giang</option><option value="30" data-select2-id="select2-data-245-u5ei">Hòa Bình</option><option value="31" data-select2-id="select2-data-246-y95w">Hưng Yên</option><option value="32" data-select2-id="select2-data-247-grwh">Khánh Hòa</option><option value="33" data-select2-id="select2-data-248-iin4">Kiên Giang</option><option value="34" data-select2-id="select2-data-249-z8p9">Kon Tum</option><option value="35" data-select2-id="select2-data-250-v9fj">Lai Châu</option><option value="36" data-select2-id="select2-data-251-45cs">Lâm Đồng</option><option value="37" data-select2-id="select2-data-252-mlrx">Lạng Sơn</option><option value="38" data-select2-id="select2-data-253-ho3f">Lào Cai</option><option value="39" data-select2-id="select2-data-254-b4cq">Long An</option><option value="40" data-select2-id="select2-data-255-hbnq">Nam Định</option><option value="41" data-select2-id="select2-data-256-i7d3">Nghệ An</option><option value="42" data-select2-id="select2-data-257-iitz">Ninh Bình</option><option value="43" data-select2-id="select2-data-258-s8gz">Ninh Thuận</option><option value="44" data-select2-id="select2-data-259-g9v7">Phú Thọ</option><option value="45" data-select2-id="select2-data-260-r9m9">Phú Yên</option><option value="46" data-select2-id="select2-data-261-69w6">Quảng Bình</option><option value="47" data-select2-id="select2-data-262-vgut">Quảng Nam</option><option value="48" data-select2-id="select2-data-263-ec24">Quảng Ngãi</option><option value="49" data-select2-id="select2-data-264-nq5w">Quảng Ninh</option><option value="50" data-select2-id="select2-data-265-hjk5">Quảng Trị</option><option value="51" data-select2-id="select2-data-266-iwxk">Sóc Trăng</option><option value="52" data-select2-id="select2-data-267-stxj">Sơn La</option><option value="53" data-select2-id="select2-data-268-b1ih">Tây Ninh</option><option value="54" data-select2-id="select2-data-269-iggu">Thái Bình</option><option value="55" data-select2-id="select2-data-270-rwe3">Thái Nguyên</option><option value="56" data-select2-id="select2-data-271-rhkd">Thanh Hóa</option><option value="57" data-select2-id="select2-data-272-3wgu">Thừa Thiên Huế</option><option value="58" data-select2-id="select2-data-273-wpvq">Tiền Giang</option><option value="59" data-select2-id="select2-data-274-i6na">Trà Vinh</option><option value="60" data-select2-id="select2-data-275-iwpq">Tuyên Quang</option><option value="61" data-select2-id="select2-data-276-y23x">Vĩnh Long</option><option value="62" data-select2-id="select2-data-277-8mye">Vĩnh Phúc</option><option value="63" data-select2-id="select2-data-278-bhju">Yên Bái</option></select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="select2-data-1-6e6w" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-billingProvince-container"><span class="select2-selection__rendered" id="select2-billingProvince-container" role="textbox" aria-readonly="true" title="---">---</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
												</div>
												
											</div>
											
											<div class="field field--show-floating-label ">
												<div class="field__input-wrapper field__input-wrapper--select2">
													<label for="billingDistrict" class="field__label">
														Quận huyện (tùy chọn)
													</label>
													<select name="billingDistrict" id="billingDistrict" size="1" class="field__input field__input--select select2-hidden-accessible" value="" data-bind="billing.district" data-address-type="district" data-address-zone="billing" data-select2-id="select2-data-billingDistrict" tabindex="-1" aria-hidden="true" disabled="disabled"></select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="select2-data-2-zn5w" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true" aria-labelledby="select2-billingDistrict-container"><span class="select2-selection__rendered" id="select2-billingDistrict-container" role="textbox" aria-readonly="true"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
												</div>
												
											</div>
											
											<div class="field field--show-floating-label ">
												<div class="field__input-wrapper field__input-wrapper--select2">
													<label for="billingWard" class="field__label">
														Phường xã (tùy chọn)
													</label>
													<select name="billingWard" id="billingWard" size="1" class="field__input field__input--select select2-hidden-accessible" value="" data-bind="billing.ward" data-address-type="ward" data-address-zone="billing" data-select2-id="select2-data-billingWard" tabindex="-1" aria-hidden="true" disabled="disabled"></select><span class="select2 select2-container select2-container--default select2-container--disabled" dir="ltr" data-select2-id="select2-data-3-yc0t" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true" aria-labelledby="select2-billingWard-container"><span class="select2-selection__rendered" id="select2-billingWard-container" role="textbox" aria-readonly="true"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
												</div>
												
											</div>
											
											
											
											
										</div>
									</div>
								</section>
								
								<div class="fieldset">
									<h3 class="visually-hidden">Ghi chú</h3>
									<div class="field " data-bind-class="{'field--show-floating-label': note}">
										<div class="field__input-wrapper">
											<label for="note" class="field__label">
												Ghi chú (tùy chọn)
											</label>
											<textarea name="note" id="note" class="field__input" data-bind="note"></textarea>
										</div>
										
									</div>
								</div>
								
							</div>
							<div class="col col--two">
								

								
									
									
										
									
								
								<section class="section" data-define="{shippingMethod: ''}">
									<div class="section__header">
										<div class="layout-flex">
											<h2 class="section__title layout-flex__item layout-flex__item--stretch">
												<i class="fa fa-truck fa-lg section__title--icon hide-on-desktop"></i>
												Vận chuyển
											</h2>
										</div>
									</div>
									<div class="section__content" data-tg-refresh="refreshShipping" id="shippingMethodList" data-define="{isAddressSelecting: true, shippingMethods: []}">
										<div class="alert alert--loader spinner spinner--active hide" data-bind-show="isLoadingShippingMethod">
											<svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
												<use href="#spinner"></use>
											</svg>
										</div>

										
										<div class="alert alert--danger hide" data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; !isLoadingShippingError">
											Khu vực không hỗ trợ vận chuyển
										</div>
										
										<div class="alert alert-retry alert--danger hide" data-bind-event-click="handleShippingMethodErrorRetry()" data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; isLoadingShippingError">
											<span data-bind="loadingShippingErrorMessage">Không thể load phí vận chuyển. Vui lòng thử lại</span> <i class="fa fa-refresh"></i>
										</div>

										
										<div class="content-box hide" data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; !isLoadingShippingError">

											
										</div>
										
										<div class="alert alert--info" data-bind-show="!isLoadingShippingMethod &amp;&amp; isAddressSelecting">
											Vui lòng nhập thông tin giao hàng
										</div>
									</div>
								</section>
								
								<section class="section">
									<div class="section__header">
										<div class="layout-flex">
											<h2 class="section__title layout-flex__item layout-flex__item--stretch">
												<i class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i>
												Thanh toán
											</h2>
										</div>
									</div>
									<div class="section__content">
										
										
										<div class="content-box" data-define="{paymentMethod: undefined}">
											
											
											<div class="content-box__row">
											<div class="radio-wrapper">
													<div class="radio__input">
														<input name="paymentMethod" id="paymentMethod-512461" type="radio" class="input-radio" data-bind="paymentMethod" value="512461" data-provider-id="4">
													</div>
													<label for="paymentMethod-512461" class="radio__label">
														<span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
														<span class="radio__label__accessory">
															<span class="radio__label__icon">
																<i class="payment-icon payment-icon--4"></i>
															</span>
														</span>
																
																							
													</label>
												</div>
												
												<div class="content-box__row__desc hide" data-bind-show="paymentMethod == 512461" data-provider-id="4">
													<p>Bạn chỉ phải thanh toán khi nhận được hàng</p>
													
												</div>
												
											</div>
											
										</div>
										
									</div>
								</section>
							</div>
						</article>
						<div class="field__input-btn-wrapper field__input-btn-wrapper--vertical hide-on-desktop">
							<button type="submit" class="btn btn-checkout spinner" data-bind-class="{'spinner--active': isSubmitingCheckout}" data-bind-disabled="isSubmitingCheckout || isLoadingReductionCode">
								<span class="spinner-label">ĐẶT HÀNG</span>
								<svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
									<use href="#spinner"></use>
								</svg>
							</button>
							
							<a href="/cart" class="previous-link">
								<i class="previous-link__arrow">❮</i>
								<span class="previous-link__content">Quay về giỏ hàng</span>
							</a>
							
						</div>

						<div id="common-alert" data-tg-refresh="refreshError">
							
							
							<div class="alert alert--danger hide-on-desktop hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại</div>
						</div>
					</div>
					
				</main>
				<aside class="sidebar">
					<div class="sidebar__header">
						<h2 class="sidebar__title">
							Đơn hàng (2 sản phẩm)
						</h2>
					</div>
					<div class="sidebar__content">
						<div id="order-summary" class="order-summary order-summary--is-collapsed">
							<div class="order-summary__sections">
								<div class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
									<table class="product-table" id="product-table" data-tg-refresh="refreshDiscount">
										<caption class="visually-hidden">Chi tiết đơn hàng</caption>
										<thead class="product-table__header">
											<tr>
												<th>
													<span class="visually-hidden">Ảnh sản phẩm</span>
												</th>
												<th>
													<span class="visually-hidden">Mô tả</span>
												</th>
												<th>
													<span class="visually-hidden">Sổ lượng</span>
												</th>
												<th>
													<span class="visually-hidden">Đơn giá</span>
												</th>
											</tr>
										</thead>
										<tbody>
											
											<tr class="product">
												<td class="product__image">
													<div class="product-thumbnail">
														<div class="product-thumbnail__wrapper" data-tg-static="">
															<img src="//bizweb.dktcdn.net/thumb/thumb/100/434/558/products/sp14.jpg?v=1629774972917" alt="" class="product-thumbnail__image">
														</div>
														<span class="product-thumbnail__quantity">2</span>
													</div>
												</td>
												<th class="product__description">
													<span class="product__description__name">
														Màu Sắc Bút Đánh Dấu Hai Đầu Màu Graffiti Dành Cho Học Sinh
													</span>
													
													
													
												</th>
												<td class="product__quantity visually-hidden"><em>Số lượng:</em> 2</td>
												<td class="product__price">
													
													48.000₫
													
												</td>
											</tr>
											
										</tbody>
									</table>
								</div>
								<div class="order-summary__section order-summary__section--discount-code" data-tg-refresh="refreshDiscount" id="discountCode">
									<h3 class="visually-hidden">Mã khuyến mại</h3>
									<div class="edit_checkout animate-floating-labels">
										<div class="fieldset">
											<div class="field ">
												<div class="field__input-btn-wrapper">
													<div class="field__input-wrapper">
														<label for="reductionCode" class="field__label">Nhập mã giảm giá</label>
														<input name="reductionCode" id="reductionCode" type="text" class="field__input" autocomplete="off" data-bind-disabled="isLoadingReductionCode" data-bind-event-keypress="handleReductionCodeKeyPress(event)" data-define="{reductionCode: null}" data-bind="reductionCode">
													</div>
													<button class="field__input-btn btn spinner btn--disabled" type="button" data-bind-disabled="isLoadingReductionCode || !reductionCode" data-bind-class="{'spinner--active': isLoadingReductionCode, 'btn--disabled': !reductionCode}" data-bind-event-click="applyReductionCode()" disabled="">
														<span class="spinner-label">Áp dụng</span>
														<svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
															<use href="#spinner"></use>
														</svg>
													</button>
												</div>
												
											</div>
											
											
										</div>
									</div>
								</div>
								<div class="order-summary__section order-summary__section--total-lines order-summary--collapse-element" data-define="{subTotalPriceText: '48.000₫'}" data-tg-refresh="refreshOrderTotalPrice" id="orderSummary">
									<table class="total-line-table">
										<caption class="visually-hidden">Tổng giá trị</caption>
										<thead>
											<tr>
												<td><span class="visually-hidden">Mô tả</span></td>
												<td><span class="visually-hidden">Giá tiền</span></td>
											</tr>
										</thead>
										<tbody class="total-line-table__tbody">
											<tr class="total-line total-line--subtotal">
												<th class="total-line__name">
													Tạm tính
												</th>
												<td class="total-line__price">48.000₫</td>
											</tr>
											
											
											
											<tr class="total-line total-line--shipping-fee">
												<th class="total-line__name">
													Phí vận chuyển
												</th>
												<td class="total-line__price">
													<span class="origin-price" data-bind="getTextShippingPriceOriginal()"></span>
													<span data-bind="getTextShippingPriceFinal()">-</span>
												</td>
											</tr>
											
											
											
										</tbody>
										<tfoot class="total-line-table__footer">
											<tr class="total-line payment-due">
												<th class="total-line__name">
													<span class="payment-due__label-total">
														Tổng cộng
													</span>
												</th>
												<td class="total-line__price">
													<span class="payment-due__price" data-bind="getTextTotalPrice()">48.000₫</span>
												</td>
											</tr>
										</tfoot>
									</table>
								</div>
								<div class="order-summary__nav field__input-btn-wrapper hide-on-mobile layout-flex--row-reverse">
									<button type="submit" class="btn btn-checkout spinner" data-bind-class="{'spinner--active': isSubmitingCheckout}" data-bind-disabled="isSubmitingCheckout || isLoadingReductionCode">
										<span class="spinner-label">ĐẶT HÀNG</span>
										<svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
											<use href="#spinner"></use>
										</svg>
									</button>

									
									<a href="" class="previous-link">
										<i class="previous-link__arrow">❮</i>
										<span class="previous-link__content">Quay về giỏ hàng</span>
									</a>
									
								</div>
								<div id="common-alert-sidebar" data-tg-refresh="refreshError">
									
									
									<div class="alert alert--danger hide-on-mobile hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại</div>
								</div>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</form>