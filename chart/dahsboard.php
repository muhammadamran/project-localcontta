<!-- QUERY IMPORT -->
<?php
// YEARS
$result_g_import_year = $db->query("SELECT COUNT(*) AS total, rcd_create_year AS year FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot!='' GROUP BY rcd_create_year");
foreach ($result_g_import_year as $dataYearImport) {
    $dYearImport = $dataYearImport['year'];
    $arrYearImport[] = array(
        $dYearImport
    );
}
$YearImport = json_encode($arrYearImport, JSON_ERROR_NONE);
$result_YearImport = preg_replace("/[^0-9,.]/", "", $YearImport);

// FCL
$result_g_import_FCL = $db->query("SELECT COUNT(*) AS total_FCL FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='FCL' AND rcd_mot!='' GROUP BY rcd_create_year");
foreach ($result_g_import_FCL as $dataFCLImport) {
    $dFCLImport = $dataFCLImport['total_FCL'];
    $arrFCLImport[] = array(
        $dFCLImport
    );
}
$FCLImport = json_encode($arrFCLImport, JSON_ERROR_NONE);
$result_FCLImport = preg_replace("/[^0-9,.]/", "", $FCLImport);
// LCL
$result_g_import_LCL = $db->query("SELECT COUNT(*) AS total_LCL FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='LCL' AND rcd_mot!='' GROUP BY rcd_create_year");
foreach ($result_g_import_LCL as $dataLCLImport) {
    $dLCLImport = $dataLCLImport['total_LCL'];
    $arrLCLImport[] = array(
        $dLCLImport
    );
}
$LCLImport = json_encode($arrLCLImport, JSON_ERROR_NONE);
$result_LCLImport = preg_replace("/[^0-9,.]/", "", $LCLImport);
// AIR
$result_g_import_AIR = $db->query("SELECT COUNT(*) AS total_AIR FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='AIR' AND rcd_mot!='' GROUP BY rcd_create_year");
foreach ($result_g_import_AIR as $dataAIRImport) {
    $dAIRImport = $dataAIRImport['total_AIR'];
    $arrAIRImport[] = array(
        $dAIRImport
    );
}
$AIRImport = json_encode($arrAIRImport, JSON_ERROR_NONE);
$result_AIRImport = preg_replace("/[^0-9,.]/", "", $AIRImport);

$Gcurrent_monthImport = date('m');
$Gcurrent_yearImport = date('Y');
// FCL
$Gresult_importFCL = $db->query("SELECT COUNT(*) AS GFCL_import FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='FCL' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthImport' AND rcd_create_year = '$Gcurrent_yearImport'");
$Gcont_import_FCL = mysqli_fetch_array($Gresult_importFCL);
// LCL
$Gresult_import_LCL = $db->query("SELECT COUNT(*) AS GLCL_import FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='LCL' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthImport' AND rcd_create_year = '$Gcurrent_yearImport'");
$Gcont_import_LCL = mysqli_fetch_array($Gresult_import_LCL);
// AIR
$Gresult_import_AIR = $db->query("SELECT COUNT(*) AS GAIR_import FROM tb_master_impor WHERE rcd_type='import' AND rcd_mot='AIR' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthImport' AND rcd_create_year = '$Gcurrent_yearImport'");
$Gcont_import_AIR = mysqli_fetch_array($Gresult_import_AIR);
?>
<!-- END QUERY IMPORT -->
<!-- QUERY EXPORT -->
<?php
$con = mysqli_connect("localhost", "root", "", "contta");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// YEARS
$result_g_export_year = $db->query("SELECT COUNT(*) AS total, rcd_create_year AS year FROM tb_master_export WHERE rcd_type='export' AND rcd_mot!='' GROUP BY rcd_create_year");
foreach ($result_g_export_year as $dataYearExport) {
    $dYearExport = $dataYearExport['year'];
    $arrYearExport[] = array(
        $dYearExport
    );
}
$YearExport = json_encode($arrYearExport, JSON_ERROR_NONE);
$result_YearExport = preg_replace("/[^0-9,.]/", "", $YearExport);

// FCL
$result_g_export_FCL = $db->query("SELECT COUNT(*) AS total_FCL FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='FCL' AND rcd_mot!='' GROUP BY rcd_create_year");
foreach ($result_g_export_FCL as $dataFCLExport) {
    $dFCLExport = $dataFCLExport['total_FCL'];
    $arrFCLExport[] = array(
        $dFCLExport
    );
}
$FCLExport = json_encode($arrFCLExport, JSON_ERROR_NONE);
$result_FCLExport = preg_replace("/[^0-9,.]/", "", $FCLExport);
// LCL
$result_g_export_LCL = $db->query("SELECT COUNT(*) AS total_LCL FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='LCL' AND rcd_mot!='' GROUP BY rcd_create_year");
foreach ($result_g_export_LCL as $dataLCLExport) {
    $dLCLExport = $dataLCLExport['total_LCL'];
    $arrLCLExport[] = array(
        $dLCLExport
    );
}
$LCLExport = json_encode($arrLCLExport, JSON_ERROR_NONE);
$result_LCLExport = preg_replace("/[^0-9,.]/", "", $LCLExport);
// AIR
$result_g_export_AIR = $db->query("SELECT COUNT(*) AS total_AIR FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='AIR' AND rcd_mot!='' GROUP BY rcd_create_year");
$checkresult_g_export_AIR = mysqli_fetch_array($result_g_export_AIR);
if ($checkresult_g_export_AIR['total_AIR'] == NULL) {
    $result_AIRExport = '0';
} else {
    foreach ($result_g_export_AIR as $dataAIRExport) {
        $dAIRExport = $dataAIRExport['total_AIR'];
        $arrAIRExport[] = array(
            $dAIRExport
        );
    }
    $AIRExport = json_encode($arrAIRExport, JSON_ERROR_NONE);
    $result_AIRExport = preg_replace("/[^0-9,.]/", "", $AIRExport);
}



