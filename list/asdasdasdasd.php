<?php

$connection = mysqli_connect('localhost', 'root', '', 'clinics');

$query = "INSERT INTO `stomatologiya` (`name`, `adress`, `phone`, `location_1`,`location_2`) ";
$query .= "VALUES  

('	Dental Studio Firması	 ','	Azərbaycan Respublikası, Bakı, Nəsimi r-nu, M. Zeynalabdin, ev 6, m. 16	 ','	994 12 598 28 87	 ','	40.379805921852984	 ','	49.85617493299736	 '),
('	32 Beauty	 ','	Azərbaycan Respublikası, Bakı, Məmməd Araz küç,63, AZ1000	 ','	994 12 561 32 80	 ','	40.40693863177023	 ','	49.844946838732525	 '),
('	32 Gözəl	 ','	Azərbaycan Respublikası, Bakı, Azərbaycan pr., 14, AZ1000	 ','	994 70 533 32 32	 ','	40.371459468113684	 ','	49.83357401438239	 '),
('	APEX DENTAL	 ','	Azərbaycan Respublikası	 ','	994 50 334 06 34	 ','		 ','		 '),
('	AQS dental center	 ','	Azərbaycan Respublikası, Sumqayıt, 13 mkr, Babək pr., 55, AZ5000	 ','	994 55 854 25 98	 ','	40.56726442950953	 ','	49.695249527122364	 '),
('	DƏNİZ-DİŞ	 ','	Azərbaycan Respublikası, Bakı, L.Tolstoy küç. 137, AZ1000	 ','	994 70 214 04 30	 ','	40.37258240971375	 ','	49.83449284622324	 '),
('	Dental-MM (Şirvan)	 ','	Azərbaycan Respublikası, Şirvan, Xəqani küç., ev 2A, AZ1800	 ','	994 51 535 34 30	 ','	39.96119107806522	 ','	48.94319323271749	 '),
('	Implant Dental, Sumgayit	 ','	Azərbaycan Respublikası, Sumqayıt, 6-cı mkr-n, Cəlil Məmmədquluzadə küç., AZ5000	 ','	994 50 744 18 96	 ','	40.580224251247834	 ','	49.68635292330164	 '),
('	MediClub Dental	 ','	Azərbaycan Respublikası, Bakı, Mətbuat pr 2, AZ1000	 ','	994 50 200 06 70	 ','	40.35865962759629	 ','	49.82321698008925	 '),
('	Müasir Stomatoloqiya	 ','	Azərbaycan Respublikası, Sumqayıt,  3 məhəllə, Nizami küç. 23/14, AZ5000	 ','	994 50 243 88 01	 ','	40.594391275751704	 ','	49.669602172849345	 '),
('	ONLY DENT	 ','	Azərbaycan Respublikası, Bakı, M.Seyidov küç., 31-38-ci məhəllə, Korpus D, AZ1000	 ','	994 55 214 04 30	 ','	40.39526258506466	 ','	49.88219798405571	 '),
('	Sağlam Diş Klinikası 	 ','	Azərbaycan Respublikası, Bakı, Ə.Hacıyev küç., 15, AZ1000	 ','	994 55 520 31 51	 ','	40.4153344721498	 ','	49.9326149914379	 '),
('	Sağlam Diş Klinikası (Bakıxanov)	 ','	Azərbaycan Respublikası, Bakı, Bakixanov Qəsəbəsi Sakit .Qocayev 39 a, AZ1000	 ','	994 12 429 42 24	 ','	49.9644243	 ','	40.4168585	 '),
('	Stomadent	 ','	Azərbaycan Respublikası, Gəncə, Həsən Əliyev 254/42 , AZ2000	 ','	994 50 337 66 60	 ','	40.678249413439104	 ','	46.356746325501334	 ')

";


$create__aptek = mysqli_query($connection, $query);

if (!$create__aptek) {
    die("QUERY FAILED asdasdas." . mysqli_error($connection));
}