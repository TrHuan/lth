<div class="contacts-form">
    <div class="form-group">
        [text* your-name placeholder "Họ tên"]
    </div>

    <div class="groups-box">
        <div class="form-group">
            [email* your-email placeholder "Email"]
        </div>

        <div class="form-group">
            [tel* your-phone minlength:10 maxlength:11 placeholder "Số điện thoại"]
        </div>
    </div>

    <div class="form-group">
        [textarea your-message placeholder "Nội dung"]
    </div>

    <div class="form-group form-group-button">
        <div class="form-button">
            [submit "Gửi"]
        </div>
    </div>
</div>

<!-- cấu hình mail -->
<div>
    <ul style="list-style: none; padding-left: 0;">
        <li style="margin-left: 0;">
            <strong>Họ tên:</strong>
            <span>[your-name]</span>
        </li>
        <li style="margin-left: 0;">
            <strong>Số điện thoại:</strong>
            <a href="tel:[your-phone]">[your-phone]</a>
        </li>
        <li style="margin-left: 0;">
            <strong>Email:</strong>
            <span>[your-email]</span>
        </li>
        <li style="margin-left: 0;">
            <strong>Nội dung:</strong>
            <p>[your-message]</p>
        </li>
        <li style="margin-left: 0;">Email này được gửi từ một biểu mẫu liên hệ trên [_site_title] ([_site_url])</li>
    </ul>
</div>