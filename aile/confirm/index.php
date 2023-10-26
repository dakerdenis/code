<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require __DIR__ . '/../vendor/autoload.php';

    $form = [
        'birthDay' => 'date',
        'fullname' => 'string',
        'sexId' => 'int',
        'weight' => 'int',
        'height' => 'int',
        'phoneNumber' => 'string',
        'pinCode' => 'string',
        'email' => 'string',
        'haveExaminedInLast2Years' => 'bool',
        'areHospitalized' => 'bool',
        'haveTreatmentOrMedication' => 'bool',
        'haveAsthmaAllergiesLungDiseases' => 'bool',
        'haveDiseasesOfTheKidneysOrUrinarySystem' => 'bool',
        'haveCongenitalAndInheritedDiseases' => 'bool',
        'haveHeadachesDizzinessAndMigraines' => 'bool',
        'haveDiseasesOfTheEsophagusAndGastrointestinalTract' => 'bool',
        'haveBloodPressure' => 'bool',
        'haveRheumatism' => 'bool',
        'havevaricoseVeinsAndOtherVascularDiseases' => 'bool',
        'haveRhythmConductionDisturbancesAndHeartDisease' => 'bool',
        'haveMentalIllnessNervousDisorderEpilepsy' => 'bool',
        'haveTraumasInjuriesDefects' => 'bool',
        'haveProblemsWithLumbarRegionAndSpine' => 'bool',
        'haveDiseasesOfTheLiverSpleenPancreas' => 'bool',
        'haveBloodDiseases' => 'bool',
        'haveDiabetes' => 'bool',
        'haveOtherEndocrineDiseases' => 'bool',
        'havebenignOrMalignantTumors' => 'bool',
        'haveAnyHealthProblemsOtherThanAbove' => 'bool',
        'haveInsuredWithAnotherInsuranceCompany' => 'bool',
    ];

    $data = $_POST;

    $validated = [];

    function error_response($message)
    {
        $data = compact('message');
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        die();
    }

    foreach ($form as $field => $validation) {
        if (!isset($data[$field])) {
            $data = ['message' => "$field is required"];
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
            die();
        }
        switch ($validation) {
            case 'bool':
                if (!filter_var($data[$field], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === null) {
                    error_response("$field is not a boolean value");
                }
                $validated[$field] = (int)$data[$field];
                break;
            case 'int':
                if (!filter_var($data[$field], FILTER_VALIDATE_INT)) {
                    error_response("$field is not an integer value");
                }
                $validated[$field] = $data[$field];
                break;
            case 'string':
                if (!$data[$field]) {
                    error_response("$field is not a string value");
                }
                $validated[$field] = $data[$field];
                break;
            case 'date':
                if (!boolval(strtotime($data[$field]))) {
                    error_response("$field is not a date value");
                }
                $validated[$field] = $data[$field];
        }
    }

    try {
        $url = "https://insure.a-group.az/insureazSvc/AQroupMobileIntegrationSvc.asmx";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array("Content-Type: text/xml",);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = <<<DATA
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <CreateMedicalPolicyOrder xmlns="http://tempuri.org/">
      <userName>Insureaz</userName>
      <password>simsnet</password>
      <programId>2</programId>
      <pinCode>${validated['pinCode']}</pinCode>
      <fullname>${validated['fullname']}</fullname>
      <phoneNumber>${validated['phoneNumber']}</phoneNumber>
      <email>${validated['email']}</email>
      <sexId>${validated['sexId']}</sexId>
      <weight>${validated['weight']}</weight>
      <height>${validated['height']}</height>
      <birthDay>${validated['birthDay']}</birthDay>
      <haveExaminedInLast2Years>${validated['haveExaminedInLast2Years']}</haveExaminedInLast2Years>
      <areHospitalized>${validated['areHospitalized']}</areHospitalized>
      <haveTreatmentOrMedication>${validated['haveTreatmentOrMedication']}</haveTreatmentOrMedication>
      <haveDiseasesOfTheEsophagusAndGastrointestinalTract>${validated['haveDiseasesOfTheEsophagusAndGastrointestinalTract']}</haveDiseasesOfTheEsophagusAndGastrointestinalTract>
      <haveAsthmaAllergiesLungDiseases>${validated['haveAsthmaAllergiesLungDiseases']}</haveAsthmaAllergiesLungDiseases>
      <haveDiseasesOfTheKidneysOrUrinarySystem>${validated['haveDiseasesOfTheKidneysOrUrinarySystem']}</haveDiseasesOfTheKidneysOrUrinarySystem>
      <haveCongenitalAndInheritedDiseases>${validated['haveCongenitalAndInheritedDiseases']}</haveCongenitalAndInheritedDiseases>
      <haveHeadachesDizzinessAndMigraines>${validated['haveHeadachesDizzinessAndMigraines']}</haveHeadachesDizzinessAndMigraines>
      <haveBloodPressure>${validated['haveBloodPressure']}</haveBloodPressure>
      <haveRheumatism>${validated['haveRheumatism']}</haveRheumatism>
      <havevaricoseVeinsAndOtherVascularDiseases>${validated['havevaricoseVeinsAndOtherVascularDiseases']} </havevaricoseVeinsAndOtherVascularDiseases>
      <haveRhythmConductionDisturbancesAndHeartDisease>${validated['haveRhythmConductionDisturbancesAndHeartDisease']}</haveRhythmConductionDisturbancesAndHeartDisease>
      <haveMentalIllnessNervousDisorderEpilepsy>${validated['haveMentalIllnessNervousDisorderEpilepsy']}</haveMentalIllnessNervousDisorderEpilepsy>
      <haveTraumasInjuriesDefects>${validated['haveTraumasInjuriesDefects']}</haveTraumasInjuriesDefects>
      <haveProblemsWithLumbarRegionAndSpine>${validated['haveProblemsWithLumbarRegionAndSpine']}</haveProblemsWithLumbarRegionAndSpine>
      <haveDiseasesOfTheLiverSpleenPancreas>${validated['haveDiseasesOfTheLiverSpleenPancreas']}</haveDiseasesOfTheLiverSpleenPancreas>
      <haveBloodDiseases>${validated['haveBloodDiseases']}</haveBloodDiseases>
      <haveDiabetes>${validated['haveDiabetes']}</haveDiabetes>
      <haveOtherEndocrineDiseases>${validated['haveOtherEndocrineDiseases']}</haveOtherEndocrineDiseases>
      <havebenignOrMalignantTumors>${validated['havebenignOrMalignantTumors']}</havebenignOrMalignantTumors>
      <haveAnyHealthProblemsOtherThanAbove>${validated['haveAnyHealthProblemsOtherThanAbove']}</haveAnyHealthProblemsOtherThanAbove>
      <haveInsuredWithAnotherInsuranceCompany>${validated['haveInsuredWithAnotherInsuranceCompany']}</haveInsuredWithAnotherInsuranceCompany>
    </CreateMedicalPolicyOrder>
  </soap:Body>
</soap:Envelope>
DATA;

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            dd($error_msg);
        }
        $soap = simplexml_load_string(html_entity_decode($resp));
        $response = (array)$soap->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()
            ->CreateMedicalPolicyOrderResponse->CreateMedicalPolicyOrderResult->DocumentElement;
        $message = null;
        if (isset($response['ERROR'])) {
            $status = 'fail';
            $message = $response['ERROR']->MESSAGE->__toString();
        } else {
            $status = 'success';
        }

        $data = compact('status', 'message');
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        die();
    } catch (Error $exception) {
        $status = 'fail';
        $message = 'Server ERROR';
        $data = compact('status', 'message');
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        die();
    }
}
die();