$Gcurrent_monthExport = date('m');
$Gcurrent_yearExport = date('Y');
// FCL
$Gresult_exportFCL = $db->query("SELECT COUNT(*) AS GFCL_export FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='FCL' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthExport' AND rcd_create_year = '$Gcurrent_yearExport'");
$Gcont_export_FCL = mysqli_fetch_array($Gresult_exportFCL);
// LCL
$Gresult_export_LCL = $db->query("SELECT COUNT(*) AS GLCL_export FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='LCL' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthExport' AND rcd_create_year = '$Gcurrent_yearExport'");
$Gcont_export_LCL = mysqli_fetch_array($Gresult_export_LCL);
// AIR
$Gresult_export_AIR = $db->query("SELECT COUNT(*) AS GAIR_export FROM tb_master_export WHERE rcd_type='export' AND rcd_mot='AIR' AND rcd_mot!='' AND rcd_create_month = '$Gcurrent_monthExport' AND rcd_create_year = '$Gcurrent_yearExport'");
$Gcont_export_AIR = mysqli_fetch_array($Gresult_export_AIR);
?>
<!-- END QUERY EXPORT -->
<script type="text/javascript">
    var colors = Highcharts.getOptions().colors;

    // IMPORT
    Highcharts.chart('pieImport', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Import FCL, LCL & AIR  - <?= date('F') ?>, <?= date('Y') ?>'
        },
        subtitle: {
            text: 'Update: <?= date_indo(date('Y-m-d'), true) ?>'
        },
        tooltip: {
            headerFormat: 'Semester {point.x}<br>',
            pointFormat: '{point.y} IPS',
            shared: true
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: Total {point.y}'
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'MOT',
            colorByPoint: true,
            data: [{
                name: 'FCL',
                y: <?= $Gcont_import_FCL['GFCL_import']; ?>,
                sliced: true,
                selected: true
            }, {
                name: 'LCL',
                y: <?= $Gcont_import_LCL['GLCL_import']; ?>,
            }, {
                name: 'AIR',
                y: <?= $Gcont_import_AIR['GAIR_import']; ?>,
            }]
        }]
    });

    Highcharts.chart('importArea', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Import - FCL, LCL & AIR Per Years'
        },
        subtitle: {
            text: 'Update: <?= date_indo(date('Y-m-d'), true) ?>'
        },
        xAxis: {
            allowDecimals: true,
            categories: [<?= $result_YearImport ?>],
            tickmarkPlacement: 'on',
            title: {
                text: '<font style="color: #fff">Years</font><br><font style="color: #000">Years</font>'
            }
        },
        yAxis: {
            title: {
                text: '<font style="color: #000">Total</font>'
            },
            labels: {
                overflow: 'left'
            }
        },
        tooltip: {
            valueSuffix: ' Total'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: "FCL",
            data: [<?= $result_FCLImport ?>],
            website: 'https://support.microsoft.com/en-us/help/22798/windows-10-complete-guide-to-narrator',
            color: colors[10]
        }, {
            name: "LCL",
            data: [<?= $result_LCLImport ?>],
            website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php',
            color: colors[1]
        }, {
            name: "AIR",
            data: [<?= $result_AIRImport ?>],
            website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php',
            color: colors[2]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 400
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

    // EXPORT
    Highcharts.chart('pieExport', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Export FCL, LCL & AIR  - <?= date('F') ?>, <?= date('Y') ?>'
        },
        subtitle: {
            text: 'Update: <?= date_indo(date('Y-m-d'), true) ?>'
        },
        tooltip: {
            headerFormat: 'Semester {point.x}<br>',
            pointFormat: '{point.y} IPS',
            shared: true
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} Total'
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'MOT',
            colorByPoint: true,
            data: [{
                name: 'FCL',
                y: <?= $Gcont_export_FCL['GFCL_export']; ?>,
            }, {
                name: 'LCL',
                y: <?= $Gcont_export_LCL['GLCL_export']; ?>,
            }, {
                name: 'AIR',
                y: <?= $Gcont_export_AIR['GAIR_export']; ?>,
            }]
        }]
    });

    Highcharts.chart('exportArea', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Export - FCL, LCL & AIR Per Years'
        },
        subtitle: {
            text: 'Update: <?= date_indo(date('Y-m-d'), true) ?>'
        },
        xAxis: {
            allowDecimals: true,
            categories: [<?= $result_YearExport ?>],
            tickmarkPlacement: 'on',
            title: {
                text: '<font style="color: #fff">Years</font><br><font style="color: #000">Years</font>'
            }
        },
        yAxis: {
            title: {
                text: '<font style="color: #000">Total</font>'
            },
            labels: {
                overflow: 'left'
            }
        },
        tooltip: {
            valueSuffix: ' Total'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: "FCL",
            data: [<?= $result_FCLExport ?>],
            website: 'https://support.microsoft.com/en-us/help/22798/windows-10-complete-guide-to-narrator',
            color: colors[10]
        }, {
            name: "LCL",
            data: [<?= $result_LCLExport ?>],
            website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php',
            color: colors[1]
        }, {
            name: "AIR",
            data: [<?= $result_AIRExport ?>],
            website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php',
            color: colors[2]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 400
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>