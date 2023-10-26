<?php
return <<<TEMPLATE
<form id="form-${number}" class="order-form">

    <!--Number-->
    <div class="form-title-wrapper">
        <p class="form-title">Anket №${number}</p>
    </div>

    <!--Ad, Soyad, Ata adı-->
    <div class="form__block__element">
        <p>Ad, Soyad, Ata adı</p>
        <input placeholder="Ad, Soyad və Ata adı" name="fullname" class="need-validate" id="fullname-${number}" type="text">
    </div>
    
    <!--Doğum tarixi-->
    <div class="form__block__element">
        <p>Doğum tarixi</p>
        <input name="birthDay" class="need-validate" id="birthDay-${number}" type="date">
    </div>

    <!--Cins-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Cins
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" checked id="sex-m-${number}" name="sexId" value="1">
            <label for="sex-m-${number}">Kişi</label><br>
            <input type="radio" id="sex-w-${number}" name="sexId" value="2">
            <label for="sex-w-${number}"> Qadın</label><br>
        </div>
    </div>
    
    <!--Çəki-->
    <div class="form__block__element">
        <p>Çəki</p>
        <input name="weight" placeholder="Çəki (kq)" class="need-validate" id="weight-${number}" type="text">
    </div>

    <!--Boyu-->
    <div class="form__block__element">
        <p>Boyu</p>
        <input name="height" placeholder="Boyu (sm)" class="need-validate" id="height-${number}" type="text">
    </div>
    
    <!--Çəki-->
    <div class="form__block__element">
        <p>Əlaqə nömrəsi</p>
        <input name="phoneNumber" placeholder="+994 50/55/70 *** ** **" class="need-validate" id="phoneNumber-${number}" type="text">
    </div>
    
    <!--FIN kodu-->
    <div class="form__block__element">
        <p>FIN kodu</p>
        <input name="pinCode" placeholder="FIN" class="need-validate" id="pinCode-${number}" type="text">
    </div>
    
    <!--Email-->
    <div class="form__block__element">
        <p>Email ünvanı</p>
        <input placeholder="email" name="email" class="need-validate" id="email-${number}" type="text">
    </div>


    <!--Son 2 ildə müayinədən keçmisiniz?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Son 2 ildə müayinədən keçmisiniz?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveExaminedInLast2Years_yes-${number}" name="haveExaminedInLast2Years" value="1">
            <label for="haveExaminedInLast2Years_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveExaminedInLast2Years_no-${number}" name="haveExaminedInLast2Years" value="0">
            <label for="haveExaminedInLast2Years_no-${number}">Xeyr</label><br>
        </div>

    </div>


    <!--Siz hospitalizasiya olunmusunuz?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Siz hospitalizasiya olunmusunuz?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="areHospitalized_yes-${number}" name="areHospitalized" value="1">
            <label for="areHospitalized_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="areHospitalized_no-${number}" name="areHospitalized" value="0">
            <label for="areHospitalized_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!---Hal-hazırda hər hansı bir müalicə və ya dərman qəbul edirsiniz?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Hal-hazırda hər hansı bir müalicə və ya dərman qəbul edirsiniz?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveTreatmentOrMedication_yes-${number}" name="haveTreatmentOrMedication" value="1">
            <label for="haveTreatmentOrMedication_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveTreatmentOrMedication_no-${number}" name="haveTreatmentOrMedication" value="0">
            <label for="haveTreatmentOrMedication_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Qida borusunun, mədə-bağırsaq sisteminin xəstəlikləri varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Qida borusunun, mədə-bağırsaq sisteminin xəstəlikləri varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveDiseasesOfTheEsophagusAndGastrointestinalTract_yes-${number}" name="haveDiseasesOfTheEsophagusAndGastrointestinalTract" value="1">
            <label for="haveDiseasesOfTheEsophagusAndGastrointestinalTract_yes-${number}">Bəli</label><br>
            <input type="radio"  checked id="haveDiseasesOfTheEsophagusAndGastrointestinalTract_no-${number}" name="haveDiseasesOfTheEsophagusAndGastrointestinalTract" value="0">
            <label for="haveDiseasesOfTheEsophagusAndGastrointestinalTract_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Astma, allergiya, ağciyər xəstəlikləri müəyyən olunubmu?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Astma, allergiya, ağciyər xəstəlikləri müəyyən olunubmu?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveAsthmaAllergiesLungDiseases_yes-${number}" name="haveAsthmaAllergiesLungDiseases" value="1">
            <label for="haveAsthmaAllergiesLungDiseases_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveAsthmaAllergiesLungDiseases_no-${number}" name="haveAsthmaAllergiesLungDiseases" value="0">
            <label for="haveAsthmaAllergiesLungDiseases_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Böyrəklərin, sidik sisteminin xəstəlikləri varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Böyrəklərin, sidik sisteminin xəstəlikləri varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveDiseasesOfTheKidneysOrUrinarySystem_yes-${number}" name="haveDiseasesOfTheKidneysOrUrinarySystem" value="1">
            <label for="haveDiseasesOfTheKidneysOrUrinarySystem_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveDiseasesOfTheKidneysOrUrinarySystem_no-${number}" name="haveDiseasesOfTheKidneysOrUrinarySystem" value="0">
            <label for="haveDiseasesOfTheKidneysOrUrinarySystem_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Anadangəlmə və irsi xəstəliklər varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Anadangəlmə və irsi xəstəliklər varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveCongenitalAndInheritedDiseases_yes-${number}" name="haveCongenitalAndInheritedDiseases" value="1">
            <label for="haveCongenitalAndInheritedDiseases_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveCongenitalAndInheritedDiseases_no-${number}" name="haveCongenitalAndInheritedDiseases" value="0">
            <label for="haveCongenitalAndInheritedDiseases_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Baş ağrıları, başgicəllənmə və miqren olurmu?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Baş ağrıları, başgicəllənmə və miqren olurmu?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveHeadachesDizzinessAndMigraines_yes-${number}" name="haveHeadachesDizzinessAndMigraines" value="1">
            <label for="haveHeadachesDizzinessAndMigraines_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveHeadachesDizzinessAndMigraines_no-${number}" name="haveHeadachesDizzinessAndMigraines" value="0">
            <label for="haveHeadachesDizzinessAndMigraines_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Arterial təzyiqin artımı (140/90 yuxarı)?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Arterial təzyiqin artımı (140/90 yuxarı)?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveBloodPressure_yes-${number}" name="haveBloodPressure" value="1">
            <label for="haveBloodPressure_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveBloodPressure_no-${number}" name="haveBloodPressure" value="0">
            <label for="haveBloodPressure_no-${number}">Xeyr</label><br>
        </div>
    </div>



    <!--Revmatizm (əzələlərin, sümüklərin və oynaqların xəstəlikləri) varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Revmatizm (əzələlərin, sümüklərin və oynaqların xəstəlikləri) varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveRheumatism_yes-${number}" name="haveRheumatism" value="1">
            <label for="haveRheumatism_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveRheumatism_no-${number}" name="haveRheumatism" value="0">
            <label for="haveRheumatism_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Venaların varikozu və başqa damar xəstəlikləri varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Venaların varikozu və başqa damar xəstəlikləri varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="havevaricoseVeinsAndOtherVascularDiseases_yes-${number}" name="havevaricoseVeinsAndOtherVascularDiseases" value="1">
            <label for="havevaricoseVeinsAndOtherVascularDiseases_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="havevaricoseVeinsAndOtherVascularDiseases_no-${number}" name="havevaricoseVeinsAndOtherVascularDiseases" value="0">
            <label for="havevaricoseVeinsAndOtherVascularDiseases_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Ritmin, keçiriciliyin pozulması və ürək xəstəlikləri varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Ritmin, keçiriciliyin pozulması və ürək xəstəlikləri varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveRhythmConductionDisturbancesAndHeartDisease_yes-${number}" name="haveRhythmConductionDisturbancesAndHeartDisease" value="1">
            <label for="haveRhythmConductionDisturbancesAndHeartDisease_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveRhythmConductionDisturbancesAndHeartDisease_no-${number}" name="haveRhythmConductionDisturbancesAndHeartDisease" value="0">
            <label for="haveRhythmConductionDisturbancesAndHeartDisease_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Psixi xəstəlik, əsəb pozğunluğu, epilepsiya varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Psixi xəstəlik, əsəb pozğunluğu, epilepsiya varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveMentalIllnessNervousDisorderEpilepsy_yes-${number}" name="haveMentalIllnessNervousDisorderEpilepsy" value="1">
            <label for="haveMentalIllnessNervousDisorderEpilepsy_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveMentalIllnessNervousDisorderEpilepsy_no-${number}" name="haveMentalIllnessNervousDisorderEpilepsy" value="0">
            <label for="haveMentalIllnessNervousDisorderEpilepsy_no-${number}">Xeyr</label><br>
        </div>
    </div>

    <!--Travmalar, zədələnmələr, defektlər (onların nəticələri) varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Travmalar, zədələnmələr, defektlər (onların nəticələri) varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveTraumasInjuriesDefects_yes-${number}" name="haveTraumasInjuriesDefects" value="1">
            <label for="haveTraumasInjuriesDefects_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveTraumasInjuriesDefects_no-${number}" name="haveTraumasInjuriesDefects" value="0">
            <label for="haveTraumasInjuriesDefects_no-${number}">Xeyr</label><br>
        </div>
    </div>

    <!--Bel nahiyəsində və onurğa sütununda problemlər varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Bel nahiyəsində və onurğa sütununda problemlər varmı?-
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveProblemsWithLumbarRegionAndSpine_yes-${number}" name="haveProblemsWithLumbarRegionAndSpine" value="1">
            <label for="haveProblemsWithLumbarRegionAndSpine_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveProblemsWithLumbarRegionAndSpine_no-${number}" name="haveProblemsWithLumbarRegionAndSpine" value="0">
            <label for="haveProblemsWithLumbarRegionAndSpine_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Qaraciyər, dalaq, mədəaltı vəzi xəstəlikləri varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Qaraciyər, dalaq, mədəaltı vəzi xəstəlikləri varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveDiseasesOfTheLiverSpleenPancreas_yes-${number}" name="haveDiseasesOfTheLiverSpleenPancreas" value="1">
            <label for="haveDiseasesOfTheLiverSpleenPancreas_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveDiseasesOfTheLiverSpleenPancreas_no-${number}" name="haveDiseasesOfTheLiverSpleenPancreas" value="0">
            <label for="haveDiseasesOfTheLiverSpleenPancreas_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Qan xəstəlikləri varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Qan xəstəlikləri varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveBloodDiseases_yes-${number}" name="haveBloodDiseases" value="1">
            <label for="haveBloodDiseases_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveBloodDiseases_no-${number}" name="haveBloodDiseases" value="0">
            <label for="haveBloodDiseases_no-${number}">Xeyr</label><br>
        </div>
    </div>

    <!--Şəkərli diabet varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Şəkərli diabet varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveDiabetes_yes-${number}" name="haveDiabetes" value="1">
            <label for="haveDiabetes_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveDiabetes_no-${number}" name="haveDiabetes" value="0">
            <label for="haveDiabetes_no-${number}">Xeyr</label><br>
        </div>
    </div>


    <!--Digər endokrinoloji xəstəliklər varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Digər endokrinoloji xəstəliklər varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveOtherEndocrineDiseases_yes-${number}" name="haveOtherEndocrineDiseases" value="1">
            <label for="haveOtherEndocrineDiseases_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveOtherEndocrineDiseases_no-${number}" name="haveOtherEndocrineDiseases" value="0">
            <label for="haveOtherEndocrineDiseases_no-${number}">Xeyr</label><br>
        </div>
    </div>

    <!--Xoş və ya bəd xassəli şişlər varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Xoş və ya bəd xassəli şişlər varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="havebenignOrMalignantTumors_yes-${number}" name="havebenignOrMalignantTumors" value="1">
            <label for="havebenignOrMalignantTumors_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="havebenignOrMalignantTumors_no-${number}" name="havebenignOrMalignantTumors" value="0">
            <label for="havebenignOrMalignantTumors_no-${number}">Xeyr</label><br>
        </div>
    </div>

    <!--Səhhətinizlə bağlı yuxarıda göstərilənlərdən başqa probleminiz varmı?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Səhhətinizlə bağlı yuxarıda göstərilənlərdən başqa probleminiz varmı?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveAnyHealthProblemsOtherThanAbove_yes-${number}" name="haveAnyHealthProblemsOtherThanAbove" value="1">
            <label for="haveAnyHealthProblemsOtherThanAbove_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveAnyHealthProblemsOtherThanAbove_no-${number}" name="haveAnyHealthProblemsOtherThanAbove" value="0">
            <label for="haveAnyHealthProblemsOtherThanAbove_no-${number}">Xeyr</label><br>
        </div>
    </div>

    <!--Siz hal-hazırda və ya əvvəl digər sığorta kompaniyasında sığorta olmusunuzmu?-->
    <div class="form__block__element">
        <div class="form__block__element-radiotext">
            Siz hal-hazırda və ya əvvəl digər sığorta kompaniyasında sığorta olmusunuzmu?
        </div>
        <div class="form__block__radiowrap">
            <input type="radio" id="haveInsuredWithAnotherInsuranceCompany_yes-${number}" name="haveInsuredWithAnotherInsuranceCompany" value="1">
            <label for="haveInsuredWithAnotherInsuranceCompany_yes-${number}">Bəli</label><br>
            <input type="radio" checked id="haveInsuredWithAnotherInsuranceCompany_no-${number}" name="haveInsuredWithAnotherInsuranceCompany" value="0">
            <label for="haveInsuredWithAnotherInsuranceCompany_no-${number}">Xeyr</label><br>
        </div>
    </div>
</form>
TEMPLATE;
