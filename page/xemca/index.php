<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="#">Thông tin cá nhân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=doimatkhau">Đổi mật khẩu</a>
                    </li>
                <li class="nav-item active">
                        <a class="nav-link" href="#">Xem ca làm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quanlykhachhang">Quản lý khách hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quản lý đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=quanlydondattiec">Quản lý đơn đặt tiệc</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
        .shift {
            display: none;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .shift.active {
            display: block;
        }
        .day {
            margin-bottom: 15px;
        }
        .day-detail {
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .shift-detail {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
        }
        .shift-detail .left, .shift-detail .right {
            width: 48%;
        }
        .fa-chevron-up {
            transition: transform 0.3s;
        }
        .day-detail.active .fa-chevron-up {
            transform: rotate(180deg);
        }
    </style>

                <div class="container mt-5">
                    <h2 class="text-center">XEM CA LÀM</h2> 
                </div>
                <div class="content-content">
                    <!-- Thứ hai -->
                    <div class="day">
                        <div class="day-detail" onclick="toggleShift('shift-mon')">
                            <label>Thứ hai</label>
                            <label class="fa fa-chevron-up" aria-hidden="true"></label>
                        </div>
                        <div class="shift" id="shift-mon">
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca sáng</label>
                                    <label>6:00 A.M - 11:30 A.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>8:00 A.M - 11:30 A.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca chiều</label>
                                    <label>11:30 A.M - 17:00 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>13:30 P.M - 17:00 P.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca tối</label>
                                    <label>17:00 P.M - 20:30 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>19:00 P.M - 20:30 P.M</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thứ ba -->
                    <div class="day">
                        <div class="day-detail" onclick="toggleShift('shift-tue')">
                            <label>Thứ ba</label>
                            <label class="fa fa-chevron-up" aria-hidden="true"></label>
                        </div>
                        <div class="shift" id="shift-tue">
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca sáng</label>
                                    <label>6:00 A.M - 11:30 A.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>8:00 A.M - 11:30 A.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca chiều</label>
                                    <label>11:30 A.M - 17:00 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>13:30 P.M - 17:00 P.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca tối</label>
                                    <label>17:00 P.M - 20:30 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>19:00 P.M - 20:30 P.M</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thứ tư -->
                    <div class="day">
                        <div class="day-detail" onclick="toggleShift('shift-wed')">
                            <label>Thứ tư</label>
                            <label class="fa fa-chevron-up" aria-hidden="true"></label>
                        </div>
                        <div class="shift" id="shift-wed">
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca sáng</label>
                                    <label>6:00 A.M - 11:30 A.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>8:00 A.M - 11:30 A.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca chiều</label>
                                    <label>11:30 A.M - 17:00 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>13:30 P.M - 17:00 P.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca tối</label>
                                    <label>17:00 P.M - 20:30 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>19:00 P.M - 20:30 P.M</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thứ năm -->
                    <div class="day">
                        <div class="day-detail" onclick="toggleShift('shift-thu')">
                            <label>Thứ năm</label>
                            <label class="fa fa-chevron-up" aria-hidden="true"></label>
                        </div>
                        <div class="shift" id="shift-thu">
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca sáng</label>
                                    <label>6:00 A.M - 11:30 A.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>8:00 A.M - 11:30 A.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca chiều</label>
                                    <label>11:30 A.M - 17:00 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>13:30 P.M - 17:00 P.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca tối</label>
                                    <label>17:00 P.M - 20:30 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>19:00 P.M - 20:30 P.M</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thứ sáu -->
                    <div class="day">
                        <div class="day-detail" onclick="toggleShift('shift-fri')">
                            <label>Thứ sáu</label>
                            <label class="fa fa-chevron-up" aria-hidden="true"></label>
                        </div>
                        <div class="shift" id="shift-fri">
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca sáng</label>
                                    <label>6:00 A.M - 11:30 A.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>8:00 A.M - 11:30 A.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca chiều</label>
                                    <label>11:30 A.M - 17:00 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>13:30 P.M - 17:00 P.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca tối</label>
                                    <label>17:00 P.M - 20:30 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>19:00 P.M - 20:30 P.M</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thứ bảy -->
                    <div class="day">
                        <div class="day-detail" onclick="toggleShift('shift-sat')">
                            <label>Thứ bảy</label>
                            <label class="fa fa-chevron-up" aria-hidden="true"></label>
                        </div>
                        <div class="shift" id="shift-sat">
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca sáng</label>
                                    <label>6:00 A.M - 11:30 A.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>8:00 A.M - 11:30 A.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca chiều</label>
                                    <label>11:30 A.M - 17:00 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>13:30 P.M - 17:00 P.M</label>
                                </div>
                            </div>
                            <div class="shift-detail">
                                <div class="left">
                                    <label>Ca tối</label>
                                    <label>17:00 P.M - 20:30 P.M</label>
                                </div>
                                <div class="right">
                                    <label>Ca xoay</label>
                                    <label>19:00 P.M - 20:30 P.M</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            

    <script>
        function toggleShift(shiftId) {
            const shiftElement = document.getElementById(shiftId);
            const dayDetail = shiftElement.previousElementSibling;
            shiftElement.classList.toggle('active');
            dayDetail.classList.toggle('active');
        }
    </script>

