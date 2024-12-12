<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quanly">Quản Lý Nhân Viên</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?page=calam">Quản Lý Ca Làm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quanlysanpham">Quản Lý Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=nguyenvatlieu">Quản Lý Nguyên Vật Liệu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<section>
    <div class="container mt-5">
        <h2 class="text-center pb-4">QUẢN LÝ CA LÀM</h2>   

        <div class="schedule-wrapper">
            <!-- Vòng lặp các ngày trong tuần -->
            <?php
            $obj= new database();

            for ($i = 2; $i <= 7; $i++) {
                $sql = 'select * from calam where thu = ' . $i . '';
                $result = $obj->laydulieu($sql);
                echo '<div class="day-schedule">';
                echo '<h4>Thứ ' . $i . '</h4>';
                echo '<table>
                    <thead>
                        <tr>
                            <th>Ca làm</th>
                            <th>Thời gian</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>';
                for ($j = 0; $j < count($result); $j++) {
                    echo "<tr>
                    <td>" . $result[$j]['tenCa'] . "</td>
                    <td>" . $result[$j]['thoigian'] . "</td>
                    <td>
                        <a style='text-decoration: none;' href='index.php?page=calam&id={$result[$j]['maCa']}'>Xóa</a>
                    </td>
                </tr>";
                }
                echo '</tbody>
                </table>
                <button onclick="openModal('.$i.')">Thêm Ca Làm</button>
            </div>';
            }
            ?>

           

            <!-- Modal nhập ca làm -->
            <div  id="myModal" class="modal">
                <div class="modal-content">

                    <h4>Thêm Ca Làm</h4>
                    <label>Ca làm:</label>
                    <form method="post">
                        <input type="hidden" name="shift-day" id="shift-day" placeholder="">
                        <input type="text" name="shift-name" id="shift-name" placeholder="Nhập tên ca làm">

                        <label>Thời gian:</label>
                        <input type="text" name="shift-time" id="shift-time" placeholder="Nhập thời gian ca làm">
                        <button name="btnSubmit" type="submit">Lưu</button>
                        <button onclick="closeModal()">Hủy</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php

if (isset($_REQUEST['btnSubmit'])) {
    $day = $_POST['shift-day'];
    $tenca = $_POST['shift-name'];
    $thoigian = $_POST['shift-time'];

    $result = $obj->themCa($day, $tenca, $thoigian);
    if ($result) {
        // Redirect để xóa dữ liệu form
        echo"<script>
        window.location.href='index.php?page=calam'</script>";
    }
}
?>
    <script>
        function openModal(day) {
            document.getElementById('myModal').style.display = "flex";
            // document.getElementById('shift-name').value = '';
            // document.getElementById('shift-time').value = '';
            document.getElementById('shift-day').value = day;
            // Lưu thông tin ngày vào modal nếu cần
            document.getElementById('shift-name').focus();

        }

        function closeModal() {
            document.getElementById('shift-name').value = '';
            document.getElementById('shift-time').value = '';
            document.getElementById('myModal').style.display = "none";
            document.getElementById('myModal').style.display = "none";

        }

        function saveShift() {
            const shiftName = document.getElementById('shift-name').value;
            const shiftTime = document.getElementById('shift-time').value;
            const shiftDay = document.getElementById('shift-day').value;


            closeModal();
        }
    </script>
    <?php
        if(isset($_REQUEST['id'])){
            $idDelete = $_REQUEST['id'];
            $delete = $obj->xoaCa($idDelete);
            if($delete){
                echo"<script>alert('Xóa ca làm thành công.')</script>";
                echo"<script> 
        window.location.href='index.php?page=calam'</script>";
            }
        }
    ?>
</section>
<style>
        body {
            font-family: Arial, sans-serif;
        }

        .content-header h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .content-nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .content-nav ul li a {
            text-decoration: none;
            color: #007bff;
            padding: 10px 15px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        .content-nav ul li a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .schedule-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .day-schedule {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #f0f0f0;
        }

        button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Modal style */
        .modal {
            display: none;
            /* Hide modal by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        .modal-content h4 {
            margin-top: 0;
        }

        .modal-content label {
            display: block;
            margin-bottom: 10px;
        }

        .modal-content input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .modal-content button {
            width: 48%;
            margin: 5px;

        }
    </style>