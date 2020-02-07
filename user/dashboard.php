<?php
include_once '../teamplate/head-user.php';
include_once '../koneksi.php';
?>

<div class="content">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

    <script>
        window.onload = function() {
            var chart1 = new CanvasJS.Chart("chartPendidikan", {
                animationEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Security Berdasarkan Pendidikan Terakhir"
                },
                axisY: {
                    title: "Jumlah (Orang)"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "grey",
                    legendText: "Pendidikan Terakhir",

                    dataPoints: [{
                            y: <?php
                                $jmlSekolah = mysqli_query($koneksi, "SELECT * FROM tbpendidikan WHERE jenjang='SD      '");
                                echo mysqli_num_rows($jmlSekolah);
                                ?>,
                            label: "SD"
                        },
                        {
                            y: <?php
                                $jmlSekolah = mysqli_query($koneksi, "SELECT * FROM tbpendidikan WHERE jenjang='SMP      '");
                                echo mysqli_num_rows($jmlSekolah);
                                ?>,
                            label: "SMP"
                        },
                        {
                            y: <?php
                                $jmlSekolah = mysqli_query($koneksi, "SELECT * FROM tbpendidikan WHERE jenjang='SMA/SMK      '");
                                echo mysqli_num_rows($jmlSekolah);
                                ?>,
                            label: "SMA/SMK"
                        },
                        {
                            y: <?php
                                $jmlSekolah = mysqli_query($koneksi, "SELECT * FROM tbpendidikan WHERE jenjang='DIPLOMA (D3)      '");
                                echo mysqli_num_rows($jmlSekolah);
                                ?>,
                            label: "DIPLOMA (D3)"
                        },
                        {
                            y: <?php
                                $jmlSekolah = mysqli_query($koneksi, "SELECT * FROM tbpendidikan WHERE jenjang='SArjana (S1)      '");
                                echo mysqli_num_rows($jmlSekolah);
                                ?>,
                            label: "SARJANA (S1)"
                        }
                    ]
                }]
            });

            var chart2 = new CanvasJS.Chart("chartJenisKelamin", {
                exportEnabled: true,
                animationEnabled: true,
                title: {
                    text: "Security Berdasarkan Jenis Kelamin"
                },
                legend: {
                    cursor: "pointer",
                    itemclick: explodePie
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "{name}: <strong>{y}%</strong>",
                    indexLabel: "{name} - {y}%",
                    dataPoints: [{
                            y: <?php
                                $jmlSecurity = mysqli_query($koneksi, "SELECT * FROM tbkaryawan WHERE jenis_kelamin='Perempuan      '");
                                echo mysqli_num_rows($jmlSecurity);
                                ?>,
                            name: "Perempuan",
                            exploded: true
                        },
                        {
                            y: <?php
                                $jmlSecurity = mysqli_query($koneksi, "SELECT * FROM tbkaryawan WHERE jenis_kelamin='Laki-Laki     '");
                                echo mysqli_num_rows($jmlSecurity);
                                ?>,
                            name: "Laki-Laki"
                        }
                    ]
                }]
            });
            chart1.render();
            chart2.render();

            function explodePie(e) {
                if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
                    e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
                } else {
                    e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
                }
                e.chart.render();

            }

        }
    </script>

    <div class="row">
        <div class="col">
            <div id="chartPendidikan"></div>

        </div>
        <div class="col">
            <div id="chartJenisKelamin"></div>
        </div>
    </div>
</div>

<?php include_once '../teamplate/footer.php' ?>