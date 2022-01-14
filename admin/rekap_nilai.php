<?php
    include '../api/config.php';
    include 'layout/css.php';
?>
<!DOCTYPE html> 
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <style>
    @page { size 8.5in 11in; margin: 2cm }
    div.page { page-break-after: always }
    </style>
    <body>
    <div class="page">
    <?php
        if(isset($_GET['idkelas'],$_GET['idsem'])){
            $idkelas = $_GET['idkelas'];
            $idsem = $_GET['idsem'];

            $sql = "SELECT idsiswa,tbnilaikd.idpilar as idpilar,nilai_kd FROM tbnilaikd
					LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                    WHERE tbnilaikd.idkelas='1' AND idsem='20211'
                    GROUP BY idpilar,idsiswa";

            $view = mysqli_query($con, $sql)or die(mysqli_error());
            $view_data=mysqli_fetch_array($view);

            $data = mysqli_query($con, $sql);
            //$chart_data="";
            while ($row = mysqli_fetch_array($data)) {
                $idpilar01[]  = $row['idpilar'];
                $nilai_kd01[] = $row['nilai_kd'];
                $kd01[] = $row['kd'];
            }
        

    ?>

    
    </div>
    
    

    <table class="table table-borderless">
        <tbody>
            <tr>
                <td style="width:60%;">
                    <div style="width:100%;text-align:center">
                        <canvas id="barChart"></canvas>
                    </div>
                </td>
                
            </tr>

            </tbody>
            </table>
    <hr>

    
    <?php } ?>
    </body>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
        //setup block
        const data = {
            labels:<?php echo json_encode($idpilar01); ?>,
            datasets: [{
                data:<?php echo json_encode($nilai_kd01); ?>,
                backgroundColor: [
                "#5969ff",
                "#ff407b",
                "#25d5f2",
                "#ffc750",
                "#2ec551",
                "#7040fa",
                "#ff004e"
                ],
                borderWidth: 1
            }]
        };
        

        //config block
        const config = {
            type: 'horizontalBar',
            data: data,
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            max: 5
                        }
                    }]
                },
                animation :{
                    duration: 0
                },
                legend: {
                    display: false,
                    position: 'bottom',
                    labels: {
                        boxWidth: 20,
                        fontColor: 'rgb(255, 99, 132)'
                    }
                }
            }
        };
        
        
        //render block
        const barChart = new Chart(
            document.getElementById('barChart'),
            config
        );
        
        </script>
        </html>