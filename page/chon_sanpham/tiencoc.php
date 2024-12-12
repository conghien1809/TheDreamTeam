<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h5>Chuyển Tiền Cọc</h5>
                </div>
                <div class="card-body">
                    <form id="depositForm">
                        <div class="mb-3">
                            <label for="accountName" class="form-label">Số tiền đặt cọc</label>
                            <span>
                                500.000 VNĐ
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="accountName" class="form-label">Tên Tài Khoản</label>
                            <input type="text" class="form-control" id="accountName" placeholder="Nguyễn Văn A"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="accountNumber" class="form-label">Số Tài Khoản</label>
                            <input type="text" class="form-control" id="accountNumber" placeholder="123456789" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Số Tiền (VNĐ)</label>
                            <input type="number" class="form-control" id="amount" placeholder="500,000" required>
                        </div>
                        <div class="text-center mb-3">
                            <button type="button" class="btn btn-success" id="generateQR">Tạo Mã QR</button>
                        </div>
                        <div class="text-center">
                            <div id="qrcode" class="border p-3 d-inline-block"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('generateQR').addEventListener('click', function () {
        const accountName = document.getElementById('accountName').value;
        const accountNumber = document.getElementById('accountNumber').value;
        const amount = document.getElementById('amount').value;

        if (accountName && accountNumber && amount) {
            const qrData = `Tên tài khoản: ${accountName}\nSố tài khoản: ${accountNumber}\nSố tiền: ${amount} VNĐ`;

            const qrCodeElement = document.getElementById('qrcode');
            qrCodeElement.innerHTML = ''; // Clear existing QR Code

            QRCode.toCanvas(qrCodeElement, qrData, { width: 200 }, function (error) {
                if (error) console.error(error);
            });
        } else {
            alert('Vui lòng nhập đầy đủ thông tin trước khi tạo mã QR!');
        }
    });
</script>