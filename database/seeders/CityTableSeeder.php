<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            array(
                "name" => "North and Middle Andaman",
                "state_id" => 32,
            ),
            array(
                "name" => "South Andaman",
                "state_id" => 32,
            ),
            array(
                "name" => "Nicobar",
                "state_id" => 32,
            ),
            array(
                "name" => "Adilabad",
                "state_id" => 1,
            ),
            array(
                "name" => "Anantapur",
                "state_id" => 1,
            ),
            array(
                "name" => "Chittoor",
                "state_id" => 1,
            ),
            array(
                "name" => "East Godavari",
                "state_id" => 1,
            ),
            array(
                "name" => "Guntur",
                "state_id" => 1,
            ),
            array(
                "name" => "Hyderabad",
                "state_id" => 1,
            ),
            array(
                "name" => "Kadapa",
                "state_id" => 1,
            ),
            array(
                "name" => "Karimnagar",
                "state_id" => 1,
            ),
            array(
                "name" => "Khammam",
                "state_id" => 1,
            ),
            array(
                "name" => "Krishna",
                "state_id" => 1,
            ),
            array(
                "name" => "Kurnool",
                "state_id" => 1,
            ),
            array(
                "name" => "Mahbubnagar",
                "state_id" => 1,
            ),
            array(
                "name" => "Medak",
                "state_id" => 1,
            ),
            array(
                "name" => "Nalgonda",
                "state_id" => 1,
            ),
            array(
                "name" => "Nellore",
                "state_id" => 1,
            ),
            array(
                "name" => "Nizamabad",
                "state_id" => 1,
            ),
            array(
                "name" => "Prakasam",
                "state_id" => 1,
            ),
            array(
                "name" => "Rangareddi",
                "state_id" => 1,
            ),
            array(
                "name" => "Srikakulam",
                "state_id" => 1,
            ),
            array(
                "name" => "Vishakhapatnam",
                "state_id" => 1,
            ),
            array(
                "name" => "Vizianagaram",
                "state_id" => 1,
            ),
            array(
                "name" => "Warangal",
                "state_id" => 1,
            ),
            array(
                "name" => "West Godavari",
                "state_id" => 1,
            ),
            array(
                "name" => "Anjaw",
                "state_id" => 3,
            ),
            array(
                "name" => "Changlang",
                "state_id" => 3,
            ),
            array(
                "name" => "East Kameng",
                "state_id" => 3,
            ),
            array(
                "name" => "Lohit",
                "state_id" => 3,
            ),
            array(
                "name" => "Lower Subansiri",
                "state_id" => 3,
            ),
            array(
                "name" => "Papum Pare",
                "state_id" => 3,
            ),
            array(
                "name" => "Tirap",
                "state_id" => 3,
            ),
            array(
                "name" => "Dibang Valley",
                "state_id" => 3,
            ),
            array(
                "name" => "Upper Subansiri",
                "state_id" => 3,
            ),
            array(
                "name" => "West Kameng",
                "state_id" => 3,
            ),
            array(
                "name" => "Barpeta",
                "state_id" => 2,
            ),
            array(
                "name" => "Bongaigaon",
                "state_id" => 2,
            ),
            array(
                "name" => "Cachar",
                "state_id" => 2,
            ),
            array(
                "name" => "Darrang",
                "state_id" => 2,
            ),
            array(
                "name" => "Dhemaji",
                "state_id" => 2,
            ),
            array(
                "name" => "Dhubri",
                "state_id" => 2,
            ),
            array(
                "name" => "Dibrugarh",
                "state_id" => 2,
            ),
            array(
                "name" => "Goalpara",
                "state_id" => 2,
            ),
            array(
                "name" => "Golaghat",
                "state_id" => 2,
            ),
            array(
                "name" => "Hailakandi",
                "state_id" => 2,
            ),
            array(
                "name" => "Jorhat",
                "state_id" => 2,
            ),
            array(
                "name" => "Karbi Anglong",
                "state_id" => 2,
            ),
            array(
                "name" => "Karimganj",
                "state_id" => 2,
            ),
            array(
                "name" => "Kokrajhar",
                "state_id" => 2,
            ),
            array(
                "name" => "Lakhimpur",
                "state_id" => 2,
            ),
            array(
                "name" => "Marigaon",
                "state_id" => 2,
            ),
            array(
                "name" => "Nagaon",
                "state_id" => 2,
            ),
            array(
                "name" => "Nalbari",
                "state_id" => 2,
            ),
            array(
                "name" => "North Cachar Hills",
                "state_id" => 2,
            ),
            array(
                "name" => "Sibsagar",
                "state_id" => 2,
            ),
            array(
                "name" => "Sonitpur",
                "state_id" => 2,
            ),
            array(
                "name" => "Tinsukia",
                "state_id" => 2,
            ),
            array(
                "name" => "Araria",
                "state_id" => 4,
            ),
            array(
                "name" => "Aurangabad",
                "state_id" => 4,
            ),
            array(
                "name" => "Banka",
                "state_id" => 4,
            ),
            array(
                "name" => "Begusarai",
                "state_id" => 4,
            ),
            array(
                "name" => "Bhagalpur",
                "state_id" => 4,
            ),
            array(
                "name" => "Bhojpur",
                "state_id" => 4,
            ),
            array(
                "name" => "Buxar",
                "state_id" => 4,
            ),
            array(
                "name" => "Darbhanga",
                "state_id" => 4,
            ),
            array(
                "name" => "Purba Champaran",
                "state_id" => 4,
            ),
            array(
                "name" => "Gaya",
                "state_id" => 4,
            ),
            array(
                "name" => "Gopalganj",
                "state_id" => 4,
            ),
            array(
                "name" => "Jamui",
                "state_id" => 4,
            ),
            array(
                "name" => "Jehanabad",
                "state_id" => 4,
            ),
            array(
                "name" => "Khagaria",
                "state_id" => 4,
            ),
            array(
                "name" => "Kishanganj",
                "state_id" => 4,
            ),
            array(
                "name" => "Kaimur",
                "state_id" => 4,
            ),
            array(
                "name" => "Katihar",
                "state_id" => 4,
            ),
            array(
                "name" => "Lakhisarai",
                "state_id" => 4,
            ),
            array(
                "name" => "Madhubani",
                "state_id" => 4,
            ),
            array(
                "name" => "Munger",
                "state_id" => 4,
            ),
            array(
                "name" => "Madhepura",
                "state_id" => 4,
            ),
            array(
                "name" => "Muzaffarpur",
                "state_id" => 4,
            ),
            array(
                "name" => "Nalanda",
                "state_id" => 4,
            ),
            array(
                "name" => "Nawada",
                "state_id" => 4,
            ),
            array(
                "name" => "Patna",
                "state_id" => 4,
            ),
            array(
                "name" => "Purnia",
                "state_id" => 4,
            ),
            array(
                "name" => "Rohtas",
                "state_id" => 4,
            ),
            array(
                "name" => "Saharsa",
                "state_id" => 4,
            ),
            array(
                "name" => "Samastipur",
                "state_id" => 4,
            ),
            array(
                "name" => "Sheohar",
                "state_id" => 4,
            ),
            array(
                "name" => "Sheikhpura",
                "state_id" => 4,
            ),
            array(
                "name" => "Saran",
                "state_id" => 4,
            ),
            array(
                "name" => "Sitamarhi",
                "state_id" => 4,
            ),
            array(
                "name" => "Supaul",
                "state_id" => 4,
            ),
            array(
                "name" => "Siwan",
                "state_id" => 4,
            ),
            array(
                "name" => "Vaishali",
                "state_id" => 4,
            ),
            array(
                "name" => "Pashchim Champaran",
                "state_id" => 4,
            ),
            array(
                "name" => "Bastar",
                "state_id" => 36,
            ),
            array(
                "name" => "Bilaspur",
                "state_id" => 36,
            ),
            array(
                "name" => "Dantewada",
                "state_id" => 36,
            ),
            array(
                "name" => "Dhamtari",
                "state_id" => 36,
            ),
            array(
                "name" => "Durg",
                "state_id" => 36,
            ),
            array(
                "name" => "Jashpur",
                "state_id" => 36,
            ),
            array(
                "name" => "Janjgir-Champa",
                "state_id" => 36,
            ),
            array(
                "name" => "Korba",
                "state_id" => 36,
            ),
            array(
                "name" => "Koriya",
                "state_id" => 36,
            ),
            array(
                "name" => "Kanker",
                "state_id" => 36,
            ),
            array(
                "name" => "Kawardha",
                "state_id" => 36,
            ),
            array(
                "name" => "Mahasamund",
                "state_id" => 36,
            ),
            array(
                "name" => "Raigarh",
                "state_id" => 36,
            ),
            array(
                "name" => "Rajnandgaon",
                "state_id" => 36,
            ),
            array(
                "name" => "Raipur",
                "state_id" => 36,
            ),
            array(
                "name" => "Surguja",
                "state_id" => 36,
            ),
            array(
                "name" => "Diu",
                "state_id" => 29,
            ),
            array(
                "name" => "Daman",
                "state_id" => 29,
            ),
            array(
                "name" => "Central Delhi",
                "state_id" => 25,
            ),
            array(
                "name" => "East Delhi",
                "state_id" => 25,
            ),
            array(
                "name" => "New Delhi",
                "state_id" => 25,
            ),
            array(
                "name" => "North Delhi",
                "state_id" => 25,
            ),
            array(
                "name" => "North East Delhi",
                "state_id" => 25,
            ),
            array(
                "name" => "North West Delhi",
                "state_id" => 25,
            ),
            array(
                "name" => "South Delhi",
                "state_id" => 25,
            ),
            array(
                "name" => "South West Delhi",
                "state_id" => 25,
            ),
            array(
                "name" => "West Delhi",
                "state_id" => 25,
            ),
            array(
                "name" => "North Goa",
                "state_id" => 26,
            ),
            array(
                "name" => "South Goa",
                "state_id" => 26,
            ),
            array(
                "name" => "Ahmedabad",
                "state_id" => 5,
            ),
            array(
                "name" => "Amreli District",
                "state_id" => 5,
            ),
            array(
                "name" => "Anand",
                "state_id" => 5,
            ),
            array(
                "name" => "Banaskantha",
                "state_id" => 5,
            ),
            array(
                "name" => "Bharuch",
                "state_id" => 5,
            ),
            array(
                "name" => "Bhavnagar",
                "state_id" => 5,
            ),
            array(
                "name" => "Dahod",
                "state_id" => 5,
            ),
            array(
                "name" => "The Dangs",
                "state_id" => 5,
            ),
            array(
                "name" => "Gandhinagar",
                "state_id" => 5,
            ),
            array(
                "name" => "Jamnagar",
                "state_id" => 5,
            ),
            array(
                "name" => "Junagadh",
                "state_id" => 5,
            ),
            array(
                "name" => "Kutch",
                "state_id" => 5,
            ),
            array(
                "name" => "Kheda",
                "state_id" => 5,
            ),
            array(
                "name" => "Mehsana",
                "state_id" => 5,
            ),
            array(
                "name" => "Narmada",
                "state_id" => 5,
            ),
            array(
                "name" => "Navsari",
                "state_id" => 5,
            ),
            array(
                "name" => "Patan",
                "state_id" => 5,
            ),
            array(
                "name" => "Panchmahal",
                "state_id" => 5,
            ),
            array(
                "name" => "Porbandar",
                "state_id" => 5,
            ),
            array(
                "name" => "Rajkot",
                "state_id" => 5,
            ),
            array(
                "name" => "Sabarkantha",
                "state_id" => 5,
            ),
            array(
                "name" => "Surendranagar",
                "state_id" => 5,
            ),
            array(
                "name" => "Surat",
                "state_id" => 5,
            ),
            array(
                "name" => "Vadodara",
                "state_id" => 5,
            ),
            array(
                "name" => "Valsad",
                "state_id" => 5,
            ),
            array(
                "name" => "Ambala",
                "state_id" => 6,
            ),
            array(
                "name" => "Bhiwani",
                "state_id" => 6,
            ),
            array(
                "name" => "Faridabad",
                "state_id" => 6,
            ),
            array(
                "name" => "Fatehabad",
                "state_id" => 6,
            ),
            array(
                "name" => "Gurgaon",
                "state_id" => 6,
            ),
            array(
                "name" => "Hissar",
                "state_id" => 6,
            ),
            array(
                "name" => "Jhajjar",
                "state_id" => 6,
            ),
            array(
                "name" => "Jind",
                "state_id" => 6,
            ),
            array(
                "name" => "Karnal",
                "state_id" => 6,
            ),
            array(
                "name" => "Kaithal",
                "state_id" => 6,
            ),
            array(
                "name" => "Kurukshetra",
                "state_id" => 6,
            ),
            array(
                "name" => "Mahendragarh",
                "state_id" => 6,
            ),
            array(
                "name" => "Mewat",
                "state_id" => 6,
            ),
            array(
                "name" => "Panchkula",
                "state_id" => 6,
            ),
            array(
                "name" => "Panipat",
                "state_id" => 6,
            ),
            array(
                "name" => "Rewari",
                "state_id" => 6,
            ),
            array(
                "name" => "Rohtak",
                "state_id" => 6,
            ),
            array(
                "name" => "Sirsa",
                "state_id" => 6,
            ),
            array(
                "name" => "Sonepat",
                "state_id" => 6,
            ),
            array(
                "name" => "Yamuna Nagar",
                "state_id" => 6,
            ),
            array(
                "name" => "Palwal",
                "state_id" => 6,
            ),
            array(
                "name" => "Bilaspur",
                "state_id" => 7,
            ),
            array(
                "name" => "Chamba",
                "state_id" => 7,
            ),
            array(
                "name" => "Hamirpur",
                "state_id" => 7,
            ),
            array(
                "name" => "Kangra",
                "state_id" => 7,
            ),
            array(
                "name" => "Kinnaur",
                "state_id" => 7,
            ),
            array(
                "name" => "Kulu",
                "state_id" => 7,
            ),
            array(
                "name" => "Lahaul and Spiti",
                "state_id" => 7,
            ),
            array(
                "name" => "Mandi",
                "state_id" => 7,
            ),
            array(
                "name" => "Shimla",
                "state_id" => 7,
            ),
            array(
                "name" => "Sirmaur",
                "state_id" => 7,
            ),
            array(
                "name" => "Solan",
                "state_id" => 7,
            ),
            array(
                "name" => "Una",
                "state_id" => 7,
            ),
            array(
                "name" => "Anantnag",
                "state_id" => 8,
            ),
            array(
                "name" => "Badgam",
                "state_id" => 8,
            ),
            array(
                "name" => "Bandipore",
                "state_id" => 8,
            ),
            array(
                "name" => "Baramula",
                "state_id" => 8,
            ),
            array(
                "name" => "Doda",
                "state_id" => 8,
            ),
            array(
                "name" => "Jammu",
                "state_id" => 8,
            ),
            array(
                "name" => "Kargil",
                "state_id" => 8,
            ),
            array(
                "name" => "Kathua",
                "state_id" => 8,
            ),
            array(
                "name" => "Kupwara",
                "state_id" => 8,
            ),
            array(
                "name" => "Leh",
                "state_id" => 8,
            ),
            array(
                "name" => "Poonch",
                "state_id" => 8,
            ),
            array(
                "name" => "Pulwama",
                "state_id" => 8,
            ),
            array(
                "name" => "Rajauri",
                "state_id" => 8,
            ),
            array(
                "name" => "Srinagar",
                "state_id" => 8,
            ),
            array(
                "name" => "Samba",
                "state_id" => 8,
            ),
            array(
                "name" => "Udhampur",
                "state_id" => 8,
            ),
            array(
                "name" => "Bokaro",
                "state_id" => 34,
            ),
            array(
                "name" => "Chatra",
                "state_id" => 34,
            ),
            array(
                "name" => "Deoghar",
                "state_id" => 34,
            ),
            array(
                "name" => "Dhanbad",
                "state_id" => 34,
            ),
            array(
                "name" => "Dumka",
                "state_id" => 34,
            ),
            array(
                "name" => "Purba Singhbhum",
                "state_id" => 34,
            ),
            array(
                "name" => "Garhwa",
                "state_id" => 34,
            ),
            array(
                "name" => "Giridih",
                "state_id" => 34,
            ),
            array(
                "name" => "Godda",
                "state_id" => 34,
            ),
            array(
                "name" => "Gumla",
                "state_id" => 34,
            ),
            array(
                "name" => "Hazaribagh",
                "state_id" => 34,
            ),
            array(
                "name" => "Koderma",
                "state_id" => 34,
            ),
            array(
                "name" => "Lohardaga",
                "state_id" => 34,
            ),
            array(
                "name" => "Pakur",
                "state_id" => 34,
            ),
            array(
                "name" => "Palamu",
                "state_id" => 34,
            ),
            array(
                "name" => "Ranchi",
                "state_id" => 34,
            ),
            array(
                "name" => "Sahibganj",
                "state_id" => 34,
            ),
            array(
                "name" => "Seraikela and Kharsawan",
                "state_id" => 34,
            ),
            array(
                "name" => "Pashchim Singhbhum",
                "state_id" => 34,
            ),
            array(
                "name" => "Ramgarh",
                "state_id" => 34,
            ),
            array(
                "name" => "Bidar",
                "state_id" => 9,
            ),
            array(
                "name" => "Belgaum",
                "state_id" => 9,
            ),
            array(
                "name" => "Bijapur",
                "state_id" => 9,
            ),
            array(
                "name" => "Bagalkot",
                "state_id" => 9,
            ),
            array(
                "name" => "Bellary",
                "state_id" => 9,
            ),
            array(
                "name" => "Bangalore Rural District",
                "state_id" => 9,
            ),
            array(
                "name" => "Bangalore Urban District",
                "state_id" => 9,
            ),
            array(
                "name" => "Chamarajnagar",
                "state_id" => 9,
            ),
            array(
                "name" => "Chikmagalur",
                "state_id" => 9,
            ),
            array(
                "name" => "Chitradurga",
                "state_id" => 9,
            ),
            array(
                "name" => "Davanagere",
                "state_id" => 9,
            ),
            array(
                "name" => "Dharwad",
                "state_id" => 9,
            ),
            array(
                "name" => "Dakshina Kannada",
                "state_id" => 9,
            ),
            array(
                "name" => "Gadag",
                "state_id" => 9,
            ),
            array(
                "name" => "Gulbarga",
                "state_id" => 9,
            ),
            array(
                "name" => "Hassan",
                "state_id" => 9,
            ),
            array(
                "name" => "Haveri District",
                "state_id" => 9,
            ),
            array(
                "name" => "Kodagu",
                "state_id" => 9,
            ),
            array(
                "name" => "Kolar",
                "state_id" => 9,
            ),
            array(
                "name" => "Koppal",
                "state_id" => 9,
            ),
            array(
                "name" => "Mandya",
                "state_id" => 9,
            ),
            array(
                "name" => "Mysore",
                "state_id" => 9,
            ),
            array(
                "name" => "Raichur",
                "state_id" => 9,
            ),
            array(
                "name" => "Shimoga",
                "state_id" => 9,
            ),
            array(
                "name" => "Tumkur",
                "state_id" => 9,
            ),
            array(
                "name" => "Udupi",
                "state_id" => 9,
            ),
            array(
                "name" => "Uttara Kannada",
                "state_id" => 9,
            ),
            array(
                "name" => "Ramanagara",
                "state_id" => 9,
            ),
            array(
                "name" => "Chikballapur",
                "state_id" => 9,
            ),
            array(
                "name" => "Yadagiri",
                "state_id" => 9,
            ),
            array(
                "name" => "Alappuzha",
                "state_id" => 10,
            ),
            array(
                "name" => "Ernakulam",
                "state_id" => 10,
            ),
            array(
                "name" => "Idukki",
                "state_id" => 10,
            ),
            array(
                "name" => "Kollam",
                "state_id" => 10,
            ),
            array(
                "name" => "Kannur",
                "state_id" => 10,
            ),
            array(
                "name" => "Kasaragod",
                "state_id" => 10,
            ),
            array(
                "name" => "Kottayam",
                "state_id" => 10,
            ),
            array(
                "name" => "Kozhikode",
                "state_id" => 10,
            ),
            array(
                "name" => "Malappuram",
                "state_id" => 10,
            ),
            array(
                "name" => "Palakkad",
                "state_id" => 10,
            ),
            array(
                "name" => "Pathanamthitta",
                "state_id" => 10,
            ),
            array(
                "name" => "Thrissur",
                "state_id" => 10,
            ),
            array(
                "name" => "Thiruvananthapuram",
                "state_id" => 10,
            ),
            array(
                "name" => "Wayanad",
                "state_id" => 10,
            ),
            array(
                "name" => "Alirajpur",
                "state_id" => 11,
            ),
            array(
                "name" => "Anuppur",
                "state_id" => 11,
            ),
            array(
                "name" => "Ashok Nagar",
                "state_id" => 11,
            ),
            array(
                "name" => "Balaghat",
                "state_id" => 11,
            ),
            array(
                "name" => "Barwani",
                "state_id" => 11,
            ),
            array(
                "name" => "Betul",
                "state_id" => 11,
            ),
            array(
                "name" => "Bhind",
                "state_id" => 11,
            ),
            array(
                "name" => "Bhopal",
                "state_id" => 11,
            ),
            array(
                "name" => "Burhanpur",
                "state_id" => 11,
            ),
            array(
                "name" => "Chhatarpur",
                "state_id" => 11,
            ),
            array(
                "name" => "Chhindwara",
                "state_id" => 11,
            ),
            array(
                "name" => "Damoh",
                "state_id" => 11,
            ),
            array(
                "name" => "Datia",
                "state_id" => 11,
            ),
            array(
                "name" => "Dewas",
                "state_id" => 11,
            ),
            array(
                "name" => "Dhar",
                "state_id" => 11,
            ),
            array(
                "name" => "Dindori",
                "state_id" => 11,
            ),
            array(
                "name" => "Guna",
                "state_id" => 11,
            ),
            array(
                "name" => "Gwalior",
                "state_id" => 11,
            ),
            array(
                "name" => "Harda",
                "state_id" => 11,
            ),
            array(
                "name" => "Hoshangabad",
                "state_id" => 11,
            ),
            array(
                "name" => "Indore",
                "state_id" => 11,
            ),
            array(
                "name" => "Jabalpur",
                "state_id" => 11,
            ),
            array(
                "name" => "Jhabua",
                "state_id" => 11,
            ),
            array(
                "name" => "Katni",
                "state_id" => 11,
            ),
            array(
                "name" => "Khandwa",
                "state_id" => 11,
            ),
            array(
                "name" => "Khargone",
                "state_id" => 11,
            ),
            array(
                "name" => "Mandla",
                "state_id" => 11,
            ),
            array(
                "name" => "Mandsaur",
                "state_id" => 11,
            ),
            array(
                "name" => "Morena",
                "state_id" => 11,
            ),
            array(
                "name" => "Narsinghpur",
                "state_id" => 11,
            ),
            array(
                "name" => "Neemuch",
                "state_id" => 11,
            ),
            array(
                "name" => "Panna",
                "state_id" => 11,
            ),
            array(
                "name" => "Rewa",
                "state_id" => 11,
            ),
            array(
                "name" => "Rajgarh",
                "state_id" => 11,
            ),
            array(
                "name" => "Ratlam",
                "state_id" => 11,
            ),
            array(
                "name" => "Raisen",
                "state_id" => 11,
            ),
            array(
                "name" => "Sagar",
                "state_id" => 11,
            ),
            array(
                "name" => "Satna",
                "state_id" => 11,
            ),
            array(
                "name" => "Sehore",
                "state_id" => 11,
            ),
            array(
                "name" => "Seoni",
                "state_id" => 11,
            ),
            array(
                "name" => "Shahdol",
                "state_id" => 11,
            ),
            array(
                "name" => "Shajapur",
                "state_id" => 11,
            ),
            array(
                "name" => "Sheopur",
                "state_id" => 11,
            ),
            array(
                "name" => "Shivpuri",
                "state_id" => 11,
            ),
            array(
                "name" => "Sidhi",
                "state_id" => 11,
            ),
            array(
                "name" => "Singrauli",
                "state_id" => 11,
            ),
            array(
                "name" => "Tikamgarh",
                "state_id" => 11,
            ),
            array(
                "name" => "Ujjain",
                "state_id" => 11,
            ),
            array(
                "name" => "Umaria",
                "state_id" => 11,
            ),
            array(
                "name" => "Vidisha",
                "state_id" => 11,
            ),
            array(
                "name" => "Ahmednagar",
                "state_id" => 12,
            ),
            array(
                "name" => "Akola",
                "state_id" => 12,
            ),
            array(
                "name" => "Amrawati",
                "state_id" => 12,
            ),
            array(
                "name" => "Aurangabad",
                "state_id" => 12,
            ),
            array(
                "name" => "Bhandara",
                "state_id" => 12,
            ),
            array(
                "name" => "Beed",
                "state_id" => 12,
            ),
            array(
                "name" => "Buldhana",
                "state_id" => 12,
            ),
            array(
                "name" => "Chandrapur",
                "state_id" => 12,
            ),
            array(
                "name" => "Dhule",
                "state_id" => 12,
            ),
            array(
                "name" => "Gadchiroli",
                "state_id" => 12,
            ),
            array(
                "name" => "Gondiya",
                "state_id" => 12,
            ),
            array(
                "name" => "Hingoli",
                "state_id" => 12,
            ),
            array(
                "name" => "Jalgaon",
                "state_id" => 12,
            ),
            array(
                "name" => "Jalna",
                "state_id" => 12,
            ),
            array(
                "name" => "Kolhapur",
                "state_id" => 12,
            ),
            array(
                "name" => "Latur",
                "state_id" => 12,
            ),
            array(
                "name" => "Mumbai name",
                "state_id" => 12,
            ),
            array(
                "name" => "Mumbai suburban",
                "state_id" => 12,
            ),
            array(
                "name" => "Nandurbar",
                "state_id" => 12,
            ),
            array(
                "name" => "Nanded",
                "state_id" => 12,
            ),
            array(
                "name" => "Nagpur",
                "state_id" => 12,
            ),
            array(
                "name" => "Nashik",
                "state_id" => 12,
            ),
            array(
                "name" => "Osmanabad",
                "state_id" => 12,
            ),
            array(
                "name" => "Parbhani",
                "state_id" => 12,
            ),
            array(
                "name" => "Pune",
                "state_id" => 12,
            ),
            array(
                "name" => "Raigad",
                "state_id" => 12,
            ),
            array(
                "name" => "Ratnagiri",
                "state_id" => 12,
            ),
            array(
                "name" => "Sindhudurg",
                "state_id" => 12,
            ),
            array(
                "name" => "Sangli",
                "state_id" => 12,
            ),
            array(
                "name" => "Solapur",
                "state_id" => 12,
            ),
            array(
                "name" => "Satara",
                "state_id" => 12,
            ),
            array(
                "name" => "Thane",
                "state_id" => 12,
            ),
            array(
                "name" => "Wardha",
                "state_id" => 12,
            ),
            array(
                "name" => "Washim",
                "state_id" => 12,
            ),
            array(
                "name" => "Yavatmal",
                "state_id" => 12,
            ),
            array(
                "name" => "Bishnupur",
                "state_id" => 13,
            ),
            array(
                "name" => "Churachandpur",
                "state_id" => 13,
            ),
            array(
                "name" => "Chandel",
                "state_id" => 13,
            ),
            array(
                "name" => "Imphal East",
                "state_id" => 13,
            ),
            array(
                "name" => "Senapati",
                "state_id" => 13,
            ),
            array(
                "name" => "Tamenglong",
                "state_id" => 13,
            ),
            array(
                "name" => "Thoubal",
                "state_id" => 13,
            ),
            array(
                "name" => "Ukhrul",
                "state_id" => 13,
            ),
            array(
                "name" => "Imphal West",
                "state_id" => 13,
            ),
            array(
                "name" => "East Garo Hills",
                "state_id" => 14,
            ),
            array(
                "name" => "East Khasi Hills",
                "state_id" => 14,
            ),
            array(
                "name" => "Jaintia Hills",
                "state_id" => 14,
            ),
            array(
                "name" => "Ri-Bhoi",
                "state_id" => 14,
            ),
            array(
                "name" => "South Garo Hills",
                "state_id" => 14,
            ),
            array(
                "name" => "West Garo Hills",
                "state_id" => 14,
            ),
            array(
                "name" => "West Khasi Hills",
                "state_id" => 14,
            ),
            array(
                "name" => "Aizawl",
                "state_id" => 15,
            ),
            array(
                "name" => "Champhai",
                "state_id" => 15,
            ),
            array(
                "name" => "Kolasib",
                "state_id" => 15,
            ),
            array(
                "name" => "Lawngtlai",
                "state_id" => 15,
            ),
            array(
                "name" => "Lunglei",
                "state_id" => 15,
            ),
            array(
                "name" => "Mamit",
                "state_id" => 15,
            ),
            array(
                "name" => "Saiha",
                "state_id" => 15,
            ),
            array(
                "name" => "Serchhip",
                "state_id" => 15,
            ),
            array(
                "name" => "Dimapur",
                "state_id" => 16,
            ),
            array(
                "name" => "Kohima",
                "state_id" => 16,
            ),
            array(
                "name" => "Mokokchung",
                "state_id" => 16,
            ),
            array(
                "name" => "Mon",
                "state_id" => 16,
            ),
            array(
                "name" => "Phek",
                "state_id" => 16,
            ),
            array(
                "name" => "Tuensang",
                "state_id" => 16,
            ),
            array(
                "name" => "Wokha",
                "state_id" => 16,
            ),
            array(
                "name" => "Zunheboto",
                "state_id" => 16,
            ),
            array(
                "name" => "Angul",
                "state_id" => 17,
            ),
            array(
                "name" => "Boudh",
                "state_id" => 17,
            ),
            array(
                "name" => "Bhadrak",
                "state_id" => 17,
            ),
            array(
                "name" => "Bolangir",
                "state_id" => 17,
            ),
            array(
                "name" => "Bargarh",
                "state_id" => 17,
            ),
            array(
                "name" => "Baleswar",
                "state_id" => 17,
            ),
            array(
                "name" => "Cuttack",
                "state_id" => 17,
            ),
            array(
                "name" => "Debagarh",
                "state_id" => 17,
            ),
            array(
                "name" => "Dhenkanal",
                "state_id" => 17,
            ),
            array(
                "name" => "Ganjam",
                "state_id" => 17,
            ),
            array(
                "name" => "Gajapati",
                "state_id" => 17,
            ),
            array(
                "name" => "Jharsuguda",
                "state_id" => 17,
            ),
            array(
                "name" => "Jajapur",
                "state_id" => 17,
            ),
            array(
                "name" => "Jagatsinghpur",
                "state_id" => 17,
            ),
            array(
                "name" => "Khordha",
                "state_id" => 17,
            ),
            array(
                "name" => "Kendujhar",
                "state_id" => 17,
            ),
            array(
                "name" => "Kalahandi",
                "state_id" => 17,
            ),
            array(
                "name" => "Kandhamal",
                "state_id" => 17,
            ),
            array(
                "name" => "Koraput",
                "state_id" => 17,
            ),
            array(
                "name" => "Kendrapara",
                "state_id" => 17,
            ),
            array(
                "name" => "Malkangiri",
                "state_id" => 17,
            ),
            array(
                "name" => "Mayurbhanj",
                "state_id" => 17,
            ),
            array(
                "name" => "Nabarangpur",
                "state_id" => 17,
            ),
            array(
                "name" => "Nuapada",
                "state_id" => 17,
            ),
            array(
                "name" => "Nayagarh",
                "state_id" => 17,
            ),
            array(
                "name" => "Puri",
                "state_id" => 17,
            ),
            array(
                "name" => "Rayagada",
                "state_id" => 17,
            ),
            array(
                "name" => "Sambalpur",
                "state_id" => 17,
            ),
            array(
                "name" => "Subarnapur",
                "state_id" => 17,
            ),
            array(
                "name" => "Sundargarh",
                "state_id" => 17,
            ),
            array(
                "name" => "Karaikal",
                "state_id" => 27,
            ),
            array(
                "name" => "Mahe",
                "state_id" => 27,
            ),
            array(
                "name" => "Puducherry",
                "state_id" => 27,
            ),
            array(
                "name" => "Yanam",
                "state_id" => 27,
            ),
            array(
                "name" => "Amritsar",
                "state_id" => 18,
            ),
            array(
                "name" => "Bathinda",
                "state_id" => 18,
            ),
            array(
                "name" => "Firozpur",
                "state_id" => 18,
            ),
            array(
                "name" => "Faridkot",
                "state_id" => 18,
            ),
            array(
                "name" => "Fatehgarh Sahib",
                "state_id" => 18,
            ),
            array(
                "name" => "Gurdaspur",
                "state_id" => 18,
            ),
            array(
                "name" => "Hoshiarpur",
                "state_id" => 18,
            ),
            array(
                "name" => "Jalandhar",
                "state_id" => 18,
            ),
            array(
                "name" => "Kapurthala",
                "state_id" => 18,
            ),
            array(
                "name" => "Ludhiana",
                "state_id" => 18,
            ),
            array(
                "name" => "Mansa",
                "state_id" => 18,
            ),
            array(
                "name" => "Moga",
                "state_id" => 18,
            ),
            array(
                "name" => "Mukatsar",
                "state_id" => 18,
            ),
            array(
                "name" => "Nawan Shehar",
                "state_id" => 18,
            ),
            array(
                "name" => "Patiala",
                "state_id" => 18,
            ),
            array(
                "name" => "Rupnagar",
                "state_id" => 18,
            ),
            array(
                "name" => "Sangrur",
                "state_id" => 18,
            ),
            array(
                "name" => "Ajmer",
                "state_id" => 19,
            ),
            array(
                "name" => "Alwar",
                "state_id" => 19,
            ),
            array(
                "name" => "Bikaner",
                "state_id" => 19,
            ),
            array(
                "name" => "Barmer",
                "state_id" => 19,
            ),
            array(
                "name" => "Banswara",
                "state_id" => 19,
            ),
            array(
                "name" => "Bharatpur",
                "state_id" => 19,
            ),
            array(
                "name" => "Baran",
                "state_id" => 19,
            ),
            array(
                "name" => "Bundi",
                "state_id" => 19,
            ),
            array(
                "name" => "Bhilwara",
                "state_id" => 19,
            ),
            array(
                "name" => "Churu",
                "state_id" => 19,
            ),
            array(
                "name" => "Chittorgarh",
                "state_id" => 19,
            ),
            array(
                "name" => "Dausa",
                "state_id" => 19,
            ),
            array(
                "name" => "Dholpur",
                "state_id" => 19,
            ),
            array(
                "name" => "Dungapur",
                "state_id" => 19,
            ),
            array(
                "name" => "Ganganagar",
                "state_id" => 19,
            ),
            array(
                "name" => "Hanumangarh",
                "state_id" => 19,
            ),
            array(
                "name" => "Juhnjhunun",
                "state_id" => 19,
            ),
            array(
                "name" => "Jalore",
                "state_id" => 19,
            ),
            array(
                "name" => "Jodhpur",
                "state_id" => 19,
            ),
            array(
                "name" => "Jaipur",
                "state_id" => 19,
            ),
            array(
                "name" => "Jaisalmer",
                "state_id" => 19,
            ),
            array(
                "name" => "Jhalawar",
                "state_id" => 19,
            ),
            array(
                "name" => "Karauli",
                "state_id" => 19,
            ),
            array(
                "name" => "Kota",
                "state_id" => 19,
            ),
            array(
                "name" => "Nagaur",
                "state_id" => 19,
            ),
            array(
                "name" => "Pali",
                "state_id" => 19,
            ),
            array(
                "name" => "Pratapgarh",
                "state_id" => 19,
            ),
            array(
                "name" => "Rajsamand",
                "state_id" => 19,
            ),
            array(
                "name" => "Sikar",
                "state_id" => 19,
            ),
            array(
                "name" => "Sawai Madhopur",
                "state_id" => 19,
            ),
            array(
                "name" => "Sirohi",
                "state_id" => 19,
            ),
            array(
                "name" => "Tonk",
                "state_id" => 19,
            ),
            array(
                "name" => "Udaipur",
                "state_id" => 19,
            ),
            array(
                "name" => "East Sikkim",
                "state_id" => 20,
            ),
            array(
                "name" => "North Sikkim",
                "state_id" => 20,
            ),
            array(
                "name" => "South Sikkim",
                "state_id" => 20,
            ),
            array(
                "name" => "West Sikkim",
                "state_id" => 20,
            ),
            array(
                "name" => "Ariyalur",
                "state_id" => 21,
            ),
            array(
                "name" => "Chennai",
                "state_id" => 21,
            ),
            array(
                "name" => "Coimbatore",
                "state_id" => 21,
            ),
            array(
                "name" => "Cuddalore",
                "state_id" => 21,
            ),
            array(
                "name" => "Dharmapuri",
                "state_id" => 21,
            ),
            array(
                "name" => "Dindigul",
                "state_id" => 21,
            ),
            array(
                "name" => "Erode",
                "state_id" => 21,
            ),
            array(
                "name" => "Kanchipuram",
                "state_id" => 21,
            ),
            array(
                "name" => "Kanyakumari",
                "state_id" => 21,
            ),
            array(
                "name" => "Karur",
                "state_id" => 21,
            ),
            array(
                "name" => "Madurai",
                "state_id" => 21,
            ),
            array(
                "name" => "Nagapattinam",
                "state_id" => 21,
            ),
            array(
                "name" => "The Nilgiris",
                "state_id" => 21,
            ),
            array(
                "name" => "Namakkal",
                "state_id" => 21,
            ),
            array(
                "name" => "Perambalur",
                "state_id" => 21,
            ),
            array(
                "name" => "Pudukkottai",
                "state_id" => 21,
            ),
            array(
                "name" => "Ramanathapuram",
                "state_id" => 21,
            ),
            array(
                "name" => "Salem",
                "state_id" => 21,
            ),
            array(
                "name" => "Sivagangai",
                "state_id" => 21,
            ),
            array(
                "name" => "Tiruppur",
                "state_id" => 21,
            ),
            array(
                "name" => "Tiruchirappalli",
                "state_id" => 21,
            ),
            array(
                "name" => "Theni",
                "state_id" => 21,
            ),
            array(
                "name" => "Tirunelveli",
                "state_id" => 21,
            ),
            array(
                "name" => "Thanjavur",
                "state_id" => 21,
            ),
            array(
                "name" => "Thoothukudi",
                "state_id" => 21,
            ),
            array(
                "name" => "Thiruvallur",
                "state_id" => 21,
            ),
            array(
                "name" => "Thiruvarur",
                "state_id" => 21,
            ),
            array(
                "name" => "Tiruvannamalai",
                "state_id" => 21,
            ),
            array(
                "name" => "Vellore",
                "state_id" => 21,
            ),
            array(
                "name" => "Villupuram",
                "state_id" => 21,
            ),
            array(
                "name" => "Dhalai",
                "state_id" => 22,
            ),
            array(
                "name" => "North Tripura",
                "state_id" => 22,
            ),
            array(
                "name" => "South Tripura",
                "state_id" => 22,
            ),
            array(
                "name" => "West Tripura",
                "state_id" => 22,
            ),
            array(
                "name" => "Almora",
                "state_id" => 33,
            ),
            array(
                "name" => "Bageshwar",
                "state_id" => 33,
            ),
            array(
                "name" => "Chamoli",
                "state_id" => 33,
            ),
            array(
                "name" => "Champawat",
                "state_id" => 33,
            ),
            array(
                "name" => "Dehradun",
                "state_id" => 33,
            ),
            array(
                "name" => "Haridwar",
                "state_id" => 33,
            ),
            array(
                "name" => "Nainital",
                "state_id" => 33,
            ),
            array(
                "name" => "Pauri Garhwal",
                "state_id" => 33,
            ),
            array(
                "name" => "Pithoragharh",
                "state_id" => 33,
            ),
            array(
                "name" => "Rudraprayag",
                "state_id" => 33,
            ),
            array(
                "name" => "Tehri Garhwal",
                "state_id" => 33,
            ),
            array(
                "name" => "Udham Singh Nagar",
                "state_id" => 33,
            ),
            array(
                "name" => "Uttarkashi",
                "state_id" => 33,
            ),
            array(
                "name" => "Agra",
                "state_id" => 23,
            ),
            array(
                "name" => "Allahabad",
                "state_id" => 23,
            ),
            array(
                "name" => "Aligarh",
                "state_id" => 23,
            ),
            array(
                "name" => "Ambedkar Nagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Auraiya",
                "state_id" => 23,
            ),
            array(
                "name" => "Azamgarh",
                "state_id" => 23,
            ),
            array(
                "name" => "Barabanki",
                "state_id" => 23,
            ),
            array(
                "name" => "Badaun",
                "state_id" => 23,
            ),
            array(
                "name" => "Bagpat",
                "state_id" => 23,
            ),
            array(
                "name" => "Bahraich",
                "state_id" => 23,
            ),
            array(
                "name" => "Bijnor",
                "state_id" => 23,
            ),
            array(
                "name" => "Ballia",
                "state_id" => 23,
            ),
            array(
                "name" => "Banda",
                "state_id" => 23,
            ),
            array(
                "name" => "Balrampur",
                "state_id" => 23,
            ),
            array(
                "name" => "Bareilly",
                "state_id" => 23,
            ),
            array(
                "name" => "Basti",
                "state_id" => 23,
            ),
            array(
                "name" => "Bulandshahr",
                "state_id" => 23,
            ),
            array(
                "name" => "Chandauli",
                "state_id" => 23,
            ),
            array(
                "name" => "Chitrakoot",
                "state_id" => 23,
            ),
            array(
                "name" => "Deoria",
                "state_id" => 23,
            ),
            array(
                "name" => "Etah",
                "state_id" => 23,
            ),
            array(
                "name" => "Kanshiram Nagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Etawah",
                "state_id" => 23,
            ),
            array(
                "name" => "Firozabad",
                "state_id" => 23,
            ),
            array(
                "name" => "Farrukhabad",
                "state_id" => 23,
            ),
            array(
                "name" => "Fatehpur",
                "state_id" => 23,
            ),
            array(
                "name" => "Faizabad",
                "state_id" => 23,
            ),
            array(
                "name" => "Gautam Buddha Nagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Gonda",
                "state_id" => 23,
            ),
            array(
                "name" => "Ghazipur",
                "state_id" => 23,
            ),
            array(
                "name" => "Gorkakhpur",
                "state_id" => 23,
            ),
            array(
                "name" => "Ghaziabad",
                "state_id" => 23,
            ),
            array(
                "name" => "Hamirpur",
                "state_id" => 23,
            ),
            array(
                "name" => "Hardoi",
                "state_id" => 23,
            ),
            array(
                "name" => "Mahamaya Nagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Jhansi",
                "state_id" => 23,
            ),
            array(
                "name" => "Jalaun",
                "state_id" => 23,
            ),
            array(
                "name" => "Jyotiba Phule Nagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Jaunpur District",
                "state_id" => 23,
            ),
            array(
                "name" => "Kanpur Dehat",
                "state_id" => 23,
            ),
            array(
                "name" => "Kannauj",
                "state_id" => 23,
            ),
            array(
                "name" => "Kanpur Nagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Kaushambi",
                "state_id" => 23,
            ),
            array(
                "name" => "Kushinagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Lalitpur",
                "state_id" => 23,
            ),
            array(
                "name" => "Lakhimpur Kheri",
                "state_id" => 23,
            ),
            array(
                "name" => "Lucknow",
                "state_id" => 23,
            ),
            array(
                "name" => "Mau",
                "state_id" => 23,
            ),
            array(
                "name" => "Meerut",
                "state_id" => 23,
            ),
            array(
                "name" => "Maharajganj",
                "state_id" => 23,
            ),
            array(
                "name" => "Mahoba",
                "state_id" => 23,
            ),
            array(
                "name" => "Mirzapur",
                "state_id" => 23,
            ),
            array(
                "name" => "Moradabad",
                "state_id" => 23,
            ),
            array(
                "name" => "Mainpuri",
                "state_id" => 23,
            ),
            array(
                "name" => "Mathura",
                "state_id" => 23,
            ),
            array(
                "name" => "Muzaffarnagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Pilibhit",
                "state_id" => 23,
            ),
            array(
                "name" => "Pratapgarh",
                "state_id" => 23,
            ),
            array(
                "name" => "Rampur",
                "state_id" => 23,
            ),
            array(
                "name" => "Rae Bareli",
                "state_id" => 23,
            ),
            array(
                "name" => "Saharanpur",
                "state_id" => 23,
            ),
            array(
                "name" => "Sitapur",
                "state_id" => 23,
            ),
            array(
                "name" => "Shahjahanpur",
                "state_id" => 23,
            ),
            array(
                "name" => "Sant Kabir Nagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Siddharthnagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Sonbhadra",
                "state_id" => 23,
            ),
            array(
                "name" => "Sant Ravidas Nagar",
                "state_id" => 23,
            ),
            array(
                "name" => "Sultanpur",
                "state_id" => 23,
            ),
            array(
                "name" => "Shravasti",
                "state_id" => 23,
            ),
            array(
                "name" => "Unnao",
                "state_id" => 23,
            ),
            array(
                "name" => "Varanasi",
                "state_id" => 23,
            ),
            array(
                "name" => "Birbhum",
                "state_id" => 24,
            ),
            array(
                "name" => "Bankura",
                "state_id" => 24,
            ),
            array(
                "name" => "Bardhaman",
                "state_id" => 24,
            ),
            array(
                "name" => "Darjeeling",
                "state_id" => 24,
            ),
            array(
                "name" => "Dakshin Dinajpur",
                "state_id" => 24,
            ),
            array(
                "name" => "Hooghly",
                "state_id" => 24,
            ),
            array(
                "name" => "Howrah",
                "state_id" => 24,
            ),
            array(
                "name" => "Jalpaiguri",
                "state_id" => 24,
            ),
            array(
                "name" => "Cooch Behar",
                "state_id" => 24,
            ),
            array(
                "name" => "Kolkata",
                "state_id" => 24,
            ),
            array(
                "name" => "Malda",
                "state_id" => 24,
            ),
            array(
                "name" => "Midnapore",
                "state_id" => 24,
            ),
            array(
                "name" => "Murshidabad",
                "state_id" => 24,
            ),
            array(
                "name" => "Nadia",
                "state_id" => 24,
            ),
            array(
                "name" => "North 24 Parganas",
                "state_id" => 24,
            ),
            array(
                "name" => "South 24 Parganas",
                "state_id" => 24,
            ),
            array(
                "name" => "Purulia",
                "state_id" => 24,
            ),
            array(
                "name" => "Uttar Dinajpur",
                "state_id" => 24,
            ),
        );

        if (City::count() <= 0) {
            City::insert($cities);
        }
    }
}
