document.addEventListener("DOMContentLoaded", function () {
    var captureButton = document.getElementById("capture");
    captureButton.addEventListener("click", function () {
        chrome.tabs.captureVisibleTab({ format: "png" }, function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            document.body.appendChild(img);
            // Tùy chỉnh hành động với ảnh ở đây, ví dụ lưu ảnh vào bộ nhớ hoặc gửi đến máy chủ của bạn
        });
    });
});
