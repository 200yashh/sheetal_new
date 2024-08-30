<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = array(
            array(
                "countryCode" => "AD",
                "name" => "Andorra",
            ),
            array(
                "countryCode" => "AE",
                "name" => "United Arab Emirates",
            ),
            array(
                "countryCode" => "AF",
                "name" => "Afghanistan",
            ),
            array(
                "countryCode" => "AG",
                "name" => "Antigua and Barbuda",
            ),
            array(
                "countryCode" => "AI",
                "name" => "Anguilla",
            ),
            array(
                "countryCode" => "AL",
                "name" => "Albania",
            ),
            array(
                "countryCode" => "AM",
                "name" => "Armenia",
            ),
            array(
                "countryCode" => "AO",
                "name" => "Angola",
            ),
            array(
                "countryCode" => "AQ",
                "name" => "Antarctica",
            ),
            array(
                "countryCode" => "AR",
                "name" => "Argentina",
            ),
            array(
                "countryCode" => "AS",
                "name" => "American Samoa",
            ),
            array(
                "countryCode" => "AT",
                "name" => "Austria",
            ),
            array(
                "countryCode" => "AU",
                "name" => "Australia",
            ),
            array(
                "countryCode" => "AW",
                "name" => "Aruba",
            ),
            array(
                "countryCode" => "AX",
                "name" => "Åland",
            ),
            array(
                "countryCode" => "AZ",
                "name" => "Azerbaijan",
            ),
            array(
                "countryCode" => "BA",
                "name" => "Bosnia and Herzegovina",
            ),
            array(
                "countryCode" => "BB",
                "name" => "Barbados",
            ),
            array(
                "countryCode" => "BD",
                "name" => "Bangladesh",
            ),
            array(
                "countryCode" => "BE",
                "name" => "Belgium",
            ),
            array(
                "countryCode" => "BF",
                "name" => "Burkina Faso",
            ),
            array(
                "countryCode" => "BG",
                "name" => "Bulgaria",
            ),
            array(
                "countryCode" => "BH",
                "name" => "Bahrain",
            ),
            array(
                "countryCode" => "BI",
                "name" => "Burundi",
            ),
            array(
                "countryCode" => "BJ",
                "name" => "Benin",
            ),
            array(
                "countryCode" => "BL",
                "name" => "Saint Barthélemy",
            ),
            array(
                "countryCode" => "BM",
                "name" => "Bermuda",
            ),
            array(
                "countryCode" => "BN",
                "name" => "Brunei",
            ),
            array(
                "countryCode" => "BO",
                "name" => "Bolivia",
            ),
            array(
                "countryCode" => "BQ",
                "name" => "Bonaire",
            ),
            array(
                "countryCode" => "BR",
                "name" => "Brazil",
            ),
            array(
                "countryCode" => "BS",
                "name" => "Bahamas",
            ),
            array(
                "countryCode" => "BT",
                "name" => "Bhutan",
            ),
            array(
                "countryCode" => "BV",
                "name" => "Bouvet Island",
            ),
            array(
                "countryCode" => "BW",
                "name" => "Botswana",
            ),
            array(
                "countryCode" => "BY",
                "name" => "Belarus",
            ),
            array(
                "countryCode" => "BZ",
                "name" => "Belize",
            ),
            array(
                "countryCode" => "CA",
                "name" => "Canada",
            ),
            array(
                "countryCode" => "CC",
                "name" => "Cocos [Keeling] Islands",
            ),
            array(
                "countryCode" => "CD",
                "name" => "Democratic Republic of the Congo",
            ),
            array(
                "countryCode" => "CF",
                "name" => "Central African Republic",
            ),
            array(
                "countryCode" => "CG",
                "name" => "Republic of the Congo",
            ),
            array(
                "countryCode" => "CH",
                "name" => "Switzerland",
            ),
            array(
                "countryCode" => "CI",
                "name" => "Ivory Coast",
            ),
            array(
                "countryCode" => "CK",
                "name" => "Cook Islands",
            ),
            array(
                "countryCode" => "CL",
                "name" => "Chile",
            ),
            array(
                "countryCode" => "CM",
                "name" => "Cameroon",
            ),
            array(
                "countryCode" => "CN",
                "name" => "China",
            ),
            array(
                "countryCode" => "CO",
                "name" => "Colombia",
            ),
            array(
                "countryCode" => "CR",
                "name" => "Costa Rica",
            ),
            array(
                "countryCode" => "CU",
                "name" => "Cuba",
            ),
            array(
                "countryCode" => "CV",
                "name" => "Cape Verde",
            ),
            array(
                "countryCode" => "CW",
                "name" => "Curacao",
            ),
            array(
                "countryCode" => "CX",
                "name" => "Christmas Island",
            ),
            array(
                "countryCode" => "CY",
                "name" => "Cyprus",
            ),
            array(
                "countryCode" => "CZ",
                "name" => "Czech Republic",
            ),
            array(
                "countryCode" => "DE",
                "name" => "Germany",
            ),
            array(
                "countryCode" => "DJ",
                "name" => "Djibouti",
            ),
            array(
                "countryCode" => "DK",
                "name" => "Denmark",
            ),
            array(
                "countryCode" => "DM",
                "name" => "Dominica",
            ),
            array(
                "countryCode" => "DO",
                "name" => "Dominican Republic",
            ),
            array(
                "countryCode" => "DZ",
                "name" => "Algeria",
            ),
            array(
                "countryCode" => "EC",
                "name" => "Ecuador",
            ),
            array(
                "countryCode" => "EE",
                "name" => "Estonia",
            ),
            array(
                "countryCode" => "EG",
                "name" => "Egypt",
            ),
            array(
                "countryCode" => "EH",
                "name" => "Western Sahara",
            ),
            array(
                "countryCode" => "ER",
                "name" => "Eritrea",
            ),
            array(
                "countryCode" => "ES",
                "name" => "Spain",
            ),
            array(
                "countryCode" => "ET",
                "name" => "Ethiopia",
            ),
            array(
                "countryCode" => "FI",
                "name" => "Finland",
            ),
            array(
                "countryCode" => "FJ",
                "name" => "Fiji",
            ),
            array(
                "countryCode" => "FK",
                "name" => "Falkland Islands",
            ),
            array(
                "countryCode" => "FM",
                "name" => "Micronesia",
            ),
            array(
                "countryCode" => "FO",
                "name" => "Faroe Islands",
            ),
            array(
                "countryCode" => "FR",
                "name" => "France",
            ),
            array(
                "countryCode" => "GA",
                "name" => "Gabon",
            ),
            array(
                "countryCode" => "GB",
                "name" => "United Kingdom",
            ),
            array(
                "countryCode" => "GD",
                "name" => "Grenada",
            ),
            array(
                "countryCode" => "GE",
                "name" => "Georgia",
            ),
            array(
                "countryCode" => "GF",
                "name" => "French Guiana",
            ),
            array(
                "countryCode" => "GG",
                "name" => "Guernsey",
            ),
            array(
                "countryCode" => "GH",
                "name" => "Ghana",
            ),
            array(
                "countryCode" => "GI",
                "name" => "Gibraltar",
            ),
            array(
                "countryCode" => "GL",
                "name" => "Greenland",
            ),
            array(
                "countryCode" => "GM",
                "name" => "Gambia",
            ),
            array(
                "countryCode" => "GN",
                "name" => "Guinea",
            ),
            array(
                "countryCode" => "GP",
                "name" => "Guadeloupe",
            ),
            array(
                "countryCode" => "GQ",
                "name" => "Equatorial Guinea",
            ),
            array(
                "countryCode" => "GR",
                "name" => "Greece",
            ),
            array(
                "countryCode" => "GS",
                "name" => "South Georgia and the South Sandwich Islands",
            ),
            array(
                "countryCode" => "GT",
                "name" => "Guatemala",
            ),
            array(
                "countryCode" => "GU",
                "name" => "Guam",
            ),
            array(
                "countryCode" => "GW",
                "name" => "Guinea-Bissau",
            ),
            array(
                "countryCode" => "GY",
                "name" => "Guyana",
            ),
            array(
                "countryCode" => "HK",
                "name" => "Hong Kong",
            ),
            array(
                "countryCode" => "HM",
                "name" => "Heard Island and McDonald Islands",
            ),
            array(
                "countryCode" => "HN",
                "name" => "Honduras",
            ),
            array(
                "countryCode" => "HR",
                "name" => "Croatia",
            ),
            array(
                "countryCode" => "HT",
                "name" => "Haiti",
            ),
            array(
                "countryCode" => "HU",
                "name" => "Hungary",
            ),
            array(
                "countryCode" => "ID",
                "name" => "Indonesia",
            ),
            array(
                "countryCode" => "IE",
                "name" => "Ireland",
            ),
            array(
                "countryCode" => "IL",
                "name" => "Israel",
            ),
            array(
                "countryCode" => "IM",
                "name" => "Isle of Man",
            ),
            array(
                "countryCode" => "IN",
                "name" => "India",
            ),
            array(
                "countryCode" => "IO",
                "name" => "British Indian Ocean Territory",
            ),
            array(
                "countryCode" => "IQ",
                "name" => "Iraq",
            ),
            array(
                "countryCode" => "IR",
                "name" => "Iran",
            ),
            array(
                "countryCode" => "IS",
                "name" => "Iceland",
            ),
            array(
                "countryCode" => "IT",
                "name" => "Italy",
            ),
            array(
                "countryCode" => "JE",
                "name" => "Jersey",
            ),
            array(
                "countryCode" => "JM",
                "name" => "Jamaica",
            ),
            array(
                "countryCode" => "JO",
                "name" => "Jordan",
            ),
            array(
                "countryCode" => "JP",
                "name" => "Japan",
            ),
            array(
                "countryCode" => "KE",
                "name" => "Kenya",
            ),
            array(
                "countryCode" => "KG",
                "name" => "Kyrgyzstan",
            ),
            array(
                "countryCode" => "KH",
                "name" => "Cambodia",
            ),
            array(
                "countryCode" => "KI",
                "name" => "Kiribati",
            ),
            array(
                "countryCode" => "KM",
                "name" => "Comoros",
            ),
            array(
                "countryCode" => "KN",
                "name" => "Saint Kitts and Nevis",
            ),
            array(
                "countryCode" => "KP",
                "name" => "North Korea",
            ),
            array(
                "countryCode" => "KR",
                "name" => "South Korea",
            ),
            array(
                "countryCode" => "KW",
                "name" => "Kuwait",
            ),
            array(
                "countryCode" => "KY",
                "name" => "Cayman Islands",
            ),
            array(
                "countryCode" => "KZ",
                "name" => "Kazakhstan",
            ),
            array(
                "countryCode" => "LA",
                "name" => "Laos",
            ),
            array(
                "countryCode" => "LB",
                "name" => "Lebanon",
            ),
            array(
                "countryCode" => "LC",
                "name" => "Saint Lucia",
            ),
            array(
                "countryCode" => "LI",
                "name" => "Liechtenstein",
            ),
            array(
                "countryCode" => "LK",
                "name" => "Sri Lanka",
            ),
            array(
                "countryCode" => "LR",
                "name" => "Liberia",
            ),
            array(
                "countryCode" => "LS",
                "name" => "Lesotho",
            ),
            array(
                "countryCode" => "LT",
                "name" => "Lithuania",
            ),
            array(
                "countryCode" => "LU",
                "name" => "Luxembourg",
            ),
            array(
                "countryCode" => "LV",
                "name" => "Latvia",
            ),
            array(
                "countryCode" => "LY",
                "name" => "Libya",
            ),
            array(
                "countryCode" => "MA",
                "name" => "Morocco",
            ),
            array(
                "countryCode" => "MC",
                "name" => "Monaco",
            ),
            array(
                "countryCode" => "MD",
                "name" => "Moldova",
            ),
            array(
                "countryCode" => "ME",
                "name" => "Montenegro",
            ),
            array(
                "countryCode" => "MF",
                "name" => "Saint Martin",
            ),
            array(
                "countryCode" => "MG",
                "name" => "Madagascar",
            ),
            array(
                "countryCode" => "MH",
                "name" => "Marshall Islands",
            ),
            array(
                "countryCode" => "MK",
                "name" => "Macedonia",
            ),
            array(
                "countryCode" => "ML",
                "name" => "Mali",
            ),
            array(
                "countryCode" => "MM",
                "name" => "Myanmar [Burma]",
            ),
            array(
                "countryCode" => "MN",
                "name" => "Mongolia",
            ),
            array(
                "countryCode" => "MO",
                "name" => "Macao",
            ),
            array(
                "countryCode" => "MP",
                "name" => "Northern Mariana Islands",
            ),
            array(
                "countryCode" => "MQ",
                "name" => "Martinique",
            ),
            array(
                "countryCode" => "MR",
                "name" => "Mauritania",
            ),
            array(
                "countryCode" => "MS",
                "name" => "Montserrat",
            ),
            array(
                "countryCode" => "MT",
                "name" => "Malta",
            ),
            array(
                "countryCode" => "MU",
                "name" => "Mauritius",
            ),
            array(
                "countryCode" => "MV",
                "name" => "Maldives",
            ),
            array(
                "countryCode" => "MW",
                "name" => "Malawi",
            ),
            array(
                "countryCode" => "MX",
                "name" => "Mexico",
            ),
            array(
                "countryCode" => "MY",
                "name" => "Malaysia",
            ),
            array(
                "countryCode" => "MZ",
                "name" => "Mozambique",
            ),
            array(
                "countryCode" => "NA",
                "name" => "Namibia",
            ),
            array(
                "countryCode" => "NC",
                "name" => "New Caledonia",
            ),
            array(
                "countryCode" => "NE",
                "name" => "Niger",
            ),
            array(
                "countryCode" => "NF",
                "name" => "Norfolk Island",
            ),
            array(
                "countryCode" => "NG",
                "name" => "Nigeria",
            ),
            array(
                "countryCode" => "NI",
                "name" => "Nicaragua",
            ),
            array(
                "countryCode" => "NL",
                "name" => "Netherlands",
            ),
            array(
                "countryCode" => "NO",
                "name" => "Norway",
            ),
            array(
                "countryCode" => "NP",
                "name" => "Nepal",
            ),
            array(
                "countryCode" => "NR",
                "name" => "Nauru",
            ),
            array(
                "countryCode" => "NU",
                "name" => "Niue",
            ),
            array(
                "countryCode" => "NZ",
                "name" => "New Zealand",
            ),
            array(
                "countryCode" => "OM",
                "name" => "Oman",
            ),
            array(
                "countryCode" => "PA",
                "name" => "Panama",
            ),
            array(
                "countryCode" => "PE",
                "name" => "Peru",
            ),
            array(
                "countryCode" => "PF",
                "name" => "French Polynesia",
            ),
            array(
                "countryCode" => "PG",
                "name" => "Papua New Guinea",
            ),
            array(
                "countryCode" => "PH",
                "name" => "Philippines",
            ),
            array(
                "countryCode" => "PK",
                "name" => "Pakistan",
            ),
            array(
                "countryCode" => "PL",
                "name" => "Poland",
            ),
            array(
                "countryCode" => "PM",
                "name" => "Saint Pierre and Miquelon",
            ),
            array(
                "countryCode" => "PN",
                "name" => "Pitcairn Islands",
            ),
            array(
                "countryCode" => "PR",
                "name" => "Puerto Rico",
            ),
            array(
                "countryCode" => "PS",
                "name" => "Palestine",
            ),
            array(
                "countryCode" => "PT",
                "name" => "Portugal",
            ),
            array(
                "countryCode" => "PW",
                "name" => "Palau",
            ),
            array(
                "countryCode" => "PY",
                "name" => "Paraguay",
            ),
            array(
                "countryCode" => "QA",
                "name" => "Qatar",
            ),
            array(
                "countryCode" => "RE",
                "name" => "Réunion",
            ),
            array(
                "countryCode" => "RO",
                "name" => "Romania",
            ),
            array(
                "countryCode" => "RS",
                "name" => "Serbia",
            ),
            array(
                "countryCode" => "RU",
                "name" => "Russia",
            ),
            array(
                "countryCode" => "RW",
                "name" => "Rwanda",
            ),
            array(
                "countryCode" => "SA",
                "name" => "Saudi Arabia",
            ),
            array(
                "countryCode" => "SB",
                "name" => "Solomon Islands",
            ),
            array(
                "countryCode" => "SC",
                "name" => "Seychelles",
            ),
            array(
                "countryCode" => "SD",
                "name" => "Sudan",
            ),
            array(
                "countryCode" => "SE",
                "name" => "Sweden",
            ),
            array(
                "countryCode" => "SG",
                "name" => "Singapore",
            ),
            array(
                "countryCode" => "SH",
                "name" => "Saint Helena",
            ),
            array(
                "countryCode" => "SI",
                "name" => "Slovenia",
            ),
            array(
                "countryCode" => "SJ",
                "name" => "Svalbard and Jan Mayen",
            ),
            array(
                "countryCode" => "SK",
                "name" => "Slovakia",
            ),
            array(
                "countryCode" => "SL",
                "name" => "Sierra Leone",
            ),
            array(
                "countryCode" => "SM",
                "name" => "San Marino",
            ),
            array(
                "countryCode" => "SN",
                "name" => "Senegal",
            ),
            array(
                "countryCode" => "SO",
                "name" => "Somalia",
            ),
            array(
                "countryCode" => "SR",
                "name" => "Suriname",
            ),
            array(
                "countryCode" => "SS",
                "name" => "South Sudan",
            ),
            array(
                "countryCode" => "ST",
                "name" => "São Tomé and Príncipe",
            ),
            array(
                "countryCode" => "SV",
                "name" => "El Salvador",
            ),
            array(
                "countryCode" => "SX",
                "name" => "Sint Maarten",
            ),
            array(
                "countryCode" => "SY",
                "name" => "Syria",
            ),
            array(
                "countryCode" => "SZ",
                "name" => "Swaziland",
            ),
            array(
                "countryCode" => "TC",
                "name" => "Turks and Caicos Islands",
            ),
            array(
                "countryCode" => "TD",
                "name" => "Chad",
            ),
            array(
                "countryCode" => "TF",
                "name" => "French Southern Territories",
            ),
            array(
                "countryCode" => "TG",
                "name" => "Togo",
            ),
            array(
                "countryCode" => "TH",
                "name" => "Thailand",
            ),
            array(
                "countryCode" => "TJ",
                "name" => "Tajikistan",
            ),
            array(
                "countryCode" => "TK",
                "name" => "Tokelau",
            ),
            array(
                "countryCode" => "TL",
                "name" => "East Timor",
            ),
            array(
                "countryCode" => "TM",
                "name" => "Turkmenistan",
            ),
            array(
                "countryCode" => "TN",
                "name" => "Tunisia",
            ),
            array(
                "countryCode" => "TO",
                "name" => "Tonga",
            ),
            array(
                "countryCode" => "TR",
                "name" => "Turkey",
            ),
            array(
                "countryCode" => "TT",
                "name" => "Trinidad and Tobago",
            ),
            array(
                "countryCode" => "TV",
                "name" => "Tuvalu",
            ),
            array(
                "countryCode" => "TW",
                "name" => "Taiwan",
            ),
            array(
                "countryCode" => "TZ",
                "name" => "Tanzania",
            ),
            array(
                "countryCode" => "UA",
                "name" => "Ukraine",
            ),
            array(
                "countryCode" => "UG",
                "name" => "Uganda",
            ),
            array(
                "countryCode" => "UM",
                "name" => "U.S. Minor Outlying Islands",
            ),
            array(
                "countryCode" => "US",
                "name" => "United States",
            ),
            array(
                "countryCode" => "UY",
                "name" => "Uruguay",
            ),
            array(
                "countryCode" => "UZ",
                "name" => "Uzbekistan",
            ),
            array(
                "countryCode" => "VA",
                "name" => "Vatican City",
            ),
            array(
                "countryCode" => "VC",
                "name" => "Saint Vincent and the Grenadines",
            ),
            array(
                "countryCode" => "VE",
                "name" => "Venezuela",
            ),
            array(
                "countryCode" => "VG",
                "name" => "British Virgin Islands",
            ),
            array(
                "countryCode" => "VI",
                "name" => "U.S. Virgin Islands",
            ),
            array(
                "countryCode" => "VN",
                "name" => "Vietnam",
            ),
            array(
                "countryCode" => "VU",
                "name" => "Vanuatu",
            ),
            array(
                "countryCode" => "WF",
                "name" => "Wallis and Futuna",
            ),
            array(
                "countryCode" => "WS",
                "name" => "Samoa",
            ),
            array(
                "countryCode" => "XK",
                "name" => "Kosovo",
            ),
            array(
                "countryCode" => "YE",
                "name" => "Yemen",
            ),
            array(
                "countryCode" => "YT",
                "name" => "Mayotte",
            ),
            array(
                "countryCode" => "ZA",
                "name" => "South Africa",
            ),
            array(
                "countryCode" => "ZM",
                "name" => "Zambia",
            ),
            array(
                "countryCode" => "ZW",
                "name" => "Zimbabwe",
            ),
        );

        if (Country::count() <= 0) {
            Country::insert($countries);
        }
    }
}
