## Simple Additive Weighting Algorithm
Simple Additive Weighting atau SAW merupakan sebuah algoritma pendukung keputusan dari beberapa data dan kriteria yang diberikan. Masing-masing kriteria memiliki masing-masing attribute yang digunakan sebagai data pendukung keputusan termasuk jenis kriteria cost (semakin kecil nilai semakin bagus) atau benefit (semakin besar nilai semakin bagus).

## Install
Silahkan download atau clone repository ini

## Documentation
Berikut ini adalah beberapa hal yang harus dilakukan supaya sistem berjalan

#### Inisialisasi sistem
Tambahkan kode di bawah ini di baris pertama.

```php
require 'SAW/sawMethod.php';

use SAW\SawMethod;
```

Disarankan jangan memindahkan file yang ada di dalam folder `SAW`

#### Inisialisasi kriteria
Perlu diperhatikan bahwa dalam perhitungan SAW perlu data kriteria. Adapun penulisan data kriteria tersebut dalam bentuk array dengan struktur di bawah ini.

```php
$kriteria = [
    [
        Array nilai tiap kriteria, bobot kriteria, jenis kriteria
    ],
    [
        Array nilai tiap kriteria, bobot kriteria, jenis kriteria
    ],
    dst
]
```

Keterangan : Untuk `jenis kriteria` isikan `true` jika dia benefit, atau `false` jika dia cost

Contoh 

```php
$criteria = [
    [
        [2, 3, 4, 5], 40, false
    ],
    [
        [2, 3, 4, 5], 30, false
    ],
    [
        [1, 3, 5], 20, true
    ],
    [
        [3, 4, 5], 10, true
    ]

];
```

Data di atas jika dimasukan ke dalam tabel adalah sebagai berikut

| Kriteria | Nilai yang dapat digunakan | Bobot | Jenis |
|----------|-------|-------|-------|
|Ke-1|2,3,4,5|40|cost|
|ke-2|2,3,4,5|30|cost|
|ke-3|1,3,5|20|benefit|
|ke-4|3,4,5|10|benefit|

#### Inisialisasi data uji
Jika kriteria sudah ditentukan, saatnya masukkan data uji. Jika tiap data ada nama nya, pisahkan.

Contoh

```php
$nama = ['Sekolah 1', 'Sekolah 2', 'Sekolah 3']; // Nama bersifat opsional, boleh diisi boleh tidak
$data = [
    [2,3,5,3],
    [4,2,1,4],
    [2,2,1,5],
];
```
Data di atas dapat dibaca sebagai berikut

|Nama|Kriteria 1|Kriteria 2|Kriteria 3|Kriteria 4|
|----|----------|----------|----------|----------|
|Sekolah 1|2|3|5|3|
|Sekolah 2|4|2|1|4|
|Sekolah 3|2|2|1|5|

#### Hitung
Untuk menghitung nya, cukup gunakan kode ini

```php
$saw = new SawMethod($data, $kriteria, $nama)
```

#### Menampilkan hasil
Berikut beberapa fungsi untuk menampilkan hasilnya

```php
$saw->getResultName();   // Menampilkan nama terpilih (string)
$saw->getResult();       // Menampilkan nilai terpilih (float)
$saw->getFinalResult();   // Menampilkan semua data terurut (array)
$saw->getDataWithName(); // Menampilkan semua data terurut dengan masing-masing namanya (array)
```

#### Contoh
Silahkan buka file `example.php` untuk contoh lebih lanjut

## Thank you
Terima kasih sudah menggunakan sistem sederhana SAW untuk pendukung keputusan. Jangan lupa untuk tidak menghapus author dalam kode. Salam.