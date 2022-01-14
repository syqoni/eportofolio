<?php
    include '../api/config.php';

 if (!$con) {
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT idsiswa,ROUND(AVG(nilai_kd),2) AS avg_nilai FROM `tbnilaikd` 
                LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                WHERE tbnilaikd.idkelas='1'AND idsem='20211' AND tbpilar.kdpilar='P01' GROUP BY idsiswa";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $idsiswa[]  = $row['idsiswa'];
            $avg_nilai[] = $row['avg_nilai'];
        }
        
        $sql2 ="SELECT idsiswa,ROUND(AVG(nilai_kd),2) AS avg_nilai FROM `tbnilaikd` 
        LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
        WHERE tbnilaikd.idkelas='1'AND idsem='20212' AND tbpilar.kdpilar='P01' GROUP BY idsiswa";
        
        $result2 = mysqli_query($con,$sql2);
        $chart_data="";
        while ($row2 = mysqli_fetch_array($result2)) { 
             
            $avg_nilai2[] = $row2['avg_nilai'];
        }
 
 
 }
 
 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:100%;height:100%;text-align:center">
            <h2 class="page-header" >
                BARCHART PORTOFOLIO
            </h2>
            <div>Product </div>
            <canvas id="barChart"></canvas>  
        </div>    
    </body>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
        //setup block
        const data = {
            labels:<?php echo json_encode($idsiswa); ?>,
            datasets: [{
                label:"Semester 1", 
                axis: 'y',
                data:<?php echo json_encode($avg_nilai); ?>,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
                //backgroundColor: [
                //"#5969ff",
                //"#ff407b",
                //"#25d5f2",
                //"#ffc750",
                //"#2ec551",
                //"#7040fa",
                //"#ff004e"
                //],
                //borderWidth: 1
            },
            {
                label:"Semester 2",
                axis: 'y',
                data:<?php echo json_encode($avg_nilai2); ?>,
                fill: false,
                borderColor: 'rgb(75, 75, 192)',
                tension: 0.1
            }]
        };

        //config block
        const config = {
            type: 'line',
            data,
            options: {
                //indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                     }
                    /**xAxes: [{
                        ticks: {
                            beginAtZero:true//,
                            //max: 5
                        }
                    }]**/
                }
            }
        };
        //render block

        const barChart = new Chart(
            document.getElementById('barChart'),
            config
        );
        //var ctx = document.getElementById("barChart").getContext('2d');
        //var myChart = new Chart(ctx, { });
        </script>
</html>