@extends('layouts.admin-app', ['title' => 'SAW'])

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Judul Halaman -->
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Sistem Pengambilan Keputusan /</span> Metode SAW (Simple Additive Weighting)
        </h4>

        <!-- Penjelasan Metode SAW -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Apa itu Metode SAW?</h5>
            </div>
            <div class="card-body">
                <p>
                    Metode SAW (Simple Additive Weighting) adalah salah satu metode pengambilan keputusan yang digunakan untuk mengevaluasi beberapa alternatif berdasarkan kriteria tertentu.
                    Setiap kriteria memiliki bobot yang menunjukkan tingkat kepentingannya. Nilai akhir dihitung dengan menjumlahkan hasil perkalian antara nilai normalisasi dan bobot kriteria.
                </p>
            </div>
        </div>

        <!-- Langkah-langkah Metode SAW -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Langkah-langkah Metode SAW</h5>
            </div>
            <div class="card-body">
                <ol>
                    <li>
                        <strong>Menentukan Alternatif dan Kriteria</strong><br>
                        Alternatif adalah opsi yang akan dinilai, sedangkan kriteria adalah faktor penilaian.
                    </li>
                    <li>
                        <strong>Memberikan Bobot pada Kriteria</strong><br>
                        Setiap kriteria memiliki bobot yang menunjukkan tingkat kepentingannya.
                    </li>
                    <li>
                        <strong>Normalisasi Nilai</strong><br>
                        Nilai kriteria dinormalisasi untuk menyamakan skala penilaian.
                    </li>
                    <li>
                        <strong>Menghitung Nilai Akhir</strong><br>
                        Nilai akhir dihitung menggunakan rumus SAW (Simple Additive Weighting):
                        \[
                        V_i = \sum_{j=1}^{n} (w_j \times r_{ij})
                        \]
                        <strong>Keterangan:</strong>
                        <ul>
                            <li>
                                <strong>\( V_i \):</strong> Nilai akhir untuk alternatif ke-\( i \).
                                Nilai ini digunakan untuk menentukan peringkat alternatif.
                            </li>
                            <li>
                                <strong>\( w_j \):</strong> Bobot untuk kriteria ke-\( j \).
                                Bobot ini menunjukkan tingkat kepentingan relatif dari setiap kriteria.
                                Contoh: Jika ada 3 kriteria dengan bobot 0.4, 0.3, dan 0.3, maka total bobot adalah 1 (100%).
                            </li>
                            <li>
                                <strong>\( r_{ij} \):</strong> Nilai normalisasi untuk alternatif ke-\( i \) pada kriteria ke-\( j \).
                                Nilai ini diperoleh setelah proses normalisasi, yang menyamakan skala penilaian untuk semua kriteria.
                            </li>
                        </ul>
                        <strong>Contoh Perhitungan:</strong>
                        <ul>
                            <li>
                                Misalkan ada 2 kriteria dengan bobot \( w_1 = 0.6 \) dan \( w_2 = 0.4 \).
                            </li>
                            <li>
                                Nilai normalisasi untuk alternatif A adalah \( r_{A1} = 0.8 \) (pada kriteria 1) dan \( r_{A2} = 0.7 \) (pada kriteria 2).
                            </li>
                            <li>
                                Maka, nilai akhir alternatif A adalah:
                                \[
                                V_A = (0.6 \times 0.8) + (0.4 \times 0.7) = 0.48 + 0.28 = 0.76
                                \]
                            </li>
                        </ul>
                    </li>
                    <li>
                        <strong>Perankingan</strong><br>
                        Alternatif dengan nilai akhir tertinggi adalah pilihan terbaik.
                    </li>
                </ol>
            </div>
        </div>

        <!-- Contoh Implementasi -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Contoh Implementasi</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Tabel Alternatif -->
                    <div class="col-md-6">
                        <h6>Alternatif</h6>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Alternatif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Alternatif A</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Alternatif B</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Alternatif C</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabel Kriteria dan Bobot -->
                    <div class="col-md-6">
                        <h6>Kriteria dan Bobot</h6>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kriteria 1</td>
                                    <td>0.4</td>
                                </tr>
                                <tr>
                                    <td>Kriteria 2</td>
                                    <td>0.3</td>
                                </tr>
                                <tr>
                                    <td>Kriteria 3</td>
                                    <td>0.3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabel Normalisasi dan Nilai Akhir -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h6>Normalisasi dan Nilai Akhir</h6>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Alternatif</th>
                                    <th>Kriteria 1 (0.4)</th>
                                    <th>Kriteria 2 (0.3)</th>
                                    <th>Kriteria 3 (0.3)</th>
                                    <th>Nilai Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Alternatif A</td>
                                    <td>0.8</td>
                                    <td>0.7</td>
                                    <td>0.9</td>
                                    <td>0.8</td>
                                </tr>
                                <tr>
                                    <td>Alternatif B</td>
                                    <td>0.7</td>
                                    <td>0.8</td>
                                    <td>0.7</td>
                                    <td>0.73</td>
                                </tr>
                                <tr>
                                    <td>Alternatif C</td>
                                    <td>0.9</td>
                                    <td>0.6</td>
                                    <td>0.8</td>
                                    <td>0.78</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hasil Perankingan -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Hasil Perankingan</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Peringkat</th>
                            <th>Alternatif</th>
                            <th>Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alternatif A</td>
                            <td>0.8</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Alternatif C</td>
                            <td>0.78</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Alternatif B</td>
                            <td>0.73</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
