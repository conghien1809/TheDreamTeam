<?php
$db = new database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $guests = $_POST['guests'];
    $datetime = $_POST['datetime'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO dontiec (HoTen, SoDienThoai, Email, SoLuongKhach, NgayDat, GhiChu)
            VALUES ('$name', '$phone', '$email', $guests, '$datetime', '$notes')";

    if ($db->dangky($sql)) {
        // Chuyển hướng sang trang chọn sản phẩm
        header("Location: index.php?page=chon_sanpham");
        exit();
    } else {
        echo "Có lỗi xảy ra. Vui lòng thử lại.";
    }
}
?>
<div class="party-booking">
    <div class="inner-wrap">
        <form action="" method="post">
            <strong class="inner-title">NHẬN TƯ VẤN & BÁO GIÁ</strong>
            <div class="inner-form-wrap">
                <input type="text" name="name" placeholder="Họ Và Tên" />
                <input id="phone" type="tel" name="phone" placeholder="Số Điện Thoại" />
                <input class="mt-4" type="email" name="email" placeholder="Email" />
                <input type="number" name="guests" placeholder="Số Lượng Khách" />
                <input type="datetime-local" name="datetime" />
                <textarea name="notes" placeholder="Thêm ghi chú"></textarea>
            </div>

            <div class="inner-button text-center">
                <button class="button" type="submit">Đặt Ngay</button>
            </div>
        </form>
        <div class="inner-picture">
            <img src="./assets/images/picture.jpg" alt="Hình ảnh" />
        </div>
    </div>
</div>

<style>
    .iti--separate-dial-code {
        width: 100%;
        text-align: display;
    }

    .party-booking .inner-wrap form {
        text-align: justify!important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script>
    const phoneInput = document.querySelector("#phone");
    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "vn", // Set default to Vietnam
        preferredCountries: ["vn", "us", "sg"], // List preferred countries
        separateDialCode: true, // Show dial code separately
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js", // Required for validation
    });
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault(); // Ngăn form submit mặc định

        // Lấy các giá trị từ form
        const name = document.querySelector('input[name="name"]');
        const phone = document.querySelector('input[name="phone"]');
        const email = document.querySelector('input[name="email"]');
        const guests = document.querySelector('input[name="guests"]');
        const datetime = document.querySelector('input[name="datetime"]');

        // Xóa thông báo lỗi và viền đỏ trước đó
        const inputs = [name, phone, email, guests, datetime];
        inputs.forEach(input => {
            input.style.border = '';
            const error = input.nextElementSibling;
            if (error && error.classList.contains('error-message')) {
                error.remove();
            }
        });


        let valid = true;


        function showError(input, message) {
            input.style.border = '2px solid red';
            const errorMessage = document.createElement('div');
            errorMessage.className = 'error-message';
            errorMessage.style.color = 'red';
            errorMessage.style.fontSize = '12px';
            errorMessage.textContent = message;
            input.insertAdjacentElement('afterend', errorMessage);
        }


        if (!name.value.trim()) {
            showError(name, 'Họ và tên không được để trống.');
            valid = false;
        }


        const phoneRegex = /^(84|0[1-9])[0-9]{8}$/;
        if (!phoneRegex.test(phone.value)) {
            showError(phone, 'Số điện thoại không hợp lệ.');
            valid = false;
        }


        const emailRegex = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
        if (!emailRegex.test(email.value)) {
            showError(email, 'Email không hợp lệ.');
            valid = false;
        }


        if (!Number.isInteger(Number(guests.value)) || Number(guests.value) <= 0) {
            showError(guests, 'Số lượng khách phải là số nguyên dương.');
            valid = false;
        }


        const inputDate = new Date(datetime.value);
        const currentDate = new Date();
        currentDate.setDate(currentDate.getDate() + 2);
        if (isNaN(inputDate.getTime()) || inputDate <= currentDate) {
            showError(datetime, 'Ngày giờ phải lớn hơn ngày hiện tại 2 ngày.');
            valid = false;
        }


        if (valid) {
            this.submit();
        }
    });


    const formInputs = document.querySelectorAll('input, textarea');
    formInputs.forEach(input => {
        input.addEventListener('input', () => {
            input.style.border = '';
            const error = input.nextElementSibling;
            if (error && error.classList.contains('error-message')) {
                error.remove();
            }
        });
    });


</script>