<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $cities =  [

        [
            "id"=> 1,
            "langId"=> "ARA",
            "cityName"=> "ابو عريش",
            "sequence"=> 3,
            "cityCode"=> "AAH"
        ],
        [
            "id"=> 2,
            "langId"=> "ENU",
            "cityName"=> "ABU ARISH",
            "sequence"=> 3,
            "cityCode"=> "AAH"
        ],
        [
            "id"=> 3,
            "langId"=> "ARA",
            "cityName"=> "أبها",
            "sequence"=> 1,
            "cityCode"=> "ABH"
        ],
        [
            "id"=> 4,
            "langId"=> "ENU",
            "cityName"=> "ABHA",
            "sequence"=> 1,
            "cityCode"=> "ABH"
        ],
        [
            "id"=> 5,
            "langId"=> "ARA",
            "cityName"=> "البيكيرية",
            "sequence"=> 8,
            "cityCode"=> "ABK"
        ],
        [
            "id"=> 6,
            "langId"=> "ENU",
            "cityName"=> "AL BEKERIA",
            "sequence"=> 8,
            "cityCode"=> "ABK"
        ],
        [
            "id"=> 7,
            "langId"=> "ARA",
            "cityName"=> "أبقيق",
            "sequence"=> 2,
            "cityCode"=> "ABQ"
        ],
        [
            "id"=> 8,
            "langId"=> "ENU",
            "cityName"=> "ABQAIQ",
            "sequence"=> 2,
            "cityCode"=> "ABQ"
        ],
        [
            "id"=> 9,
            "langId"=> "ARA",
            "cityName"=> "الافلاج",
            "sequence"=> 5,
            "cityCode"=> "AFH"
        ],
        [
            "id"=> 10,
            "langId"=> "ENU",
            "cityName"=> "AL AFLAG",
            "sequence"=> 5,
            "cityCode"=> "AFH"
        ],
        [
            "id"=> 11,
            "langId"=> "ARA",
            "cityName"=> "عفيف",
            "sequence"=> 4,
            "cityCode"=> "AFI"
        ],
        [
            "id"=> 12,
            "langId"=> "ENU",
            "cityName"=> "AFIF",
            "sequence"=> 4,
            "cityCode"=> "AFI"
        ],
        [
            "id"=> 13,
            "langId"=> "ARA",
            "cityName"=> "الغاط",
            "sequence"=> 29,
            "cityCode"=> "AGT"
        ],
        [
            "id"=> 14,
            "langId"=> "ENU",
            "cityName"=> "ALGAT",
            "sequence"=> 29,
            "cityCode"=> "AGT"
        ],
        [
            "id"=> 15,
            "langId"=> "ARA",
            "cityName"=> "القويعية",
            "sequence"=> 12,
            "cityCode"=> "AGW"
        ],
        [
            "id"=> 16,
            "langId"=> "ENU",
            "cityName"=> "AL GWEIIYYAH",
            "sequence"=> 12,
            "cityCode"=> "AGW"
        ],
        [
            "id"=> 17,
            "langId"=> "ARA",
            "cityName"=> "عرعر",
            "sequence"=> 31,
            "cityCode"=> "ARA"
        ],
        [
            "id"=> 18,
            "langId"=> "ENU",
            "cityName"=> "ARAR",
            "sequence"=> 31,
            "cityCode"=> "ARA"
        ],
        [
            "id"=> 19,
            "langId"=> "ARA",
            "cityName"=> "الأرطاوية",
            "sequence"=> 6,
            "cityCode"=> "ART"
        ],
        [
            "id"=> 20,
            "langId"=> "ENU",
            "cityName"=> "AL ARTAWEYAH",
            "sequence"=> 6,
            "cityCode"=> "ART"
        ],
        [
            "id"=> 21,
            "langId"=> "ARA",
            "cityName"=> "الاحساء",
            "sequence"=> 11,
            "cityCode"=> "ASA"
        ],
        [
            "id"=> 22,
            "langId"=> "ENU",
            "cityName"=> "AL EHSAA",
            "sequence"=> 11,
            "cityCode"=> "ASA"
        ],
        [
            "id"=> 23,
            "langId"=> "ARA",
            "cityName"=> "عسير",
            "sequence"=> 33,
            "cityCode"=> "ASR"
        ],
        [
            "id"=> 24,
            "langId"=> "ENU",
            "cityName"=> "ASEER",
            "sequence"=> 33,
            "cityCode"=> "ASR"
        ],
        [
            "id"=> 25,
            "langId"=> "ARA",
            "cityName"=> "بدر",
            "sequence"=> 35,
            "cityCode"=> "BAD"
        ],
        [
            "id"=> 26,
            "langId"=> "ENU",
            "cityName"=> "BADR",
            "sequence"=> 35,
            "cityCode"=> "BAD"
        ],
        [
            "id"=> 27,
            "langId"=> "ARA",
            "cityName"=> "الباحة",
            "sequence"=> 7,
            "cityCode"=> "BAH"
        ],
        [
            "id"=> 28,
            "langId"=> "ENU",
            "cityName"=> "AL BAHAH",
            "sequence"=> 7,
            "cityCode"=> "BAH"
        ],
        [
            "id"=> 29,
            "langId"=> "ARA",
            "cityName"=> "بلجرشي",
            "sequence"=> 36,
            "cityCode"=> "BAL"
        ],
        [
            "id"=> 30,
            "langId"=> "ENU",
            "cityName"=> "BALJURASHI",
            "sequence"=> 36,
            "cityCode"=> "BAL"
        ],
        [
            "id"=> 31,
            "langId"=> "ARA",
            "cityName"=> "بيشة",
            "sequence"=> 37,
            "cityCode"=> "BIS"
        ],
        [
            "id"=> 32,
            "langId"=> "ENU",
            "cityName"=> "BISHA",
            "sequence"=> 37,
            "cityCode"=> "BIS"
        ],
        [
            "id"=> 33,
            "langId"=> "ARA",
            "cityName"=> "بقعاء",
            "sequence"=> 38,
            "cityCode"=> "BUQ"
        ],
        [
            "id"=> 34,
            "langId"=> "ENU",
            "cityName"=> "BUQ A",
            "sequence"=> 38,
            "cityCode"=> "BUQ"
        ],
        [
            "id"=> 35,
            "langId"=> "ARA",
            "cityName"=> "بريدة",
            "sequence"=> 39,
            "cityCode"=> "BUR"
        ],
        [
            "id"=> 36,
            "langId"=> "ENU",
            "cityName"=> "BURAIDAH",
            "sequence"=> 39,
            "cityCode"=> "BUR"
        ],
        [
            "id"=> 37,
            "langId"=> "ARA",
            "cityName"=> "ظهران الجنوب",
            "sequence"=> 41,
            "cityCode"=> "DAB"
        ],
        [
            "id"=> 38,
            "langId"=> "ENU",
            "cityName"=> "DAHRAN ALJANOOB",
            "sequence"=> 41,
            "cityCode"=> "DAB"
        ],
        [
            "id"=> 39,
            "langId"=> "ARA",
            "cityName"=> "ذهبان",
            "sequence"=> 40,
            "cityCode"=> "DAH"
        ],
        [
            "id"=> 40,
            "langId"=> "ENU",
            "cityName"=> "DAHABAN",
            "sequence"=> 40,
            "cityCode"=> "DAH"
        ],
        [
            "id"=> 41,
            "langId"=> "ARA",
            "cityName"=> "الدمام",
            "sequence"=> 43,
            "cityCode"=> "DAM"
        ],
        [
            "id"=> 42,
            "langId"=> "ENU",
            "cityName"=> "DAMMAM",
            "sequence"=> 43,
            "cityCode"=> "DAM"
        ],
        [
            "id"=> 43,
            "langId"=> "ARA",
            "cityName"=> "الظهران",
            "sequence"=> 44,
            "cityCode"=> "DHA"
        ],
        [
            "id"=> 44,
            "langId"=> "ENU",
            "cityName"=> "DHAHRAN",
            "sequence"=> 44,
            "cityCode"=> "DHA"
        ],
        [
            "id"=> 45,
            "langId"=> "ARA",
            "cityName"=> "ضرماء",
            "sequence"=> 45,
            "cityCode"=> "DHU"
        ],
        [
            "id"=> 46,
            "langId"=> "ENU",
            "cityName"=> "DHURMA",
            "sequence"=> 45,
            "cityCode"=> "DHU"
        ],
        [
            "id"=> 47,
            "langId"=> "ARA",
            "cityName"=> "الد لم",
            "sequence"=> 9,
            "cityCode"=> "DLM"
        ],
        [
            "id"=> 48,
            "langId"=> "ENU",
            "cityName"=> "AL DALEM",
            "sequence"=> 9,
            "cityCode"=> "DLM"
        ],
        [
            "id"=> 49,
            "langId"=> "ARA",
            "cityName"=> "ضباء",
            "sequence"=> 46,
            "cityCode"=> "DUB"
        ],
        [
            "id"=> 50,
            "langId"=> "ENU",
            "cityName"=> "DUBA",
            "sequence"=> 46,
            "cityCode"=> "DUB"
        ],
        [
            "id"=> 51,
            "langId"=> "ARA",
            "cityName"=> "دومة الجندل",
            "sequence"=> 47,
            "cityCode"=> "DUM"
        ],
        [
            "id"=> 52,
            "langId"=> "ENU",
            "cityName"=> "DUMAT AL JANDAL",
            "sequence"=> 47,
            "cityCode"=> "DUM"
        ],
        [
            "id"=> 53,
            "langId"=> "ARA",
            "cityName"=> "الدوادمي",
            "sequence"=> 48,
            "cityCode"=> "DWA"
        ],
        [
            "id"=> 54,
            "langId"=> "ENU",
            "cityName"=> "DWADMI",
            "sequence"=> 48,
            "cityCode"=> "DWA"
        ],
        [
            "id"=> 55,
            "langId"=> "ARA",
            "cityName"=> "مدينة فراسان",
            "sequence"=> 49,
            "cityCode"=> "FAR"
        ],
        [
            "id"=> 56,
            "langId"=> "ENU",
            "cityName"=> "FARASAN CITY",
            "sequence"=> 49,
            "cityCode"=> "FAR"
        ],
        [
            "id"=> 57,
            "langId"=> "ARA",
            "cityName"=> "ضرغط",
            "sequence"=> 50,
            "cityCode"=> "GAT"
        ],
        [
            "id"=> 58,
            "langId"=> "ENU",
            "cityName"=> "GATGAT",
            "sequence"=> 50,
            "cityCode"=> "GAT"
        ],
        [
            "id"=> 59,
            "langId"=> "ARA",
            "cityName"=> "القريات",
            "sequence"=> 51,
            "cityCode"=> "GUR"
        ],
        [
            "id"=> 60,
            "langId"=> "ENU",
            "cityName"=> "GURAYAT",
            "sequence"=> 51,
            "cityCode"=> "GUR"
        ],
        [
            "id"=> 61,
            "langId"=> "ARA",
            "cityName"=> "الحريق",
            "sequence"=> 13,
            "cityCode"=> "HAE"
        ],
        [
            "id"=> 62,
            "langId"=> "ENU",
            "cityName"=> "AL HAREEQ",
            "sequence"=> 13,
            "cityCode"=> "HAE"
        ],
        [
            "id"=> 63,
            "langId"=> "ARA",
            "cityName"=> "حفر الباطن",
            "sequence"=> 52,
            "cityCode"=> "HAF"
        ],
        [
            "id"=> 64,
            "langId"=> "ENU",
            "cityName"=> "HAFR AL BATIN",
            "sequence"=> 52,
            "cityCode"=> "HAF"
        ],
        [
            "id"=> 65,
            "langId"=> "ARA",
            "cityName"=> "حائل",
            "sequence"=> 53,
            "cityCode"=> "HAI"
        ],
        [
            "id"=> 66,
            "langId"=> "ENU",
            "cityName"=> "HAIL",
            "sequence"=> 53,
            "cityCode"=> "HAI"
        ],
        [
            "id"=> 67,
            "langId"=> "ARA",
            "cityName"=> "حقل",
            "sequence"=> 55,
            "cityCode"=> "HAQ"
        ],
        [
            "id"=> 68,
            "langId"=> "ENU",
            "cityName"=> "HAQL",
            "sequence"=> 55,
            "cityCode"=> "HAQ"
        ],
        [
            "id"=> 69,
            "langId"=> "ARA",
            "cityName"=> "حوطه بني تميم",
            "sequence"=> 57,
            "cityCode"=> "HBT"
        ],
        [
            "id"=> 70,
            "langId"=> "ENU",
            "cityName"=> "HOTAT BANI TAMIM",
            "sequence"=> 57,
            "cityCode"=> "HBT"
        ],
        [
            "id"=> 71,
            "langId"=> "ARA",
            "cityName"=> "حريملا ء",
            "sequence"=> 56,
            "cityCode"=> "HRM"
        ],
        [
            "id"=> 72,
            "langId"=> "ENU",
            "cityName"=> "HARMELAH",
            "sequence"=> 56,
            "cityCode"=> "HRM"
        ],
        [
            "id"=> 73,
            "langId"=> "ARA",
            "cityName"=> "الهفوف",
            "sequence"=> 14,
            "cityCode"=> "HUF"
        ],
        [
            "id"=> 74,
            "langId"=> "ENU",
            "cityName"=> "AL HUFUF",
            "sequence"=> 14,
            "cityCode"=> "HUF"
        ],
        [
            "id"=> 75,
            "langId"=> "ARA",
            "cityName"=> "الجوف",
            "sequence"=> 15,
            "cityCode"=> "JAW"
        ],
        [
            "id"=> 76,
            "langId"=> "ENU",
            "cityName"=> "AL JAWF",
            "sequence"=> 15,
            "cityCode"=> "JAW"
        ],
        [
            "id"=> 77,
            "langId"=> "ARA",
            "cityName"=> "مدينة جيزان الاقتصادية",
            "sequence"=> 60,
            "cityCode"=> "JEC"
        ],
        [
            "id"=> 78,
            "langId"=> "ENU",
            "cityName"=> "JIZAN ECONOMIC CITY",
            "sequence"=> 60,
            "cityCode"=> "JEC"
        ],
        [
            "id"=> 79,
            "langId"=> "ARA",
            "cityName"=> "جدة",
            "sequence"=> 58,
            "cityCode"=> "JED"
        ],
        [
            "id"=> 80,
            "langId"=> "ENU",
            "cityName"=> "JEDDAH",
            "sequence"=> 58,
            "cityCode"=> "JED"
        ],
        [
            "id"=> 81,
            "langId"=> "ARA",
            "cityName"=> "جيزان",
            "sequence"=> 59,
            "cityCode"=> "JIZ"
        ],
        [
            "id"=> 82,
            "langId"=> "ENU",
            "cityName"=> "JIZAN",
            "sequence"=> 59,
            "cityCode"=> "JIZ"
        ],
        [
            "id"=> 83,
            "langId"=> "ARA",
            "cityName"=> "الجبيل",
            "sequence"=> 61,
            "cityCode"=> "JUB"
        ],
        [
            "id"=> 84,
            "langId"=> "ENU",
            "cityName"=> "JUBAIL",
            "sequence"=> 61,
            "cityCode"=> "JUB"
        ],
        [
            "id"=> 85,
            "langId"=> "ARA",
            "cityName"=> "مدينة المعرفة . المدينة",
            "sequence"=> 67,
            "cityCode"=> "KEC"
        ],
        [
            "id"=> 86,
            "langId"=> "ENU",
            "cityName"=> "KNOWLEDGE ECONOMIC CITY,MEDINA",
            "sequence"=> 67,
            "cityCode"=> "KEC"
        ],
        [
            "id"=> 87,
            "langId"=> "ARA",
            "cityName"=> "الخفجي",
            "sequence"=> 62,
            "cityCode"=> "KHA"
        ],
        [
            "id"=> 88,
            "langId"=> "ENU",
            "cityName"=> "KHAFJI",
            "sequence"=> 62,
            "cityCode"=> "KHA"
        ],
        [
            "id"=> 89,
            "langId"=> "ARA",
            "cityName"=> "خميس مشيط",
            "sequence"=> 63,
            "cityCode"=> "KHM"
        ],
        [
            "id"=> 90,
            "langId"=> "ENU",
            "cityName"=> "KHAMIS MUSHAYT",
            "sequence"=> 63,
            "cityCode"=> "KHM"
        ],
        [
            "id"=> 91,
            "langId"=> "ARA",
            "cityName"=> "الخبر",
            "sequence"=> 64,
            "cityCode"=> "KHO"
        ],
        [
            "id"=> 92,
            "langId"=> "ENU",
            "cityName"=> "KHOBAR",
            "sequence"=> 64,
            "cityCode"=> "KHO"
        ],
        [
            "id"=> 93,
            "langId"=> "ARA",
            "cityName"=> "الخرج",
            "sequence"=> 17,
            "cityCode"=> "KHR"
        ],
        [
            "id"=> 94,
            "langId"=> "ENU",
            "cityName"=> "AL KHARJ",
            "sequence"=> 17,
            "cityCode"=> "KHR"
        ],
        [
            "id"=> 95,
            "langId"=> "ARA",
            "cityName"=> "الخط",
            "sequence"=> 18,
            "cityCode"=> "KHU"
        ],
        [
            "id"=> 96,
            "langId"=> "ENU",
            "cityName"=> "AL KHUTT",
            "sequence"=> 18,
            "cityCode"=> "KHU"
        ],
        [
            "id"=> 97,
            "langId"=> "ARA",
            "cityName"=> "مدينة الملك عبدا لله الاقتصادي",
            "sequence"=> 65,
            "cityCode"=> "KIN"
        ],
        [
            "id"=> 98,
            "langId"=> "ENU",
            "cityName"=> "KING ABDULLAH ECONOMIC CITY",
            "sequence"=> 65,
            "cityCode"=> "KIN"
        ],
        [
            "id"=> 99,
            "langId"=> "ARA",
            "cityName"=> "مدينه الملك خالد العسكريه",
            "sequence"=> 66,
            "cityCode"=> "KKC"
        ],
        [
            "id"=> 100,
            "langId"=> "ENU",
            "cityName"=> "KING KHALID CITY",
            "sequence"=> 66,
            "cityCode"=> "KKC"
        ],
        [
            "id"=> 101,
            "langId"=> "ARA",
            "cityName"=> "الخماسين",
            "sequence"=> 16,
            "cityCode"=> "KMS"
        ],
        [
            "id"=> 102,
            "langId"=> "ENU",
            "cityName"=> "AL KHAMSEEN",
            "sequence"=> 16,
            "cityCode"=> "KMS"
        ],
        [
            "id"=> 103,
            "langId"=> "ARA",
            "cityName"=> "ليلى",
            "sequence"=> 68,
            "cityCode"=> "LAY"
        ],
        [
            "id"=> 104,
            "langId"=> "ENU",
            "cityName"=> "LAYLA",
            "sequence"=> 68,
            "cityCode"=> "LAY"
        ],
        [
            "id"=> 105,
            "langId"=> "ARA",
            "cityName"=> "الليث",
            "sequence"=> 19,
            "cityCode"=> "LIT"
        ],
        [
            "id"=> 106,
            "langId"=> "ENU",
            "cityName"=> "AL LITH",
            "sequence"=> 19,
            "cityCode"=> "LIT"
        ],
        [
            "id"=> 107,
            "langId"=> "ARA",
            "cityName"=> "المجمعة",
            "sequence"=> 20,
            "cityCode"=> "MAJ"
        ],
        [
            "id"=> 108,
            "langId"=> "ENU",
            "cityName"=> "AL MAJMAAH",
            "sequence"=> 20,
            "cityCode"=> "MAJ"
        ],
        [
            "id"=> 109,
            "langId"=> "ARA",
            "cityName"=> "مستورة",
            "sequence"=> 72,
            "cityCode"=> "MAS"
        ],
        [
            "id"=> 110,
            "langId"=> "ENU",
            "cityName"=> "MASTOORAH",
            "sequence"=> 72,
            "cityCode"=> "MAS"
        ],
        [
            "id"=> 111,
            "langId"=> "ARA",
            "cityName"=> "مكة المكرمة",
            "sequence"=> 71,
            "cityCode"=> "MEC"
        ],
        [
            "id"=> 112,
            "langId"=> "ENU",
            "cityName"=> "MAKKAH",
            "sequence"=> 71,
            "cityCode"=> "MEC"
        ],
        [
            "id"=> 113,
            "langId"=> "ARA",
            "cityName"=> "المدينة المنورة",
            "sequence"=> 73,
            "cityCode"=> "MED"
        ],
        [
            "id"=> 114,
            "langId"=> "ENU",
            "cityName"=> "MEDINA",
            "sequence"=> 73,
            "cityCode"=> "MED"
        ],
        [
            "id"=> 115,
            "langId"=> "ARA",
            "cityName"=> "محايل عسير",
            "sequence"=> 69,
            "cityCode"=> "MHA"
        ],
        [
            "id"=> 116,
            "langId"=> "ENU",
            "cityName"=> "MAHAYEL ASSER",
            "sequence"=> 69,
            "cityCode"=> "MHA"
        ],
        [
            "id"=> 117,
            "langId"=> "ARA",
            "cityName"=> "مهد الذهب",
            "sequence"=> 70,
            "cityCode"=> "MHD"
        ],
        [
            "id"=> 118,
            "langId"=> "ENU",
            "cityName"=> "MAHD AL DHAHAB",
            "sequence"=> 70,
            "cityCode"=> "MHD"
        ],
        [
            "id"=> 119,
            "langId"=> "ARA",
            "cityName"=> "المبرز",
            "sequence"=> 22,
            "cityCode"=> "MUB"
        ],
        [
            "id"=> 120,
            "langId"=> "ENU",
            "cityName"=> "AL MUBARRAZ",
            "sequence"=> 22,
            "cityCode"=> "MUB"
        ],
        [
            "id"=> 121,
            "langId"=> "ARA",
            "cityName"=> "المزاحمية",
            "sequence"=> 74,
            "cityCode"=> "MUZ"
        ],
        [
            "id"=> 122,
            "langId"=> "ENU",
            "cityName"=> "MUZAHMIYYA",
            "sequence"=> 74,
            "cityCode"=> "MUZ"
        ],
        [
            "id"=> 123,
            "langId"=> "ARA",
            "cityName"=> "نجران",
            "sequence"=> 75,
            "cityCode"=> "NAJ"
        ],
        [
            "id"=> 124,
            "langId"=> "ENU",
            "cityName"=> "NAJRAN",
            "sequence"=> 75,
            "cityCode"=> "NAJ"
        ],
        [
            "id"=> 125,
            "langId"=> "ARA",
            "cityName"=> "النماص",
            "sequence"=> 23,
            "cityCode"=> "NAM"
        ],
        [
            "id"=> 126,
            "langId"=> "ENU",
            "cityName"=> "AL NAMAS",
            "sequence"=> 23,
            "cityCode"=> "NAM"
        ],
        [
            "id"=> 127,
            "langId"=> "ARA",
            "cityName"=> "حاله عمار",
            "sequence"=> 54,
            "cityCode"=> "OMR"
        ],
        [
            "id"=> 128,
            "langId"=> "ENU",
            "cityName"=> "HALA AMMR",
            "sequence"=> 54,
            "cityCode"=> "OMR"
        ],
        [
            "id"=> 129,
            "langId"=> "ARA",
            "cityName"=> "العيون",
            "sequence"=> 24,
            "cityCode"=> "OYO"
        ],
        [
            "id"=> 130,
            "langId"=> "ENU",
            "cityName"=> "AL OYOON",
            "sequence"=> 24,
            "cityCode"=> "OYO"
        ],
        [
            "id"=> 131,
            "langId"=> "ARA",
            "cityName"=> "القيصومة",
            "sequence"=> 76,
            "cityCode"=> "QAI"
        ],
        [
            "id"=> 132,
            "langId"=> "ENU",
            "cityName"=> "QAISUMAH",
            "sequence"=> 76,
            "cityCode"=> "QAI"
        ],
        [
            "id"=> 133,
            "langId"=> "ARA",
            "cityName"=> "قلعة بيشه",
            "sequence"=> 77,
            "cityCode"=> "QAL"
        ],
        [
            "id"=> 134,
            "langId"=> "ENU",
            "cityName"=> "QALAT BISHAH",
            "sequence"=> 77,
            "cityCode"=> "QAL"
        ],
        [
            "id"=> 135,
            "langId"=> "ARA",
            "cityName"=> "القطيف",
            "sequence"=> 79,
            "cityCode"=> "QAT"
        ],
        [
            "id"=> 136,
            "langId"=> "ENU",
            "cityName"=> "QATIF",
            "sequence"=> 79,
            "cityCode"=> "QAT"
        ],
        [
            "id"=> 137,
            "langId"=> "ARA",
            "cityName"=> "قلوه",
            "sequence"=> 78,
            "cityCode"=> "QLW"
        ],
        [
            "id"=> 138,
            "langId"=> "ENU",
            "cityName"=> "QALWA",
            "sequence"=> 78,
            "cityCode"=> "QLW"
        ],
        [
            "id"=> 139,
            "langId"=> "ARA",
            "cityName"=> "القنفذه",
            "sequence"=> 25,
            "cityCode"=> "QUN"
        ],
        [
            "id"=> 140,
            "langId"=> "ENU",
            "cityName"=> "AL QUNFUDHAH",
            "sequence"=> 25,
            "cityCode"=> "QUN"
        ],
        [
            "id"=> 141,
            "langId"=> "ARA",
            "cityName"=> "رابغ",
            "sequence"=> 80,
            "cityCode"=> "RAB"
        ],
        [
            "id"=> 142,
            "langId"=> "ENU",
            "cityName"=> "RABIGH",
            "sequence"=> 80,
            "cityCode"=> "RAB"
        ],
        [
            "id"=> 143,
            "langId"=> "ARA",
            "cityName"=> "رفحة",
            "sequence"=> 81,
            "cityCode"=> "RAF"
        ],
        [
            "id"=> 144,
            "langId"=> "ENU",
            "cityName"=> "RAFTA",
            "sequence"=> 81,
            "cityCode"=> "RAF"
        ],
        [
            "id"=> 145,
            "langId"=> "ARA",
            "cityName"=> "الرس",
            "sequence"=> 30,
            "cityCode"=> "RAS"
        ],
        [
            "id"=> 146,
            "langId"=> "ENU",
            "cityName"=> "AR RASS",
            "sequence"=> 30,
            "cityCode"=> "RAS"
        ],
        [
            "id"=> 147,
            "langId"=> "ARA",
            "cityName"=> "رأس تنورة",
            "sequence"=> 83,
            "cityCode"=> "RAT"
        ],
        [
            "id"=> 148,
            "langId"=> "ENU",
            "cityName"=> "RAS TANURA",
            "sequence"=> 83,
            "cityCode"=> "RAT"
        ],
        [
            "id"=> 149,
            "langId"=> "ARA",
            "cityName"=> "الرياض",
            "sequence"=> 85,
            "cityCode"=> "RIY"
        ],
        [
            "id"=> 150,
            "langId"=> "ENU",
            "cityName"=> "RIYADH",
            "sequence"=> 85,
            "cityCode"=> "RIY"
        ],
        [
            "id"=> 151,
            "langId"=> "ARA",
            "cityName"=> "رغبه",
            "sequence"=> 82,
            "cityCode"=> "RKB"
        ],
        [
            "id"=> 152,
            "langId"=> "ENU",
            "cityName"=> "RAGBA",
            "sequence"=> 82,
            "cityCode"=> "RKB"
        ],
        [
            "id"=> 153,
            "langId"=> "ARA",
            "cityName"=> "سبت العلايا",
            "sequence"=> 86,
            "cityCode"=> "SAB"
        ],
        [
            "id"=> 154,
            "langId"=> "ENU",
            "cityName"=> "SABT AL ALAYA",
            "sequence"=> 86,
            "cityCode"=> "SAB"
        ],
        [
            "id"=> 155,
            "langId"=> "ARA",
            "cityName"=> "صفوى",
            "sequence"=> 87,
            "cityCode"=> "SAF"
        ],
        [
            "id"=> 156,
            "langId"=> "ENU",
            "cityName"=> "SAFWA CITY",
            "sequence"=> 87,
            "cityCode"=> "SAF"
        ],
        [
            "id"=> 157,
            "langId"=> "ARA",
            "cityName"=> "سيهات",
            "sequence"=> 88,
            "cityCode"=> "SAI"
        ],
        [
            "id"=> 158,
            "langId"=> "ENU",
            "cityName"=> "SAIHAT",
            "sequence"=> 88,
            "cityCode"=> "SAI"
        ],
        [
            "id"=> 159,
            "langId"=> "ARA",
            "cityName"=> "سكاكا",
            "sequence"=> 89,
            "cityCode"=> "SAK"
        ],
        [
            "id"=> 160,
            "langId"=> "ENU",
            "cityName"=> "SAKAKAH",
            "sequence"=> 89,
            "cityCode"=> "SAK"
        ],
        [
            "id"=> 161,
            "langId"=> "ARA",
            "cityName"=> "سراة عبيدة",
            "sequence"=> 90,
            "cityCode"=> "SAO"
        ],
        [
            "id"=> 162,
            "langId"=> "ENU",
            "cityName"=> "SARAT OBAID",
            "sequence"=> 90,
            "cityCode"=> "SAO"
        ],
        [
            "id"=> 163,
            "langId"=> "ARA",
            "cityName"=> "شرورة",
            "sequence"=> 92,
            "cityCode"=> "SHA"
        ],
        [
            "id"=> 164,
            "langId"=> "ENU",
            "cityName"=> "SHARURAH",
            "sequence"=> 92,
            "cityCode"=> "SHA"
        ],
        [
            "id"=> 165,
            "langId"=> "ARA",
            "cityName"=> "شقراء",
            "sequence"=> 91,
            "cityCode"=> "SHG"
        ],
        [
            "id"=> 166,
            "langId"=> "ENU",
            "cityName"=> "SHAQRAA",
            "sequence"=> 91,
            "cityCode"=> "SHG"
        ],
        [
            "id"=> 167,
            "langId"=> "ARA",
            "cityName"=> "شيبة",
            "sequence"=> 93,
            "cityCode"=> "SHY"
        ],
        [
            "id"=> 168,
            "langId"=> "ENU",
            "cityName"=> "SHAYBAH",
            "sequence"=> 93,
            "cityCode"=> "SHY"
        ],
        [
            "id"=> 169,
            "langId"=> "ARA",
            "cityName"=> "السلي",
            "sequence"=> 32,
            "cityCode"=> "SUL"
        ],
        [
            "id"=> 170,
            "langId"=> "ENU",
            "cityName"=> "AS SULAYYIL",
            "sequence"=> 32,
            "cityCode"=> "SUL"
        ],
        [
            "id"=> 171,
            "langId"=> "ARA",
            "cityName"=> "تبوك",
            "sequence"=> 94,
            "cityCode"=> "TAB"
        ],
        [
            "id"=> 172,
            "langId"=> "ENU",
            "cityName"=> "TABUK",
            "sequence"=> 94,
            "cityCode"=> "TAB"
        ],
        [
            "id"=> 173,
            "langId"=> "ARA",
            "cityName"=> "الطائف",
            "sequence"=> 95,
            "cityCode"=> "TAI"
        ],
        [
            "id"=> 174,
            "langId"=> "ENU",
            "cityName"=> "TAIF",
            "sequence"=> 95,
            "cityCode"=> "TAI"
        ],
        [
            "id"=> 175,
            "langId"=> "ARA",
            "cityName"=> "تنومة",
            "sequence"=> 96,
            "cityCode"=> "TAN"
        ],
        [
            "id"=> 176,
            "langId"=> "ENU",
            "cityName"=> "TANOMAH",
            "sequence"=> 96,
            "cityCode"=> "TAN"
        ],
        [
            "id"=> 177,
            "langId"=> "ARA",
            "cityName"=> "تاروت",
            "sequence"=> 97,
            "cityCode"=> "TAR"
        ],
        [
            "id"=> 178,
            "langId"=> "ENU",
            "cityName"=> "TAROUT",
            "sequence"=> 97,
            "cityCode"=> "TAR"
        ],
        [
            "id"=> 179,
            "langId"=> "ARA",
            "cityName"=> "تيمة",
            "sequence"=> 98,
            "cityCode"=> "TAY"
        ],
        [
            "id"=> 180,
            "langId"=> "ENU",
            "cityName"=> "TAYMA",
            "sequence"=> 98,
            "cityCode"=> "TAY"
        ],
        [
            "id"=> 181,
            "langId"=> "ARA",
            "cityName"=> "ثادق",
            "sequence"=> 99,
            "cityCode"=> "THA"
        ],
        [
            "id"=> 182,
            "langId"=> "ENU",
            "cityName"=> "THADIQ",
            "sequence"=> 99,
            "cityCode"=> "THA"
        ],
        [
            "id"=> 183,
            "langId"=> "ARA",
            "cityName"=> "الثقبة",
            "sequence"=> 26,
            "cityCode"=> "THU"
        ],
        [
            "id"=> 184,
            "langId"=> "ENU",
            "cityName"=> "AL THUQBAH",
            "sequence"=> 26,
            "cityCode"=> "THU"
        ],
        [
            "id"=> 185,
            "langId"=> "ARA",
            "cityName"=> "طريف",
            "sequence"=> 100,
            "cityCode"=> "TUR"
        ],
        [
            "id"=> 186,
            "langId"=> "ENU",
            "cityName"=> "TURAIF",
            "sequence"=> 100,
            "cityCode"=> "TUR"
        ],
        [
            "id"=> 187,
            "langId"=> "ARA",
            "cityName"=> "عضيلية",
            "sequence"=> 102,
            "cityCode"=> "UDA"
        ],
        [
            "id"=> 188,
            "langId"=> "ENU",
            "cityName"=> "UDALIYAH",
            "sequence"=> 102,
            "cityCode"=> "UDA"
        ],
        [
            "id"=> 189,
            "langId"=> "ARA",
            "cityName"=> "علا",
            "sequence"=> 27,
            "cityCode"=> "ULA"
        ],
        [
            "id"=> 190,
            "langId"=> "ENU",
            "cityName"=> "AL ULA",
            "sequence"=> 27,
            "cityCode"=> "ULA"
        ],
        [
            "id"=> 191,
            "langId"=> "ARA",
            "cityName"=> "أم الساهك",
            "sequence"=> 103,
            "cityCode"=> "UMS"
        ],
        [
            "id"=> 192,
            "langId"=> "ENU",
            "cityName"=> "UM AL SAHEK",
            "sequence"=> 103,
            "cityCode"=> "UMS"
        ],
        [
            "id"=> 193,
            "langId"=> "ARA",
            "cityName"=> "عنيزة",
            "sequence"=> 104,
            "cityCode"=> "UNA"
        ],
        [
            "id"=> 194,
            "langId"=> "ENU",
            "cityName"=> "UNAIZAH",
            "sequence"=> 104,
            "cityCode"=> "UNA"
        ],
        [
            "id"=> 195,
            "langId"=> "ARA",
            "cityName"=> "العقير",
            "sequence"=> 110,
            "cityCode"=> "UQA"
        ],
        [
            "id"=> 196,
            "langId"=> "ENU",
            "cityName"=> "UQAIR",
            "sequence"=> 110,
            "cityCode"=> "UQA"
        ],
        [
            "id"=> 197,
            "langId"=> "ARA",
            "cityName"=> "وادي الدواسر",
            "sequence"=> 111,
            "cityCode"=> "WAD"
        ],
        [
            "id"=> 198,
            "langId"=> "ENU",
            "cityName"=> "WADI AL DAWASIR",
            "sequence"=> 111,
            "cityCode"=> "WAD"
        ],
        [
            "id"=> 199,
            "langId"=> "ARA",
            "cityName"=> "الوجه",
            "sequence"=> 28,
            "cityCode"=> "WAJ"
        ],
        [
            "id"=> 200,
            "langId"=> "ENU",
            "cityName"=> "AL WAJH",
            "sequence"=> 28,
            "cityCode"=> "WAJ"
        ],
        [
            "id"=> 201,
            "langId"=> "ARA",
            "cityName"=> "ينبع",
            "sequence"=> 112,
            "cityCode"=> "YAN"
        ],
        [
            "id"=> 202,
            "langId"=> "ENU",
            "cityName"=> "YANBU",
            "sequence"=> 112,
            "cityCode"=> "YAN"
        ],
        [
            "id"=> 203,
            "langId"=> "ARA",
            "cityName"=> "الزيمة",
            "sequence"=> 34,
            "cityCode"=> "ZAI"
        ],
        [
            "id"=> 204,
            "langId"=> "ENU",
            "cityName"=> "AZ ZAIMAH",
            "sequence"=> 34,
            "cityCode"=> "ZAI"
        ],
        [
            "id"=> 205,
            "langId"=> "ARA",
            "cityName"=> "الزلفي",
            "sequence"=> 113,
            "cityCode"=> "ZUL"
        ],
        [
            "id"=> 206,
            "langId"=> "ENU",
            "cityName"=> "ZULFI",
            "sequence"=> 113,
            "cityCode"=> "ZUL"
        ]
    ];

    foreach ($cities as $city) {
        \App\Models\City::updateOrCreate([
            'name' => $city['cityName'],
            'code' => $city['cityCode'],
        ]);
    }
    

}
}

