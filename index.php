<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- Bootstrap CSS for table styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS for custom styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles can be added here */
    </style>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-4">

        <?php
        class Student
        {
            public $id, $nama, $nilai_pbo, $nilai_web, $nilai_pkk, $kelas, $nilai_rata, $predikat;

            public function __construct($dataStudents = [])
            {
                $this->id = $dataStudents['id'] ?? null;
                $this->nama = $dataStudents['nama'] ?? null;
                $this->nilai_pbo = $dataStudents['nilai_pbo'] ?? null;
                $this->nilai_web = $dataStudents['nilai_web'] ?? null;
                $this->nilai_pkk = $dataStudents['nilai_pkk'] ?? null;
                $this->kelas = $dataStudents['kelas'] ?? null;

                // Calculate average score and round it
                $avg = ($this->nilai_pbo + $this->nilai_web + $this->nilai_pkk) / 3;
                $this->nilai_rata = round($avg);

                // Determine the grade based on average score
                $this->predikat = $this->getPredikat($this->nilai_rata);
            }

            private function getPredikat($avg)
            {
                if ($avg >= 90 && $avg <= 100) {
                    return 'A';
                } elseif ($avg >= 86 && $avg <= 89) {
                    return 'B+';
                } elseif ($avg >= 81 && $avg <= 85) {
                    return 'B';
                } elseif ($avg >= 75 && $avg <= 80) {
                    return 'C';
                } elseif ($avg >= 70 && $avg <= 74) {
                    return 'D';
                } else {
                    return 'Remedial';
                }
            }
        }

        $dataStudents = [
            [
                'id' => 1,
                'nama' => 'Budi',
                'nilai_pbo' => 69,
                'nilai_web' => 80,
                'nilai_pkk' => 85,
                'kelas' => '11-RPL'
            ],
            [
                'id' => 2,
                'nama' => 'Bima',
                'nilai_pbo' => 69,
                'nilai_web' => 69,
                'nilai_pkk' => 96,
                'kelas' => '11-RPL'
            ],
            [
                'id' => 3,
                'nama' => 'Crypto',
                'nilai_pbo' => 86,
                'nilai_web' => 50,
                'nilai_pkk' => 69,
                'kelas' => '11-RPL'
            ],
            [
                'id' => 4,
                'nama' => 'Zefanya',
                'nilai_pbo' => 0,
                'nilai_web' => 35,
                'nilai_pkk' => 0.69,
                'kelas' => '11-RPL'
            ],
            [
                'id' => 5,
                'nama' => 'Miya',
                'nilai_pbo' => 25,
                'nilai_web' => 75,
                'nilai_pkk' => 69,
                'kelas' => '11-RPL'
            ],
            [
                'id' => 6,
                'nama' => 'Steve',
                'nilai_pbo' => 90,
                'nilai_web' => 80,
                'nilai_pkk' => 85,
                'kelas' => '12-RPL'
            ],
            [
                'id' => 7,
                'nama' => 'Erich',
                'nilai_pbo' => 35,
                'nilai_web' => 79,
                'nilai_pkk' => 100,
                'kelas' => '12-RPL'
            ],
            [
                'id' => 8,
                'nama' => 'Rika',
                'nilai_pbo' => 90,
                'nilai_web' => 69,
                'nilai_pkk' => 70,
                'kelas' => '12-RPL'
            ],
            [
                'id' => 9,
                'nama' => 'Jin',
                'nilai_pbo' => 100,
                'nilai_web' => 100,
                'nilai_pkk' => 90,
                'kelas' => '12-RPL'
            ],
            [
                'id' => 10,
                'nama' => 'Steven',
                'nilai_pbo' => 95,
                'nilai_web' => 86,
                'nilai_pkk' => 82,
                'kelas' => '12-RPL'
            ],
        ];

        $listStudents = []; // Initialize the listStudents array

        foreach ($dataStudents as $dataStudent) {
            $student = new Student($dataStudent);
            $listStudents[] = $student;
        }
        ?>

        <h1 class="text-3xl font-bold mb-6">Data Siswa</h1>

        <?php
        // Function to display students based on class
        function displayStudents($students, $class)
        {
            $dataSiswa = array_filter($students, function ($student) use ($class) {
                return $student->kelas == $class;
            });

            // Display count of students if there are any
            if (!empty($dataSiswa)) {
        ?>
                <h2 class="text-xl font-bold mb-4">Jumlah Data Siswa Kelas <?php echo $class; ?>: <?php echo count($dataSiswa); ?></h2>

                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 cursor-pointer" data-column="1" data-numeric="false">ID</th>
                                <th class="px-4 py-2 cursor-pointer" data-column="2" data-numeric="false">Nama</th>
                                <th class="px-4 py-2 cursor-pointer" data-column="3" data-numeric="true">Nilai PBO</th>
                                <th class="px-4 py-2 cursor-pointer" data-column="4" data-numeric="true">Nilai Web</th>
                                <th class="px-4 py-2 cursor-pointer" data-column="5" data-numeric="true">Nilai PKK</th>
                                <th class="px-4 py-2 cursor-pointer" data-column="6" data-numeric="true">Nilai Rata-rata</th>
                                <th class="px-4 py-2 cursor-pointer" data-column="7" data-numeric="false">Predikat</th>
                                <th class="px-4 py-2 cursor-pointer" data-column="8" data-numeric="false">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataSiswa as $student) { ?>
                                <tr>
                                    <td class="border px-4 py-2"><?php echo $student->id; ?></td>
                                    <td class="border px-4 py-2"><?php echo $student->nama; ?></td>
                                    <td class="border px-4 py-2"><?php echo $student->nilai_pbo; ?></td>
                                    <td class="border px-4 py-2"><?php echo $student->nilai_web; ?></td>
                                    <td class="border px-4 py-2"><?php echo $student->nilai_pkk; ?></td>
                                    <td class="border px-4 py-2"><?php echo $student->nilai_rata; ?></td>
                                    <td class="border px-4 py-2"><?php echo $student->predikat; ?></td>
                                    <td class="border px-4 py-2"><?php echo $student->kelas; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        <?php
            }
        }

        // Display students for both classes
        displayStudents($listStudents, '11-RPL');
        displayStudents($listStudents, '12-RPL');
        ?>

    </div>

    <!-- Bootstrap JS (optional if not using interactive features from Bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript for table sorting -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const table = document.getElementById('siswa-table');
            const headers = table.querySelectorAll('th');

            headers.forEach(header => {
                header.addEventListener('click', () => {
                    const column = header.dataset.column;
                    const isNumeric = header.dataset.numeric === 'true';
                    const rows = Array.from(table.querySelectorAll('tbody tr'));

                    // Sort rows
                    rows.sort((rowA, rowB) => {
                        const cellA = rowA.querySelector(`td:nth-child(${column})`).innerText.trim();
                        const cellB = rowB.querySelector(`td:nth-child(${column})`).innerText.trim();

                        if (isNumeric) {
                            return parseFloat(cellA) - parseFloat(cellB);
                        } else {
                            return cellA.localeCompare(cellB);
                        }
                    });

                    // Remove existing rows
                    table.querySelector('tbody').innerHTML = '';

                    // Re-add sorted rows
                    rows.forEach(row => table.querySelector('tbody').appendChild(row));
                });
            });
        });
    </script>
</body>

</html>
