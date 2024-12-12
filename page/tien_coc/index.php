<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h5>Thông Tin Chuyển Khoản</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="accountName" class="form-label">Số tiền cần đặt cọc: </label>
                        <span>
                            <b>
                                 500.000 VNĐ
                            </b>
                        </span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Tên Tài Khoản:</strong></label>
                        <p class="form-control-plaintext">Nguyễn Văn A</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Số Tài Khoản:</strong></label>
                        <p class="form-control-plaintext">123456789</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Ngân Hàng:</strong></label>
                        <p class="form-control-plaintext">Ngân hàng ABC</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Nội Dung:</strong></label>
                        <p class="form-control-plaintext">Tên + Số điện thoại</p>
                    </div>
                    <div class="text-center mb-3">
                        <label class="form-label"><strong>Mã QR:</strong></label>
                        <div id="qrcode" class="border p-3 d-inline-block">
                            <img src="./assets/images/qr.png" alt="">
                        </div>
                    </div>
                    <div class="text-center">
                        <small>Quét mã QR để chuyển khoản nhanh chóng.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const accountName = "Nguyễn Văn A";
        const accountNumber = "123456789";
        const bankName = "Ngân hàng ABC";
        const qrData = `Tên tài khoản: ${accountName}\nSố tài khoản: ${accountNumber}\nNgân hàng: ${bankName}`;

        const qrCodeElement = document.getElementById('qrcode');

        QRCode.toCanvas(qrCodeElement, qrData, { width: 200 }, function (error) {
            if (error) console.error(error);
        });
    });
</script>