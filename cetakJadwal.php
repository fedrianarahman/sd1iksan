<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Pelajaran SDN 01 Leuwiliang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body onload="print()">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12 mt-4">
                <h2 class="text-center mb-4">Jadwal Pelajaran Kelas 1A</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Jam</th>
                            <th scope="col">Senin</th>
                            <th scope="col">Selasa</th>
                            <th scope="col">Rabu</th>
                            <th scope="col">Kamis</th>
                            <th scope="col">Jum'at</th>
                            <th scope="col">Sabtu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include './controller/conn.php';
                        $id = $_GET['id'];
                        $query = mysqli_query($conn, "SELECT jadwal_pelajaran.id AS id_jadwal,jadwal_pelajaran.senin AS senin,jadwal_pelajaran.selasa AS selasa,jadwal_pelajaran.rabu AS rabu,jadwal_pelajaran.kamis AS kamis,jadwal_pelajaran.jumat AS jumat,jadwal_pelajaran.sabtu AS sabtu, kelas.id AS id_kelas,kelas.kelas AS kelas,jam_pelajaran.jam_pelajaran AS jam_pelajaran FROM jadwal_pelajaran INNER JOIN jam_pelajaran ON jam_pelajaran.id = jadwal_pelajaran.waktu INNER JOIN kelas ON kelas.id = jadwal_pelajaran.idKelas WHERE idKelas = '$id'");
                        // var_dump($query);
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td class="<?php if ($data['senin'] == "istirahat") {
                                                echo ' fw-bolder ';
                                            } ?>"><?php echo $data['jam_pelajaran'] ?></td>
                                <!-- <td><?php echo $data['kelas'] ?></td> -->
                                <td class="<?php if ($data['senin'] == "istirahat") {
                                                echo ' fw-bolder ';
                                            } ?>"><?php echo $data['senin'] ?></td>
                                <td class="<?php if ($data['senin'] == "istirahat") {
                                                echo ' fw-bolder ';
                                            } ?>"><?php echo $data['selasa'] ?></td>
                                <td class="<?php if ($data['senin'] == "istirahat") {
                                                echo ' fw-bolder ';
                                            } ?>"><?php echo $data['rabu'] ?></td>
                                <td class="<?php if ($data['senin'] == "istirahat") {
                                                echo ' fw-bolder ';
                                            } ?>"><?php echo $data['kamis'] ?></td>
                                <td class="<?php if ($data['senin'] == "istirahat") {
                                                echo ' fw-bolder ';
                                            } ?>"><?php echo $data['jumat'] ?></td>
                                <td class="<?php if ($data['senin'] == "istirahat") {
                                                echo ' fw-bolder ';
                                            } ?>"><?php echo $data['sabtu'] ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <script>
        window.print();
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>