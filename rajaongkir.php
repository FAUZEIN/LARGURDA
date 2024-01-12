<?php
// Mengatur koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "askripsi";

$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk mengambil data dari Raja Ongkir
function getDataFromRajaOngkir($endpoint)
{
    $apiKey = "d2f95f678fa44c587dea727c7af7ae7f";
    $url = "https://pro.rajaongkir.com/api/" . $endpoint;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["key: $apiKey"]);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Fungsi untuk menyimpan data provinsi ke database
function saveProvincesToDatabase($conn, $provinces)
{
    foreach ($provinces as $province) {
        $id = $province['province_id'];
        $name = $province['province'];

        $sql = "INSERT INTO ship_divisions (id, division_name, created_at, updated_at) VALUES ('$id', '$name', NOW(), NOW())";
        $conn->query($sql);
    }
}

// Fungsi untuk menyimpan data kabupaten ke database
function saveDistrictsToDatabase($conn, $districts, $divisionId)
{
    foreach ($districts as $district) {
        $id = $district['city_id'];
        $name = $district['city_name'];

        $sql = "INSERT INTO ship_districts (id, division_id, district_name, created_at, updated_at) VALUES ('$id', '$divisionId', '$name', NOW(), NOW())";
        $conn->query($sql);
    }
}

// Fungsi untuk menyimpan data kecamatan ke database
function saveStatesToDatabase($conn, $states, $divisionId, $districtId)
{
    foreach ($states as $state) {
        $id = $state['subdistrict_id'];
        $name = $state['subdistrict_name'];

        $sql = "INSERT INTO ship_states (id, division_id, district_id, state_name, created_at, updated_at) VALUES ('$id', '$divisionId', '$districtId', '$name', NOW(), NOW())";
        $conn->query($sql);
    }
}

// Mengambil data provinsi dari Raja Ongkir
$provincesData = getDataFromRajaOngkir("province");
saveProvincesToDatabase($conn, $provincesData['rajaongkir']['results']);

// Mengambil data kabupaten dan kecamatan dari Raja Ongkir untuk setiap provinsi
$provinces = $provincesData['rajaongkir']['results'];
foreach ($provinces as $province) {
    $provinceId = $province['province_id'];

    $districtsData = getDataFromRajaOngkir("city?province=$provinceId");
    saveDistrictsToDatabase($conn, $districtsData['rajaongkir']['results'], $provinceId);

    foreach ($districtsData['rajaongkir']['results'] as $district) {
        $districtId = $district['city_id'];

        $statesData = getDataFromRajaOngkir("subdistrict?city=$districtId");
        saveStatesToDatabase($conn, $statesData['rajaongkir']['results'], $provinceId, $districtId);
    }
}

// Menutup koneksi ke database
$conn->close();

echo "Data provinsi, kabupaten, dan kecamatan berhasil diimpor ke database.";
?>
